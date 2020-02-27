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
	include("connect.php")
	?>
<html>
<body>
<form method="POST">

     <br><br>
	 <center><h2 class="w3-text-teal">Add Doctor</h2></center>
       <table align='center' style="width:50%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
          <label align='left'><b>Doctor ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter ID" name="did" required>
          <label align='left'><b>Doctor Name</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Name" name="dname" pattern="[a-zA-Z' ']*$" title="Please Enter Characters Only" required><br>
		   <label align='left'><b>Address</b></label>
          <textarea class="w3-input w3-border" type="text" placeholder="Enter address" name="address" required></textarea><br>
		   <label align='left'><b>Mobile No.</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Mobile No." name="mob" pattern="[0-9]{10}" title="Please Enter Valid Contact No" required><br>
		   <label align='left'><b>Category</b></label>
 
		  <select input type="text" name="cat" width="200%" class="w3-input w3-border" required>

<option value=''>--select--</option>
<?php
 $sql5="select distinct type from disease";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['type'] ?>"/><?php echo $row['type'] ?></option>
 
	<?php }
?>
</select><br>
          <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name='sub' value="ADD">
          
        </div>
    </div>
    </td>
	</tr>
	</table>
	<br><br>
<?php
include("footer.php");
?>
	<?php
	if(isset($_POST['sub']))
	{
		$did=$_POST['did'];
		$dname=$_POST['dname'];
		$address=$_POST['address'];
		$mob=$_POST['mob'];
		$cat=$_POST['cat'];
		
		$sel="insert into doctor values('$did','$dname','$address','$mob','$cat')";
		if(mysqli_query($con,$sel))
	  {
		echo "<script>alert('Doctor added successfully');</script>";
		echo "<script>location.replace('adddoctor.php');</script>";

        }
	}
}

?>
</form>
</body>
</html>