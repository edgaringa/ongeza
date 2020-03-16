<?php

require "../controller/engine.php";

if(isset($_GET['delete'])){

    $delete = $_GET['delete'];

    customerDelete($delete);
}
