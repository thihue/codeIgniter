<?php 
if($this->session->flashdata('message')){
    $duyet = $this->session->flashdata('message');
    echo "<script>alert('$duyet')</script>";
}
if($this->session->flashdata('xoa')){
    $xoa = $this->session->flashdata('xoa');
    echo "<script>alert('$xoa')</script>";
}
if($this->session->flashdata('false')){
    $false = $this->session->flashdata('false');
    echo "<script>alert('$false')</script>";
}
?>
<p><span>ĐƠN HÀNG CHƯA DUYỆT</span></p>
<?php if(count($new)!==0): ?>
<table id="example_new" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Loại khách</td>
			<td>Tên người nhận</td>
			<td>Số điện thoại</td>
			<td>Ngày đặt</td>
			<td>Địa chỉ giao hàng</td>
			<td>Tổng tiền</td>
			<td>manage</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($new as $d) {?>
		<tr>
			<td><?php echo $d['idDH']?></td>
			<td><?php if($d['idUser'] == 0) echo "Khách vãng lai"?></td>
			<td><?php echo $d['tennguoinhan']?></td>
			<td><?php echo $d['sdtnguoinhan']?></td>
			<td><?php echo $d['TimeDatHang']?></td>
			<td><?php echo $d['DiaChiGiaoHang']?></td>
			<td><?php echo $d['tongtien']?></td>
			<td align="center" width="110">
				<span class="glyphicon glyphicon-check btn_duyet" value="" aria-hidden="true" title="Duyệt đơn"></span>&nbsp;
				<span class="glyphicon glyphicon-pencil btn_edit" value="" aria-hidden="true" title="Sửa"></span>&nbsp;
				<span class="glyphicon glyphicon-trash btn_delete" value="" aria-hidden="true"title="Xóa"></span>&nbsp;
				<span class="glyphicon glyphicon-list-alt btn_chitiet" value="" aria-hidden="true" title="Chi tiết đơn hàng"></span>			
			</td>		
		</tr>
		<?php } ?>
	</tbody>
</table>
		<?php else: echo "<p>Chưa có đơn hàng mới!</p>"; endif;?>
<p><span>ĐƠN HÀNG ĐÃ NHẬN</span></p>

<table id="example_nhan" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
        <td>ID</td>
        <td>Loại khách</td>
        <td>Tên người nhận</td>
        <td>Số điện thoại</td>
        <td>Ngày đặt</td>
        <td>Ngày nhận</td>
        <td>Địa chỉ giao hàng</td>
		<td>Tổng tiền</td>
        <td>manage</td>
	</thead>
	<tbody>
        <?php foreach($nhan as $d2) {?>
		<tr>
            <td><?php echo $d2['idDH']?></td>
			<td><?php if($d2['idUser'] == 0) echo "Khách vãng lai";
			if($d2['idUser'] == 2) echo "thanh vien";
			?></td>
			<td><?php echo $d2['tennguoinhan']?></td>
			<td><?php echo $d2['sdtnguoinhan']?></td>
			<td><?php echo $d2['TimeDatHang']?></td>
			<td><?php echo $d2['TimeNhanHang']?></td>
            <td><?php echo $d2['DiaChiGiaoHang']?></td>
			<td><?php echo $d2['tongtien']?></td>
            <td align="center" width="90">
				<span class="glyphicon glyphicon-remove-circle btn_huy_duyet" value="" aria-hidden="true" title="Hủy duyệt"></span>&nbsp;&nbsp;	
                <span class="glyphicon glyphicon-list-alt btn_chitiet" value="" aria-hidden="true" title="Chi tiết đơn hàng"></span>					
			</td>
        </tr>
        <?php } ?>				
	</tbody>
</table>

<div id="myModalduyet" class="modal fade" role="dialog">
	<form action="<?php echo base_url('don_hang/duyet') ?>" name="form_duyet" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">DUYỆT ĐƠN</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value=""/> 
                    Bạn có chắc chắn muốn duyệt đơn hàng vào đã nhận?
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="myModal_huy_duyet" class="modal fade" role="dialog">
	<form action="<?php echo base_url('don_hang/huy_duyet') ?>" name="form_huy_duyet" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">HỦY DUYỆT ĐƠN HÀNG</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value=""/> 
                    Bạn có chắc chắn muốn hủy duyệt đơn hàng?
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="myModaledit" class="modal fade" role="dialog">
	<form action="<?php echo base_url('don_hang/edit_don_hang')?>" name="form1" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">SỬA ĐƠN HÀNG</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="form-group"> 
							<input type="hidden" name="id" id="id"/>	
							<label>Tên người nhận:</label>
							<input class="form-control" type="text" id="tennguoinhan" name="tennguoinhan" value="<?php echo set_value('tennguoinhan'); ?>"/>
						</div>
						<div class="form-group"> 
							<label>Số điện thoại:</label>
							<input class="form-control" type="text" id="sdt" name="sdt" value="<?php echo set_value('sdt'); ?>"/>
						</div>
						<div class="form-group"> 
							<label>Địa chỉ giao hàng;</label>
							<input class="form-control" type="text" id="diachigiao" name="diachigiao" value="<?php echo set_value('diachigiao'); ?>"/>
						</div>
					</div>
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
	<form action="<?php echo base_url('don_hang/delete_don_hang') ?>" name="form2" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value=""/> 
					Bạn có chắc chắn muốn xóa không?
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="myModal_chitiet" class="modal fade" role="dialog">
	<form action="<?php echo base_url('don_hang/chitiet') ?>" name="form_chitiet" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">CHI TIET DON HANG</h4>
				</div>
				<div class="modal-body">
					<div id="thongtin"></div>
					<input type="hidden" name="id" value=""/> 
                    <table id="example_chitiet" class="table table-hover table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<td>STT</td>
								<td>Mã sản phẩm</td>
								<td>Tên sản phẩm</td>
								<td>Số lượng</td>
								<td>Đơn giá</td>
							</tr>
						</thead>
						<tbody>
							<!-- ajax load chi tiet tung don hang			 -->
						</tbody>
					</table>
					<div id="tongtien"></div>
				</div>
				<div class="modal-footer">
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
    $('#example_new').on("click", ".btn_duyet", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example_new").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		$("#myModalduyet input[name=id]").val(id);
		$("#myModalduyet").modal('show');
	});
    $('#example_new').on("click", ".btn_edit", function(){
		$('#myModaledit #alert-msg').html('');
		let row = $(this).closest("tr");
		let dataTable = $("#example_new").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
        let tennguoinhan = dtRow[2];
        let sdt = dtRow[3];
        let diachigiao = dtRow[5];
        $("#myModaledit input[name=id]").val(id);
		$("#myModaledit input[name=tennguoinhan]").val(tennguoinhan);
        $("#myModaledit input[name=sdt]").val(sdt);
        $("#myModaledit input[name=diachigiao]").val(diachigiao);  
		$("#myModaledit").modal('show');
	});
    $('#myModaledit').on("click", "#submit_edit", function(){
        var form_data = {
			id: $("#myModaledit input[name=id]").val(),
			tennguoinhan: $("#myModaledit input[name=tennguoinhan]").val(),
			sdt: $("#myModaledit input[name=sdt]").val(),
			diachigiao: $("#myModaledit input[name=diachigiao]").val(),
		};
		$.ajax({
			url: "<?php echo base_url('don_hang/edit_don_hang') ?>",
			type: 'post',
			dataType: 'json',
			data: form_data,
			success:function(data){
				if(data.success){
					$('#myModaledit #alert-msg').html('<div class="alert alert-success text-center">Sua don hang thanh cong!</div>');
					$("#myModaledit").modal('hide');
					location.reload();
				} 
				else{
					$('#myModaledit #alert-msg').html('<div class="alert alert-danger">' + data.error_message + '</div>');
				}
			}
		});
    });
    $('#example_new').on("click", ".btn_delete", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example_new").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		$("#myModaldele input[name=id]").val(id);
		$("#myModaldele").modal('show');
	});
	$('#example_nhan').on("click", ".btn_huy_duyet", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example_nhan").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		$("#myModal_huy_duyet input[name=id]").val(id);
		$("#myModal_huy_duyet").modal('show');
	});
	$('#example_new').on("click", ".btn_chitiet", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example_new").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		let tennguoinhan = dtRow[2];
		let sdt = dtRow[3];
		let diachi = dtRow[5];
		let tongtien = dtRow[6];
		$('#myModal_chitiet #thongtin').html('Tên người nhận: '+dtRow[2]+'<br>Số điện thoại: '+dtRow[3]+'<br>Địa chỉ nhận hàng: '+dtRow[6]+'<br>');
		$('#myModal_chitiet #tongtien').html('Tổng hóa đơn: '+tongtien+' VNĐ');
		$("#myModal_chitiet input[name=id]").val(id);
		var form_data = {
			id: $("#myModal_chitiet input[name=id]").val(),
		};
		$.ajax({
			url: "<?php echo base_url('don_hang/chitiet') ?>",
			type: 'post',
			dataType: 'json',
			data: form_data,
		}).done( function(data){
				console.log(data);
				let list="";
				let stt=0;
				data.forEach(function(item){
					stt=stt+1;
					list += '<tr><td>'+stt+'</td><td>'+item.masp+'</td><td>'+item.tensp+'</td><td>'+item.soluong+'</td><td>'+item.dongia+'</td></tr>';
				})
				$("#myModal_chitiet tbody").html(list);										
		});
		$("#myModal_chitiet").modal('show');
	});
	$('#example_nhan').on("click", ".btn_chitiet", function(){	
		let row = $(this).closest("tr");
		let dataTable = $("#example_nhan").DataTable();
		let dtRow = dataTable.rows(row).data()[0];
		let id = dtRow[0];
		let tennguoinhan = dtRow[2];
		let sdt = dtRow[3];
		let diachi = dtRow[6];
		let tongtien = dtRow[7];
		$('#myModal_chitiet #thongtin').html('Tên người nhận: '+dtRow[2]+'<br>Số điện thoại: '+dtRow[3]+'<br>Địa chỉ nhận hàng: '+dtRow[6]+'<br>');
		$('#myModal_chitiet #tongtien').html('Tổng hóa đơn: '+dtRow[7]+' VNĐ');
		$("#myModal_chitiet input[name=id]").val(id);
		var form_data = {
			id: $("#myModal_chitiet input[name=id]").val(),
		};
		$.ajax({
			url: "<?php echo base_url('don_hang/chitiet') ?>",
			type: 'post',
			dataType: 'json',
			data: form_data,
		}).done( function(data){
				console.log(data);
				let list="";
				let stt=0;
				data.forEach(function(item){
					stt=stt+1;
					list += '<tr><td>'+stt+'</td><td>'+item.masp+'</td><td>'+item.tensp+'</td><td>'+item.soluong+'</td><td>'+item.dongia+'</td></tr>';
				})
				$("#myModal_chitiet tbody").html(list);										
		});
		$("#myModal_chitiet").modal('show');
	});
</script>