<!DOCTYPE html>
<html class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Sources Assets -->
	<?php $this->load->view('cms/parts/source'); ?>
	<!-- Configure dark mode strategy -->
	
</head>

<body class="bg-neutral-200 dark:bg-slate-950">
	<?php $this->load->view('cms/parts/navside'); ?>

	<!-- Page Script Here -->
	<div class="p-2 sm:ml-64">
		<p class="p-2 mt-14">
			<!-- Page Content Script Here -->
		<p class="text-neutral-800 dark:text-neutral-300 text-center">Hello, World!</p>
		
	</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<?php $this->load->view('cms/parts/addon'); ?>
</body>

</html>
