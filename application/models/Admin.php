<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Admin extends CI_Model
	{
		function __construct() {
			parent::__construct();
		}

		function getData($table)
		{
		    $response = array();
		    
		    
		    $this->db->select('*');
		    $query = $this->db->get($table);
		    $response = $query->result_array();
		 
		    return $response;
		}

		function insert($data)
		{
			$this->db->insert('load_mat_1', $data);
		}

		function getStudentsData($sem, $div)
		{
			$response = array();
			
			$arr = array('Sem' => $sem, 'div' => $div);
		    
		    $this->db->select('*');
			$this->db->where($arr); 
			$query = $this->db->get('list_of_student');
		    $response = $query->result_array();
		
		    return $response;
		}

		function getStudentsDataStrict($sem, $div)
		{
			$response = array();
			
			$arr = array('Sem' => $sem, 'div' => $div, 'attendance >=' => '75');
		    
		    $this->db->select('*');
			$this->db->where($arr); 
			$query = $this->db->get('list_of_student');
		    $response = $query->result_array();
		
		    return $response;
		}

		function getSems()
		{
		    $response = array();
			
		    $this->db->distinct();			
		    $this->db->select('Sem');
		    $query = $this->db->get('list_of_student');
		    $response = $query->result_array();
		 
		    return $response;
		}

		function getDivs()
		{
		    $response = array();
			
		    $this->db->distinct();						
		    $this->db->select('div');
		    $query = $this->db->get('list_of_student');
		    $response = $query->result_array();
		 
		    return $response;
		}
	}

?>