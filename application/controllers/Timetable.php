<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timetable extends CI_Controller {

	public function index()
	{
		//$this->setcourse(3);
		$this->setfaculty();
		
	}
	
	public function setfaculty()
	{
		$this->load->model('process');
		$data['NameOfFaculty']=$this->process->getfaculty();
		$data['Cname']=$this->process->getcourse();
		$this->load->view('loadmatrix_input', $data);
	}

	public function updateLoadMat()
	{
		$this->load->helper('form');
		$post = $this->input->post();
		$this->load->model('process');
        $b=$post['F_name'];
       
        $data=$this->process->getfacultyid($b);
        $a=$data['0']->Fid;
        
		$data['message'] = $this->process->updateLoadMat1($post, $a);
		$data['NameOfFaculty']=$this->process->getfaculty();
		$data['Cname']=$this->process->getcourse();
		$this->load->view('loadmatrix_input', $data);
	}
}
