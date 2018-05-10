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
		<?php foreach($list as $d) {
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
				<form action="<?php echo base_url('layout/edituser')?>" name="form2" method="post">
					<div id="myModal<?php echo $d['idUser'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit</h4>
								</div>
								<div class="modal-body">
									Nhap username:
									<?php echo $d['idUser'];  ?>
										<input type="hidden" name="id" value="<?php echo $d['idUser'];?>"/>
										<input type="text" value="<?php echo $d['username'] ?>" name="username"/><br>
										<input type="text" value="<?php echo $d['email'] ?>" name="email"/>	<br>
										<input type="text" value="<?php echo $d['diachi'] ?>" name="diachi"/><br>
										<input type="text" value="<?php echo $d['dienthoai'] ?>" name="dienthoai"/>
										<select name="idgroup">
											<option value="1" <?php if($d['id_group'] == 1 ) echo"selected='selected'" ?>>Quan tri</option>
											<option value="2" <?php if($d['id_group'] == 2 ) echo"selected='selected'" ?>>khach</option>						
										</select>								
								</div>
								<div class="modal-footer">
									<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
									<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</form>							
				<form action="<?php echo base_url('layout/deleteuser') ?>" name="form1" method="post">
					<div id="myModaldele<?php echo $d['idUser'] ?>" class="modal fade" role="dialog">
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
					</div>
				</form>
				<span class="glyphicon glyphicon-pencil" value="<?php echo $d['idUser'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $d['idUser'] ?>"></span>&nbsp;&nbsp;&nbsp;			
				<span class="glyphicon glyphicon-trash" value="<?php echo $d['idUser'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModaldele<?php echo $d['idUser'] ?>"></span>						
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
</div>
