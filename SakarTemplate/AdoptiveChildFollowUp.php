<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Adoptive Child Follow Up</title>
</head>
<body>
<!--Main Header-->
<div class="header">
    <img class="leftlogo" src="img/logo.png"/>
    <img class="rightlogo" src="img/header_bg5.png"/>
</div>
<!--Main Navigation-->
<div class="main-navigation">
    <ul>
        <li>
            <a href="ChildRegistration.php">Child Regisration</a>
        </li>
        <li>
            <div class="dropdown">
                <a href="#" class="dropbtn" style="width: 100%">Upload <i class="fas fa-chevron-circle-down"></i> </a>
                <div class="dropdown-content">
                    <a href="UploadAdmission.php">Admission Files</a>
                    <a href="UploadMedical.php">Medical Files</a>
                    <a href="UploadAdoption.php">Adoption Files</a>
                </div>
            </div>
        </li>
        <li>
            <a href="AdoptionForm-ProcessCompleted.php">Adoption Form(Process Completed)</a>
        </li>
        <li>
            <a href="AdoptiveParentsMasterFile.php">Adoption Parents Master File</a>
        </li>
        <li>
            <a href="AdoptiveChildFollowUp.php">Adoptive Child Follow Up</a>
        </li>
        <li>
            <a href="BloodInvestigation.php">Blood Investigation Form</a>
        </li>
        <li>
            <a href="VaccinationSchedule.php">Vaccination Schedule</a>
        </li>
        <li>
            <a href="DailyMedicalChart.php">Daily Medical Chart</a>
        </li>
        <li>
            <a href="DailyObservationChart.php">Daily Observation Chart</a>
        </li>
    </ul>
</div>

<!--Adoptive Child Follow Up-->
<?php session_start();
   //echo "Session Started";
  ?>
<h1 class="subheading">Follow Up</h1>
<div class="adoption-completed">
    <form method="post">
        <input type="text" name="child" placeholder="Enter Child Id">
        <button type="submit" name="find" class="btn btn-warning"><i class="fa fa-search"></i> </button>
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
        <td> <h3>Search Key : </h3></td>
        <td> <h3>Name : </h3></td>
        <td> <h3>Date Of Birth : </h3></td>
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
                <td><button type="submit" name="AddTest" class="btn btn-success"><i class="fa fa-plus"></i> ADD FOLLOW UP</button></td>
            </tr>
        </table>
    </form>
    <table border="2px solid black">
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
        $query = "select * from tblFollowup where govRegi=".@$_SESSION['search'];
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

<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>

</body>
</html>