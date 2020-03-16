<?php
session_start();

function db(){
    $con = mysqli_connect("localhost","root","","ongeza_test");
    if(!$con){
        die("could not connect to db".mysqli_connect_error());
    }
    return $con;
}

function genderAll(){
    $conn = db();
    $query = mysqli_query($conn,"SELECT * FROM gender");
    if(!$query || mysqli_num_rows($query) <= 0){

    }else{
        return $query;
    }

}

function customerAdd($first_name,$last_name,$town_name,$gender){
    $con = db();
    $query = mysqli_query($con,"INSERT INTO customer(first_name,last_name,town_name,gender_id) 
VALUES('$first_name','$last_name','$town_name','$gender')");
    if($query){
        $_SESSION['sms'] = "<center>Customer's information has been saved successful</center>";
        header('location:../views/home.php');
    }else{
        $_SESSION['sms'] = "<center>Customer's information has not been saved successful</center>";
        header('location:../views/home.php');
    }
}


function customerView(){
    $conn = db();
    $query = mysqli_query($conn,"SELECT *,customer.id AS customerId FROM customer JOIN gender ON gender.id=customer.gender_id WHERE is_deleted=0");
    if(!$query || mysqli_num_rows($query) <= 0){

    }else{
        return $query;
    }

}
function customerEdit($customerId){
    $conn = db();
    $query = mysqli_query($conn,"SELECT * FROM customer JOIN gender ON gender.id=customer.gender_id WHERE customer.id='$customerId'");
    if(!$query || mysqli_num_rows($query) <= 0){

    }else{
        return $query;
    }

}

function customerUpdate($customerId,$first_name,$last_name,$town_name,$gender){
    $con = db();
    $query = mysqli_query($con,"UPDATE customer SET 
                              first_name='$first_name',
                              last_name='$last_name',
                              town_name='$town_name',
                              gender_id='$gender' WHERE id='$customerId'");
    if($query){
        $_SESSION['sms'] = "<center>Customer's information has been Updated successful</center>";
        header('location:../views/viewCustomers.php');
    }else{
        $_SESSION['sms'] = "<center>Customer's information has not been Updated successful</center>";
        header('location:../views/viewCustomers.php');
    }
}
function customerDelete($delete){
    $con = db();
    $query = mysqli_query($con,"UPDATE customer SET 
                              is_deleted=1 WHERE id='$delete'");
    if($query){
        $_SESSION['sms'] = "<center>Customer's information has been Deleted successful</center>";
        header('location:../views/viewCustomers.php');
    }else{
        $_SESSION['sms'] = "<center>Customer's information has not been Deleted successful</center>";
        header('location:../views/viewCustomers.php');
    }
}
function customerDeletePermanently($delete){
    $con = db();
    $query = mysqli_query($con,"DELETE FROM customer WHERE id='$delete'");
    if($query){
        $_SESSION['sms'] = "<center>Customer's information has been Deleted successful</center>";
        header('location:../views/viewCustomers.php');
    }else{
        $_SESSION['sms'] = "<center>Customer's information has not been Deleted successful</center>";
        header('location:../views/viewCustomers.php');
    }
}
?>