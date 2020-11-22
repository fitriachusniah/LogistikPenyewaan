<script>
    $(document).ready(function() {

      $.get('<?= base_url('admin/Dashboard/getDriverData/') ?>', function(data, textStatus, xhr) {
        data = JSON.parse(data);

        var max = Math.max.apply(null, data.trip);
        var min = Math.min.apply(null, data.trip);

        max+=5;

        var echartElemBar = document.getElementById("dashboardChart");

        if (echartElemBar) {
          var echartBar = echarts.init(echartElemBar);
          echartBar.setOption({
            legend: {
              borderRadius: 0,
              orient: "horizontal",
              x: "right",
              // data: ["Online", "Offline"],
            },
            grid: {
              left: "8px",
              right: "8px",
              bottom: "0",
              containLabel: true,
            },
            tooltip: {
              show: true,
              backgroundColor: "rgba(0, 0, 0, .8)",
            },
            xAxis: [
              {
                type: "category",
                data: data.driver,
                axisTick: {
                  alignWithLabel: true,
                },
                splitLine: {
                  show: false,
                },
                axisLine: {
                  show: true,
                },
              },
            ],
            yAxis: [
              {
                type: "value",
                axisLabel: {
                  formatter: "{value}",
                },
                min: 0,
                max: max,
                // interval: 1,
                axisLine: {
                  show: false,
                },
                splitLine: {
                  show: true,
                  interval: "auto",
                },
              },
            ],
            series: [
              {
                name: "Trip Driver",
                data: data.trip,
                label: {
                  show: false,
                  color: "#639",
                },
                type: "bar",
                color: "#7569b3",
                smooth: true,
                itemStyle: {
                  emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowOffsetY: -2,
                    shadowColor: "rgba(0, 0, 0, 0.3)",
                  },
                },
              },
            ],
          });
          $(window).on("resize", function () {
            setTimeout(function () {
              echartBar.resize();
            }, 500);
          });

          echartBar.on('click', function (params) {
            // console.log(params);
            var id = data.id[params.dataIndex];
            window.open('tripDetail/' + id, '_self');
          });
        } // Chart in Dashboard version 1
      });

    });

      // Chart in Dashboard version 1
    // window.onload = function() {
    //   if (window.jQuery) {
    //       // jQuery is loaded
    //       alert("Yeah!");
    //   } else {
    //       // jQuery is not loaded
    //       alert("Doesn't Work");
    //   }
    // }


</script>
