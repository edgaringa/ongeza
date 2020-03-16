<?php
require_once "../controller/engine.php";
?>

<html>
<head>
    <title>Ongeza Test database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../asset/css/style.css">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="header">Ongeza Test database</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-8  offset-md-3">
            <ul class="nav-tabs">
                <li><a href="home.php" class="btn btn-primary">Add Customers</a> </li>
                <li><a href="viewCustomers.php" class="btn btn-primary">All Customers</a> </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            if(!isset($_SESSION['sms']) && empty($_SESSION['sms'])){
                echo '';
            }else {
                echo "<br><div class='alert alert-success alert-dismissible' role='alert'>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'></span></button>
                                  <strong>". $_SESSION['sms'] ."</strong>
                                  </div>";
                unset($_SESSION['sms']);
            }
            ?>
        </div>
    </div>

    <form action="../models/_addCustomer.php" method="post" enctype="multipart/form-data"><!--form-->
        <h4>Add Customer Information</h4>
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div class="form-group">
                    <label for="">First Name :</label>
                    <input type="text" minlength="3" class="form-control" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="">Town Name :</label>
                    <input type="text"  class="form-control" name="town_name" required>
                </div>
            </div>

            <div class="col-md-4 offset-md-1">
                <div class="form-group">
                    <label for="">Last Name :</label>
                    <input type="text" minlength="3" class="form-control" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="">Gender :</label>
                    <select name="gender" class="form-control" required>
                        <?php
                        $gender = genderAll();
                        while ($rows = mysqli_fetch_array($gender)){
                            ?>
                        <option value="<?php echo $rows['id'];?>"><?php echo $rows['gender_name'];?></option>
                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="row pull-right">
                <input type="submit" class="btn btn-primary btn-lg" name="AddCustomer" value="Save Customer">
       </div>
    </form><!--end of form-->

</div>
</body>
</html>
