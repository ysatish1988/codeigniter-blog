<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Martrick extends CI_Controller {

	  public function __construct()
        {
			parent::__construct();
			$this->form_validation->set_error_delimiters('<span style="color:red; font-size:12px;">','</span>');
        }

		public function index()
	{
		if($this->session->userdata('sessionName') !='')
		{
			redirect(base_url('martrick/dashboard'));
		}else{
			if($_POST)
			{
				$this->form_validation->set_rules('username','User Name','trim|required');
				$this->form_validation->set_rules('password','Password','trim|required');
				if($this->form_validation->run()==TRUE)
				{
					$postedArr = $this->security->xss_clean($_POST);
					$username=$this->base_model->escape_str($postedArr['username']);
					$password=$this->base_model->escape_str($postedArr['password']);
					$row=$this->user_model->get_login_data('users_master',$username,$password);
					if(count($row)>0)
					{
						$mySession = array('user_id'=>$row->user_id,'user_type'=>$row->user_type,'username'=>$row->username,'password'=>$row->password,'email_address'=>$row->email_address);
						$this->session->set_userdata($mySession);
						$this->session->set_userdata('sessionName',$row);
						$userType=$this->session->userdata('sessionName');
						if($userType->user_type == '1' )
						{ 	
							$this->session->set_flashdata('success_message','Login Successfully.');
							redirect(base_url('martrick/dashboard'));
						}	
						if($userType->user_type == '2')
						{
							$this->session->set_flashdata('success_message','Login Successfully.');
							redirect(base_url('recruiter/index'));
						}
						
					}else{
						$this->session->set_flashdata('error_message','User Name and Password Invalid.');
						redirect(base_url('martrick'));
					}
				}	
			}
			$data['title']="Login";
			$this->load->view('martrick/includes/_headerLogin',$data);
			//$this->load->view('martrick/admin/login');
			$this->load->view('martrick/admin/loginAdmin');
			$this->load->view('martrick/includes/_footerLogin');
		}	
	}
	
	public function register()
	{
		if($this->session->userdata('sessionName') !='')
		{
			redirect(base_url('martrick/dashboard'));
		}else{
			$table='users_master';
			if($_POST)
			{
				$this->form_validation->set_rules('username','user name','trim|required|callback_checkAlphaNumericSpaceUnderscore|is_unique[users_master.username]');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|is_unique[users_master.email_address]');
				$this->form_validation->set_rules('contact_number','user name','trim|required');
				$this->form_validation->set_rules('password','Password','trim|required|matches[confirmpassword]');
				$this->form_validation->set_rules('confirmpassword','Confirm password','trim|required');
				if($this->form_validation->run()==TRUE)
				{
					$username = $this->input->post('username');
					$email = $this->input->post('email_address');
					$contact = $this->input->post('contact_number');
					$password = $this->input->post('password');
					$userType='2';
					$creater_by='2';
					$created_on = date('Y-m-d H:i:s');
					$insertArray =array(
											'username'=>$username,
											'email_address'=>$email,
											'contact_number'=>$contact,
											'password'=>md5($password),
											'user_type'=>$userType,
											'creater_by'=>$creater_by,
											'created_on'=>$created_on,
											);
											
						$this->db->insert($table,$insertArray);
						$lastId = $this->db->insert_id();
						$getData = $this->db->select('*')->from('users_master')->where(array('user_id'=>$lastId))->get()->row();
						$id = $getData->user_id;
						$username = $getData->username;
						$folder= $username; 
						$path = getcwd()."/files/uploads/".$folder;
						$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
						if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
						if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
						$_FILES['user_file']['name'];
						$filename = $_FILES['user_file']['name'];
						$ext = pathinfo($filename, PATHINFO_EXTENSION);
						$images_name = '';
						if (in_array($ext, array('png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'))) 
						{
							$images_name = md5(time()).'.'.$ext;
							move_uploaded_file($_FILES['user_file']['tmp_name'], $path.'/'.$images_name);
							$this->load->library('image_lib');
							$config['image_library'] = 'gd2';
							$config['source_image'] = getcwd() . '/files/uploads/'.$username.'/'.$images_name;
							$config['new_image'] = getcwd() . '/files/uploads/'.$username.'/thumbs/'.$images_name;
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 192;
							$config['height'] = 191;
							$config['quality'] = '100%';
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							$this->image_lib->clear();
							$updateImage = array(
														'portrait'=>$images_name,
														);
							$this->db->where(array('user_id'=>$id));	
							$this->db->update($table,$updateImage);
						}
					$this->session->set_flashdata('success_message','Registration has been completed successfully.');
					redirect(base_url('martrick/index'));
				}
			}
			$data['title']="Recruiter registration form";
			$this->load->view('martrick/includes/_headerLogin',$data);
			$this->load->view('martrick/admin/register');
			$this->load->view('martrick/includes/_footerLogin');
		}
	}
	public function forgotPassword()
	{
		if($this->session->userdata('sessionName') !='')
		{
			redirect(base_url('martrick/dashboard'));
		}else{
			if($_POST)
			{
				$this->form_validation->set_rules('email_address','Email Address','trim|required|valid_email');
				if($this->form_validation->run()==TRUE)
				{
					$emailAddress = $this->input->post('email_address');
					$userData = $this->db->get_where('users_master', array('email_address' => $emailAddress))->row();
					if(!empty($userData))
					{
						$this->session->set_userdata('token',$userData);
						$email_encode = base64_encode($emailAddress);
						$username = $userData->username;
						$to = $emailAddress;
						$subject="Forgot Password";
						$message = 'Hi '.'  "'.$username.'"'.'<br>'.'If you want to change password.'.'<br>'.'  Please  ' . '<a href="'.base_url('martrick/resetPassword?token').'/'.urlencode($email_encode).'">'.'click here </a> '. 'to reset password. '.'<br>'.'Thanks,'. '<br>' . 'The Martrick Team';
						$this->base_model->sendMail($to,$subject,$message);
						$this->session->set_flashdata('success_message','Forgot Password Link has been sent on your registerd email address.');
						redirect(base_url('martrick'));
					}else{
						$this->session->set_flashdata('error_message',' Email does not exist .');
						redirect(base_url('martrick/forgotPassword'));
					}
				}
			}
			$data['title']=" Forgot Password";
			$this->load->view('martrick/includes/_headerLogin',$data);
			$this->load->view('martrick/admin/forgotPassword');
			$this->load->view('martrick/includes/_footerLogin');
		}
	}
	
	public function resetPassword()
	{
		if($this->session->userdata('sessionName') !='')
		{
			redirect(base_url('martrick/dashboard'));
		}else{
			$table='users_master';
			$emailAddress = $this->session->userdata('token');
			$email = $emailAddress->email_address;
			if($_POST)
			{
				$this->form_validation->set_rules('newpassword','New Password','trim|required|matches[confirmpassword]');
				$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required');
				if($this->form_validation->run()==TRUE)
				{
					$password = $this->input->post('newpassword');
					$updateArray = array('password'=>md5($password));
					$this->db->where(array('email_address'=>$email));
					$result = $this->db->update($table, $updateArray);
					if($result =TRUE)
					{
						$this->session->set_flashdata('success_message','Password reset has been successfully .');
						redirect(base_url('martrick'));
					}
				}
			}
			$data['title']=" Reset Password";
			$this->load->view('martrick/includes/_headerLogin',$data);
			$this->load->view('martrick/admin/resetPassword');
			$this->load->view('martrick/includes/_footerLogin');
		}
	}
	
	public function changePassword()
	{
		
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			
			$table='users_master';
			$sessionLogin = $this->session->userdata('sessionName');
			$userId = $sessionLogin->user_id;
			
			if($_POST)
			{
				$this->form_validation->set_rules('currentpassword','Current Password','trim|required');
				$this->form_validation->set_rules('newpassword','New Password','trim|required|matches[confirmpassword]');
				$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required');
				if($this->form_validation->run()==TRUE)
				{
					$getData = $this->db->select('*')->from('users_master')->where(array('user_id'=>$userId))->get()->row();
					$oldPassword = $getData->password;
					$currentPassword = md5($this->input->post('currentpassword'));
					$newPassword = $this->input->post('newpassword');
					if($oldPassword == $currentPassword)
					{
						$updateArray = array('password'=>md5($newPassword));
						$this->db->where(array('user_id'=>$userId));
						$result = $this->db->update($table,$updateArray);
						if($result =TRUE)
						{
							$this->session->set_flashdata('success_message','Password changed has been successfully .');
							redirect(base_url('martrick/changePassword'));
						}
					}else{
							$this->session->set_flashdata('error_message','Please enter valid current password. ');
							redirect(base_url('martrick/changePassword'));
					}
					
				}
			}
			$data['title']="Change Password";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/admin/changePassword');
			$this->load->view('martrick/includes/_footer');
		}
	
	}
	
	public function Logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success_message','Logout successfully.');
		redirect(base_url('martrick'));
	
	}
	
	public function dashboard()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			
			$data['title']=" Dashboard";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/users/dashboard');
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function addCandidate()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			$countries = $this->db->get('apps_countries')->result();
			$data['title']=" Add Candidate";
			$data['countries'] = $countries;
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/users/addCandidate');
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function candidateInfo()
	{
		$result=array();
		$errors['Error']=array();
		$flag   =1;
		$this->load->helper('image_upload');
		$candidate_master = 'candidate_master';
		if($_POST)
			{
				
				$session_id = $this->session->userdata('sessionName');
				$creater_id = $session_id->user_id;
				//$this->form_validation->set_rules('title','Title','trim|required');
				$this->form_validation->set_rules('first_name','First Name','trim|required');
				$this->form_validation->set_rules('last_name','Last Name','trim|required');
				//$this->form_validation->set_rules('middle_name','Middle Name','trim|required');
				$this->form_validation->set_rules('date_of_birth','Date of  birth','trim|required');
				//$this->form_validation->set_rules('nationality','Nationality','trim|required');
				//$this->form_validation->set_rules('born_in','Born in','trim|required');
				//$this->form_validation->set_rules('mother_tongue','Mother Tongue','trim|required');
				//$this->form_validation->set_rules('language1','Langugage 1 ','trim|required');
				//$this->form_validation->set_rules('language2','Langugage 2 ','trim|required');
				//$this->form_validation->set_rules('actual_position','Actual Position','trim|required');
				//$this->form_validation->set_rules('company','Company','trim|required');
				//$this->form_validation->set_rules('street','Street','trim|required');
				//$this->form_validation->set_rules('city','City','trim|required');
				//$this->form_validation->set_rules('zip_code','Zip','trim|required');
				//$this->form_validation->set_rules('country','Country','trim|required');
				//$this->form_validation->set_rules('additional_address','Additional Address','trim|required');
				//$this->form_validation->set_rules('phone_number','Phone Number Home','trim|required');
				//$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required');
				//$this->form_validation->set_rules('fax_number','Fax Number','trim|required|integer');
				//$this->form_validation->set_rules('email_address','Email Address','trim|required');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|is_unique[candidate_master.email_address]');
				//$this->form_validation->set_rules('wedding_status','Wedding Status ','trim|required');
				//$this->form_validation->set_rules('children','Children','trim|required');
				//$this->form_validation->set_rules('hobbies','Hobbies','trim|required');
				//$this->form_validation->set_rules('driving_licence','Driving Licence','trim|required');
				if($this->form_validation->run()==FALSE)
				{
					$flag=0;
					$errors['Error'] = array(
					'title' => form_error('title'),
					'first_name' => form_error('first_name'),
					'last_name' => form_error('last_name'),
					'middle_name' => form_error('middle_name'),
					'date_of_birth' => form_error('date_of_birth'),
					'nationality' => form_error('nationality'),
					'born_in' => form_error('born_in'),
					'mother_tongue' => form_error('mother_tongue'),
					'language1' => form_error('language1'),
					'language2' => form_error('language2'),
					'actual_position' => form_error('actual_position'),
					'company' => form_error('company'),
					'street' => form_error('street'),
					'city' => form_error('city'),
					'zip_code' => form_error('zip_code'),
					'country' => form_error('country'),
					'additional_address' => form_error('additional_address'),
					'phone_number' => form_error('phone_number'),
					'mobile_number' => form_error('mobile_number'),
					'fax_number' => form_error('fax_number'),
					'email_address' => form_error('email_address'),
					'wedding_status' => form_error('wedding_status'),
					'children' => form_error('children'),
					'hobbies' => form_error('hobbies'),
					'driving_licence' => form_error('driving_licence'),
				);
				
				$result=array('Error'=>$errors['Error'],'flag'=>$flag);
				echo json_encode($result);
				return false;
				}else{
					$length = 8;
					$internal_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
					$title = $this->input->post('title');
					$first_name = $this->input->post('first_name');
					$last_name = $this->input->post('last_name');
					$middle_name = $this->input->post('middle_name');
					$date_of_birth = $this->input->post('date_of_birth');
					$age = $this->input->post('age');
					$nationality = $this->input->post('nationality');
					$born_in = $this->input->post('born_in');
					$mother_tongue = $this->input->post('mother_tongue');
					$language1 = $this->input->post('language1');
					$language2 = $this->input->post('language2');
					$actual_position = $this->input->post('actual_position');
					$company = $this->input->post('company');
					$street = $this->input->post('street');
					$city = $this->input->post('city');
					$zip_code = $this->input->post('zip_code');
					$country = $this->input->post('country');
					$additional_address = $this->input->post('additional_address');
					$phone_number = $this->input->post('phone_number');
					$mobile_number = $this->input->post('mobile_number');
					$fax_number = $this->input->post('fax_number');
					$email_address = $this->input->post('email_address');
					$wedding_status = $this->input->post('wedding_status');
					$children = $this->input->post('children');
					$hobbies = $this->input->post('hobbies');
					$driving_licence = $this->input->post('driving_licence');
					$insertArray = array(
													'title'=>$title,
													'internal_id'=>$internal_id,
													'first_name'=>$first_name,
													'last_name'=>$last_name,
													'middle_name'=>$middle_name,
													'date_of_birth'=>date('Y-m-d', strtotime(str_replace('-', '/', $date_of_birth))),
													'age'=>$age,
													'nationality'=>$nationality,
													'born_in'=>$born_in,
													'mother_tongue'=>$mother_tongue,
													'language1'=>$language1,
													'language2'=>$language2,
													'actual_position'=>$actual_position,
													'company'=>$company,
													'street'=>$street,
													'city'=>$city,
													'zip_code'=>$zip_code,
													'country'=>$country,
													'additional_address'=>$additional_address,
													'phone_number'=>$phone_number,
													'mobile_number'=>$mobile_number,
													'fax_number'=>$fax_number,
													'email_address'=>$email_address,
													'wedding_status'=>$wedding_status,
													'children'=>$children,
													'hobbies'=>$hobbies,
													'driving_licence'=>$driving_licence,
													'created_on'      => $date = date('Y-m-d H:i:s')
													);
													//print_r($insertArray); die;
													$this->db->insert($candidate_master,$insertArray);
													$lastId = $this->db->insert_id();
													// creation of candidate folder 
													$getData = $this->db->select('*')->from($candidate_master)->where(array('candidate_id'=>$lastId))->get()->row();
													//echo '<pre>';print_r($getData);die;
													//$candidateid = $getData->user_id;
													//$username = $getData->username;
													$folder= $lastId.'_'.$getData->last_name.'_'.$getData->first_name; 
													$path = getcwd()."/files/uploads/".$folder;
													$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
													if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
													if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
													$_FILES['candidate_file']['name'];
													$filename = $_FILES['candidate_file']['name'];
													$ext = pathinfo($filename, PATHINFO_EXTENSION);
													$images_name = '';
													if (in_array($ext, array('png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'))) 
													{
														$images_name = md5(time()).'.'.$ext;
														move_uploaded_file($_FILES['candidate_file']['tmp_name'], $path.'/'.$images_name);
														$this->load->library('image_lib');
														$config['image_library'] = 'gd2';
														$config['source_image'] = getcwd() . '/files/uploads/'.$folder.'/'.$images_name;
														$config['new_image'] = getcwd() . '/files/uploads/'.$folder.'/thumbs/'.$images_name;
														$config['create_thumb'] = FALSE;
														$config['maintain_ratio'] = TRUE;
														$config['width'] = 210;
														$config['height'] = 221;
														$config['quality'] = '100%';
														$this->image_lib->initialize($config);
														$this->image_lib->resize();
														$this->image_lib->clear();
														$updateImage = array(
																					'candidate_image'=>$images_name,
																					'created_by'=>$creater_id,
																					);
														$this->db->where(array('candidate_id'=>$lastId));	
														$this->db->update($candidate_master,$updateImage);
													}

													// Inserting data into the candidate Worked history Table
													$worked_history_table   = 'company_candidate_master';
													$company_name  =  $_POST['company_name'];
													$position                =  $_POST['position'];
													$city 					  = $_POST['worked_city'];
													$from_date            = $_POST['from_date'];
													$to_date                 = $_POST['to_date'];
													$country                = $_POST['worked_country'];
													$street                   = $_POST['worked_street'];
													$count_company  = count($company_name);
													$insertData            = array();
													for($i=0;$i<$count_company;$i++) {
															$insertData[] = array('company_name' => $company_name[$i],
																							   'position'               =>$position[$i],
																							   'city' 					    =>$city[$i],
																							   'from_date'			=>$from_date[$i],
																							   'to_date'				=>$to_date[$i],
																							   'country'				=>$country[$i],
																							   'street'					=>$street[$i],
																							   'created_on'      	=> $date = date('Y-m-d H:i:s'),
																							   'candidate_id'       => $lastId
																				);
													}
													$this->base_model->insert_multiple_row($worked_history_table,$insertData);
													//   end  inserting data into table
													
													// Inserting data into the candidate Education Table
													$education_table   = 'candidate_education_master';
													$passing_year               =  $_POST['passing_year'];
													$qualification                  =  $_POST['qualification'];
													$institute 					   =  $_POST['institute'];
													$achievments                =  $_POST['achievments'];
													$education_doc_file       =  $_FILES['education_doc_file'];
													
													$docArray = array();
													
													for($i=0; $i< count($education_doc_file['name']); $i++) {
														$docArray[] =image_upload($path,$education_doc_file['name'][$i], $education_doc_file['tmp_name'][$i]);
													}
													
													
													$insertEducation            = array();
													for($i=0; $i< count($passing_year); $i++) {
															$insertEducation[] = array('passing_year'        =>  $passing_year[$i],
																										'qualification'           => $qualification[$i],
																										'institute' 			        => $institute[$i],
																										'achievments'		    => $achievments[$i],
																										'education_doc_file'=> $docArray[$i],
																										'created_on'      	    => $date = date('Y-m-d H:i:s'),
																										'candidate_id'          => $lastId
																										);
													}
													
													$this->base_model->insert_multiple_row($education_table,$insertEducation);
													// End Inserting data into the candidate Education Table
													
													/*--------------------------------------Start Candidate Availialibity Insertion-------------------------------------------------------------*/ 
													
													$availibilityArray = array(
																				'available_from'           =>   $this->input->post('available_from'),
																				'available_to'                =>   $this->input->post('available_to'),
																				'current_availability'     =>   $this->input->post('current_availability'),
																				'created_on'      	        =>   $date = date('Y-m-d H:i:s'),
																				'candidate_id'              =>   $lastId
																				);
																				
													$this->db->insert('candidate_availability_master',$availibilityArray);
													/*--------------------------------------End Candidate Availialibity Insertion-------------------------------------------------------------*/
													/*--------------------------------------End Candidate Availialibity Insertion-------------------------------------------------------------*/	
													$this->session->set_userdata('candidate_id', $lastId);
													//$candidateId = $lastId->candidate_id;
													$msg = 'Submitted Succesfully';
													$data = array('status'=>'success','message'=>$msg);
				}
			}
			echo json_encode($data);
				
	}
	public function candidateAge($str)
	{
		$from = new DateTime($str);
		$to   = new DateTime('today');
		$age = $from->diff($to)->y;
		# procedural
		//echo date_diff(date_create($age), date_create('today'))->y;
	}
	public function editProfile($userId=null)
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
		
			$userId = '';
			if(isset($_GET['zxcvbnm']) != ""){
				$userId = base64_decode($_GET['zxcvbnm']);
				$data['profile'] = $this->db->select('*')->from('users_master')->where(array('user_id'=>$userId))->get()->row();
				//echo '<pre>';
				//print_r($data);die;
			}
			if($_POST)
			{
				$this->form_validation->set_rules('username','User Name','trim|required|callback_checkAlphaNumericSpaceUnderscore|is_unique[users_master.username]');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|is_unique[users_master.email_address]');
				//$this->form_validation->set_rules('contact_number','user name','trim|required');
				$this->form_validation->set_rules('password','Password','trim|required|matches[confirmpassword]');
				$this->form_validation->set_rules('confirmpassword','Confirm password','trim|required');
				echo 'validation pass';die;
				
			}
			$data['title']=" Edit Profile";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/admin/editProfile',$data);
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function candidateList()
	{
		$data['title']="Candidate List";
		$this->load->view('martrick/includes/_header',$data);
		$this->load->view('martrick/users/candidateList');
		$this->load->view('martrick/includes/_footer');
	}
	
	public function recruiterList()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
		
			$data['recruiters'] = $this->db->select('*')->from('users_master')->where(array('user_type'=>'2'))->get()->result();
			$data['title']="Recruiter List";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/users/recruiterList',$data);
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function activation($id=null)
	{
		$data=array();
		if(isset($_GET['id_old']) != ""){
		$id =base64_decode($_GET['id_old']);
		}
		if($id=='' || $id== null)
		{
			redirect(base_url('martrick/recruiterList'));
		}
		else
		{
			$where = array('user_id'=>$id);
			$userInfo = $this->db->get_where('users_master',$where)->row();
			// $user_email=$userInfo->email_id;
			 if($userInfo->status == '0'){
				 $updateStatus = array('status'=>'1');
				// $updateStatus = array('status'=>'1','email_status'=>'1');
				 $flag_message = 'User Account has been Activated successfully.';
				// $message="Your account has been activated successfully. Please". '<a href="'.base_url('martrick/index').'">'." click here </a>"."to login.";
				// $to=$user_email;
				// $subject="Account Activated";
				// $this->base_model->sendMail($to,$subject,$message);
			}
			if($userInfo->status == '1'){
				$updateStatus = array('status'=>'0');
				$flag_message = 'User has been deactivated successfully.';
				// $message="Your account has been deactivated.For any Query, please contact to your administrator.";
				// $to=$user_email;
				// $subject="Account Deactivate";
				// $this->base_model->sendMail($to,$subject,$message);
			}
		
			$this->db->update('users_master',$updateStatus,$where);
			$this->session->set_flashdata("success_message",$flag_message);	
			redirect(base_url('martrick/recruiterList'));
		}
	}
	
	
	
	public function addRecruiter()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			
			$table='users_master';
			$data = array();
			$recruiterId = '';
			if(isset($_GET['zxcvbnm']) != ""){
				$recruiterId = base64_decode($_GET['zxcvbnm']);
				$data['recruiter'] = $this->db->select('*')->from('users_master')->where(array('user_id'=>$recruiterId))->get()->row();
				$password = $data['recruiter']->password;
				$images_name = $data['recruiter']->portrait;
				$username1 = $data['recruiter']->username;
			}
			if($_POST)
			{
				if($recruiterId == '')
				{
					$this->form_validation->set_rules('username','Username','trim|required|callback_checkAlphaNumericSpaceUnderscore|is_unique[users_master.username]');
					$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|is_unique[users_master.email_address]');
					$this->form_validation->set_rules('contact_number','Contact  No.','trim|required');
					$this->form_validation->set_rules('password','Password','trim|required|matches[confirmpassword]');
					$this->form_validation->set_rules('confirmpassword','Confirm password','trim|required');
				}
				elseif($recruiterId !='')
				{
					$this->form_validation->set_rules('username','user name','trim|required|callback_checkAlphaNumericSpaceUnderscore|callback_checkUsername['.$recruiterId.']');
					$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|callback_checkEmail['.$recruiterId.']');
					$this->form_validation->set_rules('contact_number','user name','trim|required');
					if($this->input->post('password')!='')
					{
						$this->form_validation->set_rules('password','user name','trim|required|matches[confirmpassword]');
						$this->form_validation->set_rules('confirmpassword','user name','trim|required');
					}
					
				}
			
				if($this->form_validation->run()==TRUE)
				{
					$username = $this->input->post('username');
					$email = $this->input->post('email_address');
					$contact = $this->input->post('contact_number');
					//$password = $this->input->post('password');
					$userType='2';
					$creater_by='1';
					$created_on = date('Y-m-d H:i:s');
					
					if($this->input->post('password')!='')
					{
						$password = md5($this->input->post('password'));
					}else if($this->input->post('password')=='')
					{	
						$password;
					}
					
					if($recruiterId=='')
					{
						$insertArray =array(
												'username'=>$username,
												'email_address'=>$email,
												'contact_number'=>$contact,
												'password'=>$password,
												'user_type'=>$userType,
												'creater_by'=>$creater_by,
												'created_on'=>$created_on,
												);
						$this->db->insert($table,$insertArray);
						$lastId = $this->db->insert_id();
						$getData = $this->db->select('*')->from('users_master')->where(array('user_id'=>$lastId))->get()->row();
						$id = $getData->user_id;
						$username = $getData->username;
						$folder= $username; 
						$path = getcwd()."/files/uploads/".$folder;
						$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
						if(!is_dir($path)) { $mask=umask(0); mkdir($path, 0777); umask($mask); }
						if(!is_dir($path1)) { $mask=umask(0); mkdir($path1, 0777); umask($mask); }
						$_FILES['user_file']['name'];
						$filename = $_FILES['user_file']['name'];
						$ext = pathinfo($filename, PATHINFO_EXTENSION);
						$images_name = '';
						if (in_array($ext, array('png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF'))) {
							$images_name = md5(time()).'.'.$ext;
							move_uploaded_file($_FILES['user_file']['tmp_name'], $path.'/'.$images_name);
							$this->load->library('image_lib');
							$config['image_library'] = 'gd2';
							$config['source_image'] = getcwd() . '/files/uploads/'.$username.'/'.$images_name;
							$config['new_image'] = getcwd() . '/files/uploads/'.$username.'/thumbs/'.$images_name;
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 192;
							$config['height'] = 191;
							$config['quality'] = '100%';
							$this->image_lib->initialize($config);
							$this->image_lib->resize();
							$this->image_lib->clear();
							$updateImage = array(
															'portrait'=>$images_name,
															);						
								$this->db->where(array('user_id'=>$id));	
								$this->db->update($table,$updateImage);
						}
						$this->session->set_flashdata('success_message','Recruiter has been added successfully.');
						redirect(base_url('martrick/recruiterList'));
						
					}elseif($recruiterId !='')
					{
						
							$folder= $username1; 
							$path = getcwd()."/files/uploads/".$folder;
							$path1 = getcwd()."/files/uploads/".$folder."/thumbs";
							$_FILES['user_file']['name'];
							$filename = $_FILES['user_file']['name'];
							if($filename!='') {
							$ext = pathinfo($filename, PATHINFO_EXTENSION);
							$images_name = '';
							if (in_array($ext, array('png', 'jpeg', 'jpg', 'PNG', 'JPEG', 'JPG', 'gif', 'GIF')))
							{
								$images_name = md5(time()).'.'.$ext;
								move_uploaded_file($_FILES['user_file']['tmp_name'], $path.'/'. $images_name);
								$this->load->library('image_lib');
								$config['image_library'] = 'gd2';
								$config['source_image'] = getcwd() . '/files/uploads/'.$username1.'/'.$images_name;
								$config['new_image'] = getcwd() . '/files/uploads/'.$username1.'/thumbs/'.$images_name;
								$config['create_thumb'] = FALSE;
								$config['maintain_ratio'] = TRUE;
								$config['width'] = 192;
								$config['height'] = 191;
								$config['quality'] = '100%';
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								$this->image_lib->clear();
								
							}}
							$updateArray =array(
												'username'=>$username,
												'email_address'=>$email,
												'contact_number'=>$contact,
												'password'=>$password,
												'portrait'=>$images_name,
												);
								
								$this->db->where('user_id',$recruiterId);
								$this->db->update($table,$updateArray);
								$this->session->set_flashdata('success_message','Recruiter has been updated successfully.');
								redirect(base_url('martrick/recruiterList'));
					}
			}
		}
		$data['title']="Add New Recruiter";
		$this->load->view('martrick/includes/_header',$data);
		$this->load->view('martrick/users/addRecruiter',$data);
		$this->load->view('martrick/includes/_footer');
		}
	}
	
	function checkAlphaNumericSpaceUnderscore($str)
	{
		if(preg_match('/^[a-z0-9_ ]+$/i',$str))
		{
			return true;
		}
		else{
			$this->form_validation->set_message('checkAlphaNumericSpaceUnderscore', '{field} field may contain only alpha-numeric characters, spaces and underscores.');
			return false;
		}
	}
	
	function checkEmail($str,$userId=null)
	{
		$where = array('email_address'=>$str);
		if($userId !='')
		{
			$data = $this->db->select("*")->from("users_master")->where($where)->where("user_id !=",$userId)->get();
			if($data->num_rows()>0)
			{
				$this->form_validation->set_message('checkEmail', '{field} field must contain a unique value.');
				return false;
			}else{
				return true;
			}
		}else{
				$data = $this->db->select("*")->from("users_master")->where($where)->get();
				if($data->num_rows()>0)
				{
					$this->form_validation->set_message('checkEmail', '{field} field must contain a unique value.');
					return false;
				}
				else{
					return true;
				}
		}
	}
	
	function checkUsername($str,$userId=null)
	{
		$where = array('username'=>$str);
		if($userId !='')
		{
			$data = $this->db->select("*")->from("users_master")->where($where)->where("user_id !=",$userId)->get();
			if($data->num_rows()>0)
			{
				$this->form_validation->set_message('checkUsername', '{field} field must contain a unique value.');
				return false;
			}else{
				return true;
			}
		}else{
				$data = $this->db->select("*")->from("users_master")->where($where)->get();
				if($data->num_rows()>0)
				{
					$this->form_validation->set_message('checkUsername', '{field} field must contain a unique value.');
					return false;
				}
				else{
					return true;
				}
		}
	}
	
	public function deleteRecruiter()
	{
		$data=array();
		if(isset($_GET['zxcvbnm']) != "")
		{
			$userId =base64_decode($_GET['zxcvbnm']);
			$user =   base64_decode($_GET['user']);
			$path = getcwd()."/files/uploads/".$user;
			$delete_record=$this->db->delete('users_master', array('user_id'=>$userId));
			if(is_dir($path)) {
					
				$this->removeDirectory($path);
			}
			$this->session->set_flashdata('success_message','Recruiter has been deleted successfully.');	
			redirect(base_url('martrick/recruiterList'));
		}
	}
	
	public function removeDirectory($path) 
	{
		$files = glob($path . '/*');
		foreach ($files as $file) {
			is_dir($file) ? $this->removeDirectory($file) : unlink($file);
		}
		rmdir($path);
		return;
	}
		
	
	
}



