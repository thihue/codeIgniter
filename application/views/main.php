<!DOCTYPE html>
<html>

<head>
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

		table tbody {
			color: blue;
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
</head>
<body>
	<div class="container">
		<p class="text-center" style="padding-top: 15px;">Xin chào
			<span style="color: red">
				<?php echo $this->session->userdata('login');?>
			</span>
		</p>
		<a href="<?php echo site_url(" user/logout ");?>">
			<i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<td>ID</td>
					<td>Username</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($list as $d){ ?>
				<tr>
					<td>
						<?php echo $d['id'] ?>
					</td>
					<td>
						<?php echo $d['username'] ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<td>ID</td>
					<td>Username</td>
				</tr>
			</tfoot>
		</table>
	</div>
</body>
</html>
