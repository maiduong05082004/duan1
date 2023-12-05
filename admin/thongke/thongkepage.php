<!-- Biểu đồ doanh số bán hàng theo ngày -->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawRevenueChart);

function drawRevenueChart() {
    var data = google.visualization.arrayToDataTable([
        ['Ngày', 'Doanh Số'],
        <?php foreach ($doanhthu as $row) {
            echo "['" . $row['SaleDate'] . "', " . $row['TotalSales'] . "],";
        } ?>
    ]);

    var options = {
        title: 'Doanh số bán hàng theo ngày',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('revenue_chart'));
    chart.draw(data, options);
}
</script>

<!-- Biểu đồ số lượng sản phẩm bán ra theo thể loại -->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart', 'bar']});
google.charts.setOnLoadCallback(drawCategoryChart);

function drawCategoryChart() {
    var data = google.visualization.arrayToDataTable([
        ['Thể loại', 'Số lượng bán ra'],
        <?php foreach ($tonghangban as $hangban) {
            echo "['" . $hangban['genre_name'] . "', " . $hangban['total_sold'] . "],";
        } ?>
    ]);

    var options = {
        title: 'Số lượng sản phẩm bán ra theo thể loại',
        hAxis: {
            title: 'Thể loại',
        },
        vAxis: {
            title: 'Số lượng bán ra',
            minValue: 0,
        },
        bars: 'vertical',
        height: 400,
        colors: ['#1b9e77', '#d95f02', '#7570b3']
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('category_chart'));
    chart.draw(data, options);
}
</script>

<div id="revenue_chart" style="width: 900px; height: 500px;margin: 20px;"></div>
<div id="category_chart" style="width: 900px; height: 500px;margin-top:34px;"></div>
