<html>
  <head>
     <title>SAKAR|Home Of Childs</title>
    <style>
         
     /* button,input{
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
      <?php include 'head.php';
        session_start();
      
      ?>
  </div>

  <center>
   <div id="left">
    <?php  include 'left.php'?>
    </div>
	
	<div id="center" style="font-size:larger;">
        <h1 style="font-style:italic;">Upload Adoption Files</h1>
	  
	<form method="post">
	   <input type="text" name="child"placeholder="Enter Child Id">
     <button type="submit" name="key">Search</button>
     </form>
  <?php if(isset($_POST['key'])){
       include 'connect.php';
       
    $query = "select * from tblRegistration where regNo='".$_POST['child']."'";
    $check = mysql_query($query);
    $value = mysql_fetch_assoc($check);
    $_SESSION['search']=$value['search'];
   echo"OK";
  ?>
   
      <h3>Name : <?php echo $value['childName'];?></h3>
      <h3>Date Of Birth : <?php echo $value['childDoB'];?></h3>
        
  
  <?php
    }
  ?>
	   <center>
	  
       <div id="upload">
             <form action="" method="POST" enctype="multipart/form-data">
           <table> 
		   <tr>
		   <td>Select Document</td>
			<td><input type="file" name="image" ></td>
          </tr>
		   <tr>
		   <td>Document Name :</td>
			<td><input type="text" name="pname" placeholder="Enter Document Name"</td>
           </tr>
		   </table>
		   <button type="submit" name="upload">Upload Adoption File</button>
 
      </form>
     </div>
     </center>
 
	</div>
	
	
   <div id="right">
      <?php include 'right.php'; ?>
    </div>
  </center>

    
  
  </body>
</html>
<?php
 
    
   if(isset($_POST['upload'])){
      $pname=$_SESSION['search'];
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png","pdf");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152000){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"doc/".$pname."/adoption/".$_POST['pname'].".pdf");
         echo "Success";
      }else{
         print_r($errors);
      }
   }
 
   
   
   
?>
