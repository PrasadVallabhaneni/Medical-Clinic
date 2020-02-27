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
<body>
<form method="POST">
<!-- Side Navigation -->

<div class="w3-bar w3-theme">
  <a href="Homepage.php" class="w3-bar-item w3-button w3-padding-16">Home</a>
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
<header class="w3-container w3-theme w3-padding" id="myHeader">
 
  <div class="w3-center" style='height:400px'>
 <img src='images/banner.jpg' style='height:300px'>
    <div class="w3-padding-32">
      <button class="w3-btn w3-xlarge w3-theme-dark w3-hover-teal" onclick="document.getElementById('id01').style.display='block'" style="font-weight:900;">Smart Health Prediction Using Data Mining</button>
    </div>
  </div>
</header>
<br><br>
<div id="id01">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
  
      <div class="w3-center"><br>

        <img src="images/login.png" alt="Avatar" style="width:20%" class="w3-circle w3-margin-top">
      </div>

      <div class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="aname" >
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="apsw" >
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='dlogin'>Login</button>
          
        </div>
    </div>

     

    </div>
  </div>
  <br>
  <footer class="w3-container w3-blue-grey">
  <h5>Medical Clinic  A venture of Meditronics Pvt.Ltd &copy</h5>

</footer>
<?php

if(isset($_POST['dlogin']))
{
	$uname=$_POST['aname'];
	$pass=$_POST['apsw'];
	
	 if(empty($uname)||empty($pass))
			   {
				   echo "<script>alert('Please Fill id and Password');</script>";
			   }
			   else
			   {
	   $sel="select * from doctor where did='$uname' and did='$pass'";
	   $result=$con->query($sel);
			
			if($row=mysqli_fetch_array($result))				
		   {
					$_SESSION['did']=$row['did'];
					$did= $_SESSION['did'];
				
					echo "<script>window.location.href='docprofile.php'</script>";  
			}
			else
			{
				echo "<script>alert('Invalid Username or Password');</script>";
	      	}
   }
}
?>
</form>
</body>
</html>