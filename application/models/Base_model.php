<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_model extends CI_Model {

	public function __construct() {
        parent::__construct();
		 $this->conn_id='';
    }
	function sendMail($to=null,$subject=null,$message=null)
	{			
		$config['mailtype'] = 'html';
		$config['protocol'] = 'mail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'utf-8';
		$config['smtp_port'] = 25;
		$config['smtp_user'] = 'test1@softlogique.com';
		$config['smtp_pass'] = 'soft12345';
		//$config['wordwrap'] = TRUE;
		$this->email->initialize($config);			
		$this->email->set_newline("\r\n");
		$this->email->from('test1@softlogique.com'); // change it to yours
		$this->email->to($to);// change it to yours test1@softlogique.com
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send())
		{
			return '1';
		}
		else
		{
			return '0';
		}
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
	
	public function table_exists($table) {
	if($this->db->table_exists($table))
	{
		return true;
	}else{
		
		return false;
	}
	}
	
	
	
	public function escape_str($str, $like = FALSE)
	 {
	  if(is_array($str))
	  {
	   foreach ($str as $key => $val)
		  {
		$str[$key] = $this->escape_str($val, $like);
		  }

		  return $str;
		 }

	  $str = is_object($this->conn_id) ? mysql_real_escape_string($str, $this->conn_id) : addslashes($str);

	  // escape LIKE condition wildcards
	  if ($like === TRUE)
	  {
	   return str_replace(array($this->_like_escape_chr, '%', '_'),
		  array($this->_like_escape_chr.$this->_like_escape_chr, $this->_like_escape_chr.'%', $this->_like_escape_chr.'_'),
		  $str);
	  }

	  return $str;
	 }
	
    public function insert_one_row($table, $data) {
        
		$this->db->insert($table, $data);
		$lastid = $this->db->insert_id();
		return $lastid; 
    }

    public function insert_multiple_row($table, $data) {   //insert multiple row in one time...
        return $this->db->insert_batch($table, $data);
    }

    public function get_max_record_withalias($table, $columname, $alias) {
        $this->db->select_max($columname, $alias);
        $query = $this->db->get($table);
        return $query->row();
    }

    public function get_record_by_id($table, $data) {  //  retrun only one row.
        $query = $this->db->get_where($table, $data);
        //if(!empty($column_name)&&!empty($ordery_by)){
        //$this->db->order_by($column_name,$ordery_by);
        //}
        return $query->row();
    }

    public function get_all_record_by_condition($table, $data,$order_by=null) {  //  retrun only one row.
	
	   $this->db->order_by($order_by,'desc');
        $query = $this->db->get_where($table, $data);
        //echo $this->db->last_query();
        return $query->result();
    }

   
    public function get_all_record_by_id($table, $where, $column_name = null, $ordery_by = null) {// retrun only one or many record
        if (!empty($column_name) && !empty($ordery_by)) {
            $this->db->order_by($column_name, $ordery_by);
        }
        $query = $this->db->get_where($table, $where);

        return $query->result();
    }

    public function get_all_record_by_id_row($table, $where, $column_name = null, $ordery_by = null) {// retrun only one or many record 
        $query = $this->db->get_where($table, $where);
        if (!empty($column_name) && !empty($ordery_by)) {
            $this->db->order_by($column_name, $ordery_by);
        }
        return $query->row();
    }

    public function get_last_insert_id() {
        return $this->db->insert_id();
    }

    public function update_record_by_id($table, $data, $where) {
        return $this->db->update($table, $data, $where);
    }

    public function update_record_by_id1($table, $data, $where) {
        $this->db->update($table, $data, $where);
        return $this->db->affected_rows();
    }

    public function countrow($table) {
        return $this->db->count_all($table);
    }
    
   
    public function count_row_by_ids($table, $param) {
        return $this->db->count_all($table, $param);
    }

	public function get_all_records($table,$order_by) {  //  retrun all rows.
         $this->db->order_by($order_by,'desc');
		$query = $this->db->get($table);
        return $query->result();
    }
	
	
    public function get_all_record_by_in($table, $colum, $wherein) {
        $this->db->where_in($colum, $wherein);
        $res = $this->db->get($table);
        return $res->result();
    }
	
	public function get_all_record_by_in_join($table1,$table2,$colum,$join_condition,$Select_field, $wherein,$Join_type){
		
		$this->db->select($Select_field); // Select field
		$this->db->from($table1); // from Table1
		$this->db->join($table2,$join_condition,$Join_type); // Join table1 with table2 based on the foreign key
		$this->db->where_in($colum,$wherein); // Set Filter
		$res = $this->db->get();
		return $res->result();
	}
	
	
    public function delete_record_by_id($table, $where) {
        $this->db->delete($table, $where);
		return $this->db->affected_rows();
    }
	 public function delete_record_one_($table, $colum, $wherein) {
        $this->db->where($colum, $wherein);
        $this->db->delete($table);
		return $this->db->affected_rows();
    }

   
    public function delete_record_by_in($table, $colum, $wherein) {
        $this->db->where_in($colum, $wherein);
        $this->db->delete($table);
		return $this->db->affected_rows();
    }
	
	
	function update_data($update= array())
	 {
		   if(isset($update['table']) && !empty($update['table']) && isset($update['data']) && !empty($update['data']) && isset($update['where']) && !empty($update['where'])){
	   		    
				$this->db->where('id',$update['where']);
				$query =  $this->db->update($update['table'],$update['data']);	
				if(isset($query) && !empty($query)){
					//echo $this->db->last_query();					
					return true;
				}else{			
				return false;
				}		   
     	   }else{
			
				return false;
		   }
	}
	 
	
	
	
	public function delete_record($table,$ids=null){ 
	  $this->db->select('*');
	  $this->db->where_in('id',$ids);
	 return $this->db->delete($table);
	}
	
	public function delete_employee_multiple($table,$ids=null){ 
	  $this->db->select('*');
	  $this->db->where_in('emp_id',$ids);
	 return $this->db->delete($table);
	}
   public function delete_record_one($table,$id=null){ 
	  $this->db->select('*');
	  $this->db->where('id',$id);
	 return $this->db->delete($table);
	}
	
	  public function matchrow_with_city($table,$id=null)
	 {
    	 
	  $this->db->select('*');
	  $this->db->where('state_id',$id);
	 $result =$this->db->get($table)->row();
	// echo "<pre>";  print_r($result); die;
	 if(count($result)>0){
		 return true;
		 
	 }else{
		 return false;
		 
	 }
	} 
	
	
 
  function find_max_min($table,$val)
	{ 	
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('min <=', $val);
		$this->db->where('max >=', $val);
		//$this->db->where('payment_type =','1');
		$query = $this->db->get();
		return $query->result();
		//$query = $this->db->get('users_master');  
		//echo $this->db->last_query();
        //return $query->result();   
      
	}
  // added by anil chauhan
  
  function insert_data($insert_data= array()){
		   if(isset($insert_data['table']) && !empty($insert_data['table']) && isset($insert_data['data']) && !empty($insert_data['data'])){
				$query =  $this->db->insert($insert_data['table'],$insert_data['data']);
		   		if(isset($query) && $this->db->affected_rows() > 0){
				return true;
			}else{			
				return false;
			}		   
		  }else{			
				return false;
		   }
	  }	  
	    //function update_data($update= array()){
		   //if(isset($update['table']) && !empty($update['table']) && isset($update['data']) && !empty($update['data']) && isset($update['where']) && !empty($update['where'])){    
				//$this->db->where($update['where']);
				//$query =  $this->db->update($update['table'],$update['data']);			   
				//if(isset($query) && $this->db->affected_rows() > 0){				
					//return true;
				//}else{			
				//return false;
				//}		   
			//}else{
			
				//return false;
		   //}
	//}
	   
	 function delete_data($delete= array()){
		 
		   if(isset($delete['table']) && !empty($delete['table']) && isset($delete['where']) && !empty($delete['where'])){
				$this->db->where($delete['where']);
				$query =  $this->db->delete($delete['table']);		   
				if(isset($query) && $this->db->affected_rows() > 0){				
					return true;
				}else{			
					return false;
				}		      
				}else{			
				return false;
		   }
	  }
  //end the code 
}
