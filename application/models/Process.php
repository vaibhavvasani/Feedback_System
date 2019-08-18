<?php
class Process extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getTheoryStaff($sem, $div)
    {
        $sql = "Select * from load_mat where sem='$sem' AND divi='$div' AND Theory=1";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function getPracticalStaff($sem, $div)
    {
        $sql = "Select * from load_mat where sem='$sem' AND divi='$div' AND prac=1";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function getcourse()
    {
        $query = $this->db->query('select Cname from list_of_course;');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function getques($tbl)
    {
        $sql = "select * from $tbl";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function getclist($fname)
    {
        $sql = "Select DISTINCT sem from load_mat where Fid='$fname'";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function getsublist($fname, $sem, $div)
    {
        $sql = "Select DISTINCT course from load_mat where Fid='$fname' AND sem='$sem' AND divi='$div'";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function checkthpr($fname, $sem, $div, $course)
    {
        $sql = "Select * from load_mat where Fid='$fname' AND sem='$sem' AND divi='$div' AND course='$course'";
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $row) {
                if ($row->Theory == 1) {
                    echo "<option value=\"1\">Theory</option>";
                }

                if ($row->Prac == 1) {
                    echo "<option value=\"2\">Practical</option>";
                }

            }
        }
    }
    public function gendatath($fname, $sem, $div, $course)
    {
        $sql = "select *,count(ans_opt) as benchmark from admin_disp where fid='$fname' AND sem='$sem' AND admin_disp.div='$div' group by ans_opt,Question_id";
        $res = $this->db->query($sql);
        $const['A'] = 4;
        $const['B'] = 3;
        $const['C'] = 2;
        $const['D'] = 1;
        $data = array();
        $count = array();
        foreach ($res->result() as $row) {
            $data[$row->Question_id] += $row->benchmark * $const[$row->ans_opt];
            $count[$row->Question_id] += $row->benchmark;
        }
        foreach ($data as $key => $value) {
            $data[$key] = ($data[$key] * 100) / ($count[$key] * 4);
        }
        return $data;
    }
    public function gendatapr($fname, $sem, $div, $course)
    {
        $sql = "select *,count(ans_opt) as benchmark from admin_disp_pr where fid='$fname' AND sem='$sem' AND admin_disp_pr.div='$div' group by ans_opt,Question_id";
        $res = $this->db->query($sql);
        $const['A'] = 4;
        $const['B'] = 3;
        $const['C'] = 2;
        $const['D'] = 1;
        $data = array();
        $count = array();

        // var_dump($res->result());
        $result = $res->result();
        // var_dump($result);

        for ($i = 0; $i < sizeof($result); $i++)
        {
            $generatedData = get_object_vars($result[$i]);
            $data[$generatedData['Question_id']] += $generatedData['benchmark'] * $const[$generatedData['ans_opt']];
            $count[$generatedData['Question_id']] += $generatedData['benchmark'];
        }
        // foreach ( $res->result()as $row) {
        //     $data[$row->Question_id] += $row->benchmark * $const[$row->ans_opt];
        //     $count[$row->Question_id] += $row->benchmark;
        // }
        foreach ($data as $key => $value) {
            $data[$key] = ($data[$key] * 100) / ($count[$key] * 4);
        }

        // var_dump($data);
        return $data;
    }
    public function caltotalth($fname, $sem, $div, $course)
    {
        $data = $this->gendatath($fname, $sem, $div, $course);
        $i = 0;
        $sum = 0;
        foreach ($data as $key => $value) {
            $i++;
            $sum = $sum + $value;
        }
        if ($i == 0) {
            return 0;
        } else {
            return ($sum / $i);
        }

    }
    public function caltotalpr($fname, $sem, $div, $course)
    {
        $data = $this->gendatapr($fname, $sem, $div, $course);
        $i = 0;
        $sum = 0;
        foreach ($data as $key => $value) {
            $i++;
            $sum = $sum + $value;
        }
        if ($i == 0) {
            return 0;
        } else {
            return ($sum / $i);
        }

    }
    public function getdivlist($fname, $sem)
    {
        $sql = "Select DISTINCT divi from load_mat where Fid='$fname' AND sem='$sem'";
        $res = $this->db->query($sql);
        return $res->result();
    }
    public function getfaculty()
    {
        $query = $this->db->query('SELECT * FROM  `list_faculty`');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function getfacultyid($fname)
    {
        $query = $this->db->query('SELECT Fid FROM list_faculty where NameOfFaculty="' . $fname . '";');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function updateLoadMat1($post, $fid)
    {

        $no = $post['numrow'];

        for ($i = 1; $i <= $no; $i++) {
            $fname = $post['F_name'];

            $tmp = "sem" . $i;
            $sem = $post[$tmp];

            $tmp = "divi" . $i;
            $divi = $post[$tmp];

            $tmp = "course" . $i;
            $course = $post[$tmp];

            $tmp = "chkbx_theory" . $i;
            if (isset($post[$tmp])) {
                $th = 1;
            } elseif (!isset($post[$tmp])) {
                $th = 0;
            }

            $tmp = "chkbx_pracs" . $i;
            if (isset($post[$tmp])) {
                $pr = 1;
                
                $tmp="chkbx_ba1";
				if(isset($_POST[$tmp]))
				{
					$a1=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$a1=0;
				}

				$tmp="chkbx_ba2";
				if(isset($_POST[$tmp]))
				{
					$a2=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$a2=0;
				}

				$tmp="chkbx_ba3";
				if(isset($_POST[$tmp]))
				{
					$a3=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$a3=0;
				}

				$tmp="chkbx_ba4";
				if(isset($_POST[$tmp]))
				{
					$a4=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$a4=0;
				}
	
				$tmp="chkbx_bb1";
				if(isset($_POST[$tmp]))
				{
					$b1=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$b1=0;
				}
	
				$tmp="chkbx_bb2";
				if(isset($_POST[$tmp]))
				{
					$b2=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$b2=0;
				}
	
				$tmp="chkbx_bb3";
				if(isset($_POST[$tmp]))
				{
					$b3=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$b3=0;
				}

				$tmp="chkbx_bb4";
				if(isset($_POST[$tmp]))
				{
					$b4=1;
				}
				elseif (!isset($_POST[$tmp])) {
					$b4=0;
				}

            } elseif (!isset($post[$tmp])) {
                $pr = 0;
            }

            if ($th == 0 && $pr == 0) {
                $message = "Either theory or practical are compulsory!";
                echo "<script type='text/javascript'>alert('$message');
				window.location.href='application/views/loadmatrix_input.php';</script>";
            } elseif ($pr == 1 && $a1==0 && $a2==0 && $a3==0 && $a4==0 && $b1==0 && $b2==0 && $b3==0 && $b4==0) {
                $message = "Atleast one batch must be selected";
                echo "<script type='text/javascript'>alert('$message');
				window.location.href='application/views/loadmatrix_input.php';</script>";
            } else {
                if ($pr == 1) {

                    $data = array('Fid' => $fid, 'F_name' => $fname, 'sem' => $sem, 'Divi' => $divi, 'course' => $course, 'Theory' => $th, 'Prac' => $pr, 'A1' => $a1,'A2' => $a2,'A3' => $a3,'A4' => $a4, 'B1' => $b1, 'B2' => $b2, 'B3' => $b3,'B4' => $b4);
                    $sql = $this->db->insert('load_mat', $data);
                    $errnum = $i + 1;
                    if (!$sql) {
                        die("Couldn't Insert row number:" . $errnum);
                    }
                    $message = "Table Updated!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                } else {
                    $data = array('Fid' => $fid, 'F_name' => $fname, 'sem' => $sem, 'Divi' => $divi, 'course' => $course, 'Theory' => $th, 'Prac' => $pr);
                    $sql = $this->db->insert('load_mat', $data);
                    $errnum = $i + 1;
                    if (!$sql) {
                        die("Couldn't Insert row number:" . $errnum);
                    }
                    $message = "Table Updated!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
            }

        }

    }

    public function fetch_question_th()
    {
        $query = $this->db->query("SELECT * FROM questions_th order by Qid");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function fetch_question_pr()
    {
        $query = $this->db->query("SELECT * FROM questions_pr order by Qid");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function fetch_loadmat()
    {
        $query = $this->db->query("SELECT * FROM load_mat where Sem=" . $_SESSION['sem'] . " AND Divi=" . $_SESSION['divi']);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function insert_loadmat($post)
    {
        $val = $this->db->query('select Sid from counter_th where Sid="' . $post['sid'] . '"');
        if ($val->num_rows() == 0) {
            $data = array('Sid' => $post['sid'], 'count1' => 1);
            $this->db->insert('counter_th', $data);
        }
        for ($i = 1; $i <= $post['count']; $i++) {
            $a = 'fid' . $i;
            $fid = $post[$a];
            $radio = 'r' . $i;
            $data = array('Sid' => $post['sid'], 'Fid' => $fid, 'Question_id' => $post['Qid'], 'Ans_opt' => $post[$radio], 'User_typ' => 'IT');
            $this->db->insert('feedback_th', $data);
        }
        $sql = "UPDATE `counter_th` SET count1='" . $post['Qid'] . "' WHERE sid='" . $post['sid'] . "'";
        $this->db->query($sql);
    }

    public function insert_loadmat_pr($post)
    {
        $val = $this->db->query('select Sid from counter_pr where Sid="' . $post['sid'] . '"');
        if ($val->num_rows() == 0) {
            $data = array('Sid' => $post['sid'], 'count1' => 1);
            $this->db->insert('counter_pr', $data);
        }
        for ($i = 1; $i <= $post['count']; $i++) {
            $a = 'fid' . $i;
            $fid = $post[$a];
            $radio = 'r' . $i;
            $data = array('Sid' => $post['sid'], 'Fid' => $fid, 'Question_id' => $post['Qid'], 'Ans_opt' => $post[$radio], 'User_typ' => 'IT');
            $this->db->insert('feedback_pr', $data);
        }
        $sql = "UPDATE `counter_pr` SET count1='" . $post['Qid'] . "' WHERE sid='" . $post['sid'] . "'";
        $this->db->query($sql);
    }

    public function check_q($sid)
    {
        $query = $this->db->query("SELECT count1 FROM counter_th where Sid='" . $sid . "';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function check_q_pr($sid)
    {
        $query = $this->db->query("SELECT count1 FROM counter_pr where Sid='" . $sid . "';");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function chk_login($post)
    {
        $logintype = $post['per'];
        if ($logintype == "student") {
            $userid = "Sid";
            $pwd = "password";
            $tbl_name = "list_of_student"; // Table name
        } else if ($logintype == "faculty") {
            $userid = "Fid";
            $pwd = "Fpwd";
            $tbl_name = "list_faculty"; // Table name
        } else if ($logintype == "admin") {
            $userid = "UserId";
            $pwd = "Apwd";
            $tbl_name = "admin"; // Table name
        }
        // Define $myusername and $mypassword
        $myusername = $post['username'];
        $mypassword = $post['password'];

        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        // $mypassword = stripslashes($mypassword);
        $mypassword = md5($mypassword);
        // var_dump($mypassword);

        $query = $this->db->query("SELECT * FROM $tbl_name WHERE " . $userid . "='$myusername' and " . $pwd . "='$mypassword'");
        
        // var_dump($query->result());
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function changePassword($post)
    {
        $logintype = $post['per'];
        if ($logintype == "student") {
            $userid = "Sid";
            $pwd = "password";
            $tbl_name = "list_of_student"; // Table name
        } else if ($logintype == "faculty") {
            $userid = "Fid";
            $pwd = "Fpwd";
            $tbl_name = "list_faculty"; // Table name
        } else if ($logintype == "admin") {
            $userid = "UserId";
            $pwd = "Apwd";
            $tbl_name = "admin"; // Table name
        }

        // Define $myusername and $mypassword
        $myusername = $post['username'];
        $mypassword = $post['password'];

        // To protect MySQL injection (more detail about MySQL injection)
        $myusername = stripslashes($myusername);
        // $mypassword = stripslashes($mypassword);
        $mypassword = md5($mypassword);
        // var_dump($mypassword);

        $query = $this->db->query("UPDATE $tbl_name SET " . $pwd . "='$mypassword' WHERE " . $userid . "='$myusername'");
        
        // var_dump($query->result());
        return $query;
    }

    public function getChartValues($fid, $opt, $qid)
    {
        $query = $this->db->query("select count(*) as res,Sid from feedback_th where Question_id=" . $qid . " and Ans_opt='" . $opt . "' and Fid='" . $fid . "'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getChartValuesPR($fid, $opt, $qid)
    {
        $query = $this->db->query("select count(*) as res,Sid from feedback_pr where Question_id=" . $qid . " and Ans_opt='" . $opt . "' and Fid='" . $fid . "'");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getFid()
    {
        $query = $this->db->query("Select DISTINCT Fid from feedback_th");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function genTable($data, $fid)
    {
        foreach ($data as $d) {
            //echo $d->Fid;

        }
        //$d = array('Fid' => $fid,'Question_id' => $post['Qid'],'Ans_opt' => $post[$radio] ,'User_typ' => 'IT');
        //$this->db->insert('feedback_pr', $data);
    }
    
}
