<!DOCTYPE html>
<html>
<head>
<title><?=$title?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="<?=favicon()?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/font-awesome.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/animate.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/font.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/li-scroller.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/slick.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/jquery.fancybox.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/theme.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('templates/siehan/assets/css/style.css');?>">
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
	<header id="header">
    	<?php include 'header.php'; ?>
  	</header>
	<section id="navArea">
		<?php include 'navbar.php'; ?>
	</section>

	<section id="contentSection">
    	<?php echo $contents; ?>
  	</section>

	<footer id="footer">
    	<?php include 'footer.php'; ?>
  </footer>
</div>
<script src="<?php echo base_url('templates/siehan/assets/js/jquery.min.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/wow.min.js');?>"></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/bootstrap.min.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/slick.min.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/jquery.li-scroller.1.0.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/jquery.newsTicker.min.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/jquery.fancybox.pack.js');?> "></script> 
<script src="<?php echo base_url('templates/siehan/assets/js/custom.js');?> "></script>
</body>
</html>