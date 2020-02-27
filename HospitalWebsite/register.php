<?Php
session_start();

	include("connect.php");
	$var="select max(pid) as max from patient";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $pid = $row['max'] + 1;
	?>
<html>
<title>Medical Clinic</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<body>
<form method="POST">

     <br><br>
	  <center>
	   <h2 class="w3-text-teal">Register</h2>
       <hr style="width:200px" class="w3-opacity">
	   </center>
       <table align='center' style="width:50%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
          <label align='left'><b>Patient ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $pid ?>" name="pid" readonly>
          <label align='left'><b>Patient Name</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Name" name="pname" pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required><br>
		   <label align='left'><b>Address</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Enter address" name="address" required></textarea><br>
		   <label align='left'><b>Mobile No.</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Mobile No." name="mob" pattern="[0-9]{10}" title="Please Enter Valid Contact No" required><br>
		   <label align='left'><b>Username</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter username" name="user" required><br>
		  <label align='left'><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="pass" required><br>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='sub' value="Register">
          
        </div>
    </div>
    </td>
	</tr>
	</table>

	<?php
	if(isset($_POST['sub']))
	{
		$pid=$_POST['pid'];
		$pname=$_POST['pname'];
		$address=$_POST['address'];
		$mob=$_POST['mob'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$sel="insert into Patient values('$pid','$pname','$address','$mob','$user','$pass')";
		if(mysqli_query($con,$sel))
	  {
		echo "<script>alert('Register successfully');</script>";
		echo "<script>location.replace('Homepage.php');</script>";

        }
	}

?>