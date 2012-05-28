<?php 

	require_once "result.php";
	require_once "form.php";

	$output = "";

	if (isset($_GET['p1'])) {
	
		$r = new Result();
		$output .= $r->Main();
	
	} else {

		$f = new Form();
		$output .= $f->Main();
	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<title>Arbetsprov HL-design</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<script src="js.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="css.css" />
	</head>
	<body>
		<div class="intro"><img src="bild.png" alt="bowling"></img></div>
		<?php
			echo $output;
		?>
	</body>
</html>