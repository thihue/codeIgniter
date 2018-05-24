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
<!-- https://blueimp.github.io/Gallery/ -->
<!-- https://miketricking.github.io/bootstrap-image-hover/ -->
<!-- https://www.w3schools.com/w3css/tryit.asp?filename=tryw3css_modal_gallery -->
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
	<!-- <form action="<?php echo base_url('sp/addsp')?>" name="form3" method="post" id="frm_add_sp"> -->
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
	<!-- </form> -->
</div>
<div id="myModalimage" class="modal fade" role="dialog">
	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">IMAGE</h4>
				</div>
				<div class="modal-body">
					
					<!-- <div id="image" > -->
					<div class="w3-row-padding">
					
					</div>
					
					<div class="clear" style="z-index: 9999">	</div>	
					<form method="post" id="upload_form" name="upload_form" align="center" enctype="multipart/form-data"> 
					<label for="file">Choose file to upload:</label>
					<input type="hidden" name="masp" id="masp"/>
					<input type="file" name="file" value="" id="file"/>
					<input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload"/>		
					</form>						
				</div>
				<div class="modal-footer">
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	
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
				list += '<div class="w3-container w3-five" style="position:relative"><img data-anh="'+item.anh+'" data-mahinh="'+item.mahinh+'" style="width:100; height:100; cursor:pointer" onclick="view(this)"  class="w3-hover-opacity" src="<?php echo base_url(); ?>pp/' + item.anh + '"/></div>';
			})
			$("#myModalimage .w3-row-padding").html(list);
		});
	});
	$(function(){
		$(document).on("mouseenter", ".w3-five", function(){
			
			$(this).append('<span class="glyphicon glyphicon-remove" onclick="delete_img(this)" style="top:0px;right: 0px;position: absolute;"></span>');
		});
		$(document).on("mouseleave", ".w3-five", function(){
			$(this).find("span").remove();
		});
	});
	function delete_img(ele){
		//let mahinh = $(ele).parent("div").find("img").data("mahinh");
		var form_data = {
			mahinh: $(ele).parent("div").find("img").data("mahinh"),
			anh: $(ele).parent("div").find("img").data("anh"),
		};
		// console.log(form_data);
		// return;
		$.ajax({
			url: "<?php echo base_url('hinh/delete_image') ?>",
			type: 'post',
			data: form_data,
			dataType: "JSON",
			success:function(data){
				let $mess = data.error_message;
				if(data.success){
					$(ele).parent("div").remove();
					messenger($mess);
				} else{
					$(".clear").html('Delete error!');
					messenger($mess);
				}
			}
		});
	}
	$('#upload_form').submit(function(e){
	//$("#upload").on('click',function(e) {
		e.preventDefault(); 
		// var file_data = $('#file').prop('files')[0];
		// var masp = $('#myModalimage #masp').val(); 
		// var form_data = new FormData();
		// form_data.append('masp', masp);
		// form_data.append('file', file_data);
        $.ajax({
            url: "<?php echo base_url('hinh/upload_image') ?>",
            dataType: 'json',
            cache: false,
			async:false,
            contentType: false,
            processData: false,
            data: new FormData(this),
            type: 'post',
            success:function(data){
				console.log(data);
				let $mess = data.error_message;
				if(data.success){
					messenger($mess);
					//$(".clear").html('<p>'+data.error_message+'</p>')
					$("#myModalimage .w3-row-padding").append('<div class="w3-container w3-five" style="position:relative"><img data-mahinh="'+data.tenhinh+'" data-mahinh="'+data.mahinh+'" style="width:100; height:100; cursor:pointer" onclick="view(this)"  class="w3-hover-opacity" src="<?php echo base_url(); ?>pp/' + data.tenhinh + '"/></div>');
					
				} else{
					messenger($mess);
				}
			}
        });
	});
	// function messenger($mess) {
	// 	$("#snackbar").text($mess);
	// 	$("#snackbar").addClass("show");
    // 	setTimeout(function(){
	// 					$("#snackbar").removeClass("show");
	// 				}, 3000);
	// }
</script>