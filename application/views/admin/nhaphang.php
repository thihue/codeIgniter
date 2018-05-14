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
                    <div class="modal-body"></form>
                    <form action="" name="form2" method="post" enctype="multipart/form-data" >
                        <select name="loai" onchange="this.form.submit();">
							<?php foreach ($loai as $d){ ?>
								<option value="<?php echo $d['maloai'] ?>" ><?php echo $d['tenloai'] ?></option>	
							<?php }  ?>											
                        </select>
						</form>	                      
                            <select name="sp">
                                <?php foreach ($sp as $d1){ ?>
                                    <option value="<?php echo $d1['masp'] ?>" ><?php echo $d1['tensp'] ?></option>	
                                <?php }  ?>					
                            </select>                           							
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="ok" class="btn btn-primary" value="ok"/>
                        <button type="button" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        <!-- </form> -->
	</div>
<button type="button" class="btn btn-primary btnnhap" value="" aria-hidden="true">Them</button>

<script type="text/javascript">						
	$(document).ready(function(){
		$(".btnnhap").click(function(){
			// let row = $(this).closest("tr");
			// let dataTable = $("#example").DataTable();
			// let dtRow = dataTable.rows(row).data()[0];
			// let id = dtRow[0];
			// let username = dtRow[1];
			// let email = dtRow[2];
			// let diachi = dtRow[3];
			// let dienthoai = dtRow[4];
			// let idgroup = dtRow[5]=="khach"?"2":"1";
			// $("input[name=id]").val(id);
			// $("input[name=username]").val(username);
			// $("input[name=email]").val(email);
			// $("input[name=diachi]").val(diachi);
			// $("input[name=dienthoai]").val(dienthoai);
			// $("#myModal select").val(idgroup);
			// $("div.id_100 select").val(idgroup);
			$("#myModalnhap").modal('show');
			
		});
		$(".btnDelete").click(function(){
			$("#myModaldele").modal();
		});
	});
</script>
