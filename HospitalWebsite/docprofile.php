<?Php
session_start();
$did= $_SESSION['did'];
include("docmenu.php");
include("connect.php");
	$var="select * from doctor where did='$did'";
	   $res=$con->query($var);
       $row = mysqli_fetch_assoc($res);

	?>
<html>
<body>
<form method="POST">

     <br><br>
	 <center>
	   <h2 class="w3-text-teal">Profile Details</h2>
       <hr style="width:200px" class="w3-opacity">
	   </center>
       <table align='center' style="width:50%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
          <label align='left'><b>Doctor ID</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $did ?>" name="did" readonly>
          <label align='left'><b>Doctor Name</b></label>
          <input class="w3-input w3-border" type="text" value="<?php echo $row['dname'] ?>" name="pname" readonly><br>
		   <label align='left'><b>Address</b></label>
          <textarea class="w3-input w3-border" type="text" name="address" readonly><?php echo $row['address'] ?></textarea><br>
		   <label align='left'><b>Mobile No.</b></label>
          <input class="w3-input w3-border" type="text" value="<?php echo $row['mob'] ?>" name="mob" readonly><br>
		<label align='left'><b>Specialist In</b></label>
          <input class="w3-input w3-border" type="text" value="<?php echo $row['category'] ?>" name="cat" readonly><br>
		
        </div>
    </div>
    </td>
	</tr>
	</table>

	 <br><br>
	   <?php
include("footer.php");
?>
</form>
</body>
</html>