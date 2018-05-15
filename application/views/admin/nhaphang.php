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
				<span class="glyphicon glyphicon-trash btnDelete" aria-hidden="true" data-toggle="modal" data-target="#myModaldele"></span>						
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
        <form action="<?php echo base_url('nhap/nhap')?>" name="form" method="post">
            <div class="modal-dialog">
                <div class="modal-content">
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
						<p>So luong <input type="text" value="" name="soluong"/></p>
						<p>Don gia <input type="text" value="" name="dongia"/></p>
						<p>Tong tien <input type="text" value="" name="tongtien"/></p>
						<p>Ngay nhap <input type="text" value="" name="ngaynhap"/></p>                        							
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="ok" class="btn btn-primary" value="ok"/>
                        <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
	</div>
<button type="button" class="btn btn-primary btnnhap" value="" aria-hidden="true">Them</button>

<script type="text/javascript">						
	$(document).ready(function(){
			$(".btnnhap").click(function(){
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
						list += '<option selected="selected" value="'+item.masp+'">'+item.tensp+'</option>';
					})
         			$("#sp").html(list);										
				});
			});
	});
</script>
