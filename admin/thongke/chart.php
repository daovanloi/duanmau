<article>
<h5 class="alert alert-success mt-3">Thống kê hàng hóa từng loại</h5>
<div id="myChart" style="width:100%; max-width:1100px; height:550px;">
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            $tongdm = count($listtk);
            $i = 1;
            foreach ($listtk as $tk) {
                extract($tk);
                if ($i == $tongdm) {
                    $dauphay = "";
                } else {
                    $dauphay = ",";
                }
                echo "['" . $tk['tendm'] . "'," . $tk['countsp'] . "]" . $dauphay;
                $i++;
            }
            ?>
        ]);

        var options = {
            title: 'Biểu đồ thống kê hàng hóa'
        };
        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
</article>