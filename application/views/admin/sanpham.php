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
			<?php foreach($loai as $d1) {
				if($d1['maloai']==$d['maloai']) echo $d1['tenloai'];
			}?>
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
			<td width="50" height="50">
				<img src="../pp/<?php echo $d['hinh'] ?>" width="50" height="50"/>
			</td>
			<td>
				<?php echo $d['mota'] ?>
			</td>
			<td align="center" width="100">
				<form action="<?php echo base_url('sp/editsp')?>" name="form2" method="post">
					<div id="myModal<?php echo $d['masp'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit</h4>
								</div>
								<div class="modal-body">
										<input type="hidden" name="ma" value="<?php echo $d['masp']?>"/>
									<p>Tên sản phẩm: <textarea  rows="2" cols="40" name="tensp"><?php echo $d['tensp'] ?></textarea></p>
									<p>Don gia <input type="text" value="<?php echo $d['dongia'] ?>" name="dongia"/></p>
									<p>Nha san xuat <input type="text" value="<?php echo $d['nhasx'] ?>" name="nhasx"/></p>
									<p>Mo ta:<textarea  rows="10" cols="40" name="mota"><?php echo $d['mota'] ?></textarea> </p>								
								</div>
								<div class="modal-footer">
									<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
									<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</form>							
				<form action="<?php echo base_url('sp/deletesp') ?>" name="form1" method="post">
					<div id="myModaldele<?php echo $d['masp'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete</h4>
								</div>
								<div class="modal-body">
									<input type="hidden" name="ma" value="<?php echo $d['masp'] ?>"/> 
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
				<span class="glyphicon glyphicon-pencil" value="<?php echo $d['masp'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $d['masp'] ?>"></span>&nbsp;&nbsp;&nbsp;			
				<span class="glyphicon glyphicon-trash" value="<?php //echo $d['id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModaldele<?php echo $d['masp'] ?>"></span>						
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
<form action="<?php echo base_url('sp/addsp')?>" name="form2" method="post">
	<div id="myModaladd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add</h4>
				</div>
				<div class="modal-body">
						<p>Ma loai: <input type="text" name="ma" value="" /></p>
						Ten loai: <input type="text" value="" name="tenloai"/>									
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<button type="button" class="btn btn-primary" value="" aria-hidden="true" data-toggle="modal" data-target="#myModaladd">Them</button>
