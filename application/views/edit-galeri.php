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
			<ul id="dashboard-menu" class="nav nav-list collapse in">
				<li><a href="<?php echo base_url().'index.php/User'?>">Home</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/berita'?>">Berita</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/editberita'?>">Edit Berita</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/ebook'?>">E-Book</a></li>
				<li class="active"><a href="<?php echo base_url().'index.php/Admin/galeri'?>">Galeri Foto</a></li>            
			</ul>

			<a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
			<ul id="accounts-menu" class="nav nav-list collapse">
				<li><a href="<?php echo base_url().'index.php/Admin/addAccount'?>">Add Account</a></li>
				<li><a href="<?php echo base_url().'index.php/Admin/editAccount'?>">Edit Account</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="header">
				<h1 class="page-title">Galeri</h1>
			</div>
			<ul class="breadcrumb">
				<li>Galeri<span class="divider">/</span></li>
				<li>Edit<span class="divider">/</span></li>
			</ul>
			<div class="">
				<div class="row-fluid">
					<div class="well">
					<form method="post" name="e-book" id="tab" enctype="multipart/form-data">
								<label>Gambar</label>
								<input type="file" name="userfile" accept="image/*">
								<label>Kategori</label>
								<select name="kategori">
									<option value="ekstrakurikuler">Ekstrakurikuler</option>
									<option value="KBM">KBM</option>
									<option value="kerjasama">Kerjasama</option>
									<option value="prestasi">Prestasi</option>
									<option value="study tour">Study Tour</option>
									<option value="workshop">Workshop</option>
								</select>
								<div class="btn-toolbar">
									<input type="submit" name="upload" value="Upload" class="btn btn-primary">
								</div>
							</form>
							<?php
								if(isset($_POST["upload"])){
									$config['allowed_types'] = 'png|jpg|jpeg';
									$config['upload_path'] = './assets/images/galeri';
									$config['max_size'] = '2048';
									$this->upload->initialize($config);
									if($this->upload->do_upload()){
										$kategori = $_POST["kategori"];
										$nama = $this->upload->data('file_name');
										$this->db->query("INSERT INTO galeri (nama,kategori) VALUES ('".$nama."','".$kategori."')");
										redirect(base_url().'index.php/Admin/galeri');
									}
									else
										echo "<script>alert('".$this->upload->display_errors()."');</script>";
								}
							?>
							<hr>
							<!--####################################-->
							  <table>
							  <tr>
								<th>Nama</th>
								<th>Kategori</th>
								<th></th>
							  </tr>
							  <?php
								foreach ($tabel->result() as $row):
									echo "<tr>";
									echo "<td><a href=\"#\" id=\"$row->nama\" onClick=\"popup('".base_url()."assets/images/galeri/".$row->nama."')\">$row->nama</a></td>";
									form_open('edit');
							  ?>
								<td>
									<select name="kategori">
										<option value="ekstrakurikuler" <?php if($row->kategori=="ekstrakurikuler") echo "selected";?>>Ekstrakurikuler</option>
										<option value="KBM" <?php if($row->kategori=="KBM") echo "selected";?>>KBM</option>
										<option value="kerjasama" <?php if($row->kategori=="kerjasama") echo "selected";?>>Kerjasama</option>
										<option value="prestasi" <?php if($row->kategori=="prestasi") echo "selected";?>>Prestasi</option>
										<option value="study tour" <?php if($row->kategori=="study tour") echo "selected";?>>Study Tour</option>
										<option value="workshop" <?php if($row->kategori=="workshop") echo "selected";?>>Workshop</option>
									</select>
								</td>
								<td>
									<div class="btn-toolbar">
										<input type="submit" value="Ubah" name="ubah<?php echo $row->id_galeri;?>" class="btn btn-primary">
										<input type="submit" value="Hapus" name="hapus<?php echo $row->id_galeri;?>" class="btn">
									</div>
								</td>
							  <?php	form_close();
									echo "</tr>";
									$ubah="ubah".$row->id_galeri;
									$hapus="hapus".$row->id_galeri;
									if(isset($_POST["$hapus"])){
										unlink('./assets/images/galeri/'.$row->nama);
										$this->db->query("DELETE FROM ebook WHERE nama='$row->nama'");
										redirect(base_url().'index.php/Admin/galeri');
									}
									if(isset($_POST["$ubah"])){
										$this->db->query("UPDATE FROM galeri SET kategori='".$_POST["kategori"]."' WHERE nama='".$row->nama."'");
										redirect(base_url().'index.php/Admin/galeri');
									}
								endforeach;
							?>
							</table>
							<nav class="pagination">
								<ul>
								  <?php echo $this->pagination->create_links(); ?>
								</ul>
							</nav>
			</div>
			<footer>
				<hr>                       
				<p>&copy; 2016 <a href="<?php echo base_url();?>">SMK CyberMedia</a></p>
			</footer>
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
		<script type="text/javascript">
			function popup(url){
				popupWindow = window.open(url,'Image','height=700,width=800,left=10,top=10,resizeable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes,addressbar=no')
			}
		</script>
    
	</body>
</html>