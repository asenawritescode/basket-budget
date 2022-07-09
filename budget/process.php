<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


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
$type = '';
$amount = '';
$summary = '';

    if(isset($_POST['save'])){
       
        $budget = $_POST['budget'];
        $amount = $_POST['amount'];
        $tarehe = $_POST['date_end'];

       



        $query = mysqli_query($con, "INSERT INTO budget (name, amount, date_end) VALUE ('$budget', '$amount', '$tarehe')"); 
        
        $_SESSION['message'] = "Record has been saved !";
        $_SESSION['msg_type'] = "primary";

        header("location: budget.php?result=true");
        

    }
    if(isset($_POST['save_in'])){
       
        $name = $_POST['name'];
        $summary = $_POST['summary'];
        $amount = $_POST['amount'];
        

        $query = mysqli_query($con, "INSERT INTO income (name, summary, amount) VALUE ('$name', '$summary', '$amount')"); 
        
        $_SESSION['message'] = "Record has been saved !";
        $_SESSION['msg_type'] = "primary";

        header("location: income.php?result=true");
        

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
    if(isset($_GET['delete_in'])){
        $id = $_GET['delete_in'];

        $query = mysqli_query($con, "DELETE FROM income WHERE id=$id");
        $_SESSION['message'] = "Record has been deleted !";
        $_SESSION['msg_type'] = "danger";

        header("location: income.php");

    }

    if(isset($_GET['edit'])){
        $id = $_GET['edit'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM budget WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $amount = $row['amount'];
            $date_end = $row['date_end'];
        }
    }

    if(isset($_GET['edit_ex'])){
        $id = $_GET['edit_ex'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM expense WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $type = $row['type'];
            $amount = $row['amount'];
        }
    }

    if(isset($_GET['edit_in'])){
        $id = $_GET['edit_in'];
        $update = true;
        $result = mysqli_query($con, "SELECT * FROM income WHERE id=$id");

      
        if( mysqli_num_rows($result) == 1){
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $summary = $row['summary'];
            $amount = $row['amount'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['budget'];
        $amount = $_POST['amount'];
        $date_end = $_POST['date_end'];


        $query = mysqli_query($con, "UPDATE budget SET name = '$name', amount = '$amount', date_end = '$date_end' WHERE id = '$id'");
        // "UPDATE `date_end` SET `name` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'"
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
        header("location: budget.php");
    }

    if(isset($_POST['update_ex'])){
        $id = $_POST['id'];
        $expense = $_POST['expense'];
        $amount = $_POST['amount'];
        $type = $_POST['type'];

        $query = mysqli_query($con, "UPDATE expense SET name = '$expense', amount = '$amount', type = '$type' WHERE id = '$id'");
        // "UPDATE `date_end` SET `name` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'"
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
        header("location: expenses.php");
    }

    if(isset($_POST['update_in'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $summary = $_POST['summary'];


        $query = mysqli_query($con, "UPDATE income SET name = '$name', amount = '$amount', summary = '$summary' WHERE id = '$id'");
        // "UPDATE `date_end` SET `name` = '$firstname', `lastname` = '$lastname', `address` = '$address' WHERE `user_id` = '$user_id'"
        $_SESSION['message'] = "Record has been updated!";
        $_SESSION['msg_type'] = "success";
        header("location: income.php");
    }

?>