<?Php
session_start();
$did= $_SESSION['did'];
if(empty($did))
{
	 echo "<script>window.location.href='Homepage.php'</script>";
}
else
{
	include("docmenu.php");
	include("connect.php")
	?>
<html>
<body>
<form method="POST">

     <br><br>
       <center>
	   <h2 class="w3-text-teal">View Diseases</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from disease";
	   $res=$con->query($sel);
	   if(mysqli_num_rows($res)==0)
	   {
		   echo "No data found";
	   }
	   else
	   {
		   echo"
		   <div class='w3-container'>
	   <table class='w3-table-all w3-hoverable' cellspacing='0' cellpadding='0' border='1' style='width:60%' >
	   <thead>
        <tr class='w3-teal'>
	   <th>Id</th>
	   <th>Name</th>
	   <th>Symptoms</th>
	   <th>Category</th>
	   
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $did=$data['Did'];
	  $dname=$data['disease'];
	  $contact=$data['symptom'];
	 
	  $category=$data['type'];
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td>".$did."</td>
        <td>".$dname."</td>
        <td>".$contact."</td>
		
		<td>".$category."</td>
      </tr>
      
    </tbody>";
		   }
			   
	   }
}
	   ?>
	   </table>
	    <br><br>
	   <?php
include("footer.php");
?>
</form>
</body>
</html>