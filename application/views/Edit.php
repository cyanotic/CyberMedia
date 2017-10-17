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
	<body class="">
		
		<div class="navbar">
			<div class="navbar-inner">
					<ul class="nav pull-right">
						
						<li><a href="#" class="hidden-phone visible-tablet visible-desktop" role="button">
							<i class="icon-user"></i> 
							<?php
								$query = $this->db->query("SELECT * FROM guru WHERE username=\"".$this->session->username."\"");
								$row = $query->row();
								echo $row->nama;
							?></a></li>
						<li><a href="<?php echo base_url().'index.php/User/logout'?>" class="hidden-phone visible-tablet visible-desktop" role="button">Logout</a></li>
					</ul>
					<a class="brand" href="<?php echo base_url();?>"><span class="first">SMK</span> <span class="second">CyberMedia</span></a>
			</div>
		</div>
		<div class="sidebar-nav">
			<a href="#dashboard-menu" class="nav-header" id="top" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>
			<ul id="dashboard-menu" class="nav nav-list collapse">
				<li><a href="<?php echo base_url().'index.php/User'?>">Home</a></li>
				<li><a href="<?php echo base_url().'index.php/User/upload'?>">Upload E-Book</a></li>
				<li><a href="<?php echo base_url().'index.php/User/hapus'?>">Hapus E-Book</a></li>
			</ul>
			<a href="#accounts-menu"  class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
			<ul id="accounts-menu" class="nav nav-list collapse in">
				<li <?php if($tipe=="profile") echo "class=\"active\""?>><a href="<?php echo base_url().'index.php/User/edit/profile'?>">Edit Profile</a></li>
				<li <?php if($tipe=="password") echo "class=\"active\""?>><a href="<?php echo base_url().'index.php/User/edit/password'?>">Change Password</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="header">
				<h1 class="page-title"><?php
					if($tipe=="profile")
						echo "Edit Profile";
					else if($tipe=="password")
						echo "Change Password";
				?></h1>
			</div>
			<ul class="breadcrumb">
				<li>Account<span class="divider">/</span></li>
				<li>Edit<span class="divider">/</span></li>
			</ul>
			<div class="">
				<div class="row-fluid">
					<div class="well">
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active in" id="profil" <?php if($tipe=="password") echo "style=\"display:none;\"";?>>
							<?php
								$query = $this->db->query("SELECT * FROM guru WHERE username=\"".$this->session->username."\"");
								$row = $query->row();
								$nama = $row->nama;
								$NIP = $row->NIP;
								$tanggal = $row->tanggal_lahir;
								$tempat = $row->tempat_lahir;
								$pass = $row->password;
								
							?>
								<form method="post" name="akun" id="tab">
									<label>NIP</label>
									<input type="number" name="NIP" class="input-xlarge" required value="<?php echo $NIP;?>">
									<label>Nama</label>
									<input type="text" name="nama" class="input-xlarge" required value="<?php echo $nama;?>">
									<label>Tanggal Lahir (YYYY-MM-DD)</label>
									<input type="date" name="tanggal" class="input-xlarge" required value="<?php echo $tanggal;?>">
									<label>Tempat Lahir</label>
									<input type="date" name="tempat" class="input-xlarge" required value="<?php echo $tempat;?>">
									<label>Your Password</label>
									<input type="password" name="pass" class="input-xlarge" required>
									<div class="btn-toolbar">
										<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
										<input type="reset" value="Reset" class="btn">
									</div>
								</form>
								<?php
									if(isset($_POST["simpan"])){
										if($_POST["pass"] == $pass){
											$NIP = $_POST["NIP"];
											$nama = $_POST["nama"];
											$tanggal = $_POST["tanggal"];
											$tempat = $_POST["tempat"];
											$date = explode("-",$tanggal);
											if(!checkdate($date[1],$date[2],$date[0]))
												echo "<script>alert('Tanggal lahir salah');</script>";
											else if($this->db->query("UPDATE guru SET NIP = '$NIP', nama = '$nama',tanggal_lahir = '$tanggal', tempat_lahir = '$tempat' WHERE username = \"".$this->session->username."\"")){
												echo "<script>";
												echo "akun.NIP.value='".$NIP."';";
												echo "akun.nama.value='".$nama."';";
												echo "akun.tanggal.value='".$tanggal."';";
												echo "akun.tempat.value='".$tempat."';";
												echo "alert('Data Berhasil Diperbaharui');";
												echo "</script>";
											}
										}
										else{
											echo "<script>";
											echo "alert('Password salah');";
											echo "</script>";
										}
									}
								?>
							</div>
							<div class="tab-pane active in" id="password" <?php if($tipe=="profile") echo "style=\"display:none;\"";?>>
								<form method="post" name="password" id="tab">
									<label>Old Password</label>
									<input type="password" name="old" class="input-xlarge" required>
									<label>New Password</label>
									<input type="password" name="new" class="input-xlarge" required>
									<label>Verify Password</label>
									<input type="password" name="new2" class="input-xlarge" required>
									<div class="btn-toolbar">
										<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
										<input type="reset" value="Reset" class="btn">
										<div class="btn-group">
										</div>
									</div>
								</form>
								<?php
									if(isset($_POST["ubah"])){
										if ($_POST["old"]!=$pass)
											echo "<script>alert('Password Lama Salah');</script>";
										else if($_POST["new"]!=$_POST["new2"])
											echo "<script>alert('Password Tidak Sama');</script>";
										else if($_POST["new"]==$pass)
											echo "<script>alert('Password Baru Sama Dengan Password Lama');</script>";
										else{
											$new=$_POST["new"];
											$this->db->query("UPDATE guru SET password = '$new' WHERE username = \"".$this->session->username."\"");
											echo "<script>alert('Password Telah Diperbaharui');</script>";
										}
										
									}
								?>
							</div>
						</div>
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
