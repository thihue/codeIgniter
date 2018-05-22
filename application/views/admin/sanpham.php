<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Ma san pham</td>
			<td>Tên sản phẩm</td>
			<td>Loại sản phẩm</td>
			<td>Số lượng tồn</td>
			<td>Nha san xuat</td>
			<td>Đơn giá</td>
			<td>maloai</td>
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
			<?php  echo $d['tenloai'];?>
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
				
				<?php echo $d['maloai'] ?>
			</td>
			<td>
				<?php echo $d['mota'] ?>
			</td>
			<td align="center" width="80">
				<span class="glyphicon glyphicon-picture btn_image" value="" aria-hidden="true" title="Hình ảnh" ></span>&nbsp;&nbsp;
				<span class="glyphicon glyphicon-pencil btn_edit" value="" aria-hidden="true" ></span>&nbsp;&nbsp;		
				<span class="glyphicon glyphicon-trash btn_delete" value="" aria-hidden="true"></span>						
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
			<td>maloai</td>
			<td>Mo ta</td>
			<td>manage</td>
		</tr>
	</tfoot>
</table>

<div id="myModaledit" class="modal fade" role="dialog">
	<form action="<?php echo base_url('sp/editsp')?>" name="form1" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="masp" id="masp"/>
					<p>Tên sản phẩm: <textarea rows="2" cols="40" id="tensp" name="tensp"><?php echo set_value('tensp'); ?></textarea></p>
					Chon loại san pham:
					<select name="loaisp" id="loaisp" >	
						<?php foreach ($loai as $l){ ?>
							<option 
								value="<?php echo $l['maloai'] ?>" 
							>
								<?php echo $l['tenloai'] ?>
							</option>
						<?php }  ?>
					</select><br>
					<p>Don gia: <input type="number" id="dongia" value="<?php echo set_value('dongia'); ?>" name="dongia"/></p>
					<p>Nha san xuat: <input type="text" id="nhasx" value="<?php echo set_value('nhasx'); ?>" name="nhasx"/></p>
					<p>Mo ta:<textarea  rows="10" cols="40" id="mota" name="mota"><?php echo set_value('mota'); ?></textarea> </p>
					<div id="alert-msg"></div>								
				</div>
				<div class="modal-footer">
					<input type="button" name="submit_edit" id="submit_edit" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>
														
<div id="myModaldele" class="modal fade" role="dialog">
	<form action="<?php echo base_url('sp/deletesp') ?>" name="form2" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="masp" value=""/> 
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
				
<div id="myModaladd" class="modal fade" role="dialog">
	<form action="<?php echo base_url('sp/addsp')?>" name="form3" method="post" id="frm_add_sp">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php echo form_open();?>
				<div class="modal-header">
					<h4 class="modal-title">Add</h4>
				</div>
				<div class="modal-body">
					Chon loại san pham:
					<select name="loaisp" id="loaisp">
						<?php foreach ($loai as $l){ ?>
							<option value="<?php echo $l['maloai'] ?>"><?php echo $l['tenloai'] ?></option>
						<?php }  ?>
					</select><br>
					<div id="loai"></div>
					<p>Tên sản phẩm: <textarea rows="2" cols="40" id="tensp" name="tensp"><?php echo set_value('tensp'); ?></textarea></p>
					<p>Don gia: <input type="number" id="dongia" value="<?php echo set_value('dongia'); ?>" name="dongia"/></p>
					<p>Nha san xuat: <input type="text" id="nhasx" value="<?php echo set_value('nhasx'); ?>" name="nhasx"/></p>
					<p>Mo ta:<textarea  rows="10" cols="40" id="mota" name="mota"><?php echo set_value('mota'); ?></textarea> </p>
					<div id="alert-msg"></div>
				</div>
				<div class="modal-footer">
					<input type="button" id="submit_add" name="submit_add" class="btn btn-primary" value='ok' />
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<?php echo form_close(); ?> 
			</div>
		</div>
	</form>
</div>
<div id="myModalimage" class="modal fade" role="dialog">
	<form action="<?php echo base_url('sp/deletesp') ?>" name="form2" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">IMAGE</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="masp" id="masp"/>
					<div id="image" class="row">
						<!-- <div class="w3-row-padding"> -->
						<div id="hinh">
							
						</div>						
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>
<button type="button" class="btn btn-primary btn_add" value="" aria-hidden="true">Them</button>
<script type="text/javascript">
	$('.btn_add').click(function(){
		$('#myModaladd #tensp').val('');
		$('#myModaladd #dongia').val('');
		$('#myModaladd #nhasx').val('');
		$('#myModaladd #mota').val('');
		$('#myModaladd').modal('show');
	});
	// function myFunction() {
	// 	var x = document.getElementById("loaisp").value;
	// 	document.getElementById("loai").innerHTML = "<input type='hidden' id='maloai' name='maloai' value='"+ x +"' />";
	// }
	$('#myModaladd #submit_add').click(function(){
		var form_data = {
			loaisp: $('#myModaladd #loaisp option:selected').val(),
			tensp: $('#myModaladd #tensp').val(),
			dongia: $('#myModaladd #dongia').val(),
			nhasx: $('#myModaladd #nhasx').val(),
			mota: $('#myModaladd #mota').val()
		};
		// form_data = JSON.stringify($('#frm_add_sp').serializeArray());
		$.ajax({
			url: "<?php echo base_url('sp/addsp'); ?>",
			type: 'POST',
			data: form_data,
			dataType: "json",
			success: function(data) {
				console.log(data);		
				if(data.success){
					$('#myModaladd #alert-msg').html('<div class="alert alert-success text-center">Them san pham thanh cong!</div>');
					$("#myModaladd").modal('hide');
					location.reload();
				}
				else{
					$('#myModaladd #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
				}		
			}
		});
	});
	$('#example').on("click", ".btn_delete", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		$("#myModaldele input[name=masp]").val(id);
		$("#myModaldele").modal();
	});	
	$('#example').on("click", ".btn_edit", function(){
		let row = $(this).closest("tr");
		let dataTable = $("#example").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let masp = dtRow[0];
		let tensp = dtRow[1];
		let nhasx = dtRow[4];
		let dongia = dtRow[5];
		let maloai = dtRow[6];
		let mota = dtRow[7];
		$("#myModaledit input[name=masp]").val(masp);
		$("#myModaledit textarea[name=tensp]").val(tensp);	
		$("#myModaledit input[name=nhasx]").val(nhasx);
		$("#myModaledit input[name=dongia]").val(dongia);
		$("#myModaledit textarea[name=mota]").val(mota);
		$("#myModaledit #loaisp").val(maloai);
		$('#myModaledit').modal('show');
	});
	$('#myModaledit').on("click", "#submit_edit", function(){
		var form_data = {
			masp: $("#myModaledit input[name=masp]").val(),
			tensp: $("#myModaledit textarea[name=tensp]").val(),
			loaisp: $("#myModaledit #loaisp option:selected").val(),
			dongia: $("#myModaledit input[name=dongia]").val(),
			nhasx: $("#myModaledit input[name=nhasx]").val(),
			mota: $("#myModaledit textarea[name=mota]").val()
		};
		$.ajax({
			url: "<?php echo base_url('sp/editsp') ?>",
			type: 'post',
			dataType: 'json',
			data: form_data,
			success:function(data){
				if(data.success){
					$('#myModaledit #alert-msg').html('<div class="alert alert-success text-center">Sua san pham thanh cong!</div>');
					$("#myModaledit").modal('hide');
					location.reload();
				} 
				else{
					$('#myModaledit #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
				}
			}
		});
	});
	$('#example').on("click", ".btn_image", function(){
		$('#myModalimage').modal('show');
		let row = $(this).closest("tr");
		let dataTable = $("#example").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let masp = dtRow[0];
		$("#myModalimage input[name=masp]").val(masp);
		let form_data = {
			masp: $('#myModalimage #masp').val()
		};
		$.ajax({
			url: "<?php echo base_url('hinh/load_image') ?>",
			type: 'post',
			data: form_data,
			dataType: "JSON",
		}).done(function(data){
			console.log(data);
			let list = "";
			data.forEach(function(item){
				list += '<div class="w3-container w3-third"> <img style="width:100; height:100; cursor:pointer" onclick="onClick(this)" class="w3-hover-opacity" src="<?php echo base_url(); ?>pp/' + item.anh + '"/> </div>';
			})
			$("#myModalimage #hinh").html(list);
		});
	});
</script>