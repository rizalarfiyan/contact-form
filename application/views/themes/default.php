<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<meta name="resource-type" content="document" />
	<meta name="robots" content="all, index, follow" />
	<meta name="googlebot" content="all, index, follow" />
	<?php
	if (!empty($meta)) {
		foreach ($meta as $name => $content) {
			echo "\n\t<meta name=\"${name}\" content=\"${content}\" />";
		}
	}
	if (!empty($canonical)) {
		echo "<link rel=\"canonical\" href=\"${canonical}\" />";
	}
	?>
	<link rel="stylesheet" href="<?= base_url("assets/css/style.min.css") ?>" type="text/css" />
	<?php
	if (!empty($css)) {
		foreach ($css as $file) {
			echo "\n\t<link rel=\"stylesheet\" href=\"${file}\" type=\"text/css\" />";
		}
	}?>
</head>

<body class="font-sans antialiased">
	<?= $output; ?>
	<?php
	if (!empty($js)) {
		foreach ($js as $file) {
			echo "\n\t<script src=\"${file}\" type=\"text/javascript\"></script>";
		}
	}
	?>
</body>

</html>
