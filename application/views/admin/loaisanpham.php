
<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>Mã loại</td>
            <td>Tên loại</td>
            <td>Tác vụ</td>			
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
				<span class="glyphicon glyphicon-pencil btn_edit" value="" aria-hidden="true" title="Chỉnh sửa"></span>&nbsp;&nbsp;&nbsp;	
				<span class="glyphicon glyphicon-trash btn_delete" value="" aria-hidden="true" title="Xóa"></span>						
			</td>			
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td>Mã loại</td>
            <td>Tên loại</td>
            <td>Tác vụ</td>
		</tr>
	</tfoot>
</table>

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo form_open();?>
			<div class="modal-header">
				<h4 class="modal-title">CHỈNH SỬA</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<input type="hidden" class="hidden" name="ma1" id="ma1" value="" />  
					<div class="form-group">             
						<label for="maan">Mã loại:</label><input class="form-control" type="text" name="maan" id="maan" value="" disabled/>
					</div>
					<div class="form-group">
						<label for="tenloai">Tên loại:</label><input class="form-control" type="text" value="<?php echo set_value('tenloai'); ?>" id="tenloai" name="tenloai"/>
					</div>
				</div>
				<div id="alert-msg" ></div>
			</div>
			<div class="modal-footer">
				<input type="button" name="submit_edit" id="submit_edit" class="btn btn-primary" value="ok"/>
				<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>  
		</div>
	</div>
</div>
						
<div id="myModaldele" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">XÓA</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<input type="hidden" id="ma" name="ma" value=""/> 
					Bạn có chắc chắn muốn xóa không?		
				</div>
				<div id="alert-msg" ></div>
			</div>
			<div class="modal-footer">
				<input type="button" id="submit_delete" name="ok" class="btn btn-primary" value="ok"/>
				<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div id="myModaladd" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<?php echo form_open();?>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">THÊM LOẠI SẢN PHẨM</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="form-group">
						<label for="ma">Mã loại:</label><input class="form-control" type="text" name="ma_add" id="ma_add" value="<?php echo set_value('ma_add'); ?>" />
					</div>	
					<div class="form-group">	
						<label for="tenloai">Tên loại:</label><input class="form-control" type="text" name="ten_add" id="ten_add" value="<?php echo set_value('ten_add'); ?>"/>		
					</div>					
				</div>
				<div id="alert-msg" ></div>				
			</div>
			<div class="modal-footer">
				<input type="button" name="submit_add" id="submit_add" class="btn btn-primary" value="ok"/>
				<button type="button" name="close" class="btn btn-default" data-dismiss="modal" >Đóng</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<button type="button" class="btn btn-primary btn_add" value="" aria-hidden="true" title="Thêm" >Thêm</button>
<script type="text/javascript">						
	$(document).ready(function(){
		$("#example").on('click','.btn_edit', function(){
			$('#myModal #alert-msg').html('');
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			let tenloai = dtRow[1];
			$("#myModal input[name=maan]").val(id);
			$("#myModal input[name=ma1]").val(id);
			$("#myModal input[name=tenloai]").val(tenloai);
			// $("div.id_100 select").val(idgroup);
			$("#myModal").modal('show');
		});
		$('#myModal').on('click','#submit_edit', function(){
			var form_data = {
				ma1: $('#myModal #ma1').val(),
				tenloai: $('#myModal #tenloai').val()
			};
			$.ajax({
				url: "<?php echo base_url('loaisp/editloai'); ?>",
				type: 'POST',
				data: form_data,
				dataType: "JSON",
				success: function(data) {
					// datajson = JSON.parse(data);
					// console.log(datajson);
					if(data.success){
						$("#myModal").modal('hide');
						let $mess = data.error_message;
						messenger($mess);
						location.reload();
					}
					else{
						$('#myModal #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					}		
				}
			});
		});
	});
	
	$("#example").on("click", ".btn_delete", function(){
		$('#myModaldele #alert-msg').html('');
		$('#submit_delete').attr("disabled",false);
		let row = $(this).closest("tr");
		let dataTable = $("#example").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let maloai = dtRow[0];
		$("#myModaldele input[name=ma]").val(maloai);
		$("#myModaldele").modal();
	});
	$('#myModaldele').on('click','#submit_delete', function(){
		var form_data = {
			ma: $('#myModaldele #ma').val(),
			ma1: $('#myModal #ma1').val(),
		};
		$.ajax({
			url: "<?php echo base_url('loaisp/deleteloai'); ?>",
			type: 'POST',
			data: form_data,
			dataType: "JSON",
			success: function(data) {
				// datajson = JSON.parse(data);
				// console.log(datajson);
				if(data.success){
					$("#myModal").modal('hide');
					let $mess = data.error_message;
					messenger($mess);
					location.reload();
				}
				else{
					$('#myModaldele #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					$('#submit_delete').attr("disabled","disabled");
				}		
			}
		});
	});
	$(".btn_add").click(function(){
		$('#myModaladd #alert-msg').html('');
		$("#myModaladd").modal('show');
	});
	$("#submit_add").click(function(){
		var form_data = {
			ma: $('#myModaladd #ma_add').val(),
			tenloai: $('#myModaladd #ten_add').val()
		};
		$.ajax({
			url:"<?php echo base_url('loaisp/addloai'); ?>",
			type: 'POST',
			data: form_data,
			dataType: "JSON",
			success: function(data){
				if(data.success){
					$('#myModaladd').modal('hide');
					let $mess = data.error_message;
					messenger($mess);
					location.reload();
				} else{
					$('#myModaladd #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
				}
			}
		});
	});
</script>