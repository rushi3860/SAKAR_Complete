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
    #login{ 
        transform: translate(150px,150px);
}
    label{
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
         <?php include 'head.php';?>  </div>

  <center>
   <div id="left">
   
    </div>
	
	<div id="center">
     <div id="login">
 <form method="post" action="">
    <table>
          <tr>
            <td>
               <label>User Name</label>
            </td>
            <td><input type="text" name="userName"></td>
          </tr>
        
         <tr>
            <td>
               <label>Password</label>
            </td>
            <td><input type="password" name="password"></td>
          </tr>
        
        <tr>
          <td></td>
          <td>
           <button type="submit" name="submit">Login</button>
           </td>
        </tr>

        </table>     
        </form>    
     </div>

         

	</div>
	
	
   <div id="right">
   
  </center>
<?php
  if(isset($_POST['submit'])){
  echo"submit";
       require 'connect.php';
  
    $query = "select * from tblUserLogin";

    if($check = mysql_query($query)){
     while($value = mysql_fetch_assoc($check)){
          if(($value['userName']==$_POST['userName']) && ($value['password']==$_POST['password']) ){
            header("Location: registration.php");           }
   }

 }

     
  }



?>
    
  
  </body>
</html>
