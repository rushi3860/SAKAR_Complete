<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
      /*button,input{
	  height:40px;
	  width:200px;
	  font-weight:bolder;
	  background-color:#000000;
	  color:white;
    }*/
     button:hover{
	  height:40px;
	  width:200px;
	  font-weight:bolder;
	  background-color:red;
	  color:white;

    }
   #center{
      width:60%;
	  height:480px;
	  float:left;
	  
   }
   hr{
	height:3px;
	background-color:black;
}
   body{
   background-image:url('images/bg.png');
   }
   </style>
  </head>

  <body>
  <div id="head">
         <?php include 'head.php';?>  </div>

  <center>
   <div id="left">
            <?php include 'left.php';?>
    </div>
	
	<div id="center" style="font-size:larger;">
		  <h1 align="center" style="font-style:italic;">Adoptive Parents<br>
  (Process Completed)</h1>
<form method="post">
  <div id="adpForm">
<center>
<table style="font-weight:bold;">
<tr>
<td>Registration No. :</td>
<td><input type="text" name="regNo"/></td>
<td>Sr. No. of Adoption Status Register :</td>
<td><input type="text" name="srNo"/></td>
</tr>
<tr>
<td>Name of Parents :</td>
<td><input type="text" name="parentName"/></td>
<td>Full Address :</td>
<td><input type="textarea" name="address"/></td>
</tr>
<tr>
<td>Contact No. :</td>
<td><input type="text" name="contact"/></td>
<td>Name of Adopted Child :</td>
<td><input type="text" name="adoptedChildName"/></td>
</tr>
<tr>
<td>Date Applied for Adoption :</td>
<td><input type="date" name="AppdDate"/></td>
<td>Registration No. of Adopted Child :</td>
<td><input type="text" name="adoptedChildRegNo"/></td>
</tr>
<tr>
<td>Court Order No. :</td>
<td><input type="text" name="courtOrderNo"/></td>
<td>Court Order Date :</td>
<td><input type="date" name="courtOrderDate"/></td>
</tr>

<tr>
<td>Date of Deed of Adoption :</td>
<td><input type="date" name="adpDate"/></td>
<td>Birth Certificate Number :</td>
<td><input type="text" name="bcno"/></td>
</tr>

<tr>
<td>Birth Certificate Date :</td>
<td><input type="date" name="bcDate"/></td>
</tr>

</table>
</center>	
</div>
<br><div align="center"><button type="submit" name="submit">Adoption Parent Registration</button></div>
</form>
	</div>
	
	
   <div id="right">
            <?php include 'right.php';?>  </div>
  </center>
<?php
  if(isset($_POST['submit'])){
   include 'connect.php';
   $qry="INSERT INTO `sakar`.`tbladoptiveparents` (`srNoAdopStatusRegister`, `pName`, `Address`, `mobile`, `childRegNo`, `childName`, `courtDate`, `courtOrNo`, `pfDate`, `bcDate`, `certNo`)".
   " VALUES ('".$_POST['srNo']."', '".$_POST['parentName']."', '".$_POST['address']."', '".$_POST['contact']."', '".$_POST['regNo']."', '".$_POST['adoptedChildName']."', '".$_POST['courtOrderDate']."', '".$_POST['courtOrderNo']."', '".$_POST['AppdDate']."', '".$_POST['bcDate']."', '".$_POST['bcno']."')";;
   
   
           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
     
   
   }

?>
    
  
  </body>
</html>
