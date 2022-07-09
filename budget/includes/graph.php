  <?php
  $con = mysqli_connect("localhost","root","","budget_calculator");
  if($con){
    // echo "connected";
  }
?>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff1);

      function drawStuff1() {
        var data = new google.visualization.arrayToDataTable([
          ['Money', 'Percentage'],
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
          title: 'Money Flow',
          width: 900,
          legend: { position: 'none' },
          chart: { title: 'Money',
                   subtitle: 'Cashflow chart' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'KES'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };
    </script>
  </head>
    <!-- <div id="top_x_div" style="width: 900px; height: 500px;"></div> -->