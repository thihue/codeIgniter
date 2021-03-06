<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Mã sản phẩm</td>
			<td>Tên sản phẩm</td>
			<td>Số lượng</td>
			<td>Đơn giá</td>
			<td>Thành tiền</td>
            <td>Ngày nhập</td>
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
			<td><?php echo $d['masp'] ?></td>
			<td>
            <?php echo $d['tensp'] ?>
			</td>
			<td><?php echo $d['soluong'] ?></td>
			<td><?php echo $d['dongia'] ?></td>
            <td><?php echo $d['tongtien'] ?></td>
			<td><?php echo $d['ngaynhap'] ?></td>
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
            <td>Ngày nhập</td>
            <td>Số lượng tồn</td>
			<td>Tác vụ</td>
		</tr>
	</tfoot>
</table>
<button type="button" class="btn btn-primary btnnhap" value="" aria-hidden="true">Nhập hàng</button>
<div id="myModalnhap" class="modal fade" role="dialog">
    <form action="<?php echo base_url('nhap/add_hang')?>" name="form" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
			<?php echo form_open("nhap/add_hang");?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">NHẬP HÀNG</h4>
                </div>
                <div class="modal-body">
                	<div class="container">
                		<div class="form-group">
							<label for="loaisp">Chọn loại sản phẩm:</label>
	                        <select class="form-control" name="loaisp" id="loaisp">
								<?php foreach ($loaisp as $loai){ ?>
									<option value="<?php echo $loai['maloai'] ?>" name='maloai'><?php echo $loai['tenloai'] ?></option>	
								<?php }  ?>											
	                        </select>
	                    </div>
	                    <div class="form-group">
							<label for="sp">Chọn sản phẩm:</label>               
							<select class="form-control" name="sp" id="sp">
								<!-- <option value=""></option> -->
							</select>
						</div>
						<div class="form-group">
							<label for="soluong">Số lượng:</label>
							<input class="form-control" type="number" value="<?php echo set_value('soluong'); ?>" name="soluong" id="soluong"/>
						</div>
						<div class="form-group">
							<label for="dongia">Đơn giá:</label>
							<input class="form-control" type="number" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/>
						</div>
						<div class="form-group">
							<label for="tongtien">Tổng tiền:</label>
							<input class="form-control" type="total" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien" disabled/>
						</div>
						<div class="form-group">
							<label for="ngaynhap">Ngày nhập:</label>
							<input class="form-control" type="date" value="<?php echo set_value('ngaynhap'); ?>" name="ngaynhap" id="ngaynhap"/>
						</div>  
					</div>
					<div id="alert-msg"></div>                    							
                </div>
                <div class="modal-footer">
                    <input type="button" id="submit_nhap" name="submit_nhap" class="btn btn-primary" value="ok"/>
                    <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
				<?php echo form_close(); ?> 
            </div>
        </div>
    </form>
</div>
<div id="myModaledit" class="modal fade" role="dialog">
    <form action="<?php echo base_url('nhap/edit_nhap')?>" name="form2" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
			<?php echo form_open();?>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">CHỈNH SỬA ĐƠN HÀNG</h4>
                </div>
                <div class="modal-body">
                	<div class="container">
						<input type="hidden" name="id" id="id"/>
						<input type="hidden" name="masp" id="masp"/>
						<input type="hidden" name="soluongton" id="soluongton"/>
						<div id="tensp"></div>
						<div id="slt"></div>
						<div class="form-group">
							<label>Số lượng:</label>
							<input class="form-control" type="number" value="" name="soluong" id="soluong" disabled/>
						</div>
						<div class="form-group">
							<label>Nhập số lượng sửa đổi:</label>
							<input class="form-control" type="number" value="<?php echo set_value('soluongmoi'); ?>" name="soluongmoi" id="soluongmoi"/>
						</div>
						<div class="form-group">
							<label>Đơn giá</label>
							<input class="form-control" type="number" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/>
						</div>
						<div class="form-group">
							<label>Tổng tiền</label>
							<input class="form-control" type="total" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien" disabled/>
						</div>
						<div class="form-group">
							<label>Ngày nhập</label>
							<input class="form-control" type="date" value="<?php echo set_value('ngaynhap'); ?>" name="ngaynhap" id="ngaynhap"/>
						</div>			                     							
                	</div>
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
	<form action="<?php echo base_url('nhap/delete_nhap') ?>" name="form1" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<input type="hidden" name="id" value=""/> 
						Ban co chac chan muon xoa khong?
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

<script type="text/javascript">						
	$(document).ready(function(){
		$('#example').DataTable( {
			"destroy" : true,
	        "columnDefs": 
	        	[{
	                "targets": [1],
	                "visible": false,
	                "searchable": false
	            },
	      		{	"targets": [7],
	                "visible": false,
	                "searchable": false
	            }]
    	});
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
		$('#myModalnhap input[name=soluong]').blur(function(){
			var x = Number($("#myModalnhap input[name=soluong]").val());
			var y = Number($("#myModalnhap input[name=dongia]").val());
			var z = x * y;
			$("#myModalnhap input[name=tongtien]").val(z);
		});
		$('#myModalnhap input[name=dongia]').blur(function(){
			var x = Number($("#myModalnhap input[name=soluong]").val());
			var y = Number($("#myModalnhap input[name=dongia]").val());
			var z = x * y;
			$("#myModalnhap input[name=tongtien]").val(z);
		});
		$('.btnnhap').click(function(){	
			$('#myModalnhap #alert-msg').html('');		
			$("#myModalnhap").modal('show');
			$('#myModalnhap #sp').val('');	
			$('#myModalnhap #loaisp').val('');	
			$('#myModalnhap #soluong').val('');
			$('#myModalnhap #dongia').val('');
			$('#myModalnhap #tongtien').val('');
			$('#myModalnhap #ngayxuat').val('');				
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
				let list = "";
				data.forEach(function(item){
					list += '<option selected="selected" data-field='+item.soluongton+' value="'+item.masp+'">'+item.tensp+' (Tồn kho: '+item.soluongton+')</option>';
				})
				$("#sp").html(list);										
			});
		});
		// $('#sp').on("change", function(){
		// 	var selectVal = $("#sp option:selected").val();
		// });
		$('#submit_nhap').click(function() {
			// var soluong_old = $('#sp option:selected').attr('field');
			// var sl = Number.parseInt(soluong_old);
			var form_data = {
				sp: $('#myModalnhap #sp option:selected').val(),
				soluong: $('#myModalnhap #soluong').val(),
				soluongton: $('#myModalnhap #sp option:selected').data('field'),
				dongia: $('#myModalnhap #dongia').val(),
				tongtien: $('#myModalnhap #tongtien').val(),
				ngaynhap: $('#myModalnhap #ngaynhap').val()
			};
			$.ajax({
				url: "<?php echo base_url('nhap/add_hang'); ?>",
				type: 'POST',
				data: form_data,
				dataType: "json",
				success: function(data) {
					console.log(data);					
					if (data.success){
						let $mess = data.error_message;
						messenger($mess);
						$("#myModalnhap").modal('hide');
						// $('#myModalnhap #alert-msg').html('<div class="alert alert-success text-center">Ban da nhap san pham thanh cong!</div>');
						location.reload();
					}
					else{
						$('#myModalnhap #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					}		
				}
			});
		});	
		$("#example").on('click','.btnEdit',function(){
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
			$('#myModaledit #tensp').html('<b>Tên sản phẩm:</b> <span>'+dtRow[2]+'</span>');
			$('#myModaledit #slt').html('<b>Số lượng tồn</b>: <span>'+dtRow[7]+'</span>');

			// $("div.id_100 select").val(idgroup);
			$("#myModaledit").modal('show');
		});
		$('#myModaledit').on('click','#submit_edit', function() {
			var form_data = {
				id: $('#myModaledit #id').val(),
				masp: $('#myModaledit #masp').val(),
				soluong: $('#myModaledit #soluong').val(),
				soluongton: $('#myModaledit #soluongton').val(),
				soluongmoi: $('#myModaledit #soluongmoi').val(),
				dongia: $('#myModaledit #dongia').val(),
				tongtien: $('#myModaledit #tongtien').val(),
				ngaynhap: $('#myModaledit #ngaynhap').val()
			};
			$.ajax({
				url: "<?php echo base_url('nhap/edit_nhap'); ?>",
				type: 'POST',
				data: form_data,
				dataType: "JSON",
				success: function(data) {
					// datajson = JSON.parse(data);
					console.log(data);
					if(data.success){					
						let $mess = data.error_message;
						messenger($mess);
						$("#myModaledit").modal('hide');
						location.reload();
					}
					else{
						$('#myModaledit #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');						
					}		
				}
			});
		});
		$("#example").on('click','.btnDelete', function(){
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			$("#myModaldele input[name=id]").val(id);
			$("#myModaldele").modal('show');
		});	
	});
</script>
