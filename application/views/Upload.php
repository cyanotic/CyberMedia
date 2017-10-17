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
			<ul id="dashboard-menu" class="nav nav-list collapse in">
				<li><a href="<?php echo base_url().'index.php/User'?>">Home</a></li>
				<li class="active"><a href="<?php echo base_url().'index.php/User/upload'?>">Upload E-Book</a></li>
				<li><a href="<?php echo base_url().'index.php/User/hapus'?>">Hapus E-Book</a></li>
			</ul>
			<a href="#accounts-menu"  class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
			<ul id="accounts-menu" class="nav nav-list collapse">
				<li><a href="<?php echo base_url().'index.php/User/edit/profile'?>">Edit Profile</a></li>
				<li><a href="<?php echo base_url().'index.php/User/edit/password'?>">Change Password</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="header">
				<h1 class="page-title">Upload E-Book</h1>
			</div>
			<ul class="breadcrumb">
				<li>E-Book<span class="divider">/</span></li>
				<li>Upload<span class="divider">/</span></li>
			</ul>
			<div class="">
				<div class="row-fluid">
					<div class="well">
						<div id="myTabContent" class="tab-content">
							<form method="post" name="e-book" id="tab" enctype="multipart/form-data">
								<label>E-Book</label>
								<input type="file" name="userfile" accept=".pdf,.jpg,.jpeg">
								<label>Kategori</label>
								<textarea type="text" name="kategori" class="input-xlarge-text" placeholder="Separate With ' , ' (Coma)" required></textarea>
								<div class="btn-toolbar">
									<input type="submit" name="upload" value="Upload" class="btn btn-primary">
								</div>
							</form>
							<?php
								if(isset($_POST["upload"])){
									$config['allowed_types'] = 'pdf|jpg|jpeg';
									$config['upload_path'] = './assets/documents';
									$config['max_size'] = '102400';
									$this->upload->initialize($config);
									if($this->upload->do_upload()){
										$nama = $this->upload->data('file_name');
										$id_ebook = date('ymdHis');
										$this->db->query('INSERT INTO ebook values ("'.$id_ebook.'","'.$nama.'","'.$this->session->username.'")');
										$kategori = explode(",",$_POST["kategori"]);
										for ($i=0;$i<count($kategori);$i++){
											$this->db->query('INSERT INTO kategori values ("'.$id_ebook.'","'.strtoupper($kategori[$i]).'")');
										}
										//echo "<script>alert('File berhasil diupload');</script>";
										redirect(base_url().'index.php/User/upload');
									}
									else
										echo "<script>alert('File gagal untuk diupload');</script>";
								}
							?>
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
