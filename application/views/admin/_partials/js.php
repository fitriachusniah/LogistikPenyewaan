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

  <?php if (isset($js_file)) {
    $this->load->view('admin/'.$js_file);
  } ?>
 	</body>

 	</html>
