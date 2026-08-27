<div class="row2">
    <div class="font_title">
        <h1><i class="fa-solid fa-chart-pie"></i> BIỂU ĐỒ TỶ LỆ SẢN PHẨM THEO DANH MỤC</h1>
        <a href="index.php?act=thongke" class="btn btn-secondary" style="padding: 8px 16px; font-size: 13.5px;"><i class="fa-solid fa-table"></i> Bảng số liệu thống kê</a>
    </div>

    <div class="form_content" style="padding: 25px; text-align: center;">
        <div id="piechart_3d" style="width: 100%; height: 500px; margin: 0 auto;"></div>

        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Số lượng sản phẩm'],
                    <?php
                    if (!empty($dsthongke)) {
                        foreach ($dsthongke as $tk) {
                            echo "['" . addslashes($tk['name']) . "', " . (int)$tk['soluong'] . "],";
                        }
                    }
                    ?>
                ]);

                var options = {
                    title: 'Phần trăm số lượng sản phẩm theo từng danh mục',
                    is3D: true,
                    fontSize: 14,
                    fontName: 'Plus Jakarta Sans',
                    chartArea: {width: '85%', height: '80%'},
                    colors: ['#4f46e5', '#0ea5e9', '#10b981', '#f59e0b', '#f43f5e', '#8b5cf6', '#06b6d4']
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>
