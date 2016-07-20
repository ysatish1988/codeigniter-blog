<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{	
 
   function select_data($select= array())
   {
	   if(isset($select['table']) && !empty($select['table'])){
		   $field = (isset($select['field']) && !empty($select['field']))?$select['field']:'*';
		   $this->db->select($field);
		   if(isset($select['where']) && !empty($select['where'])){
			   $this->db->where($select['where']);
		   }
		   if(isset($select['field']) && !empty($select['field'])){
			   $this->db->limit($field);
		   }
		    if(isset($select['order_by']) && !empty($select['order_by'])){
		   $this->db->order_by($select['order_by'],$select['order']);
		   }
		   
		   $query =  $this->db->get($select['table']);
		   
		   if(isset($query) && !empty($query)){
				return $query->result();
			}else{			
				return false;
			}		   
		   
		}else{
			
				return false;
		}
	  
	   
	   }
	   
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
	    function update_data($update= array()){
		   if(isset($update['table']) && !empty($update['table']) && isset($update['data']) && !empty($update['data']) && isset($update['where']) && !empty($update['where'])){    
				$this->db->where($update['where']);
				$query =  $this->db->update($update['table'],$update['data']);			   
				if(isset($query) && $this->db->affected_rows() > 0){				
					return true;
				}else{			
				return false;
				}		   
			}else{
			
				return false;
		   }
	}
	   
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
	}
