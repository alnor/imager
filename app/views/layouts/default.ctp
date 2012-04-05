<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title_for_layout?></title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/image_control.js"></script>
	<?php echo $scripts_for_layout; ?>
</head>

<body>

<div id="header">
    <div id="menu"></div>
</div>

<div id="content">
	<?php echo $content_for_layout ?>
</div>

<div id="footer">
</div>

</body>
</html>