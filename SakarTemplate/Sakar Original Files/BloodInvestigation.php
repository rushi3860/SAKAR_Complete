<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
      /*button,input,select{
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
	<h1 style="font-style:italic;">Blood Investigation</h1>
	   <?php session_start();
   //echo "Session Started";
  ?>
   <form method="post">
     <input type="text" name="child" placeholder="Enter Child Id">
     <button type="submit" name="find">Search</button>
     </form>
  <?php if(isset($_POST['find'])){
       include 'connect.php';
    if(isset($_POST['find'])){   
    $_SESSION['search']=$_POST['child'];
    $query = "select * from tblRegistration where search=".$_SESSION['search'];
    $check = mysql_query($query);
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
      
     <td>Name Of Test</td>
     <td>Schedule Date</td>
     <td>Done On</td>
     <td>Reports</td>
     <td>Remarks</td>
    </tr>
    
    <tr>
     <td>
        <select name="testName">
          <option>CBC</option>
          <option>BILIRUBIN</option>
          <option>CRETININE</option>
          <option>CRP</option>                    
          <option>BLOOD GROUP</option>
          <option>HBSAG</option>
          <option>HIV I && II</option>
          <option>VDRL</option>
          <option>TSH</option>
          <option>BERA</option>
          <option>OTHER</option>                                                                   
        </select>
     
     
     </td>
     <td><input type="date" name="scheduleDate"></td>
     <td><input type="date" name="doneOn"></td>
     <td><input type="text" name="Reports"></td>
     <td><input type="text" name="Remarks"></td>  
    </tr>
    <tr>
    <td>
    </td>
    <td></td>
    <td><button type="submit" name="AddTest">Add Report</button></td>
    </tr> 
   </table>
  </form>
  
  <table border="1">
      <th>Registration No.</th>
      <th>Name Of Test</th>
      <th>Schedule Date</th>
      <th>Done On</th>
      <th>Repoorts</th>
      <th>Remark</th>
    
   <?php 
      include 'connect.php';
      if(isset($_POST['AddTest'])){
       $qry="INSERT INTO `sakar`.`tblbloodinvestigation` (`search`, `testName`, `scheduleDate`, `doneDate`, `reports`, `remark`)".
       " VALUES (".$_SESSION['search'].", '".$_POST['testName']."', '".$_POST['scheduleDate']."', '".$_POST['doneOn']."', '".$_POST['Reports']."', '".$_POST['Remarks']."');";
           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
       
      }
  

    $query = "select * from tblbloodinvestigation where search=".$_SESSION['search'];
    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
  ?>     
      <tr>
      <td><?php echo $value['search'];?></td>
      <td><?php echo $value['testName'];?></td>
      <td><?php echo $value['scheduleDate'];?></td>
      <td><?php echo $value['doneDate'];?></td>
      <td><?php echo $value['reports'];?></td>
      <td><?php echo $value['remark'];?></td>                  
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
