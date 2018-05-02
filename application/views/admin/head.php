<title>
		<?php echo $tit; ?>
	</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.12.4.js" rel="stylesheet"></script>
	<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="http://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script>
		$(document).ready(function () {
			$('#example').DataTable();
		});

	</script>
	<style>
		/* @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css);
        @import url(https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css); */

		table tbody{
			color: blue;
        
		}
        table tbody tr:hover{
            color:red;
            /* background: blue; */
        }
		table thead {
			color: white;
			background: black;
		}

		table tfoot {
			color: white;
			background: black;
		}

	</style>