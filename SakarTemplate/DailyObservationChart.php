<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Daily Observation Chart</title>
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

<!--Daily Observation Chart-->
<?php session_start();
   //echo "Session Started";
  ?>

<h1 class="subheading">Observation Chart</h1>
<div class="adoption-completed">
    <table style="margin-left: 150px">
        <form method="post">
            <td><input type="text" name="child" placeholder="Enter Child Id"></td>
            <td><button type="submit" name="find" class="btn btn-warning"><i class="fa fa-search"></i></button></td>
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
                <td><button type="submit" name="AddObservation"class="btn btn-success"><i class="fa fa-plus"></i> Add Observation</button></td>
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

<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>


</body>
</html>