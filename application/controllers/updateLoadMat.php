<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class updateLoadMat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->updateLoadMat();
    }

    public function updateLoadMat1()
    {
        $this->load->helper('form');
        $post = $this->input->post();
        $this->load->model('process');
        $data = $this->process->getfacultyid($post['F_name']);
        $this->process->updateLoadMat1($post, $data['0']->Fid);
    }
}