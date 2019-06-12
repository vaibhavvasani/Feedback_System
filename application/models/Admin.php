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
	}

?>