<?php
  // check authentication
  session_start();
  if($_SESSION['email']==true){
    include('../connection/db.php');
    $dmail= $_SESSION['email'];
    $query2 =  mysqli_query($conn,"select * from doctor_register where doc_mail='$dmail'");
    $row2 = mysqli_fetch_array($query2);
    $dr = $row2['doc_name'];
    $did = $row2['doc_id'];
  }else{
    header('location:doctor_login.php');
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include('..\widgets\all_links.php'); ?>
<link href="../stylesheet/styleme.css" rel="stylesheet" type="text/css" media="screen, projection"/>

<!-- data table -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<style>

 .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate  {
     color:white;
   }
    td.display, th.display	{ padding:5%;}
   

  input[type=text], input[type=date] ,select{
		width:100%;
		border: 2px solid dodgerBlue;
		border-radius: 8px;
		margin: 8px 0px;
		padding:8px;
		box-sizing:border-box;
		outline:none;
		
	}
	
	input[type=text]:focus,input[type=date]:focus{
		border-color: #0066cc;
		box-shadow:0 0 8px 0 #0066cc;
	}
	
	.download{
		border-radius:5px;
		margin:5px;
		margin-top:5px;
		padding:5px;
		font-size:13px;
		background-color:green;
		text-decoration:none;
		
	}
	
	.bigb {
	background-color:#4c86eb;
	border-radius:28px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:10px 36px;
	text-decoration:none;
	text-shadow:0px 1px 0px #7791d4;
	margin-top:20px;
}
.bigb:hover {
	background-color:#579df2;
}
.bigb:active {
	position:relative;
	top:1px;
}
  
</style>
</head>
<body>
<!-- navbar for patient part -->
<?php include('doc_navbar.php');?>
<!-- vertical navbar for patient part -->
<?php include('doc_vertical_nav.php');?>



<form method="post" action="doc_pat_report.php" name="doc_pat_report.php" enctype="multipart/form-data"> 
<div class="main">
        <div style="display: flex;justify-content: space-between;">
        <h2 style="color:#a6d9fc" >Add Report</h2>
        </div>
		<table>
			<tr>
				<td>Date :</td>
				<td> <input type="date" name="report_date"  value=""/></td>
			</tr>
			<tr>
				<td>Patient ID :</td>
				<td> <input type="text" name="pat_id" placeholder="Patient ID" value=""/></td>
			</tr>
			
			
			<tr>
				<td>Report Type :</td>
				<td> <select name="report_type" id="report_type">
						  <option value="Blood Report">Blood Report</option>
						  <option value="X-Ray">X-Ray</option>
						  <option value="Medicine Prescription">Medicine Prescription</option>
						  <option value="Urine Report">Urine Report</option>
						  <option value="Sonography">Sonography</option>
						  <option value="Electrocardiagram">Electrocardiagram</option>
						  <option value="Angiography">Angiography</option>
						  <option value="Urine Report">Urine Report</option>
						  <option value="Thoracentesis">Thoracentesis</option>
						  <option value="Thyroid function test">Thyroid function test</option>
						  <option value="Lumbar puncture">Lumbar puncture</option>
						  <option value="Protein-bound iodine test">Protein-bound iodine test</option>
						  <option value="Angiocardiography">Angiocardiography</option>
						  <option value="Echoencephalography">Echoencephalography</option>
						  <option value="Magnetoencephalography">Magnetoencephalography</option>
						  <option value="Mammography">Mammography</option>
						  <option value="Magnetic resonance spectroscopy">Magnetic resonance spectroscopy</option>
						  <option value="Pulmonary function test">Pulmonary function test</option>
						  <option value="Autopsy">Autopsy</option>
						  <option value="Kidney function test">Kidney function test</option>
						  <option value="Pregnancy test">Pregnancy test</option>
						  <option value="Toxicology test">Toxicology test</option>
						  <option value="Laparoscopy">Laparoscopy</option>

						 
                     </select>
				</td>
			</tr>
			<tr>
				<td>Report Description:</td>
				<td> <input type="text" name="report_descript" placeholder="Description" value=""/></td>
			</tr>
			<tr>
				<td>Choose file or report :</td>
				<td> <input type="file" name="report_file" placeholder="" value="" style="padding:10px;"/></td>
			</tr>
		
		</table>
		<input class="bigb" id="submit" value="Submit" name="submit" type="submit" >
		<div style="">
		<h2 style="color:#a6d9fc" >Patient Reports</h2>
		 <table style="background-color:white;" id="table_id" class="display">
        <thead style="background-color:black">
            <tr>
			  <th>Sr No</th>
              <th>Patient ID</th>
              <th>Patient Name</th>
              <th>Report date</th>
			  <th>Report Type</th>
              <th>Description</th>
              <th>Report </th>
              
            </tr>
        </thead>
        <tbody style="background-color:White;">
        <?php  
			$no='0';
            $query_pat = mysqli_query($conn,"select pat_id from doc_pat where doc_id=$did;");
			
			while($row = mysqli_fetch_array($query_pat)) {
          ?>  
          <tr>
              <?php 
			 
              $query1=mysqli_query($conn,"select * from doc_pat_report where pat_id='$row[pat_id]' ORDER BY report_date DESC");
              
              while ($row1 = mysqli_fetch_array($query1)) {
				  
			  $query_name=mysqli_query($conn,"select pat_name from pat_register where pat_id=$;");
              ?>
			  <td><span style="color:black"><?php echo ++$no;?></span></td>
              <td><span style="color:black"><?php echo $row1['pat_id']?></span></td>
              <td><span style="color:black"><?php $query_name=mysqli_query($conn,"select pat_name from pat_register where pat_id='$row1[pat_id]';"); $row2=mysqli_fetch_array($query_name) ;echo $row2['pat_name']?></span></td>
              <td><span style="color:black"><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></span></td>
			   <td><span style="color:black"><?php echo $row1['report_type'] ?></span></td>
              <td><span style="color:black"><?php echo $row1['report_descript'] ?></span></td>
              <td><span class="download" ><a href="<?php $sql = mysqli_query($conn,"SELECT * FROM doc_pat_report WHERE sr_no='$row1[sr_no]'");$file = mysqli_fetch_assoc($sql);$filepath = '../upload/' . $file['name']; echo $filepath; ?>"  style="color:white;" >View	<i class="fa fa-eye" style="color:black;align:center"></i></a></span></td>
             
              </tr>
			  <?php } } ?>
        </tbody>
        </table>  
		</div>
</div>
</form>
</body>
</html>

<?php
	include('../connection/db.php');
	if(isset($_POST['submit']))
	{
	  $pat_id = $_POST['pat_id'];
	  $report_date = $_POST['report_date'];
	    $report_type = $_POST['report_type'];
	  $report_descript = $_POST['report_descript'];
	  
	  $filename=$_FILES['report_file']['name'];
	  $count =mysqli_query($conn,"select sr_no from doc_pat_report");
	  $cn=mysqli_num_rows($count);
	  $fn=++$cn.$filename;
	  $destination='../upload/'.$fn;
	  $extension = pathinfo($fn ,PATHINFO_EXTENSION);
      $file=$_FILES['report_file']['tmp_name'];
	  $size =$_FILES['report_file']['size'];
	  
	 
		if (move_uploaded_file($file,$destination))	
		{ 	
			
			
			$query1= mysqli_query($conn, "insert into doc_pat_report(pat_id,doc_id,report_date,report_type,report_descript,name) values('$pat_id','$did','$report_date','$report_type','$report_descript','$fn')");
			
			if ($query1)
			{	
			
					
				echo "<script>alert('Report is submitted successfully');
					  window.location.href='doc_pat_report.php';
					  </script>";	
			}
			else
			{
				echo "<script>alert('Something went wrong , Please try again'); </script>";	
			}
		}
		else
		{
			echo "<script>alert('Something went wrong , Please try again'); </script>";	
		}
		
	  }


?>


