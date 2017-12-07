<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>ระบบจัดการคิวผู้ป่วย</title>

		<!--CSS Load-->
		<?php echo link_tag('assets/css/gcss.css'); ?>
		<?php echo link_tag('assets/fonts.css'); ?>

<style>
body {
	background: #DCE35B;  /* fallback for old browsers */
  background: -webkit-linear-gradient(to left, #45B649, #DCE35B);  /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to left, #45B649, #DCE35B); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  color: #333;
  font-family: 'Athiti', Tahoma, Loma;
  font-size: 16px;
  min-height: 100%;
}
body.loginpage {
  background-color: #1276B9;
}
#logo img {
  max-height: 2em;
}
#login_div {
  height: 100%;
  padding: 30px 0 10px;
  margin: 0 auto;
  max-height: 90%;
}
#login_div label {
  white-space: pre-wrap;
}
#login_div a {
  color: #FFC400;
}
#login_div .comment {
  color: #0F0;
}
#login_div h1 {
  text-align: center;
}
#login_div h1 a {
  color: #FFF;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
  font-weight: bold;
}
#login_div form {
  width: 320px;
  max-width: 95%;
  display: table;
  margin: 0 auto;
  font-size: 1.2em;
  text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.2);
}

#login_div h2 {
  padding: 15px 20px 0 15px;
}
#login_div aside {
  margin: 10px 20px 0;
}
#login_div form fieldset {
  margin: 20px;
  padding: 0;
}
@media only screen and (min-width: 768px) {
  #login_div form {
    margin-top: 30px;
    background-color: #FFF;
    border-radius: 0.5em;
    box-shadow: 0 0 0 10px rgba(0,0,0,0.1);
  }
}
@media only screen and (max-width: 767px) {
  #login_div h2 {
    color: rgba(255, 255, 255, 0.8);
    text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
  }
}
/* Phone, Small Device */
@media only screen and (max-width: 480px) {
  .about .details {
    max-height: 10em;
  }
  #content {
    margin-bottom: 80px;
  }
}


</style>
	<!--[if lt IE 9]>
	<script src=js/html5.js></script>
	<![endif]-->
</head>

<body class="responsive loginpage">

	<div id=slidemenu_content>
		<div class="wrapper_bg">
			<div id=scroll-to class="wrapper">
				<article id=login_div>
						<h1>
						<a href="#p" id=logo><img src="<?php echo base_url('assets/img/logo_login.png'); ?>" alt="ระบบจัดการคิวผู้ป่วย"> ระบบจัดการคิวผู้ป่วย</a>
						</h1>
						<form id=login_frm method=post autocomplete=off action="<?php echo base_url(); ?>welcome/login">
							<h2><span class="icon-enter">เข้าสู่ระบบ</span></h2>
							<aside class="hidden center"></aside>
							<?php
							  $error_message = $this->uri->segment(3);
							  switch ($error_message) {
										case "login_error":
											 echo '<p class=error style="font-size:11pt"><b>Error:</b> Username หรือ Password ไม่ถูกต้องกรุณาป้อนใหม่อีกครั้ง.</p>';
											 break;
										case "access_denied":
											 echo '<p class=error style="font-size:11pt"><b>Error:</b> คุณไม่มีสิทธิเข้าใช้งานระบบ กรุณาติดต่อผู้ดูแลระบบ.</p>';
											 break;
									}
						  ?>
						<fieldset>
								<p><label class="g-input icon-user"><input type=text name=login_username id=login_username value="" maxlength=255 placeholder="PSU-Passport"></label></p>
								<p><label class="g-input icon-key"><input type=password name=login_password id=login_password value="" placeholder="รหัสผ่าน"></label></p>
								<!--<p class="right"><label>จำการเข้าระบบ&nbsp;<input type="checkbox" name="login_remember" value="1"></label></p> /-->
						</fieldset>
						<fieldset>
							<button type=submit class="button login wide">เข้าสู่ระบบ</button>
							<p style="margin-top:20px;font-size:9pt">©2017 All rights reserved. โรงพยาบาลการแพทย์แผนไทย มหาวิทยาลัยสงขลานครินทร์</p>
						</fieldset>
						</form>

					</article>
				</div>
			</div>
			 <p class=center><em class="term2">Update*</em> ตารางนัดผู้ป่วยสามารถเพิ่มจำนวนชั่วโมงและชื่อผู้รับจองได้แล้ว และย้ายไม่ระบุแพทย์มาอยู่หน้าเดียวกัน</p>
	</div>
	<!--[if lt ie 9]>
	<script src=https://omsin.acc.in.th/js/html5.js></script>
	<![endif]-->
	</body>

</html>
