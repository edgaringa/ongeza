<?php

require "../controller/engine.php";

if(isset($_POST['UpdateCustomer'])){
    $customerId = $_POST['customerId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $town_name = $_POST['town_name'];
    $gender = $_POST['gender'];

    customerUpdate($customerId,$first_name,$last_name,$town_name,$gender);
}
