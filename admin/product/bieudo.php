<div class="row2">
    <div class="row2 font_title">
      <h1>Biểu đồ</h1>
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
            ['Danh Mục', 'Số Lượng'],
        <?php   
        
        foreach($listsanpham as $sanpham){
          extract($sanpham);
          echo "['$genre_name',$soBinhLuan],";

        }
        
        ?>  
          ]);

// Set Options
          const options = {
            title:'Biểu đồ bình luận sản phẩm',
            is3D:true
          };

// Draw
          const chart = new google.visualization.PieChart(document.getElementById('myChart'));
          chart.draw(data, options);

        }
      </script>

    </div>
  </div>