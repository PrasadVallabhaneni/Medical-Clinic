<?Php
session_start();
$aid= $_SESSION['aid'];
if(empty($aid))
{
	 echo "<script>window.location.href='Homepage.php'</script>";
}
else
{
	include("adminmenu.php");
	include("connect.php");
	$var="select max(Did) as max from disease";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	     $Did = $row['max'] + 1;
	
	?>
<html>
<body>
<form method="POST">

     <br><br>
	  <center><h2 class="w3-text-teal">Add Disease</h2></center>
       <table align='center' style="width:50%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
          <label align='left'><b>Disease ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $Did?>" name="Did" readonly>
          <label align='left'><b>Name of Disease</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Disease Name" name="dname" required><br>
		   <label align='left'><b>Symptoms</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Enter symptoms" name="symp" required></textarea><label style='color:red'>*(Enter Symptoms seperated by ,)</label><br><br>
		 
		   <label align='left'><b>Type of Disease</b></label>
          <select type='text' name='dcat' class="w3-input w3-border" required>
		  <option value=''>--Select Type--</option>
		  <option>Heart</option>
		  <option>Brain</option>
		  <option>Physic</option>
		  <option>Bone</option>
		  <option>Infection</option>
		  <option>STD</option>
		  </select>
		  <br>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='sub' value="ADD">
          
        </div>
    </div>
    </td>
	</tr>
	</table>

	<?php
	if(isset($_POST['sub']))
	{
		
		$dname=$_POST['dname'];
		$symp=$_POST['symp'];
		
		$dcat=$_POST['dcat'];
		
		$sel="insert into disease values('$Did','$dname','$symp','$dcat','0')";
		if(mysqli_query($con,$sel))
	  {
		echo "<script>alert('Disease added successfully');</script>";
		echo "<script>location.replace('adddisease.php');</script>";

        }
	}
}
?>
	<br><br>
<?php
include("footer.php");
?>