<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
      
      /*button{
	  height:40px;
	  width:150px;
	  font-weight:bolder;
	  background-color:#000000;
	  color:white;
    }*/
    input{
	width:100%;
		  height:40px;
		    font-weight:bolder;
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
	
	<div id="center" style="font-size:larger;">
	   <?php session_start();
   echo "Session Started";
  ?>
  
  <h1 style="font-style:italic;">Observation Chart</h1>
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
     <table>>
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
     <td>Hemsi Drop/Orofer syrup</td>
     <td>Caalsimax-p/Dsol</td>
     <td>Hovite/Zincovit Drop</td>
     <td>Other,New Medicine</td>
     <td>Dr.Remark</td>
     
    </tr>
    
    <tr>
     <td>
       <input type="date" name="testDate"> 
     </td>
     <td><input type="text" name="hemsiDrop"></td>
     <td><input type="text" name="calsiMax"></td>
     <td><input type="text" name="hovite"></td>
     <td><input type="text" name="otherNew"></td>
     <td><input type="text" name="drRemark"></td>
     

    </tr>
    <tr>
    <td>
    </td>
    <td></td>
    <td><button type="submit" name="AddObservation">Add Medical Incestigation</button></td>
    </tr> 
   </table>
  </form>
  
  <table border="1">
    <tr style="font-weight:bold;text-align:center;">
     <td>Date</td>
     <td>Hemsi Drop/Orofer syrup</td>
     <td>Caalsimax-p/Dsol</td>
     <td>Hovite/Zincovit Drop</td>
     <td>Other,New Medicine</td>
     <td>Dr.Remark</td>
     
    </tr>
    

    
   <?php 
   
      include 'connect.php';
   
   if(isset($_POST['AddObservation'])){
       $qry="INSERT INTO `sakar`.`tblsakarmedicin` (`search`, `hemsiDrop`, `calsimax`, `hovite`, `other`, `drRemark`, `date`) VALUES ('".$_SESSION['search']."', '".$_POST['hemsiDrop']."', '".$_POST['calsiMax']."', '".$_POST['hovite']."', '".$_POST['otherNew']."', '".$_POST['drRemark']."', '".$_POST['testDate']."')";
           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }      
       
      }
  

    $query = "select * from tblsakarmedicin where search=".@$_SESSION['search'];
    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
  ?>     
      <tr>

      <td><?php echo $value['date'];?></td>
      <td><?php echo $value['hemsiDrop'];?></td>
      <td><?php echo $value['calsimax'];?></td>
      <td><?php echo $value['hovite'];?></td>
            <td><?php echo $value['other'];?></td>
                  <td><?php echo $value['drRemark'];?></td>
            
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
