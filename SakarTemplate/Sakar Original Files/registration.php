

<?php
//echo "OK";
//include 'gkIdea.php';
if(isset($_POST['save'])){
//echo "In Post";
  include 'connect.php';
 
   $sql = "INSERT INTO `sakar`.`tblregistration` (`search`, `status`, `cncp`, `place`,".
" `nmPerFound`, `perAddress`, `Fir`, `childCat`, `childName`, `childDoB`, `regDate`,".
"  `reportedBy`, `district`, `Reson`, `policestation`, `firDate`,".
" `complexion`, `gender`, `regNo`)".
"  VALUES (".$_POST['searchNo'].", '".$_POST['status']."', '".$_POST['cncp']."', '".$_POST['placeOfFound']."', '".$_POST['nameOfPerson']."', '".$_POST['addressOfPerson']."',". 
  "'".$_POST['firNo']."', '".$_POST['childcat']."', '".$_POST['childName']."', '".$_POST['dob']."', '".$_POST['registrationDate']."', '".$_POST['rptBy']."', '".$_POST['district']."', '".$_POST['reason']."',". 
  "'".$_POST['policeStation']."', '".$_POST['firDate']."','".$_POST['complexsion']."', '".$_POST['gender']."', '".$_POST['govNo']."');"; 
   $check = mysql_query($sql);
    

     mkdir("doc/".$_POST['searchNo']);
     mkdir("doc/".$_POST['searchNo']."/Admission");
     mkdir("doc/".$_POST['searchNo']."/Medical");
     mkdir("doc/".$_POST['searchNo']."/Adoption");
     mkdir("doc/".$_POST['searchNo']."/Private");

     //header("location:rf.php");
  }
  
?>
<html>
  <head>
   <title>SAKAR|Home Of Childs</title>
	<link href="Style.css" rel="stylesheet" type="text/css">
	<style>
	body{
   background-image:url('images/bg.png');
   
   }
	</style>
  </head>
  <body style="font-size:larger;">
  <div id="head">
       <?php include 'head.php';  ?>
  </div>
  <div id="left">
       <?php include 'left.php';  ?>
    </div>
	
   <div id="right">
     <?php include 'right.php';  ?>
    </div>

    <div id="center">
   <center>
    <h1 style="font-style:italic;">Child Registration</h1>
 <form action="" method="post">
 <table style="font-size:medium;">
  
  <?php 
         include 'connect.php';
         $query = "select max(search)+1 as search from tblRegistration";

    if($check = mysql_query($query)){
    $value = mysql_fetch_assoc($check);
    }
     ?>

    <tr>
	 <td><b>Enter Registration No. :</b></td>
     <td><input type="text" name="searchNo" value='<?php echo $value['search'];?>' readonly ></td>
	 <td><b>Government Registration No. :</b></td>
     <td><input type="text" name="govNo"/></td>
	 </tr>
    
    <tr>
	   <td><b> Status :</b></td>
	   <td><input type="radio" name="status" value="Abandoned" />Abandoned</td>
	   <td><b>Registration Date :</b></td>
      <td><input type="date" name="registrationDate" min="01/01/1982" /></td>
	 </tr>
	 
	 <tr>
	  <td></td>
	  <td><input type="radio" name="status" value="Surrended"/>Surrended</td>
     <td></td>
    </tr>
      	
    <tr>
	   <td><b>CNCP :</b></td>
	   <td><input type="radio" name="cncp" value="yes"/>Yes
	   <input type="radio" name="cncp" value="no"/>No</td>
	   <td><b>Reported By :</b></td>
      <td><select name="rptBy"><option>Police Officer</option><option>CWC</option><option>Other Agency</option><option>Public Servent</option><option>Child Line</option><option>Special Juvenile Police</option><option>Voluntary Organization</option><option>Social Worker</option>
      <option>By The Child Itself</option><option>Public Citizen</option>
      </select></td>
    </tr>
	
	 <tr>
	  <td><b> Place Where Found : </b></td>
     <td><input type="text" name="placeOfFound" required/></td>
     <td><b>District :</b></td><td><input type="text" name="district"/></td>
	 </tr>
	 
	 <tr>
	 <td><b>Name of the Person who found Child :</b></td>
     <td><input type="text" name="nameOfPerson"required/></td>
	 <td><b>Reason for Surrender :</b></td>
     <td><select name="reason"style="width:200px;"><option>NA</option><option>Compelled deu to Physical,Emotional and Social Factor beyond their Control</option>
     <option>Consequence of Non-Conserval Relationship</option><option>Single Parent Incapaciated to take Care</option></select></td>
	 </tr>
	 
     <tr>	 
	 <td><b>Address of the Person :</b></td>
	 <td><input type="text" name="addressOfPerson"required/></td>
     <td><b> Nearest Police Station :</b></td>
     <td><input type="text" name="policeStation"/></td>   
	 </tr>
	 <tr>
	 <td><b>FIR / Diary No. : </b></td>
	 <td><input type="text" name="firNo"required/></td>
	 <td><b>FIR / Diary Date :</b></td>
     <td><input type="date" name="firDate"required/></td>
	 </tr>
	 
	 <tr>
	 <td><b>Child Category :  </b></td>
	 <td><select name="childcat"><option>Single</option><option>Twins</option><option>Siblings</option></select></td>
	 <td><b> Complexion : </b></td>
     <td><select name="complexsion"><option>Very Fair</option><option>Fair</option><option>Wheatish</option><option>Dark</option></select></td>
    </tr>
    
	 <tr>
	 <td><b>Child Name : </b></td>
	 <td><input type="text" name="childName"/></td>
	 <td><b>Gender : </b></td>
     <td><input type="radio" name="gender" value="male"/>Male
	          <input type="radio" name="gender" value="female"/>Female</td>
    </tr>
	 
	 <tr>
	 <td><b>Date of Birth : </b></td>
	 <td><input type="date" name="dob"/></td>
	 </tr>
	</table><br>

   <button type="submit" name="save" value="save" align="center">Register</button><br/>
  </center>
  	 </form>   
   </div>

 </body>
</html>
