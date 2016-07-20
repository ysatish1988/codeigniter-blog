<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruiter extends CI_Controller {

	  public function __construct()
        {
			parent::__construct();
        }

	public function index()
	{
		if($this->session->userdata('sessionName') =='')
		{
			redirect(base_url('martrick/logout'));
		}else{
			
			$data['title']="Recruiter Dashboard";
			$this->load->view('martrick/includes/_headerRecruiter',$data);
			$this->load->view('martrick/users/dashboardRecruiter');
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
							redirect(base_url('recruiter/changePassword'));
						}
					}else{
							$this->session->set_flashdata('error_message','Old password does not match to the current password.');
							redirect(base_url('recruiter/changePassword'));
					}
					
				}
			}
			$data['title']="Change Password";
			$this->load->view('martrick/includes/_headerRecruiter',$data);
			$this->load->view('martrick/users/changePasswordRecruiter');
			$this->load->view('martrick/includes/_footer');
		}
	
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
				$data['profile'] = $this->db->select('*')->from('admin_master')->where(array('user_id'=>$userId))->get()->row();
			}
			if($_POST)
			{
				$this->form_validation->set_rules('username','User Name','trim|required');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email|matches[email]');
				$this->form_validation->set_rules('email_address','Email address','trim|required|valid_email');
				
			}
			$data['title']=" Edit Profile";
			$this->load->view('martrick/includes/_headerRecruiter',$data);
			$this->load->view('martrick/users/editProfileRecruiter',$data);
			$this->load->view('martrick/includes/_footer');
		}
	}
	
	public function candidateList()
	{
		$data['title']="Candidate List";
		$this->load->view('martrick/includes/_headerRecruiter',$data);
		$this->load->view('martrick/users/candidateList');
		$this->load->view('martrick/includes/_footer');
	}	
	
	public function dashboard()
	{
		$data['title']="Candidate List";
		$this->load->view('martrick/includes/_headerRecruiter',$data);
		$this->load->view('martrick/users/dashboard');
		$this->load->view('martrick/includes/_footer');
	}	
}



