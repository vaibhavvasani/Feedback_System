<?php
class add_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function addadmin()
    {
        $data = array(
        		'Fid'=>$_POST['Fid'],
        		'UserId'=>$_POST['UserId'],
        		'AName'=>$_POST['AName'],
        		'APwd'=>$_POST['APwd']
    		);
    		$this->db->select('Fid');
			$this->db->from('admin');
			$this->db->where('Fid', $_POST['Fid']);
			$this->db->limit(1);
			$Fidquery = $this->db->get();
			$this->db->select('UserId');
			$this->db->from('admin');
			$this->db->where('UserId', $_POST['UserId']);
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
    			$this->db->insert('admin',$data);
    			$resp = 'Admin added';
    			$succ=1;
    		}
    		$_POST['resp']=$resp;
    		$_POST['success']=$succ;
    }
    function addadmincsv()
    {
    	$count=0;
    	$_POST['count']=0;
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
						
					if(!($Fidquery->num_rows() == 1 or $Uidquery->num_rows() == 1))
					{
						$data['crane_features']=$this->db->insert('admin', $data);
						$_POST['count']++;
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
    function addfaculty()
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
    function addfacultycsv()
    {
    	$count=0;
		$_POST['count']=0;
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
					if($Fidquery->num_rows() == 0)
					{
						$data['crane_features']=$this->db->insert('list_faculty', $data);
						$_POST['count']++;
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
    function addstudent()
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
    function addstudentcsv()
    {
    	$count=0;
		$_POST['count']=0;
		$fil=$_FILES['csvstu']['tmp_name'];
		$type = explode(".",$_FILES['csvstu']['name']);
		if(strtolower(end($type)) == 'csv')
		{
			$fp = fopen($fil,'r');
			$_POST['resp']='Record added';
			$_POST['success']='21';
			while($csv_line = fgetcsv($fp,1024))
			{
				if(count($csv_line)==11)
				{
					$count++;
					if($count == 1)
					{
						continue;
					}//keep this if condition if you want to remove the first row
					for($i = 0, $j = count($csv_line); $i < $j; $i++)
					{
						$insert_csv = array();
						$insert_csv['reg_no'] = $csv_line[0];//remove if you want to have primary key,
						$insert_csv['Sid'] = $csv_line[1];
						$insert_csv['Fname'] = $csv_line[2];
						$insert_csv['Lname'] = $csv_line[3];
						$insert_csv['Mname'] = $csv_line[4];//remove if you want to have primary key,
						$insert_csv['Branch'] = $csv_line[5];
						$insert_csv['Year'] = $csv_line[6];
						$insert_csv['Sem'] = $csv_line[7];
						$insert_csv['div'] = $csv_line[8];//remove if you want to have primary key,
						$insert_csv['batch'] = $csv_line[9];
						$insert_csv['password'] = $csv_line[10];
					}
					$i++;
					$data = array(
						'reg_no' => $insert_csv['reg_no'] ,
						'Sid' => $insert_csv['Sid'],
						'Fname' => $insert_csv['Fname'],
						'Lname' => $insert_csv['Lname'],
						'Mname' => $insert_csv['Mname'] ,
						'Branch' => $insert_csv['Branch'],
						'Year' => $insert_csv['Year'],
						'Sem' => $insert_csv['Sem'],
						'div' => $insert_csv['div'] ,
						'batch' => $insert_csv['batch'],
						'password' => $insert_csv['password']
					);
					$this->db->select('reg_no');
					$this->db->from('list_of_student');
					$this->db->where('reg_no', $insert_csv['reg_no']);
					$this->db->limit(1);
					$regquery = $this->db->get();
					if($regquery->num_rows() == 0)
					{
						$data['crane_features']=$this->db->insert('list_of_student', $data);
						$_POST['count']++;
					}
				}
				else
				{
					$_POST['resp']='number of column is not 11';
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
    function addtt()
    {
    	if (!($this->db->table_exists('timetable')))
    	{
    		$maketable="CREATE TABLE `timetable` (
			  `Fid` varchar(4) NOT NULL,
			  `FName` varchar(30) NOT NULL,
			  `Semester` int(1) NOT NULL,
			  `Division` varchar(1) NOT NULL,
			  `Department` varchar(5) NOT NULL,
			  `Theory` varchar(1) NOT NULL,
			  `Practicals` varchar(1) NOT NULL,
			  `A1` varchar(1) NOT NULL,
			  `A2` varchar(1) NOT NULL,
			  `A3` varchar(1) NOT NULL,
			  `A4` varchar(1) NOT NULL,
			  `B1` varchar(1) NOT NULL,
			  `B2` varchar(1) NOT NULL,
			  `B3` varchar(1) NOT NULL,
			  `B4` varchar(1) NOT NULL
			)";
			$this->db->query($maketable);
    	}
    	$Fid=$_POST['Fid'];
		$FName=$_POST['FName'];
		$Semester=$_POST['Semester'];
		$Division=$_POST['Division'] == 'A' ? 1 : 2;
		$Department=$_POST['Department'];
		$Theory=$_POST['Theory']  == 'Y' ? 1 : 0;
		$Practicals=$_POST['Practicals']  == 'Y' ? 1 : 0;
		$A1=$_POST['A1']  == 'Y' ? 1 : 0;
		$A2=$_POST['A2']  == 'Y' ? 1 : 0;
		$A3=$_POST['A3']  == 'Y' ? 1 : 0;
		$A4=$_POST['A4']  == 'Y' ? 1 : 0;
		$B1=$_POST['B1']  == 'Y' ? 1 : 0;
		$B2=$_POST['B2']  == 'Y' ? 1 : 0;
		$B3=$_POST['B3']  == 'Y' ? 1 : 0;
		$B4=$_POST['B4']  == 'Y' ? 1 : 0;
		$_POST = array(); //to remove data from POST
		$this->db->select('Fid');
		$this->db->from('load_mat_1');
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
			$aquery="INSERT INTO load_mat_1 VALUES ('$Fid','$FName',$Semester,'$Division','$Department','$Theory','$Practicals','$A1','$A2','$A3','$A4','$B1','$B2','$B3','$B4')";
			$this->db->query($aquery);
			$resp = 'timetable added';
			$succ=1;
		}
		$_POST['resp']=$resp;
		$_POST['success']=$succ;
    }
    function addttcsv()
    {
    	// if (!($this->db->table_exists('timetable')))
    	// {
    	// 	$maketable="CREATE TABLE `timetable` (
		// 	  `Fid` varchar(4) NOT NULL,
		// 	  `FName` varchar(30) NOT NULL,
		// 	  `Semester` int(1) NOT NULL,
		// 	  `Division` varchar(1) NOT NULL,
		// 	  `Department` varchar(5) NOT NULL,
		// 	  `Theory` varchar(1) NOT NULL,
		// 	  `Practicals` varchar(1) NOT NULL,
		// 	  `A1` varchar(1) NOT NULL,
		// 	  `A2` varchar(1) NOT NULL,
		// 	  `A3` varchar(1) NOT NULL,
		// 	  `A4` varchar(1) NOT NULL,
		// 	  `B1` varchar(1) NOT NULL,
		// 	  `B2` varchar(1) NOT NULL,
		// 	  `B3` varchar(1) NOT NULL,
		// 	  `B4` varchar(1) NOT NULL
		// 	)";
		// 	$this->db->query($maketable);
    	// }	
    	$count=0;
		$_POST['count']=0;
		$fil=$_FILES['csvtt']['tmp_name'];
		$type = explode(".",$_FILES['csvtt']['name']);
		if(strtolower(end($type)) == 'csv')
		{
			$fp = fopen($fil,'r');
			$_POST['resp']='Record added';
			$_POST['success']='21';
			while($csv_line = fgetcsv($fp,1024))
			{
				if(count($csv_line)==15)
				{
					$count++;
					if($count == 1)
					{
						continue;
					}//keep this if condition if you want to remove the first row
					for($i = 0, $j = count($csv_line); $i < $j; $i++)
					{
						$insert_csv = array();
						$insert_csv['Faculty ID'] = $csv_line[0];//remove if you want to have primary key,
						$insert_csv['Faculty Name'] = $csv_line[1];
						$insert_csv['Semester'] = $csv_line[2];
						$insert_csv['Division'] = $csv_line[3] == 'A' ? 1 : 2;
						$insert_csv['Department'] = $csv_line[4];//remove if you want to have primary key,
						$insert_csv['Theory'] = $csv_line[5] == 'Y' ? 1 : 0;
						$insert_csv['Practicals'] = $csv_line[6] == 'Y' ? 1 : 0;
						$insert_csv['A1'] = $csv_line[7] == 'Y' ? 1 : 0;
						$insert_csv['A2'] = $csv_line[8] == 'Y' ? 1 : 0;//remove if you want to have primary key,
						$insert_csv['A3'] = $csv_line[9] == 'Y' ? 1 : 0;
						$insert_csv['A4'] = $csv_line[10] == 'Y' ? 1 : 0;
						$insert_csv['B1'] = $csv_line[11] == 'Y' ? 1 : 0;
						$insert_csv['B2'] = $csv_line[12] == 'Y' ? 1 : 0;//remove if you want to have primary key,
						$insert_csv['B3'] = $csv_line[13] == 'Y' ? 1 : 0;
						$insert_csv['B4'] = $csv_line[14] == 'Y' ? 1 : 0;
					}
					$i++;
					$data = array(
						'Fid' => $insert_csv['Faculty ID'] ,
						'FName' => $insert_csv['Faculty Name'],
						'Semester' => $insert_csv['Semester'],
						'Division' => $insert_csv['Division'],
						'Department' => $insert_csv['Department'] ,
						'Theory' => $insert_csv['Theory'],
						'Practicals' => $insert_csv['Practicals'],
						'A1' => $insert_csv['A1'],
						'A2' => $insert_csv['A2'] ,
						'A3' => $insert_csv['A3'],
						'A4' => $insert_csv['A4'],
						'B1' => $insert_csv['B1'],
						'B2' => $insert_csv['B2'] ,
						'B3' => $insert_csv['B3'],
						'B4' => $insert_csv['B4']
					);
					$this->db->select('Fid');
					$this->db->from('admin');
					$this->db->where('Fid', $insert_csv['Fid']);
					$this->db->limit(1);
					$Fidquery = $this->db->get();
					
					if($Fidquery->num_rows() == 0)
					{
						$data['crane_features']=$this->db->insert('load_mat_1', $data);
						$_POST['count']++;
					}
				}
				else
				{
					$_POST['resp']='number of column is not 15';
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
}
