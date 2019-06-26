<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ctrl_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            redirect(www.google.com);
        }
    }




    
    public function getalldiv($sem)
    {
        $res = $this->db->query("Select Distinct divi from load_mat where sem='$sem'");
        $res = $res->result();
        foreach ($res as $key => $value) {
            echo "<option value=\"" . $value->divi . "\">" . $value->divi . "</option>";
        }
    }
    public function admin2()
    {
        $this->load->model('process');
        $data['facl_list'] = $this->process->getfaculty();
        $this->load->view('admin_panel2', $data);
    }
    public function table($sem = 0, $div = 0)
    {
        $this->load->model("process");
        $tmp = $this->db->query("Select Distinct Sem from load_mat");
        $data['sem'] = $tmp->result();
        $data['questions_th'] = $this->process->getques("questions_th");
        $data['questions_pr'] = $this->process->getques("questions_pr");
        $th_list = $this->process->getTheoryStaff($sem, $div);
        $pr_list = $this->process->getPracticalStaff($sem, $div);
        $data['staffListTh'] = $th_list;
        $data['staffListPr'] = $pr_list;
        $thdata = array();
        $prdata = array();
        foreach ($th_list as $row) {
            $thdata[$row->Fid] = $this->process->gendatath($row->Fid, $sem, $div, 0);
        }
        foreach ($pr_list as $row) {
            $prdata[$row->Fid] = $this->process->gendatapr($row->Fid, $sem, $div, 0);
        }
        $data['thdata'] = $thdata;
        $data['prdata'] = $prdata;
        //$this->output->enable_profiler(TRUE);
        $this->load->view("tabulardata", $data);
    }
    public function ctable($sem = 0, $div = 0)
    {
        $this->load->model("process");
        $tmp = $this->db->query("Select Distinct Sem from load_mat");
        $data['sem'] = $tmp->result();
        $th_list = $this->process->getTheoryStaff($sem, $div);
        $pr_list = $this->process->getPracticalStaff($sem, $div);
        $data['staffListTh'] = $th_list;
        $data['staffListPr'] = $pr_list;
        $thdata = array();
        $prdata = array();
        $courseth = $this->db->query("SELECT Distinct course from load_mat where Theory=1 AND Sem='$sem' AND divi='$div'")->result();
        $coursepr = $this->db->query("SELECT Distinct course from load_mat where Prac=1 AND Sem='$sem' AND divi='$div'")->result();
        $scorefacultyth = array();
        $scoreth = array();
        $scorepr = array();
        foreach ($courseth as $ind => $val) {
            foreach ($th_list as $key => $value) {
                $scorefacultyth[] = $this->process->caltotalth($value->Fid, $sem, $div, $val->course);
            }
            $scoreth[] = $scorefacultyth;
            $scorefacultyth = array();
        }
        $scorefacultypr = array();
        foreach ($coursepr as $key => $value) {
            foreach ($pr_list as $key => $value) {
                $scorefacultypr[] = $this->process->caltotalpr($value->Fid, $sem, $div, $val->course);
            }
            $scorepr[] = $scorefacultypr;
            $scorefacultypr = array();
        }
        $data['coursepr'] = $coursepr;
        $data['courseth'] = $courseth;
        $data['scoreth'] = $scoreth;
        $data['scorepr'] = $scorepr;
        $this->load->view("classtable", $data);
    }
    public function index()
    {
        $aid = $this->session->userdata('user_id');
        $this->load_page($aid);
    }
    public function add_user()
    {
    	$this->load->view('add_user', $data);
    }
    public function add_csv($aid)
    {
        $this->load->view('add_csv', $data);
    }
    public function add_ind($aid)
    {
        $this->load->view('add_ind', $data);
    }
    public function load_page($aid)
    {
        $this->load->model('process');
        $data['facl_list'] = $this->process->getfaculty();
        $this->load->view('admin_panel', $data);
    }
    public function getq()
    {
        $this->load->model('process');
        $data = $this->process->getques("questions_th");
        foreach ($data as $row) {
            echo '<p class="ques" style="font-size:12px">' . $row->Qid . ')' . $row->Ques . '</p>';
        }
    }
    public function getq_pr()
    {
        $this->load->model('process');
        $data = $this->process->getques("questions_pr");
        foreach ($data as $row) {
            echo '<p class="ques" style="font-size:12px">' . $row->Qid . ')' . $row->Ques . '</p>';
        }
    }
    public function generate()
    {
        $this->load->model('process');
        $data = $this->process->getFid();
        $fid = $_SESSION['user_id'];
        $this->process->genTable($data, $fid);
    }
    public function getc($fname)
    {
        $this->load->model('process');
        $raw = $this->process->getclist($fname);
        foreach ($raw as $data) {
            $sem = $data->sem;
            echo "<option value=\"$sem\">Sem $sem</option>";
        }
    }
    public function getsub($fname, $sem, $div)
    {
        $this->load->model('process');
        $raw = $this->process->getsublist($fname, $sem, $div);
        foreach ($raw as $data) {
            $course = $data->course;
            echo "<option value=\"$course\">$course</option>";
        }
    }
    public function gendatath($fname, $sem, $div, $course)
    {
        $this->load->model('process');
        echo json_encode($this->process->gendatath($fname, $sem, $div, $course));
    }
    public function gendatapr($fname, $sem, $div, $course)
    {
        $this->load->model('process');
        echo json_encode($this->process->gendatapr($fname, $sem, $div, $course));
    }
    public function checkthpr($fname, $sem, $div, $course)
    {
        $this->load->model('process');
        $this->process->checkthpr($fname, $sem, $div, $course);
    }
    public function getdiv($fname, $sem)
    {
        $this->load->model('process');
        $raw = $this->process->getdivlist($fname, $sem);
        foreach ($raw as $data) {
            $course = $data->divi;
            echo "<option value=\"$course\">$course</option>";
        }
    }
    public function thgetvals($fname, $class, $div)
    {

    }
    public function prgetvals($fname, $class, $div)
    {
        //Get Practical Values
    }

    public function export_feedback_pr()
    {
        $columns = array("Student ID", "Faculty ID", "Question ID", "Answer", "Department", "Time");
        $this->exportCSV('Practical_Feedback', 'feedback_pr', $columns);
    }

    public function export_feedback_th()
    {
        $columns = array("Student ID", "Faculty ID", "Question ID", "Answer", "Department", "Time");
        $this->exportCSV('Theory_Feedback', 'feedback_th', $columns);
    }

    public function export_counter_pr()
    {
        $columns = array("Student ID", "Questions Attempted");
        $this->exportCSV('Counter_Practical_Feedback', 'counter_pr', $columns);
    }

    public function export_counter_th()
    {
        $columns = array("Student ID", "Questions Attempted");
        $this->exportCSV('Counter_Theory_Feedback', 'counter_th', $columns);
    }

    public function export_reviews()
    {
        $columns = array("Student ID", "Faculty ID", "Review");
        $this->exportCSV('Reviews', 'rtable', $columns);
    }

    public function exportCSV($file, $table, $header)
    {
        $this->load->model('Admin');

        $filename = $file . '_' . date('Ymd') . '.csv';

        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        switch ($table) {
            case 'feedback_pr':
                $data = $this->Admin->getData('feedback_pr');
                break;
            case 'feedback_th':
                $data = $this->Admin->getData('feedback_th');
                break;
            case 'counter_pr':
                $data = $this->Admin->getData('counter_pr');
                break;
            case 'counter_th':
                $data = $this->Admin->getData('counter_th');
                break;
            case 'rtable':
                $data = $this->Admin->getData('rtable');
                break;
        }

        $file = fopen('php://output', 'w');

        fputcsv($file, $header);

        foreach ($data as $key => $value) {
            fputcsv($file, $value);
        }

        fclose($file);
        exit;
    }

    public function addFaculty() {

    } 

    public function addStudent()
    {
    	
    }
}
