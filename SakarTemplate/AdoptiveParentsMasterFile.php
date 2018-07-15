<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Adoptive Parents Master File</title>
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

<!--Adoptive Parents Master File-->
<h1 class="subheading">Adoptive Parents Master File</h1>
<div class="adoption-completed">
    <form method="post" action="adoptiveMaster.php">

            <table>
                <tr>
                    <td>Child Registration No :</td>
                    <td><input type="text" name="regNo" /></td>
                    <td>Child Received Date :</td>
                    <td><input type="date" name="recDate" /></td>
                </tr>
                <tr>
                    <td>CSR Signature Date :</td>
                    <td><input type="date" name="csrDate" /></td>
                    <td>MER Signature Date :</td>
                    <td><input type="date" name="merDate" /></td>
                </tr>
                <tr>
                    <td>Adoption Meeting Date :</td>
                    <td><input type="date" name="adpMeetDate" /></td>
                    <td>Foster Care Date :</td>
                    <td><input type="date" name="fosDate" /></td>
                </tr>
                <tr>
                    <td>Petition Filling Date :</td>
                    <td><input type="date" name="petDate" /></td>
                    <td>Verification Date :</td>
                    <td><input type="date" name="verDate" /></td>
                </tr>
                <tr>
                    <td>Court Order Date :</td>
                    <td><input type="date" name="courtOrderDate" /></td>
                    <td>Birth Certificate Date :</td>
                    <td><input type="date" name="birthCerDate" /></td>
                </tr>

            </table>
            <br>
            <button type="submit" name="btnSubmit" style="margin-left: 350px" class="btn btn-success">Submit</button>
    </form>
</div>
<?php
      if(isset($_POST['btnSubmit'])){
             include 'connect.php';

       $qry="INSERT INTO `sakar`.`tblAdoptiveMaster` (`chilRegiNo`, `csrDate`, `merDate`, `adopMetDate`, `fosterDate`, `petitionFillDate`, `verifDate`, `courtorderdate`, `birthCDate`, `doneBy`) VALUES ('".$_POST['regNo']."', '".$_POST['csrDate']."', '".$_POST['merDate']."', '".$_POST['adpMeetDate']."', '".$_POST['fosDate']."', '".$_POST['petDate']."', '".$_POST['verDate']."', '".$_POST['courtOrderDate']."', '".$_POST['birthCerDate']."', '".$_POST['recDate']."')";
           if(mysql_query($qry)){
             echo "<script>alert('Saved');</script>";
echo "data inserted sucessfully";
}else{
    echo "not sucess";
}
}
?>

<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>

</body>
</html>