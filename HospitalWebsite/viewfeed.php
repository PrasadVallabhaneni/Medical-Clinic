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
       <center>
	   <h2 class="w3-text-teal">View Feedback</h2>
       <hr style="width:200px" class="w3-opacity">
	   
	   <?php
	   $sel="select * from feedback";
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
	   <th>Feedback</th>
	   
		</tr>
    </thead>   ";
		   while($data=mysqli_fetch_array($res))
		   {
			   $uid=$data['pid'];
	  $uname=$data['pname'];
	  $feedback=$data['feed'];
	
			  echo"
    <tbody bgcolor='#f6f6f6'>
      <tr align='center'>
        <td>".$uid."</td>
        <td>".$uname."</td>
        <td>".$feedback."</td>
		
      </tr>
      
    </tbody>";
		   }
			   
	   }
}
	   ?>
	   </table>