<!DOCTYPE html>
<html>
<head>
	<title><?php echo $tit; ?></title>
</head>
<body>
<p class="text-center" style="padding-top: 15px;">Xin chào 
    <span style="color: red">
        <?php echo $this->session->userdata('login');?>
    </span>
</p>
<a href="<?php echo site_url("user_controller/logout");?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>


</body>
</html>

