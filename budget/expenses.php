<?php require_once 'process.php'; ?>
<?php $con = new mysqli("localhost","root","","budget_calculator"); ?>
<?php  if(isset($_SESSION['message'])): ?>


<?php endif ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <style>
    #contentwrap {
        height: 100%;
        width: 87%;
        position: relative;
        padding: 2rem;
    }

    #contentdiff {
        height: 52px;
    }

    .nav .navbar-nav .navbar-right {
        margin-left: auto;
    }

    .main-panal {
        position: relative;
        z-index: 2;
        float: right;
        width: calc(100% - 260px);
    }
    ::placeholder{
        color:blue;
    }
    </style>
</head>

<body>
    <div class="wrappar">
        <?php require_once('includes/sidebar.php') ?>
        <!-- Content -->
        <!-- <div id="contentdiff">
            <nav class="navbar navbar-default">
            <div class="userinfo">
                <ul class="nav navbar-nav navbar-right">
                <li>
                    <a id="logoutuser" href="#"><i class="zmdi zmdi-notifications text-danger"></i> Hey User</a>
                </li>
                </ul>
            </div>
            </nav>
        </div> -->
        <!-- Creating a navigation bar using the
            .navbar class of bootstrap -->
        <div class="main-panal">
            <?php require_once('includes/navbar.php') ?>
            <!-- removed the breaks in the line -->
            <div class="container" id="contentwrap">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="text-center">Add Expense</h2>
                        <hr><br>
                        <form action="process.php" method="POST">
                            <div class="form-group">
                                <label for="expenseTitle">Expense Title</label>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" name="expense" class="form-control" id="budgetTitle"
                                    placeholder="Enter Expense Title" required autocomplete="off"
                                    value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category</label>
                                <select class="form-control" style="height:35px" name="type" id="exampleFormControlSelect1">
                                <option value="miscellaneous">Miscellaneous</option>
                                <?php
                                    $sql = mysqli_query($con, "SELECT name FROM budget");
                                    $row = mysqli_num_rows($sql);
                                    while ($row = mysqli_fetch_array($sql)){
                                    echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>" ;
                                    }
                                    ?>
                                <!-- Loop through the data avalaible -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount"
                                    placeholder="Enter Amount" required value="<?php echo $amount; ?>">
                            </div>
                            <?php if($update == true): ?>
                            <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
                            <?php else: ?>
                            <button type="submit" name="save_ex" class="btn btn-primary btn-block">Save</button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-center">Total Expenses : KES <?php echo $sum;?></h2>
                        <hr>
                        <br><br>

                        <?php 

                            if(isset($_SESSION['message'])){
                                echo    "<div class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                            <strong> {$_SESSION['message']} </storng>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        ";
                            }

                        ?>
                        <h2>Expenses List</h2>
                        <hr>
                        <?php 
                            
                            $result = mysqli_query($con, "SELECT * FROM expense");
                        ?>
                        <div class="row justify-content-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Expense Title</th>
                                        <th>Budget Category</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td> KES <?php echo $row['amount']; ?></td>
                                    <td>
                                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                                            class="btn btn-success">Update</a>
                                        <a href="process.php?delete_ex=<?php echo $row['id']; ?>"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php endwhile ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once('includes/footer.php') ?>
        </div>
        <script src="assets/js/jquery-3.2.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>