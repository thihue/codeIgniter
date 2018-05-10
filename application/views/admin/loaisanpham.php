
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Ma loai</td>
            <td>Ten loai</td>
            <td>Manage</td>			
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $d) { ?>
		<tr>
			<td>
				<?php echo $d['maloai'] ?>
			</td>
			<td>
				<?php echo $d['tenloai'] ?>
			</td>			
			<td align="center" width="100">
            	
				<form action="<?php echo base_url('loaisp/editloai')?>" name="form2" method="post">
					<div id="myModal<?php echo $d['maloai'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit</h4>
								</div>
								<div class="modal-body">
                                        <input type="hidden" name="ma" value="<?php echo $d['maloai'] ?>"/>
										<input type="text" name="ma1" value="<?php echo $d['maloai'] ?>" disabled/><br>
										<input type="text" value="<?php echo $d['tenloai'] ?>" name="tenloai"/>									
								</div>
								<div class="modal-footer">
									<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
									<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</form>							
				<form action="<?php echo base_url('loaisp/deleteloai') ?>" name="form1" method="post">
					<div id="myModaldele<?php echo $d['maloai'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete</h4>
								</div>
								<div class="modal-body">
									<input type="hidden" name="ma" value="<?php echo $d['maloai'] ?>"/> 
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
				<span class="glyphicon glyphicon-pencil" value="<?php echo $d['maloai'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal<?php echo $d['maloai'] ?>"></span>&nbsp;&nbsp;&nbsp;			
				<span class="glyphicon glyphicon-trash" value="<?php echo $d['maloai'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModaldele<?php echo $d['maloai'] ?>"></span>						
			</td>			
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
            <td>Ma loai</td>
            <td>Ten loai</td>
            <td>
                
                mana
            </td>	
		</tr>
	</tfoot>
</table>
<form action="<?php echo base_url('loaisp/addloai')?>" name="form2" method="post">
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
</div>
