<?php
    require '../../connect.php';
    $action = $_GET['action'];
    switch($action){
    case 'delete':
        $id =$_POST['id'];
        $sql=" delete from voucher where id=$id ";
        if(mysqli_query($connect,$sql)){
              echo'xoa thanh cong';
        }
        else echo'khong the xoa';
        break;
    case 'addVoucher':
        $code=$_POST['code'];
        $discount=$_POST['discount'];
        mysqli_query($connect,"insert into voucher(code,discount) values('$code','$discount')");
        header('location:../index.php?side=voucher');
    }