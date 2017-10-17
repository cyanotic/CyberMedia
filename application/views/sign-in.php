<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SMK CyberMedia | Login</title>
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
                    
                </ul>
                <a class="brand" href="<?php echo base_url();?>"><span class="first">SMK</span> <span class="second">CyberMedia</span></a>
        </div>
    </div>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Login</p>
            <div class="block-body">
                <form method="post" name="login">
                    <label>Username</label>
                    <input type="text" class="span12" name="username" required>
                    <label>Password</label>
                    <input type="password" class="span12" name="password" required>
                    <input type="submit" class="btn btn-primary pull-right" name="login" value="Login">
                    <label class="remember-me"><input type="checkbox"> Remember me</label>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
	<?php
		if(isset($_POST["login"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			$query=$this->db->query("SELECT * FROM admin WHERE username=\"$username\" AND password=\"$password\"");
			if($query->num_rows()==1){
				$this->session->login=true;
				$this->session->username=$_POST["username"];
				$this->session->tipe="admin";
				redirect(base_url().'index.php/User');
				break;
			}
			$query=$this->db->query("SELECT * FROM guru WHERE username=\"$username\" AND password=\"$password\"");
			if($query->num_rows()==1){
				$this->session->login=true;
				$this->session->username=$_POST["username"];
				$this->session->tipe="guru";
				redirect(base_url().'index.php/User');
				break;
			}
			echo "<script>alert('Login Gagal')</script>";
		}
	?>
	</div>    
  </body>
</html>


