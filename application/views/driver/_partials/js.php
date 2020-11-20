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
    $this->load->view('driver/'.$js_file);
  } ?>

  <script type="text/javascript">
    $(document).ready(function() {
      getNotif();

      $('#dropdownNotification').click(function(event) {
        $.get('<?= base_url() ?>/admin/Sewa/updateStatus/<?= $_SESSION['user_id'] ?>', function(data, textStatus, xhr) {});
      });
    });

    function getNotif() {
      $.get('<?= base_url() ?>/admin/Sewa/getUserNotif/<?= $_SESSION['user_id'] ?>', function(data, textStatus, xhr) {
        data = JSON.parse(data);
        // console.log(data);

        var count = 0;
        data.forEach((item, i) => {
          if (item.status_notif == '1') {
            count++;
          }
        });

        if (count) {
          $('#count-notif').text(count);
        }else {
          $('#count-notif').text('');
        }

        $('#notif-container').empty();
        for (var i = 0; i < data.length; i++) {
          var k = Date.parse( data[i].created_at );
          var now = Date.parse(Date());
          var diff = now - k;

          $('#notif-container').append(`<div class="dropdown-item d-flex">
              <div class="notification-icon"><i class="i-Receipt-3 text-success mr-1"></i></div>
              <div class="notification-details flex-grow-1">
                  <p class="m-0 d-flex align-items-center">
                    <span>${data[i].subject}</span><span class="badge badge-pill badge-success ml-1 mr-1">new</span>
                    <span class="flex-grow-1"></span><span class="text-small text-muted ml-auto">${msToTime(diff)}</span>
                  </p>
                  <p class="text-small text-muted m-0">${data[i].message}</p>
              </div>
          </div>`);
        }

        setTimeout(()=>{getNotif()}, 15000);

      });
    }

    function msToTime(duration) {
      var minutes = Math.floor((duration / (1000 * 60)) % 60),
        hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

      if (hours == '00' || hours == '0') {
        return minutes + " minutes ago";
      }

      return hours + " hours " + minutes + " minutes ago";
    }

    // ================== function for tracking driver ================================

    var id_driver = '<?= $_SESSION['id']; ?>';

  	$.get('<?= base_url() ?>driver/Dashboard/isDriving/' + id_driver, function(data, textStatus, xhr) {
  			// console.log(data);

  			if (data == 1) {
  				if (navigator.geolocation) {
            // alert('navigator.geolocation works');
  					console.log('navigator.geolocation works');
  					console.log("start tracking driver");
  					navigator.geolocation.watchPosition(sendData, errorCallback);
  				} else {
  					// document.write(' FATAL - ERROR navigator.geolocation need to be enabled ');
  					console.log(' FATAL - ERROR navigator.geolocation need to be enabled ');
  					alert('tidak dapat mengakses lokasi');
  				}
  			}else {
  				// console.log("driver not in a trip");
  			}

  	});

  	function sendData(position) {
  		console.log(position);
      // alert(position);

  		var payload = {
  			id_driver: id_driver,
  			latitude: position.coords.latitude,
  			longitude: position.coords.longitude
  		}

  		$.post('<?= base_url() ?>driver/Dashboard/updateNewLocation', payload, function(data, textStatus, xhr) {
  			console.log("update result : "+data);
  		});
  	}

  	function errorCallback(err) {
  		console.log(err);
  	}
  </script>
 	</body>

 	</html>
