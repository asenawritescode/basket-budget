<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

session_start();
// Create connection
$con = new mysqli("localhost","root","","budget_calculator");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$total = 0;
$sum = 0;
$update = false;
$id=0;
$name = '';
$amount = '';

    if(isset($_POST['save'])){
       
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];
        $tarehe = $_POST['date_end'];

        $query = mysqli_query($con, "INSERT INTO budget (name, amount, date_end) VALUE ('$budget', '$amount', '$tarehe')"); 
        
        $_SESSION['message'] = "Record has been saved !";
        $_SESSION['msg_type'] = "primary";

        header("location: budget.php?result=true");
        

    }
    if(isset($_POST['save_ex'])){

        $expense = $_POST['expense'];
        $amount = $_POST['amount'];
        $type = $_POST['type'];

        $result = mysqli_query($con, "SELECT * FROM expense WHERE type like '$type'");
        while($row = $result->fetch_assoc()){
            $sum = $sum + $row['amount'];
        }

        $result = mysqli_query($con, "SELECT * FROM budget WHERE name like '$type'");
        while($row = $result->fetch_assoc()){
            $total = $total + $row['amount'];
        }

        if (($total - $sum - $amount) < "0") {

            $_SESSION['message'] = "The budget balance for ".$type." is zero";
            $_SESSION['msg_type'] = "danger";
    
            header("location: expenses.php?result=true");

          }else{
            $query = mysqli_query($con, "INSERT INTO expense (name, type, amount) VALUE ('$expense', '$type', '$amount')"); 
        
            $_SESSION['message'] = "Record has been saved !";
            $_SESSION['msg_type'] = "primary";
    
            header("location: expenses.php?result=true");  
          }

        
        // add a query to check whether the budget balance is over
        // $query = mysqli_query($con, "SELECT amount FROM budget WHERE name=$type");


    }

    //calculate Total budget
    $result = mysqli_query($con, "SELECT * FROM expense");
    while($row = $result->fetch_assoc()){
        $sum = $sum + $row['amount'];
    }

    //calculate Total budget
    $result = mysqli_query($con, "SELECT * FROM budget");
    while($row = $result->fetch_assoc()){
        $total = $total + $row['amount'];
    }

    //delete data

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $query = mysqli_query($con, "DELETE FROM budget WHERE id=$id");
        $_SESSION['message'] = "Record has been deleted !";
        $_SESSION['msg_type'] = "danger";

        header("location: budget.php");

    }
    if(isset($_GET['delete_ex'])){
        $id = $_GET['delete_ex'];

        $query = mysqli_query($con, "DELETE FROM expense WHERE id=$id");
        $_SESSION['message'] = "Record has been deleted !";
        $_SESSION['msg_type'] = "danger";

        header("location: expenses.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM budget WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $amount = $row['amount'];
        }
        header("location: budget.php");
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];

        $query = mysqli_query($con, "UPDATE budget SET name='$budget', amount='$amount' WHERE id='$id'");
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
        header("location: budget.php");
    }

?>