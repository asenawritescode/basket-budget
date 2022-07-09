<?
// Initialize the session
session_start();


// Check if the user is logged in, if not then redirect him to login page
if($_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

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

            <?php require_once('includes/navbar.php') ?>
            <div class="main-panal">
            <div class="container" id="contentwrap">
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="text-center">Add Income</h2>
                        <hr><br>
                        <form action="process.php" method="POST">
                            <div class="form-group">
                                <label for="incomeTitle">Income Title</label>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter Income Title" required autocomplete="off"
                                    value="<?php echo $name; ?>">
                            </div>

                            <div class="form-group">
                                <label for="summary">Summary</label>
                                <input type="text" name="summary" class="form-control" id="summary"
                                    placeholder="Enter Comment" required value="<?php echo $summary; ?>">
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" class="form-control" id="amount"
                                    placeholder="Enter Amount" required value="<?php echo $amount; ?>">
                            </div>
                            <?php if($update == true): ?>
                            <button type="submit" name="update_in" class="btn btn-success btn-block">Update</button>
                            <?php else: ?>
                            <button type="submit" name="save_in" class="btn btn-primary btn-block">Record</button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <h2 class="text-center">Total Income : KES <?php echo $sum;?></h2>
                        <hr>
                        <br><br>

                        <?php 

                            if(isset($_SESSION['message'])){
                                echo    "<div id='message' class='alert alert-{$_SESSION['msg_type']} alert-dismissible fade show ' role='alert'>
                                            <strong> {$_SESSION['message']} </storng>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                        ";
                            }
                            session_unset();
                        ?>
                        <h2>Income List</h2>
                        <hr>
                        <?php 
                            
                            $result = mysqli_query($con, "SELECT * FROM income ORDER BY id DESC LIMIT 10");
                        ?>
                        <div class="row justify-content-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Income Title</th>
                                        <th>Summary</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php while($row = $result->fetch_assoc()): ?>
                                <tr style="font-weight: 400;">
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['summary']; ?></td>
                                    <td> KES <?php echo $row['amount']; ?></td>
                                    <td>
                                        <a href="income.php?edit_in=<?php echo $row['id']; ?>"
                                            class="btn btn-success">Update</a>
                                        <a href="process.php?delete_in=<?php echo $row['id']; ?>"
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
        <script src="includes/js/remove-alert.js"></script>
</body>

</html>