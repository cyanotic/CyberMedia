<!DOCTYPE html>

<html>
<head>
<title>SMK Cyber Media</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php echo base_url().'layout/styles/layout.css'  ?>" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
        <div id="logo" class="fl_left">
    <h1><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo2.png" height="70" width="150"></a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
        <li><a class="drop" href="#" id="prof">Profil</a>
          <ul>
            <li><a href="#" id="visi-misi">Visi dan Misi</a></li>
            <li><a href="#struktur">Struktur Organisasi</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url().'index.php/User'?>">Login</a></li>
        <li><a class="drop" href="#" id="berita">Berita</a>
          <ul>
            <li><a href="<?php echo base_url().'index.php/Home/viewberita/kegiatan'?>">Kegiatan</a></li>
            <li><a href="<?php echo base_url().'index.php/Home/viewberita/olahraga'?>">Olahraga</a></li>
            <li><a href="<?php echo base_url().'index.php/Home/viewberita/kbm'?>">KBM</a></li>
            <li><a href="<?php echo base_url().'index.php/Home/view	berita/ekstrakurikuler'?>">Ekstrakurikuler</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url().'index.php/Home/download';?>">Download</a></li>
        <li><a href="#" id="galeri">Galeri Foto</a></li>
        <li><a href="#" id="kontak">Hubungi Kami</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<div id="struktur" class="popup">
	<div class="topop" align="center">
		<h2><strong>STRUKTUR ORGANISASI</strong></h2>
		<a class="close" href="#">&times;</a>
		<a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo2.png" height="70" width="150"></a>
	</div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/home.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <h2 class="heading">SMK Cyber Media Jakarta</h2>
      <p>SMK Cyber Media Jakarta merupakan ....</p>
      <footer><a class="btn" href="#">Read More</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
	
    <!-- main body -->
    <!-- ################################################################################################ -->
    	<div class="group btmspace-80">
      <div>
        <h4>Visi dan Misi Sekolah</h4>
        <p>Visi :</p>
        <p>Menjadi lembaga pendidikan kejuruan yang mampu menghasilkan tenaga terampil sesuai setandar global<p>
      </div>
      <br>
      <div>
        <p>Misi :</p>
        <p>1. Fokus pada kualitas kurikulum dan pembelajaran yang berbasis kopetensi</p>
        <p>2. Mengembangkan profesionalisme dengan penguasaan bahasa asing dan disiplin tinggi</p>
        <p>3. Menjawab tuntutan perusahaan akan tenaga terampil pada tingkat tehnis operasional</p>
      </div>
    </div>
    <!--div class="group">
    </div-->
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper" id="album">
  <section id="latest" class="container clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h3 class="font-x2 nospace">Album</h3>
      <p class="nospace">Galeri Foto Kegiatan dan Agenda yang ada di SMK CyberMedia.</p>
    </div>
    <ul class="nospace group">
      <li>
        <figure class="txtoverlay"><a href="#"><img src="
		<?php
			$query = $this->db->get_where('galeri','kategori="ekstrakurikuler"');
			$src = base_url()."images/demo/latest/02.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">Ekstrakurikuler</h6>
            <p>Galeri foto kegiatan ekstrakurikuler yang ada di SMK CyberMedia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/ekstrakurikuler';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
      <li>
        <figure class="txtoverlay"><a href="#"><img src="
		<?php
			$query = $this->db->get_where('galeri','kategori="KBM"');
			$src = base_url()."images/demo/latest/02.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">KBM</h6>
            <p>Galeri foto kegiatan belajar mengajar yang ada di SMK CyberMedia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/KBM';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
      <li>
        <figure class="txtoverlay"><a href="#"><img src="
		<?php
			$query = $this->db->get_where('galeri','kategori="kerjasama"');
			$src = base_url()."images/demo/latest/01.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">Kerjasama DU/DI</h6>
            <p>Galeri foto pada saat kerja sama dengan DU/DI yang ada di Indonesia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/kerjasama';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
      <li>
        <figure class="txtoverlay"><a href="#"><img src="<?php
			$query = $this->db->get_where('galeri','kategori="prestasi"');
			$src = base_url()."images/demo/latest/02.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">Prestasi</h6>
            <p>Galeri foto prestasi yang diraih oleh siswa/i SMK CyberMedia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/prestasi';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
      <li>
        <figure class="txtoverlay"><a href="#"><img src="<?php
			$query = $this->db->get_where('galeri','kategori="study tour"');
			$src = base_url()."images/demo/latest/01.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">Study Tour</h6>
            <p>Galeri foto study tour yang pernah diadakan oleh SMK CyberMedia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/study-tour';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
      <li>
        <figure class="txtoverlay"><a href="#"><img src="<?php
			$query = $this->db->get_where('galeri','kategori="workshop"');
			$src = base_url()."images/demo/latest/02.png";
			if($query->num_rows()>0)
				$src = base_url()."assets/images/galeri/".$query->last_row()->nama;
			echo $src;
		?>" alt=""></a>
          <figcaption class="txtcaption">
            <h6 class="heading">Workshop</h6>
            <p>Galeri foto workshop yang pernah diadakan di SMK CyberMedia.</p>
            <footer><a href="<?php echo base_url().'index.php/Home/galeri/workshop';?>">View Details &raquo;</a></footer>
          </figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="btmspace-50">
      <h3 class="font-x2 nospace">Berita & Informasi</h3>
      <!--p class="nospace">Gravida tincidunt tortor ac efficitur fusce sed arcu lorem.</p-->
    </div>
    <div class="group">
      <article class="one_third first"><a href="<?php echo base_url().'index.php/Home/berita/'.$berita1->id_berita;?>"><img class="btmspace-30" src="<?php echo base_url().'assets/images/berita/'.$berita1->gambar;?>" alt=""></a>
        <h4 class="nospace font-x1"><?php echo $berita1->judul;?></h4>
        <p><?php
			echo substr($berita1->berita,0,100)."&hellip;";
		?></p>
        <footer><a class="btn" href="<?php echo base_url().'index.php/Home/berita/'.$berita1->id_berita;?>">Read More</a></footer>
      </article>
      <article class="one_third"><a href="<?php echo base_url().'index.php/Home/berita/'.$berita2->id_berita;?>"><img class="btmspace-30" src="<?php echo base_url().'assets/images/berita/'.$berita2->gambar;?>" alt=""></a>
        <h4 class="nospace font-x1"><?php echo $berita2->judul;?></h4>
        <p><?php
			echo substr($berita2->berita,0,100)."&hellip;";
		?></p>
        <footer><a class="btn" href="<?php echo base_url().'index.php/Home/berita/'.$berita2->id_berita;?>">Read More</a></footer>
      </article>
      <article class="one_third"><a href="<?php echo base_url().'index.php/Home/berita/'.$berita3->id_berita;?>"><img class="btmspace-30" src="<?php echo base_url().'assets/images/berita/'.$berita3->gambar;?>" alt=""></a>
        <h4 class="nospace font-x1"><?php echo $berita3->judul;?></h4>
        <p><?php
			echo substr($berita3->berita,0,100)."&hellip;";
		?></p>
        <footer><a class="btn" href="<?php echo base_url().'index.php/Home/berita/'.$berita3->id_berita;?>">Read More</a></footer>
      </article>
    </div>
	<div align=center style="margin-top:20px">
	<a class="btn" href="<?php echo base_url().'index.php/Home/viewberita/all'?>">Read All Information</a>
	</div>
    <!-- ################################################################################################ -->
  </section>
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
    <p class="fl_left">Copyright &copy; 2016 - All Rights Reserved - <a href="#">CyberMedia</a></p>
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
<script src="<?php echo base_url();?>layout/scripts/jquery.all.js"></script>
<script src="<?php echo base_url();?>layout/scripts/jquery.backtotop.js"></script>
<script src="<?php echo base_url();?>layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>