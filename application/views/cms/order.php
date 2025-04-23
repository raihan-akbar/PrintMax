<!DOCTYPE html>
<html class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Sources Assets -->
	<?php $this->load->view('cms/parts/source'); ?>
</head>

<body class="bg-neutral-200">
	<?php $this->load->view('cms/parts/navside'); ?>

	<!-- Page Script Here -->
	<div class="p-4 sm:ml-64">
		<div class="p-2 mt-14">
			<!-- Page Content Script Here -->
			<div id="page-header" class="w-full">
				<h3 class="text-2xl font-bold text-neutral-900">Page Title</h3>
				<p class="font-base text-neutral-800">
					Page description is should be be for explaining to use.
				</p>
			</div>
			<div class="w-full">
				<hr class="w-full h-px my-4 bg-neutral-500 border-0">
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<?php $this->load->view('cms/parts/addon'); ?>
</body>

</html>
