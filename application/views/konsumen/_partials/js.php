 	<script src="<?= base_url() ?>assets/js/plugins/jquery-3.3.1.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/plugins/bootstrap.bundle.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/script.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/sidebar-horizontal.script.js"></script>
 	<script src="<?= base_url() ?>assets/js/plugins/echarts.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/echart.options.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/dashboard.v1.script.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/plugins/datatables.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/datatables.script.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/scripts/customizer.script.min.js"></script>
 	<script src="<?= base_url() ?>assets/js/plugins/rater.min.js"></script>

  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      var options = {
                max_value: 5,
                step_size: 1,
            }

      $(".rate-bintang").rate(options);

  		$(".rate-bintang").on("change", function(ev, data){
  		    $('.rating-value').val(data.to);
  		});
    });
  </script>
 	</body>

 	</html>
