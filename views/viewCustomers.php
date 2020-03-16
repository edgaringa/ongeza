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
        <div class="col-md-8 offset-md-3">
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

    <div class="row">
        <div class="col-md-12"><br/>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Town Name</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $customer = customerView();
                    if(!$customer || mysqli_num_rows($customer) <= 0) {
                        echo "<tr><td colspan='6' class='text-center'> No Data!</td></tr>";
                    }else{
                    while($rows = mysqli_fetch_array($customer)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['customerId']; ?></td>
                            <td><?php echo $rows['first_name']; ?></td>
                            <td><?php echo $rows['last_name']; ?></td>
                            <td><?php echo $rows['town_name']; ?></td>
                            <td><?php echo $rows['gender_name']; ?></td>
                            <td>
                                <a href="updateCustomers.php?edit=<?php echo $rows['customerId']; ?>">
                                    <i class="btn btn-warning btn-sm fa fa-eye"> Update </i></a>
                                <a href="../models/_deleteCustomers.php?delete=<?php echo $rows['customerId']; ?>"
                                   onclick="return confirm('Are you Sure that you want to delete this Customer?')">
                                    <i class="btn btn-danger btn-sm fa fa-trash"> Delete </i></a>

                            </td>
                        </tr>
                        <?php
                    }
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>

</div>
<script src="../asset/js/bootstrap.min.js"></script>
</body>
</html>
