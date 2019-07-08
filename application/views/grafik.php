<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
      	//load data from CI_Controller
        //VI-1
      	var vi1='<?php echo $ibes1; ?>';
        // Create the data table.
        var pie_data = new google.visualization.DataTable();
        pie_data.addColumn('string', 'Topping');
        pie_data.addColumn('number', 'Slices');
        pie_data.addRows(JSON.parse(vi1));

        // Set chart options
        var pie_options = {'title':'<?php echo $judul1?>',
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var pie_chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        pie_chart.draw(pie_data, pie_options);
        
        //VI-2
        var vi2='<?php echo $ibes2; ?>';
        // Create the data table.
        var pie_data2 = new google.visualization.DataTable();
        pie_data2.addColumn('string', 'Topping');
        pie_data2.addColumn('number', 'Slices');
        pie_data2.addRows(JSON.parse(vi2));

        // Set chart options
        var pie_options2 = {'title':'<?php echo $judul2?>',
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var pie_chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
        pie_chart2.draw(pie_data2, pie_options2);


        //VI-3
        var vi3='<?php echo $BarChartData ?>';
        var bar_data = new google.visualization.arrayToDataTable(JSON.parse(vi3));

        var bar_options = {
          'title':'<?php  echo $BarChartTitle;?>' ,
          legend: {position: 'bottom'},
         };

        var bar_chart = new google.visualization.ColumnChart(document.getElementById('curve_div'));
        bar_chart.draw(bar_data, bar_options);
        

        //VI-4
        var vi4='<?php echo $ibes4; ?>';
        // Create the data table.
        var pie_data3 = new google.visualization.DataTable();
        pie_data3.addColumn('string', 'Topping');
        pie_data3.addColumn('number', 'Slices');
        pie_data3.addRows(JSON.parse(vi4));

        // Set chart options
        var pie_options3 = {'title':'<?php echo $judul4?>',
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var pie_chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
        pie_chart3.draw(pie_data3, pie_options3);


        //VI-5
        var vi5='<?php echo $ibes5; ?>';
        // Create the data table.
        var pie_data4 = new google.visualization.DataTable();
        pie_data4.addColumn('string', 'Topping');
        pie_data4.addColumn('number', 'Slices');
        pie_data4.addRows(JSON.parse(vi5));

        // Set chart options
        var pie_options4 = {'title':'<?php echo $judul5?>',
                       'width':0,
                       'height':0};

        // Instantiate and draw our chart, passing in some options.
        var pie_chart4 = new google.visualization.PieChart(document.getElementById('chart_div4'));
        pie_chart4.draw(pie_data4, pie_options4);
      }
    </script>
  </head>

  <body>
  	<h1><center>Visualisasi Informasi Data Industri Besar Non Agro</center></h1>
    <?echo json_encode($vi1); ?>
    <?echo json_encode($vi2); ?>
    <?echo json_encode($vi3); ?>
    <?echo json_encode($vi4); ?>
    <?echo json_encode($vi5); ?>
    <!--Div that will hold the pie chart-->
    <center>
      <table border="0">
          <tr><td width="600px"><div id="chart_div"></td></div>
          <td width="600px"><div id="chart_div2"></div></td></tr>
          <tr><td colspan="2"><div id="curve_div"></div></td></tr>
          <tr><td><div id="chart_div3"></td></div>
          <td><div id="chart_div4"></div></td></tr>
      </table>
    </center>
  </body>
</html>