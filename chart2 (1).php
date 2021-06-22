<?php include "template/header.php" ?>
<?php include "penghubung.php" ?>

<!-- Start content -->
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title float-left">Example Pak Irwan</h4>

          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-12">
        <div class="card-box">
          <div class="m-t-30" id="container"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card-box">

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="card-box">
          <div class="m-t-10">
            <div id="2006" class="ct-chart ct-golden-section"></div>
          </div>
        </div>
      </div>

    </div>


  </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript">
  // Create the chart
  Highcharts.chart('container', {
    chart: {
      type: 'pie'
    },
    title: {
      text: 'Persentase Nilai Penjualan (WH Sakila) - Semua Kategori'
    },
    subtitle: {
      text: 'Klik di potongan kue untuk melihat detil nilai penjualan kategori berdasarkan bulan'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      },
      point: {
        valueSuffix: '%'
      }
    },

    plotOptions: {
      series: {
        dataLabels: {
          enabled: true,
          format: '{point.name}: {point.y:.1f}%'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total</br>'
    },

    series: [{
      name: "Pendapatan By Kategori",
      colorByPoint: true,
      data: <?php
            //TEKNIK GA JELAS

            $datanya = $json_sum_tahun;
            $data1 = str_replace('["', '{"', $datanya);
            $data2 = str_replace('"]', '"}', $data1);
            $data3 = str_replace('[[', '[', $data2);
            $data4 = str_replace(']]', ']', $data3);
            $data5 = str_replace(':', '" : "', $data4);
            $data6 = str_replace('"name"', 'name', $data5);
            $data7 = str_replace('"drilldown"', 'drilldown', $data6);
            $data8 = str_replace('"y"', 'y', $data7);
            $data9 = str_replace('",', ',', $data8);
            $data10 = str_replace(',y', '",y', $data9);
            $data11 = str_replace(',y : "', ',y : ', $data10);
            echo $data11;
            ?>

    }],
    drilldown: {
      series: [

        <?php
        //TEKNIK CLEAN
        // echo $string_data;

        ?>



      ]
    }
  });

  Highcharts.chart('2006', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Tahun 2006'
    },
    subtitle: {
      text: ''
    },
    xAxis: {
      categories: [<?= $data05[2]; ?>],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Rainfall (mm)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'Tokyo',
      data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }]
  });
</script>

<?php include "template/footer.php" ?>