<html>

<head>
	<!--liên kết đến file head -->
	<?php $this->load->view('admin/head') ?>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<?php $this->load->view('admin/menu')?>
			</div>
			<div class="col-sm-9">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12">
							<?php $this->load->view('admin/top')?>
						</div>
						<div class="col-sm-12">
							<?php $this->load->view($subview); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

