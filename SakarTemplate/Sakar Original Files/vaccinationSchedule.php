<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
       
      
     /* button,input,select{
	  height:40px;
	  width:175px;
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
	<center>
	     <?php session_start();
   //echo "Session Started";
  ?>
  <h1 style="font-style:italic;">Vaccination Schedule</h1>
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
   <table>
    <tr style="text-align:center;font-weight:bold;">
     <td>AGE</td>
     <td>VACCINE</td>
     <td>SCHEDULE DATE</td>
     <td>GIVEN ON</td>
     <td>REMARKS</td>
    </tr>
    
    <tr>
     <td>
        <select name="age">
          <option>BIRTH TO 02 WEEKS</option>
          <option>06 WEEK</option>
          <option>10 WEEK</option>
          <option>14 WEEK</option>       
          <option>09 MONTH</option>             
          <option>18 MONTH</option>          
          <option>5 YEAR</option>          
         
        </select>
     
     
     </td>
     <td><input type="text" name="vaccine"></td>  
     <td><input type="date" name="scheduleDate"></td>
     <td><input type="date" name="doneOn"></td>
     <td><input type="text" name="Remarks"></td>
    </tr>
    <tr>
    <td>
    </td>
    <td></td>
    <td><button type="submit" name="AddVaccine">Add Vaccine</button></td>
    </tr> 
   </table>
  </form>
  
  <table border="1">
      <th>AGE</th>
      <th>VACCINE</th>      
      <th>SCHEDULE DATE</th>
      <th>GIVEN ON</th>
      <th>REMARKS</th>
    
   <?php 
      include 'connect.php';
      if(isset($_POST['AddVaccine'])){
       $qry="INSERT INTO `sakar`.`tblvaccination` (`search`, `age`, `vaccine`, `scheduleDate`, `givenDate`, `remark`)".
       " VALUES (".$_SESSION['search'].", '".$_POST['age']."', '".$_POST['vaccine']."', '".$_POST['scheduleDate']."', '".$_POST['doneOn']."', '".$_POST['Remarks']."');";
           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
       
      }
  

    $query = "select * from tblvaccination where search=".$_SESSION['search'];
    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
  ?>     
      <tr>
      <td><?php echo $value['search'];?></td>
      <td><?php echo $value['age'];?></td>
      <td><?php echo $value['scheduleDate'];?></td>
      <td><?php echo $value['givenDate'];?></td>
      <td><?php echo $value['remark'];?></td>
      
      </tr>
      
  <?php
   }
   }
   
   
  ?>    
     </table>
</center>
	</div>
	
	
   <div id="right">
     <?php include 'right.php';?> 
   </div>
  </center>

    
  
  </body>
</html>
