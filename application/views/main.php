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
<a href="<?php echo site_url("user/logout");?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
<table border="1"; width='500px'>
<tr>
    <td>ID</td>
    <td>Username</td>
</tr>
<?php foreach($list as $d){ ?>
<tr>  
    <td><?php echo $d['id'] ?></td>
    <td><?php echo $d['username'] ?></td> 
</tr>
<?php } ?>
</table>


</body>
</html>

