<?php

require "../controller/engine.php";

if(isset($_POST['AddCustomer'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $town_name = $_POST['town_name'];
    $gender = $_POST['gender'];

    customerAdd($first_name,$last_name,$town_name,$gender);
}
