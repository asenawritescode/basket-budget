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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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

    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
    </style>

</head>

<body>
    <div class="wrappar">
        <?php require_once('includes/sidebar.php') ?>

        <div class="main-panal">
            <?php require_once('includes/navbar.php') ?>
            <!-- removed the breaks in the line -->
                <div class="row" style="margin: 2em;">
                    <div class="col-md-3">
                        <div class="card-counter primary">
                            <i class="fa fa-money"></i>
                            <span class="count-numbers">12</span>
                            <span class="count-name">Income</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter success">
                            <i class="fa fa-shopping-basket"></i>
                            <span class="count-numbers">599</span>
                            <span class="count-name">Budget</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter danger">
                            <i class="fa fa-credit-card"></i>
                            <span class="count-numbers">6875</span>
                            <span class="count-name">Expenses</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter info">
                            <i class="fa fa-usd "></i>
                            <span class="count-numbers">35</span>
                            <span class="count-name">Savings</span>
                        </div>
                    </div>
                </div>
            <hr></hr>
          <div class="row" style="margin: 2em; height: 500px !important;">
              <div class="col-md-4">

                <h3>Budget Data</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style='width:50px;'>Name</th>
                            <th style='width:50px;'>Amount</th>
                            <th style='width:50px;'>Date Created</th>
                            <th style='width:50px;'>Date End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                            $page_no = $_GET['page_no'];
                            } else {
                            $page_no = 1;
                            }

                            $total_records_per_page = 5;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "2"; 

                            $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `budget`");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = mysqli_query($con,"SELECT * FROM `budget` LIMIT $offset, $total_records_per_page");
                            while($row = mysqli_fetch_array($result)){
                            echo "<tr>
                            <td>".$row['name']."</td>
                            <td>".$row['amount']."</td>
                            <td>".$row['date_created']."</td>
                              <td>".$row['date_end']."</td>
                              </tr>";
                            }
                            ?>
                    </tbody>
                </table>

                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                </div>

                <ul class="pagination">
                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                    <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                    </li>

                    <?php 
                  if ($total_no_of_pages <= 10){  	 
                  for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                  if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }
                  }
                  }
                  elseif($total_no_of_pages > 10){

                  if($page_no <= 4) {			
                  for ($counter = 1; $counter < 8; $counter++){		 
                  if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                  echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                  }

                  elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                  echo "<li><a href='?page_no=1'>1</a></li>";
                  echo "<li><a href='?page_no=2'>2</a></li>";
                  echo "<li><a>...</a></li>";
                  for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                    if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                  
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                  echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                      }

                  else {
                  echo "<li><a href='?page_no=1'>1</a></li>";
                  echo "<li><a href='?page_no=2'>2</a></li>";
                  echo "<li><a>...</a></li>";

                  for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                  echo "<li class='active'><a>$counter</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                  }                   
                          }
                      }
                  }
                  ?>

                    <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                    </li>
                    <?php if($page_no < $total_no_of_pages){
                  echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                  } ?>
                </ul>
            </div>
            <div class="col-md-4">

                <h3>Expenses Data</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style='width:50px;'>Name</th>
                            <th style='width:50px;'>Amount</th>
                            <th style='width:50px;'>Date Created</th>
                            <th style='width:50px;'>Date End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if (isset($_GET['page_no1']) && $_GET['page_no1']!="") {
                            $page_no1 = $_GET['page_no1'];
                            } else {
                            $page_no1 = 1;
                            }

                            $total_records_per_page1 = 5;
                            $offset1 = ($page_no1-1) * $total_records_per_page1;
                            $previous_page1 = $page_no1 - 1;
                            $next_page1 = $page_no1 + 1;
                            $adjacents1 = "2"; 

                            $result_count1 = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `expense`");
                            $total_records1 = mysqli_fetch_array($result_count1);
                            $total_records1 = $total_records1['total_records'];
                            $total_no_of_pages1 = ceil($total_records1 / $total_records_per_page1);
                            $second_last1 = $total_no_of_pages1 - 1; // total page minus 1

                            $result1 = mysqli_query($con,"SELECT * FROM `expense` LIMIT $offset1, $total_records_per_page1");
                            while($row = mysqli_fetch_array($result1)){
                            echo "<tr>
                            <td>".$row['name']."</td>
                            <td>".$row['type']."</td>
                            <td>".$row['amount']."</td>
                            <td>".$row['date_created']."</td>
                              </tr>";
                            }
                            ?>
                    </tbody>
                </table>

                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no1." of ".$total_no_of_pages1; ?></strong>
                </div>

                <ul class="pagination">
                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                    <li <?php if($page_no1 <= 1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no1 > 1){ echo "href='?page_no=$previous_page1'"; } ?>>Previous</a>
                    </li>

                    <?php 
                  if ($total_no_of_pages1 <= 10){  	 
                  for ($counter1 = 1; $counter1 <= $total_no_of_pages1; $counter1++){
                  if ($counter1 == $page_no1) {
                  echo "<li class='active'><a>$counter1</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter1'>$counter1</a></li>";
                  }
                  }
                  }
                  elseif($total_no_of_pages1 > 10){

                  if($page_no1 <= 4) {			
                  for ($counter1 = 1; $counter1 < 8; $counter1++){		 
                  if ($counter1 == $page_no1) {
                  echo "<li class='active'><a>$counter1</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter1'>$counter1</a></li>";
                  }
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no=$second_last1'>$second_last1</a></li>";
                  echo "<li><a href='?page_no=$total_no_of_pages1'>$total_no_of_pages1</a></li>";
                  }

                  elseif($page_no1 > 4 && $page_no1 < $total_no_of_pages1 - 4) {		 
                  echo "<li><a href='?page_no=1'>1</a></li>";
                  echo "<li><a href='?page_no=2'>2</a></li>";
                  echo "<li><a>...</a></li>";
                  for ($counter1 = $page_no1 - $adjacents1; $counter1 <= $page_no1 + $adjacents1; $counter1++) {			
                    if ($counter1 == $page_no1) {
                  echo "<li class='active'><a>$counter1</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter1'>$counter1</a></li>";
                  }                  
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no=$second_last1'>$second_last1</a></li>";
                  echo "<li><a href='?page_no=$total_no_of_pages1'>$total_no_of_pages1</a></li>";      
                      }

                  else {
                  echo "<li><a href='?page_no=1'>1</a></li>";
                  echo "<li><a href='?page_no=2'>2</a></li>";
                  echo "<li><a>...</a></li>";

                  for ($counter1 = $total_no_of_pages1 - 6; $counter <= $total_no_of_pages1; $counter1++) {
                    if ($counter1 == $page_no1) {
                  echo "<li class='active'><a>$counter1</a></li>";	
                  }else{
                    echo "<li><a href='?page_no=$counter1'>$counter1</a></li>";
                  }                   
                          }
                      }
                  }
                  ?>

                    <li <?php if($page_no >= $total_no_of_pages1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no < $total_no_of_pages1) { echo "href='?page_no=$next_page1'"; } ?>>Next</a>
                    </li>
                    <?php if($page_no1 < $total_no_of_pages1){
                  echo "<li><a href='?page_no=$total_no_of_pages1'>Last &rsaquo;&rsaquo;</a></li>";
                  } ?>
                </ul>
            </div>
            <div class="col-md-4">

                <h3>Income Data</h3>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style='width:50px;'>Name</th>
                            <th style='width:50px;'>Amount</th>
                            <th style='width:50px;'>Date Created</th>
                            <th style='width:50px;'>Date End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            if (isset($_GET['page_no2']) && $_GET['page_no2']!="") {
                            $page_no2 = $_GET['page_no2'];
                            } else {
                            $page_no2 = 1;
                            }

                            $total_records_per_page2 = 5;
                            $offset2 = ($page_no2-1) * $total_records_per_page2;
                            $previous_page2 = $page_no2 - 1;
                            $next_page2 = $page_no2 + 1;
                            $adjacents2 = "2"; 

                            $result_count2 = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `income`");
                            $total_records2 = mysqli_fetch_array($result_count2);
                            $total_records2 = $total_records2['total_records'];
                            $total_no_of_pages2 = ceil($total_records2 / $total_records_per_page2);
                            $second_last2 = $total_no_of_pages2 - 1; // total page minus 1

                            $result2 = mysqli_query($con,"SELECT * FROM `income` LIMIT $offset2, $total_records_per_page2");
                            while($row = mysqli_fetch_array($result2)){
                            echo "<tr>
                            <td>".$row['name']."</td>
                            <td>".$row['summary']."</td>
                            <td>".$row['amount']."</td>
                              <td>".$row['date_created']."</td>
                              </tr>";
                            }
                            mysqli_close($con);
                            ?>
                    </tbody>
                </table>

                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no2." of ".$total_no_of_pages2; ?></strong>
                </div>

                <ul class="pagination">
                    <?php // if($page_no2 > 1){ echo "<li><a href='?page_no2=1'>First Page</a></li>"; } ?>

                    <li <?php if($page_no2 <= 1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no2 > 1){ echo "href='?page_no2=$previous_page2'"; } ?>>Previous</a>
                    </li>

                    <?php 
                  if ($total_no_of_pages2 <= 10){  	 
                  for ($counter2 = 1; $counter2 <= $total_no_of_pages2; $counter2++){
                  if ($counter2 == $page_no2) {
                  echo "<li class='active'><a>$counter2</a></li>";	
                  }else{
                    echo "<li><a href='?page_no2=$counter2'>$counter2</a></li>";
                  }
                  }
                  }
                  elseif($total_no_of_pages2 > 10){

                  if($page_no2 <= 4) {			
                  for ($counter2 = 1; $counter2 < 8; $counter2++){		 
                  if ($counter2 == $page_no2) {
                  echo "<li class='active'><a>$counter2</a></li>";	
                  }else{
                    echo "<li><a href='?page_no2=$counter2'>$counter2</a></li>";
                  }
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no2=$second_last2'>$second_last2</a></li>";
                  echo "<li><a href='?page_no2=$total_no_of_pages2'>$total_no_of_pages2</a></li>";
                  }

                  elseif($page_no2 > 4 && $page_no2 < $total_no_of_pages2 - 4) {		 
                  echo "<li><a href='?page_no2=1'>1</a></li>";
                  echo "<li><a href='?page_no2=2'>2</a></li>";
                  echo "<li><a>...</a></li>";
                  for ($counter2 = $page_no2 - $adjacents2; $counter2 <= $page_no2 + $adjacents2; $counter2++) {			
                    if ($counter2 == $page_no2) {
                  echo "<li class='active'><a>$counter2</a></li>";	
                  }else{
                    echo "<li><a href='?page_no2=$counter2'>$counter2</a></li>";
                  }                  
                  }
                  echo "<li><a>...</a></li>";
                  echo "<li><a href='?page_no2=$second_last2'>$second_last2</a></li>";
                  echo "<li><a href='?page_no2=$total_no_of_pages2'>$total_no_of_pages2</a></li>";      
                      }

                  else {
                  echo "<li><a href='?page_no2=1'>1</a></li>";
                  echo "<li><a href='?page_no2=2'>2</a></li>";
                  echo "<li><a>...</a></li>";

                  for ($counter2 = $total_no_of_pages2 - 6; $counter2 <= $total_no_of_pages2; $counter2++) {
                    if ($counter2 == $page_no2) {
                  echo "<li class='active'><a>$counter2</a></li>";	
                  }else{
                    echo "<li><a href='?page_no2=$counter2'>$counter2</a></li>";
                  }                   
                          }
                      }
                  }
                  ?>

                    <li <?php if($page_no2 >= $total_no_of_pages2){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no2 < $total_no_of_pages2) { echo "href='?page_no2=$next_page2'"; } ?>>Next</a>
                    </li>
                    <?php if($page_no2 < $total_no_of_pages2){
                  echo "<li><a href='?page_no2=$total_no_of_pages2'>Last &rsaquo;&rsaquo;</a></li>";
                  } ?>
                </ul>
            </div>
          </div>
          <hr></hr>
          
          <div class="row" >
          <?php include_once('includes/data-charts.php')?>
            <div class="col-md-5" id="piechart_div" style="width: 100px; height: 400px;" ></div>
            <!-- Draw a line to seperate the two divs -->
            <div class="col-md-7" id="barchart_div" style="height:400px;"></div>
          </div>
          
            <?php require_once('includes/footer.php') ?>
        </div>
    </div>
        <script src="assetsjs/jquery-3.2.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
  </body>

</html>