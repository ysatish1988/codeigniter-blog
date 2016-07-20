<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    //echo $this->db->last_query();
    public function check_existent($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
	
    //LOGIN WITH USERNAME OR EMAIL AND PASSWORD
   public function get_login_data($table, $username, $password) {  //  retrun only one row.
        $sql="SELECT * FROM $table WHERE (username=? or email_address=?) and password=?";//Preventing SQL injection in Codeigniter using Query Binding Method
        $res=$this->db->query($sql, array($username,$username,md5($password)))->row();
        
		return $res;
		
    }
	
	public function change($user_id,$data)
	{
		
		$query= $this->db->where('user_id', $user_id);
         $return_data=$this->db->update('users_master', $data); 
		 return $return_data;
			  
	}
	
	public function register_first()
	{
		$usertype = $this->session->userdata("registerUserType"); 
		
		$table='users_master';
		if($usertype == "expert"){
			$validations = $this->db->select('*')->from('field_validation_master')->where('form_name','expert_registration_form')->get()->result();
		}
		
		if($usertype == "customer"){
			$validations = $this->db->select('*')->from('field_validation_customer_master')->where('form_name','customer_registration_form')->get()->result();
		}
		if($usertype == "facility"){
			$validations = $this->db->select('*')->from('field_validation_facility_master')->where('form_name','facility_registration_form')->get()->result();
		}
		// if($validationArr->field_name == 'username' && $validationArr->is_required == '1'){

		// }
		$email_required = "";
		$username_required = "";
		$address_required = "";
		
//		$this->form_validation->set_rules('address', 'Address','trim');
		if($validations[0]->field_name== "email_id" && $validations[0]->is_required == '1'){ 
			//$this->form_validation->set_rules('email', 'Email','required');
			$email_required = "required|";
		}
		if($validations[1]->field_name== "username" && $validations[1]->is_required == '1'){ 
			//$this->form_validation->set_rules('username', 'Username','required');
			$username_required = "required|";
		}
		else{
			//$this->form_validation->set_rules('username', 'Username','trim|is_unique[users_master.username]|username_check');
		}
		if($validations[2]->field_name== "address" && $validations[2]->is_required == '1'){ 
			//$this->form_validation->set_rules('address', 'Address','required');
			$address_required = "|required";
		}
		else{
			// $this->form_validation->set_rules('address', 'Address','trim');
		}
		$this->form_validation->set_rules('email', 'Email','trim|'.$email_required.'valid_email|callback_checkEmailExist');
		//$this->form_validation->set_message('is_unique','This email-id is already in use. Please use different mail-id for registration.');
		//$this->form_validation->set_message('rule', 'Error Message');
		$this->form_validation->set_rules('username', 'Username','trim|'.$username_required.'callback_checkUsernameExist');
		$this->form_validation->set_rules('address', 'Address','trim'.$address_required.'');
		$this->form_validation->set_rules('password', 'Password','trim|required|matches[confirmpassword]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password','trim|required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$confirmpassword = $this->input->post('confirmpassword');
			$original_password = $this->input->post('password');
			$address = $this->input->post('address');
			$user_type = $usertype;
			$email_status = '0';
			$subscription_id = '0';
			//$status = '1';
		
			$created_at = date('Y-m-d h:i:s');
			$insertArray = array('username'=>$username,'email_id'=>$email,'password'=>$password,'original_password'=>$original_password,'address'=>$address,'user_type'=>$user_type,'email_status'=>$email_status,'subscription_id'=>$subscription_id,'created_at'=>$created_at);
			$this->db->insert($table, $insertArray);
			
			$insertId = $this->db->insert_id();
			$insertData = $this->db->select('*')->from('users_master')->where('user_id',$insertId)->get()->row();
			$register_usertype = $insertData->user_type;
			$userid = $insertData->user_id;
			$inserted_username = $insertData->username;
			$sessionData = array('user_id'=>$userid,'username'=>$inserted_username);
			if($register_usertype == "expert")
			{
				if(isset($sessionData)&& !empty($sessionData))
				{
					
					$folder= $username; 
					$path = getcwd()."/files/uploads/".$folder;
					$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
					
					if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
					if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
					
					$this->session->set_userdata('usertype',$sessionData); 
					$this->session->userdata('usertype');
					redirect(base_url('users/register_second?usertype='));
				}
			}
			if($register_usertype == "customer")
			{
				
				$folder= $username; 
				$path = getcwd()."/files/uploads/".$folder;
				$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
				
				if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
				if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
				$to=$email;
				//base_url('users/activate').'/'.urlencode($email);
				$subject='Kindly verify your email address to complete your Registration ';
				$message = 'Hi '.'  "'.$username.'"'.'<br>'.'Thanks for registering on "The Exchange".'.'<br>'.'  Please  ' . '<a href="'.base_url('users/activate').'/'.urlencode($email).'">'.'click here </a> '. 'to verify your email address. '.'<br>'.'Thanks,'. '<br>' . 'The Exchange Team';
				$message = $this->base_model->sendMail($to,$subject,$message);
				$this->session->set_flashdata('success_message','Thanks for Registering. An activation link has been sent to your email id. Please confirm your email id to login.Please check spam if the email does not show up in your inbox.');
				redirect(base_url('users/userLogin'));
				
			}
			if($register_usertype == "facility")
			{
				
				$insertNewArray =array('user_id'=>$insertId);
				$this->db->insert('user_facility_category',$insertNewArray);
				$insert_facility_id= $this->db->insert_id();
				$newsData = $this->db->select('*')->from('user_facility_category')->where('facilityId',$insert_facility_id)->get()->row();
				$facilityId = $newsData->facilityId;
				$facilityuserid = $newsData->user_id;
				$sessionNewData = array('user_id'=>$facilityuserid,'facilityId'=>$facilityId);
				$folder= $username; 
				$path = getcwd()."/files/uploads/".$folder;
				$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
				if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
				if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
				$this->session->set_userdata('usertypefacility',$sessionNewData); 
				$this->session->userdata('usertypefacility');
				redirect(base_url('users/facilityRegisterSecond?usertype='));
				
			}				
		}
	}
	
	
	
	public function register_second()
	{
		$usertype = $this->session->userdata("registerUserType"); 
		$table='users_master';
		if($usertype == "expert"){
			$validations = $this->db->select('*')->from('field_validation_master')->where('form_name','expert_registration_form')->get()->result();
		}
		$userid = $this->session->userdata('usertype');
		$id = $userid['user_id'];
		$this->form_validation->set_rules('phone_no', 'Phone','trim');
		$this->form_validation->set_rules('display_phone_no', 'Display phone','trim');
		$this->form_validation->set_rules('gender', 'Gender','trim');
		
		if($validations[3]->field_name== "phone_number" && $validations[3]->is_required == '1'){ 
			$this->form_validation->set_rules('phone_no', 'Phone','required');
		}
		if($validations[4]->field_name== "display_phone_number" && $validations[4]->is_required == '1'){ 
			$this->form_validation->set_rules('display_phone_no', 'Display phone','required');
		}
		if($validations[5]->field_name== "gender" && $validations[5]->is_required == '1'){ 
			$this->form_validation->set_rules('gender', 'Gender','required');
		}
		if($validations[6]->field_name== "date_of_birth" && $validations[6]->is_required == '1'){ 
			$this->form_validation->set_rules('month', 'Month','required');
			$this->form_validation->set_rules('day', 'Day','required');
			$this->form_validation->set_rules('year', 'Year','required');
		}
	
		if($this->form_validation->run() == TRUE)
		{
			$phone_no = $this->input->post('phone_no');
			$display_phone_no = $this->input->post('display_phone_no');
			$gender = $this->input->post('gender');
			$month = $this->input->post('month');
			$day = $this->input->post('day');
			$year = $this->input->post('year');
			$date_of_birth = $month . '-' . $day . '-' . $year;
			$updateArray = array('phone_no'=>$phone_no,'display_phone_no'=>$display_phone_no,'gender'=>$gender,'date_of_birth'=>$date_of_birth);
			$this->db->where('user_id', $id);
			$updateData = $this->db->update($table, $updateArray); 
			$getResult = $this->db->select('*')->from('users_master')->where('user_id',$id)->get()->row();
			$user_id = $getResult->user_id;
			$sessionData = array('user_id'=>$user_id);
			if(isset($sessionData)&& !empty($sessionData))
			{
					$this->session->set_userdata('usertype',$sessionData); 
					$this->session->userdata('usertype');
					redirect(base_url('users/subscription?usertype='));
			}	
		}
	}
	
	public function subscription()
	{
			$table='users_master';
			$registerUserType = $this->session->userdata("registerUserType"); 
			$userid = $this->session->userdata('usertype');
			$facility = $this->session->userdata('usertypefacility');
	
			$id = $userid['user_id'];
			//$facilityid = $facility['facilityId'];
			$facility_user_id = $facility['user_id'];
			
			if($_POST)
			{
				$this->form_validation->set_rules('subscription_id','Select Plan ','required');
				if($this->form_validation->run()==TRUE)
				{
					
					$subscription_id_data = $this->input->post('subscription_id');
					$subscription_name = $this->input->post('subscription_name');
					$subscription_amount = $this->input->post('subscription_amount');
					$subscription_duration = $this->input->post('subscription_duration');
					$getData = $this->db->select('*')->from('subscription_master')->where('subscription_id',$subscription_id_data)->get()->row();
					$amount = $getData->subscription_amount;
					if($amount  >0 )
					{
						
					// //$getData = $this->db->select('*')->from('subscription_master')->where('subscription_id',$subscription_id_data)->get()->row();
					// $sessionData123[0] = array('subscription_id'=>$getData->subscription_id,'subscription_name'=>$getData->subscription_name,'subscription_amount'=>$getData->subscription_amount,'subscription_duration'=>$getData->subscription_duration);
					// $sessionDataExpert = $this->db->select('*')->from('users_master')->where('user_id',$id)->get()->row();
							
					// $expertUserId= $sessionDataExpert->user_id;
					// $sessionNewUserData = array('user_id'=>$expertUserId);
					// $this->session->set_userdata('usertype',$sessionNewUserData); 
					// $userType = $this->session->userdata('usertype');
					// $this->session->set_userdata('usertype',$userType);
					
						// redirect(base_url('users/register_last?usertype='));
					//redirect(base_url('users/transaction_process?usertype='));
					echo "<script>alert('Please Select  free plan right now');</script>";
					}else{
						
						$updateArray = array('subscription_id'=>$subscription_id_data);
						if($registerUserType =="expert")
						{
							//$updateArray = array('subscription_id'=>$subscription_id_data);
							$this->db->where('user_id', $id);
							$updateData = $this->db->update($table, $updateArray); 
							if($updateData =TRUE)
							{
								$sessionData = array('user_id'=>$id);
								$this->session->set_userdata('usertype',$sessionData); 
								redirect(base_url('users/register_last?usertype='));
							}
						}else if($registerUserType =="facility")
						{
							
							$this->db->where('user_id', $facility_user_id);
							$success = $this->db->update($table, $updateArray); 
							if($success == TRUE)
							{
								$updateDataFacility = $this->db->select('*')->from('user_facility_category')->where('user_id',$facility_user_id)->get()->row();
							//$updateDataFacility = $this->db->select('*')->from('users_master')->where('user_id',$id)->get()->row();
							$facilityUserId = $updateDataFacility->facilityId;
							$facilityUserIdUser = $updateDataFacility->user_id;
							$sessionFacilityData = array('facilityId'=>$facilityUserId,'user_id'=>$facilityUserIdUser);
							$this->session->set_userdata('usertypefacility',$sessionFacilityData); 
							$this->session->userdata('usertypefacility');
							redirect(base_url('users/facilityRegisterLast?usertype='));
							}
								
							
						}		
					}
				}
			}
	}
	
	public function register_last()
	{
		$usertype = $this->session->userdata("registerUserType"); 
		$table='users_master';
	//	$category ="";
		// $category = $this->input->post('category');
		// $data['sub_cat_id']=$this->get_allsubcategory_by_id($category );
		// $subCategory = $this->input->post('subcategory');
		// if($category == '')
		// {
			// $subCategory ="";
			
		// }elseif($category !=''){
				
		// }
		
		
		if($usertype == "expert"){
			$validations = $this->db->select('*')->from('field_validation_master')->where('form_name','expert_registration_form')->get()->result();
		}
		$userid = $this->session->userdata('usertype');
		$id = $userid['user_id'];
		$this->form_validation->set_rules('salarypayroll', 'Salary Payroll','trim');
		
		
		
		if($validations[7]->field_name== "salary_payroll" && $validations[7]->is_required == '1'){ 
			$this->form_validation->set_rules('salarypayroll', 'Salary Payroll','required');
		}
		if($validations[8]->field_name== "travelling_distance" && $validations[8]->is_required == '1'){ 
			$this->form_validation->set_rules('traveling_distance', 'Traveling Distance','required|numeric');
		}
		if($validations[9]->field_name== "hourly_rate" && $validations[9]->is_required == '1'){ 
			$this->form_validation->set_rules('hourly_min', 'Min','required');
			$this->form_validation->set_rules('hourly_max', 'Max','required');
		}
		if($validations[10]->field_name== "smoker" && $validations[10]->is_required == '1'){ 
			$this->form_validation->set_rules('smoker', 'Smoke','required');
		}
		
		if($validations[12]->field_name== "category" && $validations[12]->is_required == '1'){ 
			$this->form_validation->set_rules('category', 'Category','required');
			$this->form_validation->set_rules('subcategory', 'Sub-Category','required');
		}
		if($validations[13]->field_name== "service_type" && $validations[13]->is_required == '1'){ 
			$this->form_validation->set_rules('servicetype', 'Service Type','required');
		}
		if($validations[15]->field_name== "expert_type" && $validations[15]->is_required == '1'){ 
			$this->form_validation->set_rules('expert_type', 'Expert Type','required');
		}
		if($this->form_validation->run() == TRUE)
		{
			$salarypayroll = $this->input->post('salarypayroll');
			$traveling_distance = $this->input->post('traveling_distance');
			$min = $this->input->post('hourly_min');
			$max = $this->input->post('hourly_max');
			$smoker = $this->input->post('smoker');
			$category = $this->input->post('category');
			$subCategory = $this->input->post('subcategory');
			$serviceType =$this->input->post('servicetype');
			$expertType =$this->input->post('expert_type');
			
			$updateArray = array('salary_payroll'=>$salarypayroll,'traveling_distance'=>$traveling_distance,'	hourly_min'=>$min,'hourly_max'=>$max,'smoker'=>$smoker,'category_id'=>$category,'sub_category_id'=>$subCategory,'service_type_id'=>$serviceType,'expert_type_id'=>$expertType);
			$this->db->where('user_id', $id);
			$updateData = $this->db->update($table, $updateArray); 
			$getData = $this->db->select('*')->from('users_master')->where(array('user_id'=>$id))->get()->row();
				
				$email = $getData->email_id;
				$username = $getData->username;
				$to=$email;
				//base_url('users/activate').'/'.urlencode($email);
				$subject='Kindly verify your email address to complete your Registration ';
				$message = 'Hi '.'  "'.$username.'"'.'<br>'.'Thanks for registering on "The Exchange".'.'<br>'.'  Please  ' . '<a href="'.base_url('users/activate').'/'.urlencode($email).'">'.'click here </a> '. 'to verify your email address. '.'<br>'.'Thanks,'. '<br>' . 'The Exchange Team';
				$message = $this->base_model->sendMail($to,$subject,$message);
				
			if($updateData = TRUE)
			{
				$this->session->set_flashdata('success_message','Thanks for Registering. An activation link has been sent to your email id. Please confirm your email id to login.Please check spam if the email does not show up in your inbox.');
				redirect(base_url('users/userLogin'));
			}
		}
	}
	public function get_allsubcategory_by_id($id){
		
		$subcat_id=$this->db->get_where('categories',array('parent_category_id'=>$id,'category_level'=>'2'))->row();
		return $subcat_id;
		
	}
	
	public function transaction_process()
	{
			$session_check = $this->session->userdata('expert_user');
			$currency = '$'; 
			
			//paypal settings
			$PayPalMode 			= 'sandbox'; // sandbox or live
			$PayPalApiUsername 		= 'anil-facilitator_api1.softlogique.com'; //PayPal API Username
			$PayPalApiPassword 		= 'SVUW32XKB4HA5WQV'; //Paypal API password
			$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgCBMnrb1vMnXeSsNUFO8zCEy6Xe'; //Paypal API Signature
			$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
			$PayPalReturnURL 		= base_url().'users/success'; //Point to paypal-express-checkout page
			$PayPalCancelURL 		= base_url().'users/cancel'; //Cancel URL if user clicks cancel
			//Additional taxes and fees											
			$HandalingCost 		= 0.00;  //Handling cost for the order.
			$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
			$shipping_cost      = 0.00; //shipping cost
			$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
			$taxes              = array( //List your Taxes percent here.
										'VAT' => 12, 
										'Service Tax' => 5
										);

			$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
			$arr = $this->session->userdata('expert_user');
			if(isset($arr)) //Post Data received from product list page.
			{
				$paypal_data ='';
				$ItemTotalPrice = 0;
				$i = 0;
					foreach ($this->session->userdata('expert_user') as $subscription_details)
					{
						//print_r($subscription_details);die;
						$paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$i.'='.urlencode($subscription_details['subscription_name']);
						$paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$i.'='.urlencode($subscription_details['subscription_id']);
						$paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$i.'='.urlencode($subscription_details['subscription_amount']);		
						$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$i.'='. urlencode($subscription_details['subscription_duration']);
       
					$ItemTotalPrice = ($subscription_details['subscription_amount']);
					
					//create items for session
					$paypal_product['items'][] = array('name'=>$subscription_details['subscription_name'],
											'price'=>$subscription_details['subscription_amount'],
											'id'=>$subscription_details['subscription_id'], 
											'qty'=>$subscription_details['subscription_duration']
											);
					$i++;
				}
				$total_tax = 0;	
				$GrandTotal = $ItemTotalPrice;
				
				$paypal_product['assets'] = array('tax_total'=>$total_tax, 
											'handaling_cost'=>$HandalingCost, 
											'insurance_cost'=>$InsuranceCost,
											'shippin_discount'=>$ShippinDiscount,
											'shippin_cost'=>$shipping_cost,
											'grand_total'=>$GrandTotal);
				//create session array for later use
				//$_SESSION["paypal_products"] = $paypal_product;
					
			$this->session->set_userdata('paypal_products',$paypal_product);
				
				//Parameters for SetExpressCheckout, which will be sent to PayPal
				$padata = 	'&METHOD=SetExpressCheckout'.
							'&RETURNURL='.urlencode($PayPalReturnURL ).
							'&CANCELURL='.urlencode($PayPalCancelURL).
							'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
							$paypal_data.				
							'&NOSHIPPING=0'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
							'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
							'&PAYMENTREQUEST_0_TAXAMT='.urlencode($total_tax).
							'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($shipping_cost).
							'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
							'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
							'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
							'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
							'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
							'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
							'&LOGOIMG='.base_url().'files/images/logo.png'. //site logo
							'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
							'&ALLOWNOTE=1';
				
					//We need to execute the "SetExpressCheckOut" method to obtain paypal token
				
					$paypal= new paypal_lib();
					$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
					
					//Respond according to message we receive from Paypal
					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
					{
							
							//unset($_SESSION["cart_products"]); //session no longer needed
							 $this->session->unset_userdata('expert_user');
							//Redirect user to PayPal store with Token received.
							$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
							header('Location: '.$paypalurl);
					}
					else
					{
						
						
						//Show error message
						echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
						echo '<pre>';
						print_r($httpParsedResponseAr);
						echo '</pre>';
					}

				}

				//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
				if(isset($_GET["token"]) && isset($_GET["PayerID"]))
				{
				//we will be using these two variables to execute the "DoExpressCheckoutPayment"
				//Note: we haven't received any payment yet.
				
				$token = $_GET["token"];
				$payer_id = $_GET["PayerID"];
				
				//get session variables
				//$paypal_product = $_SESSION["paypal_products"];
				$paypal_product = $this->session->userdata('paypal_products');
				$paypal_data = '';
				$ItemTotalPrice = 0;
			
				foreach($paypal_product['items'] as $key=>$p_item)
				{	
								
					$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($p_item['itm_qty']);
					$paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($p_item['itm_price']);
					$paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($p_item['itm_name']);
					$paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($p_item['itm_code']);
					
					// item price X quantity
					$subtotal = ($p_item['itm_price']*$p_item['itm_qty']);
					
					//total price
					$ItemTotalPrice = ($ItemTotalPrice + $subtotal);
				}

				$padata = 	'&TOKEN='.urlencode($token).
							'&PAYERID='.urlencode($payer_id).
							'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
							$paypal_data.
							'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
							'&PAYMENTREQUEST_0_TAXAMT='.urlencode($paypal_product['assets']['tax_total']).
							'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($paypal_product['assets']['shippin_cost']).
							'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($paypal_product['assets']['handaling_cost']).
							'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($paypal_product['assets']['shippin_discount']).
							'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($paypal_product['assets']['insurance_cost']).
							'&PAYMENTREQUEST_0_AMT='.urlencode($paypal_product['assets']['grand_total']).
							'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);

				//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
				
				//Check if everything went ok..
				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{

						echo '<h2>Success</h2>';
						echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
						
							/*
							//Sometimes Payment are kept pending even when transaction is complete. 
							//hence we need to notify user about it and ask him manually approve the transiction
							*/
							
							if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
							{
								echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
							}
							elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
							{
								echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
								'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
							}

							// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
							// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
							$padata = 	'&TOKEN='.urlencode($token);
							$paypal= new MyPayPal();
							$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

							if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
							{
								
								echo '<br /><b>Stuff to store in database :</b><br />';
								
								echo '<pre>';
								/*
								#### SAVE BUYER INFORMATION IN DATABASE ###
								//see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
								//use urldecode() to decode url encoded strings.
								
								$buyerName = urldecode($httpParsedResponseAr["FIRSTNAME"]).' '.urldecode($httpParsedResponseAr["LASTNAME"]);
								$buyerEmail = urldecode($httpParsedResponseAr["EMAIL"]);
								
								//Open a new connection to the MySQL server
								$mysqli = new mysqli('host','username','password','database_name');
								
								//Output any connection error
								if ($mysqli->connect_error) {
									die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
								}		
								
								$insert_row = $mysqli->query("INSERT INTO BuyerTable 
								(BuyerName,BuyerEmail,TransactionID,ItemName,ItemNumber, ItemAmount,ItemQTY)
								VALUES ('$buyerName','$buyerEmail','$transactionID','$ItemName',$ItemNumber, $ItemTotalPrice,$ItemQTY)");
								
								if($insert_row){
									print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
								}else{
									die('Error : ('. $mysqli->errno .') '. $mysqli->error);
								}
								
								*/
								
								echo '<pre>';
								print_r($httpParsedResponseAr);
								echo '</pre>';
							} else  {
								echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
								echo '<pre>';
								print_r($httpParsedResponseAr);
								echo '</pre>';

							}
				
							}else{
									echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
									echo '<pre>';
									print_r($httpParsedResponseAr);
									echo '</pre>';
							}
						}
				}
				
		public  function success()
		 {
				$currency = '$'; //Currency Character or code
				$session_check=$this->session->userdata('expert_user');
				$currency = '$'; //Currency Character or code
				//paypal settings
				print_r($paypal_product); die('success');
				$PayPalMode 			= 'sandbox'; // sandbox or live
				$PayPalApiUsername 		= 'anil-facilitator_api1.softlogique.com'; //PayPal API Username
				$PayPalApiPassword 		= 'SVUW32XKB4HA5WQV'; //Paypal API password
				$PayPalApiSignature 	= 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgCBMnrb1vMnXeSsNUFO8zCEy6Xe'; //Paypal API Signature
				$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
				$PayPalReturnURL 		= base_url().'users/success'; //Point to paypal-express-checkout page
				$PayPalCancelURL 		= base_url().'users/cancel'; //Cancel URL if user clicks cancel

				//Additional taxes and fees											
				$HandalingCost 		= 0.00;  //Handling cost for the order.
				$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
				$shipping_cost      = 0.00; //shipping cost
				$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
				$taxes              = array( //List your Taxes percent here.
											'VAT' => 12, 
											'Service Tax' => 5
											);

				$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';
				$arr = $this->session->userdata('token_value_dd');
				
				 //Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
				if(isset($_GET["token"]) && isset($_GET["PayerID"]))
				{
					//we will be using these two variables to execute the "DoExpressCheckoutPayment"
					//Note: we haven't received any payment yet.
					
					$token = $_GET["token"];
					$payer_id = $_GET["PayerID"];
					
					//get session variables
					//$paypal_product = $_SESSION["paypal_products"];
					$paypal_product = $this->session->userdata('paypal_products');
					$paypal_data = '';
					$ItemTotalPrice = 0;
					
					foreach($paypal_product['items'] as $key=>$p_item)
					{		
						$paypal_data .= '&L_PAYMENTREQUEST_0_QTY'.$key.'='. urlencode($p_item['itm_qty']);
						$paypal_data .= '&L_PAYMENTREQUEST_0_AMT'.$key.'='.urlencode($p_item['itm_price']);
						$paypal_data .= '&L_PAYMENTREQUEST_0_NAME'.$key.'='.urlencode($p_item['itm_name']);
						$paypal_data .= '&L_PAYMENTREQUEST_0_NUMBER'.$key.'='.urlencode($p_item['itm_code']);
						
						// item price X quantity
						$subtotal = ($p_item['itm_price']*$p_item['itm_qty']);
						
						//total price
						$ItemTotalPrice = ($ItemTotalPrice + $subtotal);
					}

					$padata = 	'&TOKEN='.urlencode($token).
								'&PAYERID='.urlencode($payer_id).
								'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
								$paypal_data.
								'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
								'&PAYMENTREQUEST_0_TAXAMT='.urlencode($paypal_product['assets']['tax_total']).
								'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($paypal_product['assets']['shippin_cost']).
								'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($paypal_product['assets']['handaling_cost']).
								'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($paypal_product['assets']['shippin_discount']).
								'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($paypal_product['assets']['insurance_cost']).
								'&PAYMENTREQUEST_0_AMT='.urlencode($paypal_product['assets']['grand_total']).
								'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);

					//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
					$paypal= new paypal_lib();
					$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
					
					//Check if everything went ok..
					if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
					{

							//echo '<h2>Success</h2>';
							//echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);
							
								/*
								//Sometimes Payment are kept pending even when transaction is complete. 
								//hence we need to notify user about it and ask him manually approve the transiction
								*/
								
								if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
								{
									$data['payment_status'] = '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
								}
								elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
								{
									$data['payment_status'] = '<div style="color:red">Transaction Complete, but payment is still pending! '.
									'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
								}

								// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
								// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
								$padata = 	'&TOKEN='.urlencode($token);
								$paypal= new paypal_lib();
								$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

								if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
								{
									//print_r($httpParsedResponseAr);
									//$cartData = $this->session->userdata('ordernow');
									$cartData = array();
									$user_id = $this->session->userdata('user_id');
									$arr1 = $this->session->userdata('expert_user');
									//echo '<pre>';
									$total_pay_amount = urldecode($httpParsedResponseAr['PAYMENTREQUEST_0_AMT']);
									$this->session->set_flashdata('success_message','Your payment was successfull. Thanks for ordering.');
									//redirect(base_url('products/my_orders'));
									$this->base_model->checkSession();
									$user_id = $this->session->userdata('user_id');
									$data['responseData'] = $httpParsedResponseAr;
									$data['userData'] = $this->db->get_where('users_master',array('user_id'=>$user_id))->row();
									print_r($data['userData']); die;
									//$this->load->view('includes/_header',$header);
									$this->load->view('login/success',$data);
									//$this->load->view('includes/_footer');
									//echo '<pre>';
									//echo urldecode($httpParsedResponseAr['PAYMENTREQUESTINFO_0_TRANSACTIONID']);
									//echo '</pre>';
								} else  {
									echo '<div style="color:green"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
									echo '<pre>';
									print_r($httpParsedResponseAr);
									echo '</pre>';

								}
					
					}else{
						redirect(base_url('login/subscription'));
							echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
							echo '<pre>';
							print_r($httpParsedResponseAr);
							echo '</pre>';
					}
			}
	 }
	
	public function editProfile()
	{
		$address = $this->input->post('address');
		$gender = $this->input->post('gender');
		$phone_no = $this->input->post('phone_no');
		$display_phone_no = $this->input->post('display_phone_no');
		$smoker = $this->input->post('smoker');
		$traveling_distance = $this->input->post('traveling_distance');
		$hourly_min = $this->input->post('hourly_min');
		$hourly_max = $this->input->post('hourly_max');
		$month = $this->input->post('month');
		$day = $this->input->post('day');
		$year = $this->input->post('year');
		$date_of_birth = $month . '-' . $day . '-' . $year;
		$updateArray = array('address'=>$address,'gender'=>$gender,'phone_no'=>$phone_no,'display_phone_no'=>$display_phone_no,'smoker'=>$smoker,'traveling_distance'=>$traveling_distance,'hourly_min'=>$hourly_min,'hourly_max'=>$hourly_max,'date_of_birth'=>$date_of_birth);
		$this->db->where('user_id', $userId);
		$updateData = $this->db->update($table, $updateArray); 
		if($updateData=TRUE)
		{
			redirect(base_url('userhome/dashboard'));
		}
	}
	
}