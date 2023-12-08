<div class="row2">
    <div class="row2 font_title">
      <h1 class="text-center mt-5">Biểu đồ</h1>
    </div>
    <div class="row2 form_content ">
      <div
              id="myChart" style="width:100%; width:800px; height:500px; align-items: center">
      </div>

      <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          const data = google.visualization.arrayToDataTable([
            ['Danh Mục', 'Số Lượng sản phẩm'],
        <?php   
        
        foreach ($listsanpham as $sanpham) {
          echo "['" . $sanpham['genre_name'] . "', " . $sanpham['product_count'] . "],";
      }
        
        ?>  
          ]);

// Set Options
          const options = {
            title:'Biểu đồ số lượng sản phẩm',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>