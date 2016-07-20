<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Martrick extends CI_Controller {

	  public function __construct()
        {
			parent::__construct();
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
					$row=$this->user_model->get_login_data('admin_master',$username,$password);
					if(count($row)>0)
					{
						$mySession = array('admin_id'=>$row->admin_id,'username'=>$row->username,'password'=>$row->password,'email_address'=>$row->email_address);
						$this->session->set_userdata($mySession);
						$this->session->set_userdata('sessionName',$row);
						$userType=$this->session->userdata('sessionName');
						if($userType->user_type == 'admin' )
						{ 	
							$this->session->set_flashdata('success_message','Login Successfully.');
							redirect(base_url('martrick/dashboard'));
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
					$userData = $this->db->get_where('admin_master', array('email_address' => $emailAddress))->row();
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
			$table='admin_master';
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
			
			$table='admin_master';
			$sessionLogin = $this->session->userdata('sessionName');
			$adminId = $sessionLogin->admin_id;
			
			if($_POST)
			{
				$this->form_validation->set_rules('currentpassword','Current Password','trim|required');
				$this->form_validation->set_rules('newpassword','New Password','trim|required|matches[confirmpassword]');
				$this->form_validation->set_rules('confirmpassword','Confirm Password','trim|required');
				if($this->form_validation->run()==TRUE)
				{
					$getData = $this->db->select('*')->from('admin_master')->where(array('admin_id'=>$adminId))->get()->row();
					$oldPassword = $getData->password;
					$currentPassword = md5($this->input->post('currentpassword'));
					$newPassword = $this->input->post('newpassword');
					if($oldPassword == $currentPassword)
					{
						$updateArray = array('password'=>md5($newPassword));
						$this->db->where(array('admin_id'=>$adminId));
						$result = $this->db->update($table,$updateArray);
						if($result =TRUE)
						{
							$this->session->set_flashdata('success_message','Password changed has been successfully .');
							redirect(base_url('martrick/changePassword'));
						}
					}else{
							$this->session->set_flashdata('error_message','Old password does not match to the current password.');
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
		redirect(base_url('martrick/index'));
	
	}
	
	public function dashboard()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			
			//$table='admin_master';
			//$sessionLogin = $this->session->userdata('sessionName');
			//$adminId = $sessionLogin->admin_id;
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
			
				$data['title']=" Add Candidate";
				$this->load->view('martrick/includes/_header',$data);
				$this->load->view('martrick/users/addCandidate');
				$this->load->view('martrick/includes/_footer');
			
		}
		
	}
	
	public function editProfile($adminId=null)
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
		
			$adminId = '';
			if(isset($_GET['zxcvbnm']) != ""){
				$adminId = base64_decode($_GET['zxcvbnm']);
				$data['profile'] = $this->db->select('*')->from('admin_master')->where(array('admin_id'=>$adminId))->get()->row();
			}
			if($_POST)
			{
				$this->form_validation->set_rules('username','User Name','trim|required');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|matches[email]');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email');
				
			}
			$data['title']=" Edit Profile";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/users/editProfile',$data);
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
		
			$data['recruiters'] = $this->db->select('*')->from('recruiter_master')->get()->result();
			$data['title']="Recruiter List";
			$this->load->view('martrick/includes/_header',$data);
			$this->load->view('martrick/users/recruiterList',$data);
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function addRecruiter()
	{
		if($sessionLogin = $this->session->userdata('sessionName')=='')
		{
			redirect(base_url('martrick/Logout'));
		}else{
			
			$table='recruiter_master';
			$data = array();
			$recruiterId = '';
			if(isset($_GET['zxcvbnm']) != ""){
				$recruiterId = base64_decode($_GET['zxcvbnm']);
				$data['recruiter'] = $this->db->select('*')->from('recruiter_master')->where(array('recruiter_id'=>$recruiterId))->get()->row();
				$password = $data['recruiter']->password;
				$images_name = $data['recruiter']->portrait;
				$username1 = $data['recruiter']->username;
			}
			if($_POST)
			{
				if($recruiterId == '')
				{
					$this->form_validation->set_rules('username','user name','trim|required|callback_checkAlphaNumericSpaceUnderscore|is_unique[recruiter_master.username]');
					$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|is_unique[recruiter_master.email_address]');
					$this->form_validation->set_rules('contact_number','user name','trim|required');
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
					$userType='recruiter';
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
												'created_on'=>$created_on,
												);
						$this->db->insert($table,$insertArray);
						$lastId = $this->db->insert_id();
						$getData = $this->db->select('*')->from('recruiter_master')->where(array('recruiter_id'=>$lastId))->get()->row();
						$id = $getData->recruiter_id;
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
								$this->db->where(array('recruiter_id'=>$id));	
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
								
							}
							$updateArray =array(
												'username'=>$username,
												'email_address'=>$email,
												'contact_number'=>$contact,
												'password'=>$password,
												'portrait'=>$images_name,
												);
								
								$this->db->where('recruiter_id',$recruiterId);
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
	
	function checkEmail($str,$recruiterId=null)
	{
		$where = array('email_address'=>$str);
		if($recruiterId !='')
		{
			$data = $this->db->select("*")->from("recruiter_master")->where($where)->where("recruiter_id !=",$recruiterId)->get();
			if($data->num_rows()>0)
			{
				$this->form_validation->set_message('checkEmail', '{field} field must contain a unique value.');
				return false;
			}else{
				return true;
			}
		}else{
				$data = $this->db->select("*")->from("recruiter_master")->where($where)->get();
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
	
	function checkUsername($str,$recruiterId=null)
	{
		$where = array('username'=>$str);
		if($recruiterId !='')
		{
			$data = $this->db->select("*")->from("recruiter_master")->where($where)->where("recruiter_id !=",$recruiterId)->get();
			if($data->num_rows()>0)
			{
				$this->form_validation->set_message('checkUsername', '{field} field must contain a unique value.');
				return false;
			}else{
				return true;
			}
		}else{
				$data = $this->db->select("*")->from("recruiter_master")->where($where)->get();
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
			$recruiterId =base64_decode($_GET['zxcvbnm']);
			$delete_record=$this->db->delete('recruiter_master', array('recruiter_id'=>$recruiterId));
			$this->session->set_flashdata('success_message','Recruiter has been deleted successfully.');	
			redirect(base_url('martrick/recruiterList'));
		}
	}
	
}



