<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
      button,input{
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
     <?php include 'head.php';?>   </div>

  <center>
   <div id="left">    
    <?php include 'left.php';?> 
    </div>
	
	<div id="center">
	   <?php session_start();
   echo "Session Started";
  ?>
  
  <h1>Observation Chart</h1>
<table>

   <form method="post">
     <td><input type="text" name="child" placeholder="Enter Child Id"></td>
     <td><button type="submit" name="find">Search</button></td>
     </form>
</table>     
<hr>
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
   <table>
    <tr style="font-weight:bold;text-align:center;">
     <td>Date</td>
     <td>Weight (kg)</td>
     <td>Height (cm)</td>
     <td>Head (cm)</td>
    </tr>
    
    <tr>
     <td>
       <input type="date" name="TestDate"> 
     </td>
     <td><input type="text" name="weight"></td>
     <td><input type="text" name="height"></td>
     <td><input type="text" name="head"></td>
    </tr>
    <tr>
    <td>
    </td>
    <td></td>
    <td><button type="submit" name="AddObservation">Add Observation</button></td>
    </tr> 
   </table>
  </form>
  
  <table border="1">
      <th>DATE</th>
      <th>WEIGHT</th>
      <th>HEIGHT</th>
      <th>HEAD</th>

    
   <?php 
      include 'connect.php';
      if(isset($_POST['AddObservation'])){
       $qry="INSERT INTO `sakar`.`tblobservation` (`search`, `date`, `weight`, `height`, `head`)".
       " VALUES (".$_SESSION['search'].", '".$_POST['TestDate']."', '".$_POST['weight']."', '".$_POST['height']."', '".$_POST['head']."');";
           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
       
      }
  

    $query = "select * from tblObservation where search=".$_SESSION['search'];
    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
  ?>     
      <tr>

      <td><?php echo $value['date'];?></td>
      <td><?php echo $value['weight'];?></td>
      <td><?php echo $value['height'];?></td>
      <td><?php echo $value['head'];?></td>
            
      </tr>
      
  <?php
   }
   }
   
   
  ?>    
     </table>

	   
	</div>
	
	
   <div id="right">
     <?php include 'right.php';?> 
  

   </div>
  </center>

    
  
  </body>
</html>
