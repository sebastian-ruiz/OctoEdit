<?php
include_once('../src/inc/globals.inc');
if(!is_file(CONFIG_FILE)){ header("Location: ../"); }
if(!isset($_COOKIE['x-codeita-user'])){ header("Location: ../"); }
?><!doctype html>
<html>
	<head>
		<title>OctoEdit</title>
		<link rel="stylesheet" type="text/css" href="../src/css/bootstrap-responsive.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/app.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/design.css" />
		<script src="../src/js/jquery-1.8.3.min.js" type="text/javascript"></script>
		<script src="../src/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
		
	</head>
	<body>
		<div id="main-site">
			<div id="tab-edit">
					<?php include('pages/edit.php'); ?>
			</div>
		</div>
		<script>
		$(function(){
			$("#main-site").tabs();
			
		});
		</script>
	</body>
</html>