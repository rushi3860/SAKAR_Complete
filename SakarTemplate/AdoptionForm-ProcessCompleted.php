<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Adoption Form (Process Completed)</title>
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

<!--Adoption Form-->
<h1 class="subheading">Adoptive Parents (Process Completed)</h1>
<div class="adoption-completed" >

    <form method="post">
                <table>
                    <tr>
                        <td>Registration No. :</td>
                        <td><input type="text" name="regNo"/></td>
                        <td>Sr. No. of Adoption Status Register :</td>
                        <td><input type="text" name="srNo"/></td>
                    </tr>
                    <tr>
                        <td>Name of Parents :</td>
                        <td><input type="text" name="parentName"/></td>
                        <td>Full Address :</td>
                        <td><input type="text" name="address"/></td>
                    </tr>
                    <tr>
                        <td>Contact No. :</td>
                        <td><input type="text" name="contact"/></td>
                        <td>Name of Adopted Child :</td>
                        <td><input type="text" name="adoptedChildName"/></td>
                    </tr>
                    <tr>
                        <td>Date Applied for Adoption :</td>
                        <td><input type="date" name="AppdDate"/></td>
                        <td>Registration No. of Adopted Child :</td>
                        <td><input type="text" name="adoptedChildRegNo"/></td>
                    </tr>
                    <tr>
                        <td>Court Order No. :</td>
                        <td><input type="text" name="courtOrderNo"/></td>
                        <td>Court Order Date :</td>
                        <td><input type="date" name="courtOrderDate"/></td>
                    </tr>

                    <tr>
                        <td>Date of Deed of Adoption :</td>
                        <td><input type="date" name="adpDate"/></td>
                        <td>Birth Certificate Number :</td>
                        <td><input type="text" name="bcno"/></td>
                    </tr>

                    <tr>
                        <td colspan="1">Birth Certificate Date :</td>
                        <td colspan="3"><input type="date" name="bcDate"/></td>
                    </tr>
                </table>
        <button type="submit" name="submit" style="margin-left: 350px" class="btn btn-success">Adoption Parent Registration</button>
    </form><br>
</div>


<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>

</body>
</html>
<?php
  if(isset($_POST['submit'])){
   include 'connect.php';
   $qry="INSERT INTO `sakar`.`tbladoptiveparents` (`srNoAdopStatusRegister`, `pName`, `Address`, `mobile`, `childRegNo`, `childName`, `courtDate`, `courtOrNo`, `pfDate`, `bcDate`, `certNo`)".
   " VALUES ('".$_POST['srNo']."', '".$_POST['parentName']."', '".$_POST['address']."', '".$_POST['contact']."', '".$_POST['regNo']."', '".$_POST['adoptedChildName']."', '".$_POST['courtOrderDate']."', '".$_POST['courtOrderNo']."', '".$_POST['AppdDate']."', '".$_POST['bcDate']."', '".$_POST['bcno']."')";;

           if(mysql_query($qry)){
	          echo "data inserted sucessfully";
	          }else{
	            echo "not sucess";
              }
   }
?>
