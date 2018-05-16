
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
				<span class="glyphicon glyphicon-pencil btn_edit" value="" aria-hidden="true" ></span>&nbsp;&nbsp;&nbsp;	
				<span class="glyphicon glyphicon-trash btn_delete" value="" aria-hidden="true"></span>						
			</td>			
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
            <td>Ma loai</td>
            <td>Ten loai</td>
            <td>Manage</td>	
		</tr>
	</tfoot>
</table>
<form action="<?php echo base_url('loaisp/editloai')?>" name="form3" method="post">
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php echo form_open();?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit</h4>
				</div>
				<div class="modal-body">
						<input type="hidden" class="hidden" name="ma1" id="ma1" value="" />               
						Maloai<input type="text" name="ma" id="ma" value="" disabled/><br>
						Ten loai<input type="text" value="<?php echo set_value('tenloai'); ?>" id="tenloai" name="tenloai"/>
						<div id="alert-msg"></div>
				</div>
				<div class="modal-footer">
					<input type="button" name="submit_edit" id="submit_edit" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				<?php echo form_close(); ?>  
			</div>
		</div>
	</div>
</form>							
<form action="<?php echo base_url('loaisp/deleteloai') ?>" name="form1" method="post">
	<div id="myModaldele" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="ma" value=""/> 
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
<form action="<?php echo base_url('loaisp/addloai')?>" name="form2" method="post">
	<div id="myModaladd" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<?php //echo form_open("modal_contact/submit");?>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add</h4>
				</div>
				<div class="modal-body">
						<p>Ma loai: <input type="text" name="ma" value="" /></p>
						Ten loai: <input type="text" value="" name="tenloai"/>									
				</div>
				<div class="modal-footer">
					<input type="submit" name="ok" id="" class="btn btn-primary" value="ok"/>
					<button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</form>
<button type="button" class="btn btn-primary" value="" aria-hidden="true" data-toggle="modal" data-target="#myModaladd">Them</button>
<script type="text/javascript">						
	$(document).ready(function(){
		$(".btn_edit").click(function(){
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let id = dtRow[0];
			let tenloai = dtRow[1];
			$("input[name=ma]").val(id);
			$("input[name=ma1]").val(id);
			$("input[name=tenloai]").val(tenloai);
			// $("div.id_100 select").val(idgroup);
			$("#myModal").modal('show');
		});
	});
	$('#submit_edit').click(function() {
		var form_data = {
			ma1: $('#ma1').val(),
			tenloai: $('#tenloai').val()
		};
		// console.log(form_data);
		// return;
		$.ajax({
			url: "<?php echo base_url('loaisp/editloai'); ?>",
			type: 'POST',
			data: form_data,
			success: function(data) {
				datajson = JSON.parse(data);
				console.log(datajson);
				if(datajson.success){
					$("#myModal").modal('hide');
					$('#alert-msg').html('<div class="alert alert-success text-center">Ban da edit thanh cong!</div>');
					location.reload();
				}
				else{
					$('#alert-msg').html('<div class="alert alert-danger">' + datajson.error_message + '</div>');
				}		
			}
		});
	});
	$(".btn_delete").click(function(){
			let row = $(this).closest("tr");
			let dataTable = $("#example").DataTable();
			let dtRow = dataTable.rows(row).data()[0];
			let maloai = dtRow[0];
			$("input[name=ma]").val(maloai);
			$("#myModaldele").modal();
	});
</script>