<?php 
$ma=$_POST['ma'];
$ten=$_POST['name'];
$noi_dung=$_POST['noi_dung'];
$anh=$_POST['anh'];
require '../connect.php';
$sql="update test1 
        set 
            Ten='$ten' ,
            noi_dung='$noi_dung',
            hinh_anh='$anh' 
            where Ma=$ma; 
        
        
        ";


mysqli_query($connect,$sql);
$loi=mysqli_error($connect);
echo $loi;
mysqli_close($connect);
