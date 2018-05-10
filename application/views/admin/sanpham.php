<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Ma san pham</td>
			<td>Tên sản phẩm</td>
			<td>Loại sản phẩm</td>
			<td>Số lượng tồn</td>
			<td>Nha san xuat</td>
			<td>Đơn giá</td>
			<td>Hinh</td>
			<td>Mo ta</td>
			<td>manage</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $d) {
			?>
		<tr>
			<td>
				<?php echo $d['masp'] ?>
			</td>
			<td>
				<?php echo $d['tensp'] ?>
			</td>
			<td>
			Loại sản phẩm<?php //echo $d['tensp'] ?>
			</td>
			<td>
				<?php echo $d['soluongton'] ?>
			</td>
			<td>
				<?php echo $d['nhasx'] ?>
			</td>
			<td>
				<?php echo $d['dongia'] ?>
			</td>
			<td>
				<img src="<?php echo $d['hinh'] ?>"/>
			</td>
			<td>
				<?php echo $d['mota'] ?>
			</td>
			<td align="center" width="100">
				<form action="<?php //echo base_url('layout/edituser')?>" name="form2" method="post">
					<div id="myModal<?php //echo $d['id'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit</h4>
								</div>
								<div class="modal-body">
									Nhap username:
									<?php //$id= $d['id']; 
									//echo $id ?>
										<input type="hidden" name="id" value="<?php //echo $id?>"/>
										<input type="text" value="<?php //echo $d['username'] ?>" name="username"/>									
								</div>
								<div class="modal-footer">
									<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
									<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</form>							
				<form action="<?php //echo base_url('layout/deleteuser') ?>" name="form1" method="post">
					<div id="myModal1<?php //echo $d['id'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete</h4>
								</div>
								<div class="modal-body">
									<?php //$id= $d['id']; 
									//echo $id ?>
									<input type="hidden" name="id" value="<?php //echo $id?>"/> 
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
				<span class="glyphicon glyphicon-pencil" value="<?php //echo $d['id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php //echo $d['id'] ?>"></span>&nbsp;&nbsp;&nbsp;			
				<span class="glyphicon glyphicon-trash" value="<?php //echo $d['id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal1<?php //echo $d['id'] ?>"></span>						
			</td>			
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td>Ma san pham</td>
			<td>Tên sản phẩm</td>
			<td>Loại sản phẩm</td>
			<td>Số lượng tồn</td>
			<td>Nha san xuat</td>
			<td>Đơn giá</td>
			<td>Hinh</td>
			<td>Mo ta</td>
			<td>manage</td>
		</tr>
	</tfoot>
</table>
</div>
