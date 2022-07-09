<?php
  $con = mysqli_connect("localhost","root","","budget_calculator");
  if($con){
    // echo "connected";
  }
?>

<!-- <html> -->
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

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
        echo"['Expenses',".$sum2."]";
 
          ?>
        ]);

        var piechart_options = {
                       title:'Pie Chart: Financial expenditure and its values',
                       width:500,
                       height:300};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data, piechart_options);

        var barchart_options = {
                       title:'Barchart: Money Flow',
                       width:900,
                       height:300,
                       legend: { position: 'none' },
                       axes: {
                        x: {
                        0: { side: 'top', label: 'KES'} // Top x-axis.
                        }
                       },
                       bar: { groupWidth: "90%" }
                    };
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data, barchart_options);
      }
    </script>
  </head>
<!-- <body>
    <table class="columns">
      <tr>
        <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html> -->