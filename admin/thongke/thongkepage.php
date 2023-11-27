 <div class="overall" style="margin: 10px;display: grid;grid-template-columns: 1fr 1fr;">
     <div id="chart_div" style="width: 900px; height: 500px;">
         <script type="text/javascript">
             google.charts.load('current', {
                 packages: ['corechart', 'line']
             });
             google.charts.setOnLoadCallback(drawBasic);

             function drawBasic() {

                 var data = new google.visualization.DataTable();
                 data.addColumn('date', 'Ngày');
                 data.addColumn('number', 'Số tiền');

                 data.addRows([
                     // [0, 0], [1, 10], [2, 23], [3, 17], [4, 18], [5, 9],
                     // [new Date(0), 0], // Chú ý sử dụng new Date() cho giá trị ngày tháng
                     // [new Date(1), 10],
                     // [new Date(2), 23],
                     // [new Date(3), 17],
                     // [new Date(4), 18],
                     // [new Date(5), 9],
                     <?php
                        foreach ($doanhthu as $show_doanhthu) {

                            extract($show_doanhthu);
                            echo "[new Date($ngay), $sotien],";
                        }
                        ?>
                 ]);

                 var options = {
                     hAxis: {
                         title: 'Ngày'
                     },
                     vAxis: {
                         title: 'Doanh số'
                     }
                 };

                 var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                 chart.draw(data, options);
             }
         </script>
     </div>
     <div id="donutchart" style="width: 900px; height: 500px;">
         <script type="text/javascript">
             google.charts.load("current", {
                 packages: ["corechart"]
             });
             google.charts.setOnLoadCallback(drawChart);

             function drawChart() {
                 var data = google.visualization.arrayToDataTable([
                     ['Task', 'Hours per Day'],
                     // ['Work', 11],
                     // ['Eat', 2],
                     // ['Commute', 2],
                     // ['Watch TV', 2],
                     // ['Sleep', 7]
                     <?php
                        foreach ($soLuongPhim as $thongke) {
                            extract($thongke);
                            echo "['$genre_name',$total_movies],";
                        }
                        ?>
                 ]);

                 var options = {
                     title: 'Số lượng phim',
                     pieHole: 0.7,
                 };

                 var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                 chart.draw(data, options);
             }
         </script>
     </div>

 </div>