<?php
  $con = mysqli_connect("localhost","root","","budget_calculator");
  if($con){
    // echo "connected";
  }
?>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tittle', 'Value'],
         <?php
        //This gets data from the incomes table 
        $result = mysqli_query($con, 'SELECT SUM(amount) AS value_sum FROM income'); 
        $row = mysqli_fetch_assoc($result); 
        $sum = $row['value_sum'];
        echo"['Income',".$sum."],";
        
        //This gets data from the budget table 
        $result1 = mysqli_query($con, 'SELECT SUM(amount) AS value_sum1 FROM budget'); 
        $row1 = mysqli_fetch_assoc($result1); 
        $sum1 = $row1['value_sum1'];
        echo"['Budget',".$sum1."],";

        //This gets data from the expenses table 
        $result2 = mysqli_query($con, 'SELECT SUM(amount) AS value_sum2 FROM expense'); 
        $row2 = mysqli_fetch_assoc($result2); 
        $sum2 = $row2['value_sum2'];
        echo"['Expense',".$sum2."]";
         ?>
        ]);

        var options = {
          width: 500,
          height: 500,
          title: 'Financial expenditure and its values'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>

    <!-- <div id="piechart" style="height: 500px;"></div> -->
  
