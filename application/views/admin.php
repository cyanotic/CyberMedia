<html>
	<head>
	</head>
	<body>
		<a href="<?php echo base_url().'index.php/User/logout'?>" id="logout">Logout</a>
		<?php
			$query = $this->db->query("SELECT * FROM admin WHERE username=\"".$this->session->username."\"");
			$row = $query->row();
			echo $row->username;
		?>
	</body>
</html>