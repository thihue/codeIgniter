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
<!-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> -->
<!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->

<script>
	$(document).ready(function () {
			$('#example').DataTable();
		});
	function messenger($mess) {
		$("#snackbar").text($mess);
		$("#snackbar").addClass("show");
    	setTimeout(function(){
						$("#snackbar").removeClass("show");
					},4000);
	};
</script>
<style>
	/* @import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css);
        @import url(https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css); */
		.switch {
  position: relative;
  display: inline-block;
  height: 26px;
  width: 26px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 2px;
  bottom: 1px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(12px);
  -ms-transform: translateX(12px);
  transform: translateX(12px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
  width: 28px;
	height: 16px;
}

.slider.round:before {
  border-radius: 50%;
  width: 12px;
height: 14px;
}
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
	.w3-container{
		float:left;
		margin-left: 11px;
    	margin-bottom: 11px;
	}
	.clear{
		clear:both;
	}
	
.form-control {
	width:47%;
}
#alert-msg{
	margin-top: 5px;
    width: 97%;
    padding-left: 16px;
}
.modal-footer {
	padding-right: 33px;
}
.modal-title {
    padding-left: 14px;
}

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal2 {
    display: none;
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content2 {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}
@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}
@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}
/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}
#img01{
	display:block;
}
.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content2 {
        width: 100%;
    }
}

.col-md-offset-0 {
    padding-right: 206px; 
    margin-left: -19px; 
}
.col-md-offset-0 #ten{
    width: 465px;
}
.glyphicon-remove{
	background: red;
}
</style>
