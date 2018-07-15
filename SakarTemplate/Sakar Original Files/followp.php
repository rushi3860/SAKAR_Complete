<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
     /* button,input,select{
	  height:40px;
	  width:150px;
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
<?php include 'head.php';?>
  </div>

  <center>
   <div id="left">
     <?php include 'left.php';?>
    </div>
	
	<div id="center" style="font-size:larger;">
	   <?php session_start();
   //echo "Session Started";
  ?>
  <h1 style="font-style:italic;">Follow Up</h1>
   <form method="post">
     <input type="text" name="child" placeholder="Enter Child Id">
     <button type="submit" name="find">Search</button>
     </form>
  <?php

 if(isset($_POST['find'])){
       include 'connect.php';
    if(isset($_POST['find'])){   
    $_SESSION['search']=$_POST['child'];
    $query = "select * from tblRegistration where search=".$_SESSION['search'];
    if($check = mysql_query($query));
    $value = mysql_fetch_assoc($check);

   echo"OK";
   }
  ?>
     <table>
     <td> <h3>Search Key : <?php echo $value['search'];?></h3></td>
     <td> <h3>Name : <?php echo $value['childName'];?></h3></td>
     <td> <h3>Date Of Birth : <?php echo $value['childDoB'];?></h3></td>
     </table>
  <?php
    }
  ?>
  
   <form method="post">
   <table style="text-align:center;font-weight:bold;">
    <tr>
     <td>Follow Up Number</td>
     <td>Follow Up Date</td>
     <td>Done By</td>
    </tr>
    
    <tr>
     <td>
        <select name="testName">
          <option>FOLLOW UP 1</option>
          <option>FOLLOW UP 2</option>
          <option>FOLLOW UP 3</option>
          <option>FOLLOW UP 4</option>                                                                                      
        </select>
     
     
     </td>
     
     <td><input type="date" name="folloupDate"></td>
     <td>
        <select name="doneBy">
          <option>BY SAKAR</option>
          <option>BY OTHER</option>
        </select>
     
     
     </td>
     

    <td><button type="submit" name="AddTest">ADD FOLLOW UP</button></td>
    </tr> 
   </table>
  </form>
  <table border="1" style="text-align:center;">
      <th>REGISTRATION NO</th>
      <th>FOLLOWUP NO</th>
      <th>FOLLOWUP DATE</th>
      <th>DONE BY</th>
    
   <?php 
      include 'connect.php';
      if(isset($_POST['AddTest'])){
       $qry="INSERT INTO `sakar`.`tblFollowup` (`govRegi`, `followup`, `fdate`, `doneBy`) VALUES ('".$_SESSION['search']."', '".$_POST['testName']."', '".$_POST['folloupDate']."', '".$_POST['doneBy']."')";
           if(mysql_query($qry)){
	          echo "<script>alert('Follow Up added Successfully');</script>";
	          }else{
	          echo "<script>alert(' Error ! Follow Up Already exists. Please choose another follow up');</script>";
              }      
       
      }
  

    $query = "select * from tblFollowup where govRegi=".$_SESSION['search'];
    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
  ?>     
      <tr>
      <td><?php echo $value['govRegi'];?></td>
      <td><?php echo $value['followup'];?></td>
      <td><?php echo $value['fdate'];?></td>
      <td><?php echo $value['doneBy'];?></td>
          </tr>
      
  <?php
   }
   }
   
   
  ?>    
     </table>

	</div>
	
	
   <div id="right">
     <?php include 'right.php';?>    </div>
  </center>

    
  
  </body>
</html>
