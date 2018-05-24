<title>
	<?php echo $tit;
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="http://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

<script>
	$(document).ready(function () {
			$('#example').DataTable();
		});
	function messenger($mess) {
		$("#snackbar").text($mess);
		$("#snackbar").addClass("show");
    	setTimeout(function(){
						$("#snackbar").removeClass("show");
					}, 3000);
	};
</script>
<style>
	/* @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css);
        @import url(https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css); */

	table tbody {
		color: blue;
	}

	table tbody tr:hover {
		color: red;
		/* background: blue; */
	}

	table thead {
		color: white;
		background: black;
	}

	table tfoot {
		color: white;
		background: black;
	}

	.nav-side-menu {
		overflow: auto;
		font-family: verdana;
		font-size: 12px;
		font-weight: 200;
		background-color: #2e353d;
		position: fixed;
		top: 0px;
		width: 300px;
		height: 100%;
		color: #e1ffff;
	}

	.nav-side-menu .brand {
		background-color: #23282e;
		line-height: 50px;
		display: block;
		text-align: center;
		font-size: 14px;
	}

	.nav-side-menu .toggle-btn {
		display: none;
	}

	.nav-side-menu ul,
	.nav-side-menu li {
		list-style: none;
		padding: 0px;
		margin: 0px;
		line-height: 35px;
		cursor: pointer;
	}

	.nav-side-menu ul :not(collapsed) .arrow:before,
	.nav-side-menu li :not(collapsed) .arrow:before {
		font-family: FontAwesome;
		content: "\f078";
		display: inline-block;
		padding-left: 10px;
		padding-right: 10px;
		vertical-align: middle;
		float: right;
	}

	.nav-side-menu ul .active,
	.nav-side-menu li .active {
		border-left: 3px solid #d19b3d;
		background-color: #4f5b69;
	}

	.nav-side-menu ul .sub-menu li.active,
	.nav-side-menu li .sub-menu li.active {
		color: #d19b3d;
	}

	.nav-side-menu ul .sub-menu li.active a,
	.nav-side-menu li .sub-menu li.active a {
		color: #d19b3d;
	}

	.nav-side-menu ul .sub-menu li,
	.nav-side-menu li .sub-menu li {
		background-color: #181c20;
		border: none;
		line-height: 28px;
		border-bottom: 1px solid #23282e;
		margin-left: 0px;
	}

	.nav-side-menu ul .sub-menu li:hover,
	.nav-side-menu li .sub-menu li:hover {
		background-color: #020203;
	}

	.nav-side-menu ul .sub-menu li:before,
	.nav-side-menu li .sub-menu li:before {
		font-family: FontAwesome;
		content: "\f105";
		display: inline-block;
		padding-left: 10px;
		padding-right: 10px;
		vertical-align: middle;
	}

	.nav-side-menu li {
		padding-left: 0px;
		border-left: 3px solid #2e353d;
		border-bottom: 1px solid #23282e;
	}

	.nav-side-menu li a {
		text-decoration: none;
		color: #e1ffff;
	}

	.nav-side-menu li a i {
		padding-left: 10px;
		width: 20px;
		padding-right: 20px;
	}

	.nav-side-menu li:hover {
		border-left: 3px solid #d19b3d;
		background-color: #4f5b69;
		-webkit-transition: all 1s ease;
		-moz-transition: all 1s ease;
		-o-transition: all 1s ease;
		-ms-transition: all 1s ease;
		transition: all 1s ease;
	}

	@media (max-width: 767px) {
		.nav-side-menu {
			position: relative;
			width: 100%;
			margin-bottom: 10px;
		}
		.nav-side-menu .toggle-btn {
			display: block;
			cursor: pointer;
			position: absolute;
			right: 10px;
			top: 10px;
			z-index: 10 !important;
			padding: 3px;
			background-color: #ffffff;
			color: #000;
			width: 40px;
			text-align: center;
		}
		.brand {
			text-align: left !important;
			font-size: 22px;
			padding-left: 20px;
			line-height: 50px !important;
		}
	}

	@media (min-width: 767px) {
		.nav-side-menu .menu-list .menu-content {
			display: block;
		}
	}

	body {
		margin: 0px;
		padding: 0px;
	}
	#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
	}

	#snackbar.show {
		visibility: visible;
		-webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
		animation: fadein 0.5s, fadeout 0.5s 2.5s;
	}

	@-webkit-keyframes fadein {
		from {bottom: 0; opacity: 0;} 
		to {bottom: 30px; opacity: 1;}
	}

	@keyframes fadein {
		from {bottom: 0; opacity: 0;}
		to {bottom: 30px; opacity: 1;}
	}

	@-webkit-keyframes fadeout {
		from {bottom: 30px; opacity: 1;} 
		to {bottom: 0; opacity: 0;}
	}

	@keyframes fadeout {
		from {bottom: 30px; opacity: 1;}
		to {bottom: 0; opacity: 0;}
	}
	#image{
		width:600px;
		margin-left: 14px;
	}
	.hinh{
		width:110px;
		height:110px;
		float:left;
		
	}
	.w3-container{
		float:left;
		margin-left: 11px;
    	margin-bottom: 11px;
	}
	.clear{
		clear:both;
	}

</style>
