<?Php
session_start();
$pid= $_SESSION['pid'];
include("patientmenu.php");
include("connect.php");
	?>
<html>
<script>
function showDiv(elem)
{
	if(elem.value == 0)
	{
      document.getElementById('namediv').style.display = "block";
	  document.getElementById('catdiv').style.display = "none";
	}
   if(elem.value == 1)
   {
      document.getElementById('catdiv').style.display = "block";
	  document.getElementById('namediv').style.display = "none";
   }
}
</script>
<body>
<form method='post'>
<br><br>
	 <center>
	   <h2 class="w3-text-teal">Search Doctor</h2>
	     <hr style="width:200px" class="w3-opacity">
	 </center>	 
	 
	   <table align='center' style="width:40%;padding:left:50px" border='1'>
	   <tr>
	   <td style="padding-left:50px">
      <div class="w3-container" style="width:80%">
        <div class="w3-section">
		
  <label align='left'><b>Search By</b></label>:  <select id="test" name="form_select" onchange="showDiv(this)" class="w3-input w3-border">
<option>--select--</option>
   <option value="0">Name</option>
   <option value ="1">Catgory</option>
</select>
 <br><br>
 
<div id="namediv" style="display: none;" bgcolor="white">
   <table border="0" bgcolor="white" align="center">
   <tr><td><label align='left'><b>Enter Name:</b></label>&nbsp;</td>
   <td><input type="text" id="txt1" name="t1" class="w3-input w3-border"></td></tr>
    <tr><td align="center" colspan="2">
	     <br><input type="button" value="Search" id="name" name="nsearch" onClick="names(txt1)" class='w3-button w3-red'>
		 </td>
   </tr>
    </table>
</div>

<div id="catdiv" style="display: none;">
   <table border="0" bgcolor="white" align="center">
   <tr><td><label align='left'><b>Select Category:</b></label>&nbsp;</td>
   <td>
	<select type="text" id="cat" name="catsearch" onchange="cats()" class="w3-input w3-border">
	<option value=''>--Select--</option>
	
<?php
 $sql5="select distinct category from doctor";


  //$cnt=$cnt+1;
 $res = $con->query($sql5);
while($row = $res->fetch_assoc()) 
{?>
	<option value="<?php echo $row['category'] ?>"/><?php echo $row['category'] ?></option>
 
	<?php }
?>
</select>
	</select>
	</td>
	</tr>
    </table>
</div>
</div>
    </div>
    </td>
	</tr>
	</table>
	<br><br>
<div id="txtHint"></div>

<script>
function names(txt1) {
  var xhttp;    
 /* if (cust == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }*/
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  var name=document.getElementById("txt1").value;
  xhttp.open("GET", "docname.php?name="+name, true);
  xhttp.send();
}
function cats() {
  var xhttp;    
 /* if (cust == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }*/
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  var name=document.getElementById("cat").value;
  xhttp.open("GET", "doccat.php?name="+name, true);
  xhttp.send();
}


</script>
 <br><br> <br><br> <br><br> <br><br> <br><br> <br><br> 
	   <?php
include("footer.php");
?>
</form>
</body>
</html>