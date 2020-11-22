<script type="text/javascript">
  var map;
  var last_update_time;
  var tmeout;
  var carMarker;

  function initMap() {
    map = L.map('mapid').setView([-6.914744, 107.609810], 14)

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    	maxZoom: 19,
    	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

  }

  function updateMap(data) {
    let latLng = [data.latitude, data.longitude];

    var myIcon = L.icon({
      iconUrl: '<?= base_url() ?>assets/images/marker-user.png',
      iconSize: [50, 58], // size of the icon
    });

    carMarker = L.marker(latLng, {icon: myIcon}).addTo(map);
    map.panTo(latLng);
  }

  function lacakDriver(id_driver) {
    $.post('<?= base_url() ?>admin/Sewa/getDriverLocation/' + id_driver + '/' + last_update_time , function(data, textStatus, xhr) {
      // console.log(data);
      // console.log("driver id "+ id_driver);
      if (data != 0) {
        data = JSON.parse(data);
        last_update_time = data.gps_update_time;
        $('#lacak-last-update').text(data.gps_update_time);

        if (carMarker) {
          carMarker.remove();
        }

        updateMap(data);
      }
      // console.log(last_update_time);
      tmeout = setTimeout(()=>{
        lacakDriver(id_driver, last_update_time);
      }, 5000);
    });
  }

  function openLacak(id_driver, tgl, driver, tujuan) {
    $('#lacak-driver').text(`"${driver}"`);
    $('#lacak-lokasi').text(`"${tujuan}"`);
    $('#lacak-last-update').text(`${tgl}`);

    clearTimeout(tmeout);
    last_update_time = tgl;

    if (!map) {
      $('#lacakDriver').show();
      initMap();
    }
    
    lacakDriver(id_driver);
  }
</script>
