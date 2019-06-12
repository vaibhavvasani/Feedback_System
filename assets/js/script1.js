/**
 * Projet Name : Dynamic Form Processing with PHP
 * URL: http://techstream.org/Web-Development/PHP/Dynamic-Form-Processing-with-PHP
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Tech Stream
 * http://techstream.org
 */



var no=1;
function addRow(tableID) {

	no=no+1;
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	
	document.getElementById('numrow').value=rowCount-1;

	var tr = document.createElement('tr');
	var td1 = document.createElement('td');
	var td2 = document.createElement('td');
	var td3 = document.createElement('td');
	var td4 = document.createElement('td');
	var td5 = document.createElement('td');
	var td6 = document.createElement('td');
	var td7 = document.createElement('td');
	var td8 = document.createElement('td');
	var td9 = document.createElement('td');

	var sem = document.createElement('select');
	
	sem.id="sem"+no;
	sem.name="sem"+no;
	
	var opt3 = document.createElement('option');
	opt3.id="opt3";
	opt3.value="3";
	txt = document.createTextNode('3');
	opt3.appendChild(txt);
	var opt4 = document.createElement('option');
	opt4.id="opt4";
	opt4.value="4";
	txt = document.createTextNode('4');
	opt4.appendChild(txt);
	var opt5 = document.createElement('option');
	opt5.id="opt5";
	opt5.value="5";
	txt = document.createTextNode('5');
	opt5.appendChild(txt);
	var opt6 = document.createElement('option');
	opt6.id="opt6";
	opt6.value="6";
	txt = document.createTextNode('6');
	opt6.appendChild(txt);
	var opt7 = document.createElement('option');
	opt7.id="opt7";
	opt7.value="7";
	txt = document.createTextNode('7');
	opt7.appendChild(txt);
	var opt8 = document.createElement('option');
	opt8.id="opt8";
	opt8.value="8";
	txt = document.createTextNode('8');
	opt8.appendChild(txt);
	sem.appendChild(opt3);
	sem.appendChild(opt4);
	sem.appendChild(opt5);
	sem.appendChild(opt6);
	sem.appendChild(opt7);
	sem.appendChild(opt8);



	var divi = document.createElement('select');
	divi.id="divi"+no;
	divi.name="divi"+no;
	var opt1 = document.createElement('option');
	opt1.id="opt1";
	opt1.value="5";
	txt = document.createTextNode('5');
	opt1.appendChild(txt);
	var opt2 = document.createElement('option');
	opt2.id="opt2";
	opt2.value="6";
	txt = document.createTextNode('6');
	opt2.appendChild(txt);
	divi.appendChild(opt1);
	divi.appendChild(opt2);


	var course = document.createElement('select');
	course.id="course"+no;
	course.name="course"+no;
	
	opt1 = document.createElement('option');
	opt1.id="opt1";
	opt1.value="AIT";
	txt = document.createTextNode('AIT');
	opt1.appendChild(txt);
	opt2 = document.createElement('option');
	opt2.id="opt2";
	opt2.value="SE";
	txt = document.createTextNode('SE');
	opt2.appendChild(txt);
	course.appendChild(opt1);
	course.appendChild(opt2);


	var th = document.createElement('input');
	th.id="chkbx_theory"+no;
	th.name="chkbx_theory"+no;
	th.type="checkbox";


	var pr = document.createElement('input');
	pr.id="chkbx_pracs"+no;
	pr.name="chkbx_pracs"+no;
	pr.type="checkbox";
	pr.onClick="pr_enable('dataTable')";


	var a = document.createElement('input');
	a.id="chkbx_ba"+no;
	a.name="chkbx_ba"+no;
	a.type="checkbox";
	//a.disabled="true";

	var b = document.createElement('input');
	b.id="chkbx_bb"+no;
	b.name="chkbx_bb"+no;
	b.type="checkbox";
	//b.disabled="true";

	var c = document.createElement('input');
	c.id="chkbx_bc"+no;
	c.name="chkbx_bc"+no;
	c.type="checkbox";
	//c.disabled="true";

	var d = document.createElement('input');
	d.id="chkbx_bd"+no;
	d.name="chkbx_bd"+no;
	d.type="checkbox";
	//d.disabled="true";

	
	td1.appendChild(sem);
	td2.appendChild(divi);
	td3.appendChild(course);
	td4.appendChild(th);
	td5.appendChild(pr);
	td6.appendChild(a);
	td7.appendChild(b);
	td8.appendChild(c);
	td9.appendChild(d);



	tr.appendChild(td1);
	tr.appendChild(td2);
	tr.appendChild(td3);
	tr.appendChild(td4);
	tr.appendChild(td5);
	tr.appendChild(td6);
	tr.appendChild(td7);
	tr.appendChild(td8);
	tr.appendChild(td9);

	table.appendChild(tr);
}

function deleteRow(tableID) {
	var i;
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	i=rowCount-1;
	if(rowCount > 3) { 						// limit the user from removing all the fields
				
	
			table.deleteRow(i);
			no--;
			var numrow=table.rows.length-2;
			document.getElementById('numrow').value=numrow;
			}
	else
	{
		alert("Cannot Remove all the Subjects");
	}
}

function changeCourse(id)
			{	
				
				
				var url= "Welcome/setcourse/"+id;
				window.location.href = url ;
			}

/*function pr_enable(tableID)
{
	var x=document.forms["myform"]["chk"];
	x.disabled="false";

	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[4].childNodes[1];
		if(null != chkbox && true == chkbox.checked) {
			alert("hi");
			row.cells[5].childNodes[0].disabled="false";
			row.cells[6].childNodes[1].disabled="false";
			row.cells[7].childNodes[1].disabled="false";
			row.cells[8].childNodes[1].disabled="false";
		}
	}


}*/