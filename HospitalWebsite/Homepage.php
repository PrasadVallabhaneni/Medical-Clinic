<?php
session_start();
include("connect.php");
?>
<html>
<title>Medical Clinic</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<body>
<form method="POST">
<!-- Side Navigation -->

<div class="w3-bar">
  <a href="index.html" class="hom">Home</a>
  <!--<a href="#" class="w3-bar-item w3-button w3-padding-16">Link 1</a>
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-padding-16">
      Dropdown <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
  </div>-->
</div>



<!-- Header -->
<header class="w3-container  w3-padding" id="myHeader">
 
  <div class="w3-center">
 <img src='images1/banner.jpg'>
    <div class="w3-padding-32">
      <a class="prediction" href="searchdi.php"style.display='block'" style="font-weight:900;">Smart Health Prediction</a>
    </div>
  </div>
</header>

<!-- Modal -->


<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
 
  <div class="w3-card-2 w3-container" style="min-height:460px">
  <br>
  
<a href='adminlogin.php' class="w3-button w3-orange w3-large">Admin Login</a><br>
 <br><br>
 <i class="fa fa-desktop w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  
  </div>

</div>

<div class="w3-third">

  <div class="w3-card-2 w3-container" style="min-height:460px">
 <br> <a href='doctorlogin.php' class="w3-button w3-orange w3-large">Doctor Login</a><br>
     <br>
  <i class="glyphicon glyphicon-plus w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  
  </div>
 
</div>

<div class="w3-third">

  <div class="w3-card-2 w3-container" style="min-height:460px">
<br><a href='patientlogin.php' class="w3-button w3-orange w3-large">Patient Login</a><br>
     <br>
  <i class="fa fa-user w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
 
  </div>
 
</div>
</div>
<br>
<hr>
<br>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="images1/login.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
      </div>

      <div class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="aname" >
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="apsw" >
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='alogin'>Login</button>
          
        </div>
    </div>

     

    </div>
  </div>
  
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="images1/login.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
      </div>

      <div class="w3-container" >
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="dname">
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="dpsw">
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='dlogin'>Login</button>
          
        </div>
    </div>

     

    </div>
  </div>
     
	 <div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>
        <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="images1/login.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
      </div>

      <div class="w3-container" >
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="pname" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="ppsw" required>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="plogin" value='Login'>
          <a href='register.php'>Register Now</a>
        </div>
    </div>

     

    </div>
  </div>

<footer class="w3-container w3-blue-grey">
  <h5>Medical CLinic</h5>
  <p class="w3-opacity">A venture of Meditronics Pvt.Ltd &copy</p>
</footer>
<?php

if(isset($_POST['alogin']))
{
	$uname=$_POST['aname'];
	$pass=$_POST['apsw'];
	
	 if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from admin where id='$uname' and pwd='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['aid']=$row['id'];
					$aid= $_SESSION['aid'];
				
					echo "<script>window.location.href='adddoctor.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
}
if(isset($_POST['plogin']))
{
	$uname=$_POST['pname'];
	$pass=$_POST['ppsw'];
	
	 if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from patient where user='$uname' and pass='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['pid']=$row['pid'];
					$pid= $_SESSION['pid'];
				
					echo "<script>window.location.href='myprofile.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
}
?>
</form>