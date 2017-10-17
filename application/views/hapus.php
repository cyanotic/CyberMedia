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
				<li><a href="<?php echo base_url().'index.php/User/upload'?>">Upload E-Book</a></li>
				<li class="active"><a href="<?php echo base_url().'index.php/User/hapus'?>">Hapus E-Book</a></li>
			</ul>
			<a href="#accounts-menu"  class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
			<ul id="accounts-menu" class="nav nav-list collapse">
				<li><a href="<?php echo base_url().'index.php/User/edit/profile'?>">Edit Profile</a></li>
				<li><a href="<?php echo base_url().'index.php/User/edit/password'?>">Change Password</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="header">
				<h1 class="page-title">Hapus E-Book</h1>
			</div>
			<ul class="breadcrumb">
				<li>E-Book<span class="divider">/</span></li>
				<li>Hapus<span class="divider">/</span></li>
			</ul>
			<div class="">
				<div class="row-fluid">
					<div class="well">
						<div id="myTabContent" class="tab-content">
							<?php
								if($tabel->num_rows()!=0):
							?>
							<table>
								<tr>
									<th>Nama E-Book</th>
									<th>Kategori</th>
									<th></th>
								</tr>
								<?php
									foreach($tabel->result() as $row){
										echo "<tr>";
										echo "<td>$row->nama</td>";
										$kategori = $this->db->get_where("kategori","id_ebook='$row->id_ebook'");
										if($kategori->num_rows()==1){
											echo "<td>".$kategori->row()->kategori."</td>";
										}
										else{
											echo "<td>";
											foreach($kategori->result() as $row1){
												if($row1->kategori == $kategori->last_row()->kategori)
													echo "$row1->kategori";
												else
													echo $row1->kategori.", ";
											}
											echo "</td>";
										}
										echo "<td><form method=\"post\"><input type=\"submit\" name=\"$row->id_ebook\" value=\"Hapus\" class=\"btn btn-primary\"></form></td>";
										echo "</tr>";
										if(isset($_POST["$row->id_ebook"])){
											unlink('./assets/documents/'.$row->nama);
											$this->db->query("DELETE FROM ebook WHERE id_ebook='$row->id_ebook'");
											redirect(base_url().'index.php/user/hapus');
										}
									}
								?>
							</table>
							<?php
								else:
									echo "Tidak Ada E-Book Yang Anda Upload";
								endif;
							?>
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
		</div>
		<script src="<?php echo base_url().'layout/';?>lib/bootstrap/js/bootstrap.js"></script>
		<!--script type="text/javascript">
			$("[rel=tooltip]").tooltip();
			$(function() {
				$('.demo-cancel-click').click(function(){return false;});
			});
		</script-->
	</body>
</html>
