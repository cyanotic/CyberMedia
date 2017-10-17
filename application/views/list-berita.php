<html>
<head>
<title>Berita</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo base_url().'layout/styles/layout.css'  ?>" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo2.png" height="70" width="150"></a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li><a class="drop" href="#" id="prof">Profil</a>
          <ul>
            <li><a href="#" id="visi-misi">Visi dan Misi</a></li>
            <li><a href="pages/full-width.html">Struktur Organisasi</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url().'index.php/User'?>">Login</a></li>
        <li class="active"><a class="drop" href="#" id="berita">Berita</a>
          <ul>
            <li><a href="#">Kegiatan</a></li>
            <li><a href="#">Olahraga</a></li>
            <li><a href="#">KBM</a></li>
            <li><a href="#">Ekstrakurikuler</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url().'index.php/Home/Download';?>">Download</a></li>
        <li><a href="#" id="galeri">Galeri Foto</a></li>
        <li><a href="#" id="kontak">Hubungi Kami</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
		<!--Dont Delete This!!-->
		<div class="wrapper row2">
		<div id="breadcrumb" class="hoc clear"> 
		<ul>
		<li>
		</ul>
		</div>
		</div>
		<br>
		<!--Dont Delete This!!-->
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
		  <?php
			$num = $tabel;
			$num1 = $tabel;
			if($num->num_rows()==0):
				echo "<header class=\"heading\">Tidak Ada Berita</header>";
			else:
		  ?>
		  <div class="sidebar"> 
      <!-- ################################################################################################ -->
      <nav class="sdb_holder">
        <ul>
		<?php
		foreach($tabel->result() as $row){
          echo "<li>";
//		  echo "<div>";
		  echo "<a href=\"".base_url().'index.php/Home/berita/'.$row->id_berita."\">[$row->tanggal] $row->judul</a>";
//		  echo "<img class=\"imgl borderedbox inspace-5\" src=\"".base_url().'assets/images/berita/'.$row->gambar."\">";
//		  echo substr($row->berita,0,200)."&hellip;";
//		  echo "</div>";
		  echo "</li>";
		}
			endif;
		?>
		</ul>
      </nav>
		</div>
	  <nav class="pagination">
        <ul>
		  <?php echo $this->pagination->create_links(); ?>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="two_quarter first">
      <h6 class="title">Fermentum mi ornare</h6>
      <p>Consectetur sodales interdum sed feugiat tellus orci id fringilla sem pulvinar in aliquam mattis nisl ac justo venenatis gravida vel nulla velit placerat.</p>
      <p>Sollicitudin suscipit ut eleifend lorem non ultrices blandit praesent lobortis malesuada dictum phasellus.</p>
    </div>
    <div class="two_quarter">
      <h6 class="title">Kontak Kami</h6>
      <ul class="nospace linklist contact">
        <li><i class="fa fa-map-marker"></i>
          <address>
          Jl. Duren Tiga no. 12, Pancoran, Jakarta Selatan
          </address>
        </li>
        <li><i class="fa fa-phone"></i> (021) 791-92313</li>
        <li><i class="fa fa-fax"></i> (021) 791-92313</li>
        <li><i class="fa fa-envelope-o"></i> info@cybermedia.sch.id</li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">SMK CyberMedia</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="<?php echo base_url();?>layout/scripts/jquery.min.js"></script>
<script src="<?php echo base_url();?>layout/scripts/jquery.kontak.js"></script>
<script src="<?php echo base_url();?>layout/scripts/jquery.backtotop.js"></script>
<script src="<?php echo base_url();?>layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>