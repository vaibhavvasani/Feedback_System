<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class review extends CI_Controller{
  function __construct(){
    parent::__construct();
    if(!isset($_SESSION['user_id'])){
      redirect(base_url());
    }
  }
  public function index(){
    $this->load->model('rproc');
    if($this->rproc->checkfeedback() == 0){
      echo "Please fill Theory and Practical Feedback first!";
      return;
    }
    else if($this->rproc->checkip($this->session->user_id) != 0){
      echo "You already gave the review Thank you";
      return;
    }
    $data['rows'] = $this->rproc->getlist($this->session->user_id);
    $this->load->view('review',$data);
  }
  public function savereview(){
    try {
      $this->load->model('rproc');
      $rows = $this->rproc->getlist($this->session->user_id);
      foreach ($rows as $data) {
        $this->rproc->insertrw($data->fid,$this->session->user_id,$_POST[$data->fid]);
      }
    } catch (Exception $e) {
      echo "Error occured";
    }
  }
  /*public function index(){
    echo "This Page is under construction,Go Back";
  }*/
}
