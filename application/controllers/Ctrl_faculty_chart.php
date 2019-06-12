<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctrl_faculty_chart extends CI_Controller {

    function __construct() {
			parent::__construct();
            if(!isset($_SESSION['user_id'])){
                redirect(base_url());
            }
		}
    
    public function index()
	{
        $fid=$this->session->userdata('user_id');
        $this->load_page($fid);
	}
    
    public function load_page($fid)
    {        
        $this->load->model('process');
        $result['Question'] = $this->process->fetch_question();
        for($i=1;$i<=count($result['Question']);$i++)
        {
            $A = "A".$i;
            $B = "B".$i;
            $C = "C".$i;
            $D = "D".$i;
            $result[$A] = $this->process->getChartValues($fid,'A',$i);
            $result[$B] = $this->process->getChartValues($fid,'B',$i);
            $result[$C] = $this->process->getChartValues($fid,'C',$i);
            $result[$D] = $this->process->getChartValues($fid,'D',$i);
        }
       
        
        $this->load->view('charts', $result);
       
    }
}