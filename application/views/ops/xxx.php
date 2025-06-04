<!DOCTYPE html>
<html class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Sources Assets -->
	<link rel="icon" type="image/png" href="<?= base_url('_assets/img/sq-logo.png'); ?>">
	<meta name="theme-color" content="#ffffff">
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
	<link href="<?= base_url('_assets/css/custom.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>PrintMax</title>
</head>

<body class="bg-black">
	<?php
	$password = 'monroe123';
	$string = 'monroe123';
	$cost = array('cost' => 8);
	$bcrypt = password_hash($password, PASSWORD_BCRYPT, $cost);

	$cut = explode('$', $bcrypt);
	$pieces = array($cut[3],);
	$save = implode('', $pieces);
	$full_password = "$2y$08$" . $save;

	$key = bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2)) . "-" . bin2hex(random_bytes(4 / 2));
	$key2 = random_int(000, 999).date('y') . "-" . random_int(0,9).date('md');
	if (password_verify($string, $full_password)) {
		$bcrypt_verify = "[OK]";
	} else {
		$bcrypt_verify = "[FAIl]";
	}

	?>

	<p><code class="text-neutral-300">String : <?= $password ?></code></p>
	<p><code class="text-neutral-300">BCrypt : <?= $bcrypt ?></code></p>
	<p><code class="text-neutral-300">BCrypt : <?= $save ?></code></p>
	<p><code class="text-neutral-300">BCrypt Verify : <?= $bcrypt_verify ?></code></p>
	<p><code class="text-neutral-300">Key : <?= strtoupper($key); ?></code></p>
	<p><code class="text-neutral-300">Key : <?= strtoupper($key2); ?></code></p>

</body>

</html>