<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>SMK CyberMedia</title>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/'?>lib/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url().'layout/'?>stylesheets/theme.css">
		<link rel="stylesheet" href="<?php echo base_url().'layout/'?>lib/font-awesome/css/font-awesome.css">

		<script src="<?php echo base_url().'layout/'?>lib/jquery-1.7.2.min.js" type="text/javascript"></script>

		<!-- Demo page code -->

		<style type="text/css">
			#line-chart {
				height:300px;
				width:800px;
				margin: 0px auto;
				margin-top: 1em;
			}
			.brand { font-family: georgia, serif; }
			.brand .first {
				color: #ccc;
				font-style: italic;
			}
			.brand .second {
				color: #fff;
				font-weight: bold;
			}
		</style>

	</head>

	<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
	<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
	<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
	<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!--> 
	<body class=""> 
	<!--<![endif]-->
		
		<div class="navbar">
			<div class="navbar-inner">
					<ul class="nav pull-right">
						
						<li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">
							<i class="icon-user"></i> 
							<?php
								$query = $this->db->query("SELECT * FROM admin WHERE username=\"".$this->session->username."\"");
								$row = $query->row();
								echo $row->nama;
							?></a></li>
						<li><a href="<?php echo base_url().'index.php/Admin/logout'?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
					</ul>
					<a class="brand" href="<?php echo base_url();?>"><span class="first">SMK</span> <span class="second">CyberMedia</span></a>
			</div>
		</div>
		


		
		<div class="sidebar-nav">
			<a href="#dashboard-menu" class="nav-header" id="top" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
			<ul id="dashboard-menu" class="nav nav-list collapse">
				<li><a href="<?php echo base_url().'index.php/User'?>">Home</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/berita'?>">Berita</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/editberita'?>">Edit Berita</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/ebook'?>">E-Book</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/galeri'?>">Galeri Foto</a></li>            
			</ul>

			<a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
			<ul id="accounts-menu" class="nav nav-list collapse in">
				<li class="active"><a href="<?php echo base_url().'index.php/Admin/addAccount'?>">Add Account</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/editAccount'?>">Edit Account</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="header">
				<h1 class="page-title">Add Account Guru</h1>
			</div>
			<ul class="breadcrumb">
				<li>Account<span class="divider">/</span></li>
				<li>Add<span class="divider">/</span></li>
			</ul>
			<div class="">
				<div class="row-fluid">
					<div class="well">
					<form method="post" name="akun" id="tab">
						<label>NIP</label>
						<input type="number" name="NIP" class="input-xlarge" required>
						<label>Username</label>
						<input type="text" name="username" class="input-xlarge" required>
						<label>Nama</label>
						<input type="text" name="nama" class="input-xlarge" required>
						<label>Tanggal Lahir (YYYY-MM-DD)</label>
						<input type="date" name="tanggal" class="input-xlarge" required>
						<label>Tempat Lahir</label>
						<input type="date" name="tempat" class="input-xlarge" required>
						<label>Password</label>
						<input type="text" name="password" class="input-xlarge" required>
						<div class="btn-toolbar">
							<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
							<input type="reset" value="Reset" class="btn">
						</div>
					</form>
					<?php
						if(isset($_POST["simpan"])){
							$NIP = $_POST["NIP"];
							$username = $_POST["username"];
							$nama = $_POST["nama"];
							$tanggal = $_POST["tanggal"];
							$tempat = $_POST["tempat"];
							$pass = $_POST["password"];
							$coba = $this->db->query("SELECT * FROM guru WHERE NIP='".$NIP."'")->num_rows();
							$coba2 = $this->db->query("SELECT * FROM guru WHERE username='".$username."'")->num_rows();
							$coba3 = $this->db->query("SELECT * FROM guru WHERE username='".$username."'")->num_rows();
							$date = explode("-",$tanggal);
							$sql = "INSERT INTO guru VALUES ('$username','$NIP','$pass','$nama','$tanggal','$tempat')";
							if(checkdate($date[1],$date[2],$date[0]) && $coba==0 && $coba2==0 && $coba3==0 && $this->db->query($sql))
								redirect(base_url().'index.php/Admin/addAccount');
							else{
								echo "<script>alert('Terjadi Kesalahan, Gagal Menyimpan');</script>";
							}
						}
					?>
			<footer>
				<hr>                       
				<p>&copy; 2016 <a href="<?php echo base_url();?>">SMK CyberMedia</a></p>
			</footer>
				</div>
			</div>
			</div>
		</div>
		<script src="<?php echo base_url().'layout/';?>lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script>
    
	</body>
</html>