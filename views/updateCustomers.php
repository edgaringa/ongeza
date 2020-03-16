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



    <form action="../models/_updateCustomer.php" method="post" enctype="multipart/form-data"><!--form-->
        <h4>Update Customer Information</h4>
        <?php
        $customerId=$_GET['edit'];
        $customer=customerEdit($customerId);
        $rows = mysqli_fetch_array($customer);
        ?>
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div class="form-group">
                    <label for="">First Name :</label>
                    <input type="hidden" class="form-control" value="<?php echo $customerId?>" name="customerId" required>
                    <input type="text" class="form-control" value="<?php echo $rows['first_name']?>" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="">Town Name :</label>
                    <input type="text" class="form-control" value="<?php echo $rows['town_name']?>" name="town_name" required>
                </div>
            </div>

            <div class="col-md-4 offset-md-1">
                <div class="form-group">
                    <label for="">Last Name :</label>
                    <input type="text" class="form-control" value="<?php echo $rows['last_name']?>" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="">Gender :</label>
                    <select name="gender" class="form-control">
                        <option value="<?php echo $rows['gender_id']?>"><?php echo $rows['gender_name']?></option>
                        <?php
                        $gender = genderAll();
                        while ($row = mysqli_fetch_array($gender)){
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['gender_name'];?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
            </div>
        </div>

        <div class="row pull-right">
            <input type="submit" class="btn btn-primary btn-lg" name="UpdateCustomer" value="Save Customer">
        </div>
    </form><!--end of form-->

</div>
</body>
</html>
