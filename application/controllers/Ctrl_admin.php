<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ctrl_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            redirect(base_url());
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
    public function add_admin()
    {
    	if(isset($_POST['Fid']))
    	{
    		$Fid=$_POST['Fid'];
    		$UserId=$_POST['UserId'];
    		$AName=$_POST['AName'];
    		$APwd=$_POST['APwd'];
    		$_POST = array(); //to remove data from POST
    		$this->db->select('Fid');
			$this->db->from('admin');
			$this->db->where('Fid', $Fid);
			$this->db->limit(1);
			$Fidquery = $this->db->get();
			$this->db->select('UserId');
			$this->db->from('admin');
			$this->db->where('UserId', $UserId);
			$this->db->limit(1);
			$Uidquery = $this->db->get();
		
    		if($Fidquery->num_rows() == 1)
    		{
    			$resp = 'Sorry ! Fid already exist';
    			$succ=0;
    		}
    		else if($Uidquery->num_rows() == 1)
    		{	
    			$resp = 'Sorry ! User Id already exist';
    			$succ=0;
    		}
    		else
    		{
    			$aquery="INSERT INTO admin (Fid, UserId, AName, APwd) VALUES ('$Fid','$UserId','$AName', '$APwd')";
    			$this->db->query($aquery);
    			$resp = 'Admin added';
    			$succ=1;
    		}
    		$_POST['resp']=$resp;
    		$_POST['success']=$succ;
    	}
    	elseif(isset($_POST['uploadcsv']))
    	{
    		$count=0;
    		$_POST['duplicate']=0;
        	$fil=$_FILES['csvadmin']['tmp_name'];
        	$type = explode(".",$_FILES['csvadmin']['name']);
        	if(strtolower(end($type)) == 'csv')
        	{
        		$fp = fopen($fil,'r');
        		$_POST['resp']='Record added';
            	$_POST['success']='21';
        		while($csv_line = fgetcsv($fp,1024))
        		{
        			if(count($csv_line)==4)
        			{
            			$count++;
            			if($count == 1)
            			{
                			continue;
            			}//keep this if condition if you want to remove the first row
            			for($i = 0, $j = count($csv_line); $i < $j; $i++)
            			{
                			$insert_csv = array();
                			$insert_csv['Fid'] = $csv_line[0];//remove if you want to have primary key,
                			$insert_csv['UserId'] = $csv_line[1];
                			$insert_csv['AName'] = $csv_line[2];
                			$insert_csv['APwd'] = $csv_line[3];
            			}
            			$i++;
            			$data = array(
                			'Fid' => $insert_csv['Fid'] ,
                			'UserId' => $insert_csv['UserId'],
                			'AName' => $insert_csv['AName'],
                			'Apwd' => $insert_csv['APwd']
               			);
               			$this->db->select('Fid');
						$this->db->from('admin');
						$this->db->where('Fid', $insert_csv['Fid']);
						$this->db->limit(1);
						$Fidquery = $this->db->get();
						$this->db->select('UserId');
						$this->db->from('admin');
						$this->db->where('UserId', $insert_csv['UserId']);
						$this->db->limit(1);
						$Uidquery = $this->db->get();
						
						if($Fidquery->num_rows() == 1 or $Uidquery->num_rows() == 1)
						{
							$_POST['duplicate']++;
						}
						else
						{
            				$data['crane_features']=$this->db->insert('admin', $data);
            			}
            		}
            		else
            		{
            			$_POST['resp']='number of column is not 4';
            			$_POST['success']='20';
            		}
        		}
        		fclose($fp);
        	}
        	else
        	{
        		$_POST['resp']='file is not in csv extension';
            	$_POST['success']='20';
        	}
    	}
    	$this->load->view('add_admin', $data);
    }
    public function add_faculty()
    {
    	if(isset($_POST['Fid']))
    	{
    		$Fid=$_POST['Fid'];
    		$abbre=$_POST['abbre'];
    		$FName=$_POST['FName'];
    		$FPwd=$_POST['FPwd'];
    		$_POST = array(); //to remove data from POST
    		$this->db->select('Fid');
			$this->db->from('list_faculty');
			$this->db->where('Fid', $Fid);
			$this->db->limit(1);
			$Fidquery = $this->db->get();
    		if($Fidquery->num_rows() == 1)
    		{
    			$resp = 'Sorry ! Fid already exist';
    			$succ=0;
    		}
    		else
    		{
    			$aquery="INSERT INTO list_faculty (Fid, NameOfFaculty, abbre, Fpwd) VALUES ('$Fid','$FName','$abbre', '$FPwd')";
    			$this->db->query($aquery);
    			$resp = 'Faculty added';
    			$succ=1;
    		}
    		$_POST['resp']=$resp;
    		$_POST['success']=$succ;
    	}
    	elseif(isset($_POST['uploadcsv']))
    	{
    		$count=0;
    		$_POST['duplicate']=0;
        	$fil=$_FILES['csvfac']['tmp_name'];
        	$type = explode(".",$_FILES['csvfac']['name']);
        	if(strtolower(end($type)) == 'csv')
        	{
        		$fp = fopen($fil,'r');
        		$_POST['resp']='Record added';
            	$_POST['success']='21';
        		while($csv_line = fgetcsv($fp,1024))
        		{
        			if(count($csv_line)==4)
        			{
            			$count++;
            			if($count == 1)
            			{
                			continue;
            			}//keep this if condition if you want to remove the first row
            			for($i = 0, $j = count($csv_line); $i < $j; $i++)
            			{
                			$insert_csv = array();
                			$insert_csv['Fid'] = $csv_line[0];//remove if you want to have primary key,
                			$insert_csv['FName'] = $csv_line[1];
                			$insert_csv['abbre'] = $csv_line[2];
                			$insert_csv['FPwd'] = $csv_line[3];
            			}
            			$i++;
            			$data = array(
                			'Fid' => $insert_csv['Fid'] ,
                			'NameOfFaculty' => $insert_csv['FName'],
                			'Abbre' => $insert_csv['abbre'],
                			'Fpwd' => $insert_csv['FPwd']
               			);
               			$this->db->select('Fid');
						$this->db->from('list_faculty');
						$this->db->where('Fid', $insert_csv['Fid']);
						$this->db->limit(1);
						$Fidquery = $this->db->get();
						if($Fidquery->num_rows() == 1)
						{
							$_POST['duplicate']++;
						}
						else
						{
            				$data['crane_features']=$this->db->insert('list_faculty', $data);
            			}
            		}
            		else
            		{
            			$_POST['resp']='number of column is not 4';
            			$_POST['success']='20';
            		}
        		}
        		fclose($fp);
        	}
        	else
        	{
        		$_POST['resp']='file is not in csv extension';
            	$_POST['success']='20';
        	}
    	}
        $this->load->view('add_faculty', $data);
    }
    public function add_students()
    {
    	if(isset($_POST['reg_no']))
    	{
    		$reg_no=$_POST['reg_no'];
    		$Sid=$_POST['Sid'];
    		$FName=$_POST['FName'];
    		$LName=$_POST['LName'];
    		$MName=$_POST['MName'];
    		$Branch=$_POST['Branch'];
    		$Year=$_POST['Year'];
    		$Sem=$_POST['Sem'];
    		$div=$_POST['div'];
    		$batch=$_POST['batch'];
    		$password=$_POST['password'];
    		
    		$_POST = array(); //to remove data from POST
    		$this->db->select('reg_no');
			$this->db->from('list_of_student');
			$this->db->where('reg_no', $reg_no);
			$this->db->limit(1);
			$reg_noquery = $this->db->get();
			$this->db->select('Sid');
			$this->db->from('list_of_student');
			$this->db->where('Sid', $Sid);
			$this->db->limit(1);
			$Sidquery = $this->db->get();
		
    		if($reg_noquery->num_rows() == 1)
    		{
    			$resp = 'Sorry ! Reg Number already exist';
    			$succ=0;
    		}
    		else if($Sidquery->num_rows() == 1)
    		{	
    			$resp = 'Sorry ! Sid already exist';
    			$succ=0;
    		}
    		else
    		{
    			$aquery="INSERT INTO list_of_student VALUES ($reg_no, '$Sid', '$FName', '$LName', '$MName', '$Branch',$Year,$Sem,$div, '$batch', '$password')";
    			$this->db->query($aquery);
    			$resp = 'Student added';
    			$succ=1;
    		}
    		$_POST['resp']=$resp;
    		$_POST['success']=$succ;
    	}
    	$this->load->view('add_students', $data);
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
    function import()
 {
  $file_data = $this->csvimport->get_array($_FILES["file"]["tmp_name"]);
  foreach($file_data as $row)
  {
   $data[] = array(
    'Fid' => $row["Fid"],
          'UserId'  => $row["UserId"],
          'AName'   => $row["AName"],
          'APwd'   => $row["APwd"]
   );
  }
  $this->csv_import_model->insert($data);
 }
}
