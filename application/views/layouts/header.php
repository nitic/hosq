<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>ระบบจัดการคิวผู้ป่วย</title>

		<!--CSS Load-->
		<?php echo link_tag('assets/css/gcss.css'); ?>
		<?php echo link_tag('assets/fonts.css'); ?>
		<?php echo link_tag('assets/css/jquery.modal.min.css'); ?>
		<?php echo link_tag('assets/css/footable.standalone.min.css'); ?>
		<?php echo link_tag('assets/css/font-awesome.min.css'); ?>
		<?php echo link_tag('assets/css/autocomplete.css'); ?>
		<?php echo link_tag('assets/css/pikaday.css'); ?>

    <!--JS Load-->
		<script type="text/javascript">
	  		var BASE_URL = "<?php echo base_url(); ?>";
	  		var Broadcast = {
								POST : "<?php echo POST; ?>",
								BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
								BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
	  						};
	  </script>
		<script src="<?php echo base_url('assets/js/jquery-2.1.1.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/moment-with-locales.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/jquery.modal.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/footable.min.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/autocomplete.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/js/pikaday.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/app/Connection3.js');?>" type="text/javascript"></script>



<style>

body {
color: #666;
font-family: Tahoma;
background-color: #eee;
}
.body-wrapper{
padding-bottom: 50px;
}
.wrapper {
padding: 10px;
background-color: #FFF;
box-shadow: 0 0 0 2px #ddd;
}

header.header, div.top-footer {
background: #DCE35B;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #45B649, #DCE35B);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #45B649, #DCE35B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


}

header.header div.hgroup {
padding: 15px 0;
color: #ffffff;
width: 100%;
}

.logo{
		width: 70px;
}

h1 {
font-family: 'Share Tech Mono', Tahoma;
color:#fff;
}
h4 {
	color:#fff;
}

footer#footer {
background-color: #333;
color: #fff;
font-family: 'Share Tech Mono', Tahoma;
position: fixed;
bottom: 0;
left: 0;
height: 3em;
width: 100%;
}
footer#footer p {
padding: 0 10px;
margin: 0;
line-height: 3em;
}


/* เมนูหลัก */
.topmenu {
display: inline-block;
vertical-align: middle;
line-height: 2em;
background-color: #77819C;
}
.topmenu > ul ul {
box-shadow: 0 0 3px rgba(0,0,0,0.1);
background-color: #FFF;
}
.topmenu > ul > li > a {
color: #FFF;
}

.topmenu > ul > li > a:hover {
color: #333;
background-color: #f1f1f1;
}
@media only screen and (max-width: 960px) {
.topmenu > ul, .topmenu > ul ul {
background-color: #D6DCE7;
color: #FFF;
}
}

/* style ภายในเนื้อหา */
.article {
padding-bottom: 5px;
border-bottom: 2px dashed #EEE;
}
.article h2 {
font-size: 1.2em;
color: #999;
}

a.light:hover{
	color:#000;
}

.term7 {
  background-color: #92756A;
}
.term8 {
  background-color: #ddd;
	color:#666;
}


/* pageing */
ul.lists {
	list-style-type: none;
}
ul.lists li{
	padding-top: 5px;
}

.splitpage a{
  background-color: #ddd;
}
.splitpage > a.active{
	 background-color: #333;
	 color: #fff;
}

/* breadcrumbs */
nav.breadcrumbs {
width: 100%;
padding: 5px 10px;
background-color: #F9F9F9;
color: #999;
margin-bottom: 10px;
	-webkit-border-radius: 0 0 6px 6px;
	-moz-border-radius: 0 0 6px 6px;
	border-radius: 0 0 6px 6px;
}

</style>
	<!--[if lt IE 9]>
	<script src=js/html5.js></script>
	<![endif]-->
</head>

<body class=responsive>
	<a class=skip_content href=#content title="Skip to content"></a>
			<header class=header>

				<div class="hgroup gcss-wrapper" style="color:#333">
					<figure class="float-left logo">
						 <div style="width:60px;height:60px;">
						 			<img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="ระบบจัดการคิวผู้ป่วย">
						 </div>
					</figure>
					<h1>ระบบจัดการคิวผู้ป่วย</h1>
					<h4>โรงพยาบาลการแพทย์แผนไทย มหาวิทยาลัยสงขลานครินทร์</h4>

				</div>

				<div class=clear>
						<nav  class="topmenu responsive left">
						<label class=toggle-menu for=toggle-menu><span></span><span></span><span></span></label>
						<input type=checkbox id=toggle-menu class=toggle-menu>
						<ul>
									<li><a href="<?php echo base_url(); ?>queue" <?php if($this->uri->segment(1)=='queue') echo 'style="background-color:#F1F1F1;color:#333"'; ?>><span class="icon-history">ส่งคิวผู้ป่วย</span></a></li>
									<li><a href="<?php echo base_url(); ?>apoitment" <?php if($this->uri->segment(1)=='apoitment') echo 'style="background-color:#F1F1F1;color:#333"'; ?>><span class="icon-calendar">ตารางนัดผู้ป่วย</span></a></li>
									<li><a href="<?php echo base_url(); ?>opd" <?php if($this->uri->segment(1)=='opd') echo 'style="background-color:#F1F1F1;color:#333"'; ?>><span class="icon-address-book">ผลการตรวจรักษา</span></a>
									<li><a href="<?php echo base_url(); ?>welcome/logout"><span class="icon-exit">ออกจากระบบ</span></a></li>
						</ul>
					</nav>

				</div>
			</header>

			<nav class=breadcrumbs>
				<div style="height:20px">
					<span class="float-right icon-user"><?php echo $this->session->userdata('FullName').' ('.$this->session->userdata('Role').')' ?></span>
				</div>

			</nav>
