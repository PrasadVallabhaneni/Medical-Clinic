<?php 
session_start();
include("connect.php");

$cat=$_GET['name'];
if(!empty($cat))
{
	
	$sel="select * from doctor where category='$cat'";
	$res=$con->query($sel);
	 if(mysqli_num_rows($res)==0)
	   {
		   echo "No data found";
	   }
	   else
	   {
		   echo"<br><br>
		   <center><table border='1' style='width:40%' cellspacing='0' cellpadding='0'>
				 <tr align='center' style='color:white' height='30px'>
				 <td bgcolor='teal' align='center'>Name</td>
				 <td bgcolor='teal'>Address</td>
				 <td bgcolor='teal'>Mobile</td>
				 </tr>";
	while($data=$res->fetch_assoc())
	{
		 echo"
					<tr  align='center' height='30px'>
					<td>".$data['dname']."</td>
					<td>".$data['address']."</td>
					<td>".$data['mob']."</td>
				     </tr>	
					";
	}
	   }
	   echo"</table> </center>";
?>
 
<?php
}
else{
}
?>