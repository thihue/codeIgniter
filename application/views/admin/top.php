<nav class="navbar navbar-default site-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#" style="color: #ff9708;"><?php echo $dau; ?></a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<p class="text-center" style="padding-top: 15px;">Xin chào
						<span style="color: red"><?php echo $this->session->userdata('login')?></span>
					</p>
				</li>
				<li>
                    <a href="<?php echo $logout ?>"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
