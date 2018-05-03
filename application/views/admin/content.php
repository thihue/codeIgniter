<table id="example" class="table table-hover table-striped table-bordered" style="width:100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Username</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $d) {?>
		<tr>
			<td>
				<?php echo $d['id'] ?>
			</td>
			<td>
				<?php echo $d['username'] ?>
			</td>
		</tr>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<td>ID</td>
			<td>Username</td>
		</tr>
	</tfoot>
</table>
</div>
