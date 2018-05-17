<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Ten san pham</td>
			<td>So luong</td>
			<td>Don gia</td>
			<td>Tong tien</td>
            <td>Ngay nhap</td>
			<td>Manage</td>
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
            <?php foreach($sp as $d1) {
				if($d1['masp']==$d['masp']) echo $d1['tensp'];
			}?>
			</td>
			<td><?php echo $d['soluong'] ?></td>
			<td><?php echo $d['dongia'] ?></td>
            <td><?php echo $d['tongtien'] ?></td>
			<td><?php echo $d['ngaynhap'] ?></td>
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
			<td>Ten san pham</td>
			<td>So luong</td>
			<td>Don gia</td>
            <td>Tong tien</td>
			<td>Ngay nhap</td>
			<td>Manage</td>
		</tr>
	</tfoot>
</table>
	<div id="myModalnhap" class="modal fade" role="dialog">
        <form action="<?php echo base_url('nhap/add_hang')?>" name="form" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
				<?php echo form_open("nhap/add_hang");?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add</h4>
                    </div>
                    <div class="modal-body">
					<p>Chon loai san pham
                        <select name="loaisp" id="loaisp">
							<?php foreach ($loaisp as $loai){ ?>
								<option value="<?php echo $loai['maloai'] ?>" name='maloai'><?php echo $loai['tenloai'] ?></option>	
							<?php }  ?>											
                        </select></p>
						<p>Chon san pham                
						<select name="sp" id="sp">
							<!-- <option value=""></option> -->
						</select></p>
						<p>So luong <input type="text" value="<?php echo set_value('soluong'); ?>" name="soluong" id="soluong"/></p>
						<p>Don gia <input type="text" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/></p>
						<p>Tong tien <input type="text" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien"/></p>
						<p>Ngay nhap <input type="date" value="<?php echo set_value('ngaynhap'); ?>" name="ngaynhap" id="ngaynhap"/></p>  
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
        <form action="<?php echo base_url('nhap/edit_nhap')?>" name="form" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
				<?php echo form_open();?>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit</h4>
                    </div>
                    <div class="modal-body">
						<input type="hidden" name="id" id="id"/></p>
						<p>So luong: <input type="text" value="" name="soluong" id="soluong" disabled/></p>
						<p>Nhap so luong sua doi: <input type="text" value="<?php echo set_value('soluongmoi'); ?>" name="soluongmoi" id="soluongmoi"/></p>
						<p>Don gia <input type="text" value="<?php echo set_value('dongia'); ?>" name="dongia" id="dongia"/></p>
						<p>Tong tien <input type="text" value="<?php echo set_value('tongtien'); ?>" name="tongtien" id="tongtien"/></p>
						<p>Ngay nhap <input type="date" value="<?php echo set_value('ngaynhap'); ?>" name="ngaynhap" id="ngaynhap"/></p>  
						<div id="slcu1"></div>
						<div id="masp1"></div>
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
	<form action="<?php echo base_url('nhap/delete_nhap') ?>" name="form1" method="post">
	<div id="myModaldele" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value=""/> 
					Ban co chac chan muon xoa khong?
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default close" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<button type="button" class="btn btn-primary btnnhap" value="" aria-hidden="true">Nhap hang</button>

<script type="text/javascript">						
	$(document).ready(function(){
		$(".btnnhap").click(function(){	
			$('#myModaledit #alert-msg').html('');		
			$("#myModalnhap").modal('show');				
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
				var list;
				data.forEach(function(item){
					list += '<option selected="selected" data-field='+item.soluongton+' value="'+item.masp+'">'+item.tensp+'</option>';
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
				loaisp: $('#myModalnhap #loaisp').val(),
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
						$("#myModalnhap").modal('hide');
						$('#myModalnhap #alert-msg').html('<div class="alert alert-success text-center">Ban da nhap san pham thanh cong!</div>');
						location.reload();
					}
					else{
						$('#myModalnhap #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
					}		
				}
			});
		});	
		$(".btnEdit").click(function(){
			$('#myModaledit #alert-msg').html('');
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			let soluong = dtRow[2];
			let dongia = dtRow[3];
			let tongtien = dtRow[4];
			let ngaynhap = dtRow[5];
			$("#myModaledit input[name=id]").val(id);
			$("input[name=soluong]").val(soluong);
			$("input[name=dongia]").val(dongia);
			$("input[name=tongtien]").val(tongtien);
			$("input[name=ngaynhap]").val(ngaynhap);
			// $("div.id_100 select").val(idgroup);			
			var form_data = {
				id: $('#myModaledit #id').val()
			};
			$.ajax({
				url: "<?php echo base_url('nhap/get_soluong_sp') ?>",
				type: 'post',
				data: form_data,
				dataType: "JSON",
			}).done(function(data){
				console.log(data);				
				$('#slcu1').html('<input type="text" name="slcu" id="slcu" value="' + data.soluongton + '"/>');
				$('#masp1').html('<input type="text" name="masp" id="masp" value="' + data.soluongton + '"/>');
			});
			$("#myModaledit").modal('show');
		});
		$('#submit_edit').click(function() {
			var form_data = {
				masp: $('#myModaledit #masp').val(),
				soluong: $('#myModaledit #soluong').val(),
				soluongton: $('#myModaledit #slcu').val(),
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
						$('#myModaledit #alert-msg').html('<div class="alert alert-success text-center">Ban da edit thanh cong!</div>');
						$("#myModaledit").modal('hide');
						$('#myModaledit #alert-msg').html('');
						location.reload();
					}
					else{
						$('#myModaledit #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
						
					}		
				}
			});
		});
		$(".btnDelete").click(function(){
		let row = $(this).closest("tr");
		let dataTable = $("#example").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		$("#myModaldele input[name=id]").val(id);
		$("#myModaldele").modal();
	});	
	});
</script>
