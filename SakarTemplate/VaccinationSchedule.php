<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Vaccination Schedule</title>
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

<!--Vaccination Schedule-->
<?php session_start();
   //echo "Session Started";
  ?>
<h1 class="subheading">Vaccination Schedule</h1>
<div class="upload">
        <form method="post">
            <input type="text" name="child" placeholder="Enter Child Id">
            <button type="submit" name="find" class="btn btn-warning"><i class="fa fa-search"></i></button>
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
                </tr>
                <tr>
                    <td>GIVEN ON</td>
                    <td>REMARKS</td>
                </tr>
                <tr>
                    <td><input type="date" name="doneOn"></td>
                    <td><input type="text" name="Remarks"></td>
                    <td><button type="submit" name="AddVaccine" class="btn btn-success"><i class="fa fa-plus"></i> Add Vaccine</button></td>
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


    $query = "select * from tblvaccination where search=".@$_SESSION['search'];
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


<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>


</body>
</html>