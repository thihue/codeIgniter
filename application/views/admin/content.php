<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Username</td>
			<td>Email</td>
			<td>Dia chi</td>
			<td>So dt</td>
			<td>Quyen</td>
			<td>Manage</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $d) { $id = $d['idUser'];
			?>
		<tr>
			<td>
				<?php echo $d['idUser'] ?>
			</td>
			<td>
				<?php echo $d['username'] ?>
			</td>
			<td><?php echo $d['email'] ?></td>
			<td><?php echo $d['diachi'] ?></td>
			<td><?php echo $d['dienthoai'] ?></td>
			<td><?php if($d['id_group']==1) echo "Quan tri vien"; else echo"khach" ?></td>
			<td align="center" width="100">
				<span class="glyphicon glyphicon-pencil btnEdit" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;			
				<span class="glyphicon glyphicon-trash btnDelete" aria-hidden="true" data-toggle="modal" data-target="#myModaldele"></span>						
			</td>			
		</tr>
		
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td>ID</td>
			<td>Username</td>
			<td>Email</td>
			<td>Dia chi</td>
			<td>So dt</td>
			<td>Quyen</td>
			<td>Manage</td>
		</tr>
	</tfoot>
</table>

	<div id="myModal" class="modal fade" role="dialog">
		<form action="<?php echo base_url('layout/edit')?>" name="form2" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit</h4>
					</div>
					<div class="modal-body">
						Nhap username:
							<input type="hidden" name="id" value=""/>
							<input type="text" value="" name="username"/><br>
							<input type="text" value="" name="email"/>	<br>
							<input type="text" value="" name="diachi"/><br>
							<input type="text" value="" name="dienthoai"/>
							<select name="idgroup">
								<option value="1" >Quan tri vien</option>
								<option value="2">khach</option>						
							</select>								
					</div>
					<?php echo $this->session->flashdata('flash_message'); ?>
					<div class="modal-footer">
						<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
						<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div id="myModaldele" class="modal fade" role="dialog">
		<form action="<?php echo base_url('layout/deleteuser') ?>" name="form1" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Delete</h4>
					</div>
					<div class="modal-body">
						<?php echo $d['idUser']; ?>
						<input type="hidden" name="id" value="<?php echo $d['idUser']?>"/>
						<input type="hidden" name="user" value="<?php echo $d['username']?>"/>
						Ban co chac chan muon xoa khong?
					</div>
					<div class="modal-footer">
						<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
						<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</form>
	</div>
<script type="text/javascript">						
	$(document).ready(function(){
		$(".btnEdit").click(function(){
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			let username = dtRow[1];
			let email = dtRow[2];
			let diachi = dtRow[3];
			let dienthoai = dtRow[4];
			let idgroup = dtRow[5]=="khach"?"2":"1";
			$("input[name=id]").val(id);
			$("input[name=username]").val(username);
			$("input[name=email]").val(email);
			$("input[name=diachi]").val(diachi);
			$("input[name=dienthoai]").val(dienthoai);
			$("#myModal select").val(idgroup);
			// $("div.id_100 select").val(idgroup);
			$("#myModal").modal('show');
			
		});
		$(".btnDelete").click(function(){
			$("#myModaldele").modal();
		});
	});

	$(document).ready(function() {
    	$(".ok").click(function(event) {
			$.ajax({
				url : "<?php echo base_url('layout/edit'); ?>",
				type : "POST",
				dataType : "json",
				data : {"username" : username, "email" : email},
				success : function(data) {
					
				},
				error : function(data) {
					
				}
			});
		});
    });
</script>
