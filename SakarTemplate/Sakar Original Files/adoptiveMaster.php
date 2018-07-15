<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
      button{
	  height:40px;
	  width:200px;
	  font-weight:bolder;
	  background-color:#000000;
	  color:white;
    }
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
      <?php include 'head.php'; ?>   
  </div>

  <center>
   <div id="left">
         <?php include 'left.php'; ?> 
    </div>
	
	<div id="center" style="font-size:larger;">
	   <form method="post" action="adoptiveMaster.php">
	   <center>
   <h1 style="font-style:italic;">Adoptive Parents Master File</h1>
	   <table style="font-weight:bold;">
	      <tr>
		  <td>Child Registration No :</td>
		  <td><input type="text" name="regNo" /></td>
		  <td>Child Received Date :</td>
		  <td><input type="date" name="recDate" /></td>
		  </tr>
		  <tr>
		  <td>CSR Signature Date :</td>
		  <td><input type="date" name="csrDate" /></td>
		  <td>MER Signature Date :</td>
		  <td><input type="date" name="merDate" /></td>
		  </tr>
		  <tr>
		  <td>Adoption Meeting Date :</td>
		  <td><input type="date" name="adpMeetDate" /></td>
		  <td>Foster Care Date :</td>
		  <td><input type="date" name="fosDate" /></td>
		  </tr>
		  <tr>
		  <td>Petition Filling Date :</td>
		  <td><input type="date" name="petDate" /></td>
		  <td>Verification Date :</td>
		  <td><input type="date" name="verDate" /></td>
		  </tr>
		  <tr>
		  <td>Court Order Date :</td>
		  <td><input type="date" name="courtOrderDate" /></td>
		  <td>Birth Certificate Date :</td>
		  <td><input type="date" name="birthCerDate" /></td>
		  </tr>
	
	   </table>
	   <br>
	   <button type="submit" name="btnSubmit">Submit</button>
	   	   </center>
	   </form>
	</div>
	
	
   <div id="right">
      <?php include 'right.php'; ?> 
   </div>
  </center>
<?php
      if(isset($_POST['btnSubmit'])){
             include 'connect.php';

       $qry="INSERT INTO `sakar`.`tblAdoptiveMaster` (`chilRegiNo`, `csrDate`, `merDate`, `adopMetDate`, `fosterDate`, `petitionFillDate`, `verifDate`, `courtorderdate`, `birthCDate`, `doneBy`) VALUES ('".$_POST['regNo']."', '".$_POST['csrDate']."', '".$_POST['merDate']."', '".$_POST['adpMeetDate']."', '".$_POST['fosDate']."', '".$_POST['petDate']."', '".$_POST['verDate']."', '".$_POST['courtOrderDate']."', '".$_POST['birthCerDate']."', '".$_POST['recDate']."')";
           if(mysql_query($qry)){
             echo "<script>alert('Saved');</script>";
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
       
      }

?>
    
  
  </body>
</html>
