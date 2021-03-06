<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Đơn giá</td>
			<td>Thành tiền</td>
            <td>Ngày xuất</td>
            <td>Số lượng tồn</td>
			<td>Tác vụ</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $d) {
			?>
		<tr>
			<td>
				<?php echo $d['id'] ?>
			</td>
			<td>
				<?php echo $d['masp'] ?>
			</td>
			<td>
				<?php echo $d['tensp'] ?>
			</td>
			<td><?php echo $d['soluong'] ?></td>
			<td><?php echo $d['dongia'] ?></td>
            <td><?php echo $d['tongtien'] ?></td>
			<td><?php echo $d['ngayxuat'] ?></td>
			<td><?php echo $d['soluongton'] ?></td>
			<td align="center" width="100">
				<span class="glyphicon glyphicon-pencil btnEdit" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;
				<span class="glyphicon glyphicon-trash btnDelete" aria-hidden="true"></span>						
			</td>			
		</tr>		
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
            <td>ID</td>
			<td>Mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Đơn giá</td>
			<td>Thành tiền</td>
            <td>Ngày xuất</td>
            <td>Số lượng tồn</td>
			<td>Tác vụ</td>
		</tr>
	</tfoot>
</table>
	<div id="myModalxuat" class="modal fade" role="dialog">
        <form action="<?php echo base_url('xuat/add_xuat_hang')?>" name="form" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
				<?php echo form_open();?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">XUẤT HÀNG</h4>
                    </div>
                    <div class="modal-body">
                    	<div class="container">
                    		<div class="form-group"> 
								<label>Chọn loại sản phẩm:</label>
		                        <select class="form-control" name="loaisp" id="loaisp">
								<option value="chonloai">--Chon loai--</option>
									<?php foreach ($loaisp as $loai){ ?>
										<option value="<?php echo $loai['maloai'] ?>" name='maloai'><?php echo $loai['tenloai'] ?></option>	
									<?php }  ?>											
		                        </select>
		                    </div>
		                    <div class="form-group"> 
								<label>Chọn sản phẩm:</label>                
								<select class="form-control" name="sp" id="sp">
									<!-- <option value=""></option> -->
								</select>
							</div>
							<div class="form-group"> 
								<label>Số lượng:</label>
								<input class="form-control" type="number" value="<?php echo set_value('soluong'); ?>" name="soluong" id="soluong"/>
							</div>
							<div class="form-group"> 
								<label>Đơn giá:</label>
								<input class="form-control" type="number" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/>
							</div>
							<div class="form-group"> 
								<label>Tổng tiền:</label>
								<input class="form-control" type="total" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien" disabled/>
							</div>
							<div class="form-group"> 
								<label>Ngày xuất:</label>
								<input class="form-control" type="date" value="<?php echo set_value('ngayxuat'); ?>" name="ngayxuat" id="ngayxuat"/>
							</div>  
						</div>
						<div id="alert-msg"></div>                      							
                    </div>
                    <div class="modal-footer">
                        <input type="button" id="submit_xuat" name="submit_xuat" class="btn btn-primary" value="ok"/>
                        <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
					<?php echo form_close(); ?> 
                </div>
            </div>
        </form>
	</div>
	<div id="myModaledit" class="modal fade" role="dialog">
        <form action="<?php echo base_url('xuat/edit_xuat')?>" name="form1" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
				<?php echo form_open();?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">CHỈNH SỬA ĐƠN XUẤT</h4>
                    </div>
                    <div class="modal-body">
                    	<div class="container">
                    		<div class="form-group"> 
								<input type="hidden" name="id" id="id"/>
								<input type="hidden" name="masp" id="masp"/>
								<input type="hidden" name="soluongton" id="soluongton"/>
								<div id="tensp"></div>
								<div id="slt"></div>
							</div>
							<div class="form-group"> 
								<label>Số lượng:</label><input class="form-control"type="text" value="" name="soluong" id="soluong" disabled/>
							</div>
							<div class="form-group"> 
								<label>Nhập số lượng sửa đổi:</label>
								<input class="form-control" type="text" value="<?php echo set_value('soluongmoi'); ?>" name="soluongmoi" id="soluongmoi"/>
							</div>
							<div class="form-group"> 
								<label>Đơn giá:</label>
								<input class="form-control" type="text" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/>
							</div>
							<div class="form-group"> 
								<label>Thành tiền:</label>
								<input class="form-control" type="total" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien" disabled/>
							</div>
							<div class="form-group"> 
								<label>Ngày xuất:</label><input class="form-control" type="date" value="<?php echo set_value('ngayxuat'); ?>" name="ngayxuat" id="ngayxuat"/>
							</div>
						</div>
						<!-- <div id="slcu1"></div> -->
						<div id="alert-msg"></div>                      							
                    </div>
                    <div class="modal-footer">
                        <input type="button" id="submit_edit" name="submit_edit" class="btn btn-primary" value="ok"/>
                        <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
					<?php echo form_close(); ?> 
                </div>
            </div>
        </form>
	</div>
	
	<div id="myModaldele" class="modal fade" role="dialog">
		<form action="<?php echo base_url('xuat/delete_xuat') ?>" name="form2" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<input type="hidden" name="id" value=""/> 
						Bạn có chắc chắn muốn xóa không?
					</div>
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</form>
	</div>

<button type="button" class="btn btn-primary btnxuat" value="" aria-hidden="true">Xuat hang</button>

<script type="text/javascript">					
	$(document).ready(function(){
		$('#myModaledit input[name=soluongmoi]').blur(function(){
			var x = Number($("#myModaledit input[name=soluongmoi]").val());
			var y = Number($("#myModaledit input[name=dongia]").val());
			var z = x * y;
			$("#myModaledit input[name=tongtien]").val(z);
		});
		$('#myModaledit input[name=dongia]').blur(function(){
			var x = Number($("#myModaledit input[name=soluongmoi]").val());
			var y = Number($("#myModaledit input[name=dongia]").val());
			var z = x * y;
			$("#myModaledit input[name=tongtien]").val(z);
		});
		$('#myModalxuat input[name=soluong]').blur(function(){
			var x = Number($("#myModalxuat input[name=soluong]").val());
			var y = Number($("#myModalxuat input[name=dongia]").val());
			var z = x * y;
			$("#myModalxuat input[name=tongtien]").val(z);
		});
		$('#myModalxuat input[name=dongia]').blur(function(){
			var x = Number($("#myModalxuat input[name=soluong]").val());
			var y = Number($("#myModalxuat input[name=dongia]").val());
			var z = x * y;
			$("#myModalxuat input[name=tongtien]").val(z);
		});
		$('#example').DataTable( {
			"destroy" : true,
	        "columnDefs": 
	        	[{
	                "targets": [1],
	                "visible": false,
	                "searchable": false
	            },
				{
	                "targets": [7],
	                "visible": false,
	                "searchable": false
	            }]
    	});
		$(".btnxuat").click(function(){
			$('#myModalxuat #alert-msg').html('');		
			$("#myModalxuat").modal('show');
			$('#myModalxuat #loaisp').val('chonloai');
			$('#myModalxuat #sp').val('');	
			$('#myModalxuat #soluong').val('');
			$('#myModalxuat #dongia').val('');
			$('#myModalxuat #tongtien').val('');
			$('#myModalxuat #ngayxuat').val('');
		});
		$('#loaisp').on("change", function(){
			var requestData = {};
			requestData.maloai = $(this).val();
			$.ajax({
				"url": '<?php echo base_url('nhap/get_sp')?>',
				"type": "post",
				"data": requestData,
				"dataType": "json",
			}).done( function(data){
				console.log(data);
				let list="";
				data.forEach(function(item){
					list += '<option selected="selected" data-field='+item.soluongton+' value="'+item.masp+'">'+item.tensp+' (Tồn kho: '+item.soluongton+')</option>';
				})
				$("#sp").html(list);										
			});
		});
		// $('#sp').on("change", function(){
		// 	var selectVal = $("#sp option:selected").val();
		// });
		$('#submit_xuat').click(function() {
			// var soluong_old = $('#sp option:selected').attr('field');
			// var sl = Number.parseInt(soluong_old);
			var form_data = {
				sp: $('#myModalxuat #sp option:selected').val(),
				soluong: $('#myModalxuat #soluong').val(),
				soluongton: $('#myModalxuat #sp option:selected').data('field'),
				dongia: $('#myModalxuat #dongia').val(),
				tongtien: $('#myModalxuat #tongtien').val(),
				ngayxuat: $('#myModalxuat #ngayxuat').val()
			};
			$.ajax({
				url: "<?php echo base_url('xuat/add_xuat_hang'); ?>",
				type: 'POST',
				data: form_data,
				dataType: "json",
				success: function(data) {
					console.log(data);	
					let $mess = data.error_message;				
					if (data.success){
						//$('#myModalxuat #alert-msg').html('<div class="alert alert-success text-center">Ban da xuat san pham thanh cong!</div>');
						messenger($mess);
						$("#myModalxuat").modal('hide');
						location.reload();
					}
					else{
						$('#myModalxuat #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					}		
				}
			});
		});	
		$('#example').on("click",".btnEdit", function(){
			$('#myModaledit #alert-msg').html('');
			$('#myModaledit #soluongmoi').val('');
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			let masp = dtRow[1];
			let soluong = dtRow[3];
			let dongia = dtRow[4];
			let tongtien = dtRow[5];
			let ngayxuat = dtRow[6];
			let soluongton = dtRow[7];
			$("#myModaledit input[name=id]").val(id);
			$("#myModaledit input[name=masp]").val(masp);
			$("#myModaledit input[name=soluong]").val(soluong);
			$("#myModaledit input[name=dongia]").val(dongia);
			$("#myModaledit input[name=tongtien]").val(tongtien);
			$("#myModaledit input[name=ngayxuat]").val(ngayxuat);
			$("#myModaledit input[name=soluongton]").val(soluongton);
			$('#myModaledit #tensp').html('Ten san pham: <span>'+dtRow[2]+'</span>');
			$('#myModaledit #slt').html('So luong ton: <span>'+dtRow[7]+'</span>');
			// $("div.id_100 select").val(idgroup);			
			// var form_data = {
			// 	masp: $('#masp').val()
			// };
			// $.ajax({
			// 	url: "<?php //echo base_url('xuat/get_soluong_sp') ?>",
			// 	type: 'post',
			// 	data: form_data,
			// 	dataType: "JSON",
			// }).done(function(data){
			// 	console.log(data);				
			// 	$('#myModaledit #slcu1').html('<input type="hidden" name="slcu" id="slcu" value="' + data.soluongton + '"/>');
			// 	$('#myModaledit #tensp').html('Ten san pham: <span>'+data.tensp+'</span>');
			// 	// $('#myModaledit #slt').html('So luong ton: <span>'+data.soluongton+'</span>');
			// });
			 $("#myModaledit").modal('show');
		});
		$('#myModaledit').on('click','#submit_edit', function() {
			// $('#submit_edit').click(function(){
			var form_data = {
				id: $('#myModaledit #id').val(),
				masp: $('#myModaledit #masp').val(),
				soluong: $('#myModaledit #soluong').val(),
				soluongton: $('#myModaledit #soluongton').val(),
				soluongmoi: $('#myModaledit #soluongmoi').val(),
				dongia: $('#myModaledit #dongia').val(),
				tongtien: $('#myModaledit #tongtien').val(),
				ngayxuat: $('#myModaledit #ngayxuat').val()
			};
			$.ajax({
				url: "<?php echo base_url('xuat/edit_xuat'); ?>",
				type: 'POST',
				data: form_data,
				dataType: "JSON",
				success: function(data) {
					// datajson = JSON.parse(data);
					let $mess = data.error_message;
					console.log(data);
					if(data.success){
						$("#myModaledit").modal('hide');
						messenger($mess);
						// $('#myModaledit #alert-msg').html('<div class="alert alert-success text-center">Ban da edit thanh cong!</div>');
						location.reload();
					}
					else{
						$('#myModaledit #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					}		
				}
			});
		});
		$('#example').on("click", ".btnDelete", function(){	
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			$("#myModaldele input[name=id]").val(id);
			$("#myModaldele").modal();
		});	
	});
</script>
