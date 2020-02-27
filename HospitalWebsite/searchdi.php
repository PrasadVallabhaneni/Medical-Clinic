<?Php
session_start();
$pid= $_SESSION['pid'];
include("patientmenu.php");
include("connect.php");
	

	?>
<html>
<body>
<form method="POST">

     <br><br>
	 <center>
	   <h2 class="w3-text-teal">Disease Prediction</h2>
	     <hr style="width:200px" class="w3-opacity">
	 </center>	 
	 
	   <table align='center' style="width:50%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:90%">
        <div class="w3-section">
           <label align='left'><b>PLease Enter a Symptom</b></label> (Any one symptom,Don't leave blank space before or after it)
          <input class="w3-input w3-border" type="text" name='symp' value="<?php if (isset($_POST['symp'])) { echo $_POST['symp']; }  ?>" required><br>
		   <input type="submit" name='sub' value="NEXT" class='w3-button w3-red'>
         <input type='hidden' value='<?php echo date("Y-m-d H:i");?>' name='date'>
        </div>
    </div>
    </td>
	</tr>
	</table>
	<br><br>
	<?php
	 if(isset($_POST['sub']))
	 {
		 $date=$_POST['date'];
          $symp=$_POST['symp'];
		  $sel="select * from disease where symptom like '%$symp%' ";
		  $rel=$con->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
           
           $s="insert into final values('$pid','$symp','','','$date')";
		   if(mysqli_query($con,$s))
	          {
	          }
			   $p="UPDATE disease SET flag='1' WHERE symptom LIKE '%$symp%'";
		   if(mysqli_query($con,$p))
	          {
	          }
			  echo"
			   <table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Are you experiencing any of these symptom too?</b></label><br>
			  ";
		   while($data=mysqli_fetch_array($rel))
		   {
			   $sym=$data['symptom'];
			   $array = explode(',', $sym);
             $id = rand(0, (count($array)-1));
			 echo $array[$id] . '<br> ';
			  $r="insert into keyword values('$array[$id]')";
		   if(mysqli_query($con,$r))
	          {
	          }
		   }
	 }
	 
	 ?>
	  <br>
	 <label align='left'><b>Please Select</b></label>
	 <select name="cat1" width="200%" type='text' class="w3-input w3-border">
<?php if (isset($_POST['cat1']))
 {
	  echo "<option>".$_POST['cat1']."</option>";
      
 }
 else
 {
  
  
    }
 ?>

<option>--Select--</option>
<?php
 $sql5="select distinct word from keyword";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['word'] ?>"/><?php echo $row['word'] ?></option>

	<?php }
?>
</select>
 <br>
<?php
echo"<input type='submit' name='sub1' value='NEXT' class='w3-button w3-red'>&nbsp;&nbsp;";
echo"<input type='submit' name='dn1' value='No' class='w3-button w3-red'>"; 
	 } 
	 ?>
</div>
    </div>
    </td>
	</tr>
	</table>
	
	 <?php
	 if(isset($_POST['sub1']))
	 {
          $sym=$_POST['cat1'];
		  $sym1=$_POST['symp'].",".$sym;
		  $sel="select * from disease where flag='1'";
		  $rel=$con->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
        $n="delete from keyword";
		   if(mysqli_query($con,$n))
	          {
	          }
           $s="update final set sym='$sym1' where sym='".$_POST['symp']."'";
		   if(mysqli_query($con,$s))
	          {
	          }
			echo"<table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Are you experiencing any of these symptom too?</b></label><br>";
		   while($data=mysqli_fetch_array($rel))
		   {
			   $sym=$data['symptom'];
			   $array = explode(',', $sym);
             $id = rand(0, (count($array)-1));
			 echo $array[$id] . '<br> ';
			  $r="insert into keyword values('$array[$id]')";
		   if(mysqli_query($con,$r))
	          {
	          }
		   }
	 }
	 
	 ?>
	 <br>
	 <label align='left'><b>Please Select</b></label>
	 <select name="cat2" width="200%" class="w3-input w3-border">
<?php if (isset($_POST['cat2']))
 {
	  echo "<option>".$_POST['cat2']."</option>";
  
 }
 else
 {
  
  
    }
 ?>

<option>--Select--</option>
<?php
 $sql5="select distinct word from keyword";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['word'] ?>"/><?php echo $row['word'] ?></option>

	<?php }
?>
</select>
 <br>
<?php
echo"<input type='hidden' value='".$sym1."' name='s'>";
echo"<input type='submit' name='sub2' value='submit' class='w3-button w3-red'>&nbsp;&nbsp;";

echo"<input type='submit' name='dn2' value='No' class='w3-button w3-red'>";
	 }
	 ?>
	</div>
    </div>
    </td>
	</tr>
	</table>
	 <?php
	 if(isset($_POST['sub2']))
	 {
		  $date=$_POST['date'];     
		  $sym=$_POST['cat2'];
		  $sym1=$_POST['s'];
		  $array = explode(',', $sym1);
		  $one=$array[0];
		  $two=$array[1];
		  $sym2=$sym1.",".$sym;
		  $sel="select * from disease where flag='1' ";
		  $rel=$con->query($sel);
		   if(mysqli_num_rows($rel)==0)
	   {
		   echo "No data found";
	   }
	   else
	   { 
        $n="delete from keyword";
		   if(mysqli_query($con,$n))
	          {
	          }
           $s="update final set sym='$sym2' where sym='".$sym1."'";
		   if(mysqli_query($con,$s))
	          {
	          }
			
            $re="Select * from disease where flag='1'";			
			$res = $con->query($re);
		    while($data=mysqli_fetch_array($res))
		   {
			   $symptom=$data['symptom'];
			   if(strpos($symptom,$one) !== false && strpos($symptom,$two) !== false && strpos($symptom,$sym) !== false)
								 {
									$ans=$data['disease'];
                                    $type=$data['type'];									
									break;
								 }
								 else
								 {
									 $ans='';
								 }
								 
		   }
		   if($ans=='')
		   {
			    $re="Select * from disease where flag='1'";	
				$res = $con->query($re);
		        while($data=mysqli_fetch_array($res))
		      {     
			        $symptom=$data['symptom'];
		         if(strpos($symptom,$one) !== false && strpos($symptom,$two) !== false)
			    {
									$ans=$data['disease']; 
									$type=$data['type'];
									break;
			    }
			  }
		   }
			 
		   }
		    $new="UPDATE final SET disease='$ans',type='$type' WHERE date='$date'";
		   if(mysqli_query($con,$new))
	          {
	          }
			  /*$new1="UPDATE final SET type='$type' WHERE date='$date'";
		   if(mysqli_query($con,$new1))
	          {
	          }*/
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($con,$p))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($con,$n))
	          {
	          }
		   echo "<table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			     <label align='left'><b>Suspected Disease:</b></label>
				 <label style='color:red'><b>$ans</b></label><br><br>
				
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br><br>
				 <table border='1' style='width:80%' cellspacing='0' cellpadding='0'>
				 <tr align='center' style='color:white'>
				 <td bgcolor='teal' align='center'>Name</td>
				 <td bgcolor='teal'>Address</td>
				 <td bgcolor='teal'>Mobile</td>
				 </tr>
				 ";
				 
				 $doc="select * from doctor where category='$type'";
				 $res = $con->query($doc);
		        while($data=mysqli_fetch_array($res))
		      {  
		            echo"
					<tr  align='center'>
					<td>".$data['dname']."</td>
					<td>".$data['address']."</td>
					<td>".$data['mob']."</td>
				     </tr>	
					";
			  }
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
			 
	 }
	 
	 if(isset($_POST['dn1']))
	 {
		 $date=$_POST['date']; 
		 $symp=$_POST['symp'];
		  $sel="select * from disease where symptom like '%$symp%' ";			
			$res = $con->query($sel);
			$nm1="";
		 

			   echo"<table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			    ";
				$i=0;
		      while($data=mysqli_fetch_array($res))
		   {
			   $disease=$data['disease'];
			   $type=$data['type'];
				echo"<label align='left'><b>Suspected Disease:</b></label><label style='color:red'><b>$disease</b></label><br>
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br>
				 <table border='1' style='width:80%' cellspacing='0' cellpadding='0'>
				 <tr align='center' style='color:white'>
				 <td bgcolor='teal' align='center'>Name</td>
				 <td bgcolor='teal'>Address</td>
				 <td bgcolor='teal'>Mobile</td>
				 </tr>
				 ";
				$sel="select * from doctor where category='$type'";			
			    $rs = $con->query($sel);
				while($row=mysqli_fetch_array($rs))
				{
					 echo"
					<tr  align='center'>
					<td>".$row['dname']."</td>
					<td>".$row['address']."</td>
					<td>".$row['mob']."</td>
				     </tr>	
					";
				}
				echo"</table><br>";
				 $te="insert into temp values('$disease','$type')";
				 if(mysqli_query($con,$te))
                {
			      	
                $i++;			
                }	
	       }
	       $sql10="select * from temp";
	        $res10=$con->query($sql10);
	        $nm1="";
			$nm2="";
           while($row10=$res10->fetch_assoc())
           {
	           $variableName = $row10['disease'];
	            $nm1.=$row10['disease'].", \n";
			    $variableName2 = $row10['type'];
	              $nm2.=$row10['type'].", \n";
              }
			  $new="UPDATE final SET disease='$nm1',type='$nm2' WHERE date='$date'";
		   if(mysqli_query($con,$new))
	          {
	          }
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($con,$p))
	          {
	          }
			  $f="UPDATE final set disease='$nm1' where symptom like '%$symp%' ";
		   if(mysqli_query($con,$f))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($con,$n))
	          {
	          }
			    $de="delete from temp";
		   if(mysqli_query($con,$de))
	          {
	          } 
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
	 }
	 if(isset($_POST['dn2']))
	 {
		 $date=$_POST['date']; 
		  $sym1=$_POST['s'];
		  $array = explode(',', $sym1);
		  $one=$array[0];
		  $two=$array[1];
		  $sel="select * from disease where symptom like '%$one%' and symptom like '%$two%' ";			
			$res = $con->query($sel);
			 echo"<table align='center' style='width:50%;padding:left:50px' border='1'>
	            <tr>
	            <td style='padding-left:50px'>
                <div class='w3-container' style='width:90%'>
                <div class='w3-section'>
			    ";
				$i=0;
		      while($data=mysqli_fetch_array($res))
		   {
			   $disease=$data['disease'];
			   $type=$data['type'];
				echo"<label align='left'><b>Suspected Disease:</b></label><label style='color:red'><b>$disease</b></label><br>
				<label align='left'><b>Suggested Doctors for Suspected Disease</b></label><br>
				 <table border='1' style='width:80%' cellspacing='0' cellpadding='0'>
				 <tr align='center' style='color:white'>
				 <td bgcolor='teal' align='center'>Name</td>
				 <td bgcolor='teal'>Address</td>
				 <td bgcolor='teal'>Mobile</td>
				 </tr>
				 ";
				$sel="select * from doctor where category='$type'";			
			    $rs = $con->query($sel);
				while($row=mysqli_fetch_array($rs))
				{
					 echo"
					<tr  align='center'>
					<td>".$row['dname']."</td>
					<td>".$row['address']."</td>
					<td>".$row['mob']."</td>
				     </tr>	
					";
				}
				echo"</table><br>";
				$te="insert into temp values('$disease','$type')";
				 if(mysqli_query($con,$te))
                {
			      	
                $i++;			
                }	
	       }
		      $sql10="select * from temp";
	        $res10=$con->query($sql10);
	        $nm3="";
			$nm4="";
           while($row10=$res10->fetch_assoc())
           {
	           $variableName = $row10['disease'];
	            $nm3.=$row10['disease'].", \n";
			    $variableName2 = $row10['type'];
	              $nm4.=$row10['type'].", \n";
              }
			  $new="UPDATE final SET disease='$nm3',type='$nm4' WHERE date='$date'";
		   if(mysqli_query($con,$new))
	          {
	          }
		   $p="UPDATE disease SET flag='0' WHERE flag='1'";
		   if(mysqli_query($con,$p))
	          {
	          }
			  $n="delete from keyword";
		   if(mysqli_query($con,$n))
	          {
	          }
			       $de="delete from temp";
		   if(mysqli_query($con,$de))
	          {
	          } 
				echo"
				</table>
				
				</div>
    </div>
    </td>
	</tr>
	</table>";
	 }
	 ?>
	 

<br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("footer.php");
?>