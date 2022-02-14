// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Aggregat', 'Aggregat Data Layanan Umum'],
  ['BELUM PROSES', 8],
  ['DITOLAK', 2],
  ['TERVERIFIKASI', 4],
  ['SELESAI', 2],
  ['DIAMBIL', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'DATA LAYANAN UMUM', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
