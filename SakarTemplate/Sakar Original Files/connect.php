<?php
  $web = "localhost";
  $user = "root";
  $pass = "";
  
  if(!mysql_connect($web,$user,$pass)){
     die("unable to connect");
  }else{
//  echo "c0nnected sucessful";
     if(mysql_select_db('sakar')){
//		 echo"database selected sucessfully";
	 }
  
  }
?>