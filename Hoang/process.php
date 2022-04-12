<?php  
 $ten=$_POST['name'];
 $noi_dung=$_POST['noi_dung'];
 $hinh_anh=$_POST['anh'];

 require '../connect.php';
$sql="insert into test1(Ten,noi_dung,hinh_anh) values('$ten','$noi_dung','$hinh_anh')";
//  die($sql);
mysqli_query($connect,$sql);
$loi=mysqli_error($connect);
echo $loi;
mysqli_close($connect);
