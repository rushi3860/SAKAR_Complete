<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap/css/fontawesome-all.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/mdb.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <title>Upload Medical Files</title>
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

<?php
 session_start();
 ?>
<!--Upload Medical Files-->
<h1 class="subheading">Upload Medical Files</h1>
<div class="upload">

    <form method="post">
        <input type="text" name="child"placeholder="Enter Registration No.">
        <button type="submit" class="btn btn-warning" name="key"><i class="fa fa-search"></i> </button>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Select Document</td>
                        <td><input type="file" name="image" ></td>
                    </tr>
                    <tr>
                        <td>Document Name :</td>
                        <td><input type="text" name="pname" placeholder="Enter Document Name"></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-success" name="upload"><i class="fa fa-upload"></i> Upload Medical File</button>
            </form>
</div>

<!--Main Footer-->
<footer class="main-footer">
   
 <h4>Developed & Maintained by MIT Aurangabad,Maharashtra</h4>
</footer>

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
move_uploaded_file($file_tmp,"doc/".$pname."/medical/".$_POST['pname'].".pdf");
echo "Success";
}else{
print_r($errors);
}
}
?>
