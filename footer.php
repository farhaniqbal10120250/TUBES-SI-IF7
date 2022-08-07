<?php 

require_once '_config/config.php';

if(!isset($_SESSION['admin'])) {
	header("Location: auth/login.php");
	exit;
}

?>

</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="<?= base_url('_assets/libs/datatables/datatables.min.js') ?>"></script>
<script>
    
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    $("#select_all").on('click', function() {
    	if(this.checked) {
    		$('.checked').each(function(){
    			this.checked = true;
    		});
    	} else {
    		$('.checked').each(function(){
    			this.checked = false;
    		});
    	}
    });

    $(".checked").on('click', function(){
    	if($('.checked:checked').length == $('.checked').length){
    		$('#select_all').prop('checked', true);
    	} else {
    		$('#select_all').prop('checked', false);
    	}
    });

    // function edit javascript
    function edit() {
    	document.proses.action = 'update.php';
    	document.proses.submit();
    }

    // function hapus
    function hapus() {
    	var conf = confirm('Apakah ingin dihapus ?');
    	if(conf) {
    		document.proses.action = 'delete.php';
    		document.proses.submit();
    	}
    }

    // data tables
    $(document).ready( function () {
        $('#table_dokter').DataTable( {
            columnDefs: [
                {
                    "orderable" : false,
                    "targets" : [0]
                },
                {
                    "orderable" : false,
                    "targets" : [6]
                }
            ]
        } );
    });

    $(document).ready( function () {
        $('#table_rekammedis').DataTable( {
            columnDefs: [
                {
                    "orderable" : false,
                    "targets" : [0]
                },
                {
                    "orderable" : false,
                    "targets" : [8]
                }
            ]
        } );
    });

    // data tables server side
    $(document).ready(function() {
        $('#table_pasien').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "pasien_data.php",
            // untuk export
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    oriented: 'potrait',
                    pageSize: 'Legal',
                    title: 'Data Pasien',
                    download: 'open'
                },
                'csv', 'excel', 'print', 'copy'
            ],
            columnDefs: [
                {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 5,
                    "render" : function(data, type, row) {
                        var btn = "<td>" + "<center>" +
                        "<a href=\"update.php?id_pasien=" + data +"\" class=\"btn btn-warning\"><i class=\"fa fa-pencil\"></i></a>"+
                        " <a href=\"delete.php?id_pasien=" + data +"\" class=\"btn btn-danger\" onclick=\"return confirm('Apakah ingin Menghapus ?')\"><i class=\"fa fa-trash\"></i></a>" + "</center>" +
                        "</td>";
                        return btn;
                    }
                }
            ]
        } );
    } );

</script>
</body>
</html>
