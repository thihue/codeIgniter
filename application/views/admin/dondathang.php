<p><span>ĐƠN HÀNG CHƯA DUYỆT</span></p>
<?php 
if($this->session->flashdata('message')){
    $duyet = $this->session->flashdata('message');
    echo "<script>alert('$duyet')</script>";
}
if($this->session->flashdata('xoa')){
    $xoa = $this->session->flashdata('xoa');
    echo "<script>alert('$xoa')</script>";
}
?>
<table id="example_new" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Loại khách</td>
			<td>Tên người nhận</td>
			<td>Số điện thoại</td>
			<td>Ngày đặt</td>
			<td>Địa chỉ giao hàng</td>
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
			<td align="center" width="110">
				<span class="glyphicon glyphicon-check btn_duyet" value="" aria-hidden="true" title="Duyệt đơn"></span>&nbsp;
				<span class="glyphicon glyphicon-pencil btn_edit" value="" aria-hidden="true" title="Sửa"></span>&nbsp;
                <span class="glyphicon glyphicon-trash btn_delete" value="" aria-hidden="true"title="Xóa"></span>&nbsp;
                <span class="glyphicon glyphicon-list-alt btn_delete" value="" aria-hidden="true" title="Chi tiết đơn hàng"></span>			
			</td>		
		</tr>
        <?php } ?>
	</tbody>
	<tfoot>
		<tr>
            <td>ID</td>
			<td>Loại khách</td>
			<td>Tên người nhận</td>
			<td>Số điện thoại</td>
			<td>Ngày đặt</td>
			<td>Địa chỉ giao hàng</td>
			<td>manage</td>
		</tr>
	</tfoot>
</table>
<p><span>ĐƠN HÀNG ĐÃ NHẬN</span></p>

<table id="example_dat" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
        <td>ID</td>
        <td>Loại khách</td>
        <td>Tên người nhận</td>
        <td>Số điện thoại</td>
        <td>Ngày đặt</td>
        <td>Ngày nhận</td>
        <td>Địa chỉ giao hàng</td>
        <td>manage</td>
	</thead>
	<tbody>
		<tr>
        <?php foreach($nhan as $d2) {?>
		<tr>
            <td><?php echo $d2['idDH']?></td>
			<td><?php if($d2['idUser'] == 0) echo "Khách vãng lai"?></td>
			<td><?php echo $d2['tennguoinhan']?></td>
			<td><?php echo $d2['sdtnguoinhan']?></td>
			<td><?php echo $d2['TimeDatHang']?></td>
			<td><?php echo $d2['TimeNhanHang']?></td>
            <td><?php echo $d2['DiaChiGiaoHang']?></td>
            <td align="center" width="90">
				<span class="glyphicon glyphicon-remove-circle btn_boduyet" value="" aria-hidden="true" title="Hủy duyệt"></span>&nbsp;&nbsp;	
                <span class="glyphicon glyphicon-list-alt btn_delete" value="" aria-hidden="true" title="Chi tiết đơn hàng"></span>					
			</td>
        </tr>
        <?php } ?>				
	</tbody>
	<tfoot>
		<tr>
            <td>ID</td>
			<td>Loại khách</td>
			<td>Tên người nhận</td>
			<td>Số điện thoại</td>
            <td>Ngày đặt</td>
            <td>Ngày nhận</td>
			<td>Địa chỉ giao hàng</td>
			<td>manage</td>
		</tr>
	</tfoot>
</table>

<div id="myModalduyet" class="modal fade" role="dialog">
	<form action="<?php echo base_url('don_hang/duyet') ?>" name="form_duyet" method="post">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Duyet don</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" value=""/> 
                    Ban co chac chan muon duyet don hang vao da nhan?
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
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="id"/>	
					<p>Ten nguoi nhan: <input type="text" id="tennguoinhan" name="tennguoinhan" value="<?php echo set_value('tennguoinhan'); ?>"/></p>
					<p>So dien thoai: <input type="text" id="sdt" name="sdt" value="<?php echo set_value('sdt'); ?>"/></p>
					<p>Dia chi giao hang: <input type="text" id="diachigiao" name="diachigiao" value="<?php echo set_value('diachigiao'); ?>"/></p>
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
</script>