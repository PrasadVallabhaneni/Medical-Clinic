<?Php
session_start();
$pid= $_SESSION['pid'];
$pname= $_SESSION['pname'];
include("patientmenu.php");
include("connect.php");
	?>
<body>
<form method='post'><br><br>

 <center>
	   <h2 class="w3-text-teal">Post Feedback</h2>
	     <hr style="width:200px" class="w3-opacity">
	 </center>	
  <table align='center' border='1' class="container-visitor bg-grey text-center" height='300px' width='50%'>
<tr><td>
<table align='center' >
  <tr>
  <td>
  <br><br>
  <label class='text-left'>Feedback</label><br>
  <textarea class='form-control' name='feed' rows='6' style='width:380px' required></textarea>
  <br>
  <input type='submit' class='w3-button w3-red' value="Submit" name='feedback' OnClick="Button1_Click" />
  </td>
  </tr>
  </table>
  </td>
  
  </tr>
  </table>
  <?php
  include('connect.php');
if(isset($_POST['feedback']))
{
	$feedback=$_POST['feed'];
	$sql="Insert into feedback values ('$pid','$pname','$feedback')";
						if(mysqli_query($con,$sql))
	  {
		  echo "<script>alert('Feedback Submitted succesfully');</script>";
		    echo "<script>location.replace('feedback.php');</script>";

}
}
?>
</form>
<br><br><br><br><br><br>
</body>
</html>
  <?php
include('footer.php');
?>