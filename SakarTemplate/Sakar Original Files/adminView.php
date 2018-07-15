<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php
$files = scandir("./doc/1025/Admission");
foreach ($files as $value) {
echo $value;
?>


 
 <?php
}
 

?>

<iframe src="./doc/1025/Admission/1025.pdf" &embedded=true" style="width:608px; height:700px;" frameborder="0"></iframe>
</body>

</html>
