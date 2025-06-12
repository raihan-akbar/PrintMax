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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url('_assets/js/sweetalert.min.js') ?>"></script>

	<link href="<?= base_url('_assets/css/custom.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script> -->
	<script>
		tailwind.config = {
			darkMode: 'class',
		}
	</script>

	<script>
		if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
			document.documentElement.classList.add('dark');
		} else {
			document.documentElement.classList.remove('dark')
		}
	</script>


	<title>PrintMax</title>
</head>

<body class="bg-neutral-200 dark:bg-slate-800">
	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->

	<section id="item" class="my-24">
		<div class="w-full">
			<div class="text-center">
				<h2 class="font-bold text-2xl md:text-3xl text-blue-950 dark:text-blue-50 mb-1">PrintMax Contact
				</h2>
				<div class="inline-flex items-center justify-center w-full mb-8">
					<hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-950 dark:bg-blue-50">
				</div>
			</div>
			<div class="px-16 md:px-36">
			</div>
			<div class="px-16 md:px-36">
				<div class="flex flex-wrap">
					<div class="w-full lg:w-1/3 xl:w-1/3 bg-blue-950 p-8">
						<h3 class="text-3xl font-extrabold text-blue-50">Let's get in Touch</h3>
						<!-- <hr class="opacity-45"> -->
						<div class="w-full py-6 space-y-4">
							<p class="text-blue-100 text-xl font-medium align-text-top"><i
									class="fa-solid fa-phone text-xl pr-2"></i> 08111221030</p>
							<p class="text-blue-100 text-xl font-medium align-text-top"><i
									class="fa-solid fa-envelope text-xl pr-2"></i> contact@print-max.site</p>
							<p class="text-blue-100 text-xl font-medium align-text-top"><i
									class="fa-solid fa-map text-xl pr-2"></i> PrintMax - Digital Printing Sukabumi</p>
							<p class="text-blue-100 text-xl font-medium align-text-top">Jl. Surya Kencana No.101,
								Selabatu, Kec. Cikole, Kota Sukabumi, Jawa Barat 43111</p>
						</div>
						<div class="w-full pt-4 space-y-2">
							<h3 class="text-xl font-extrabold text-blue-50">Message Us</h3>
							<input type="text" name="name"
								class="w-full rounded-lg shadow-lg bg-neutral-100 border-neutral-800 shadow-lg dark:bg-slate-700 dark:border-slate-600 dark:text-neutral-200"
								placeholder="Your Full Name">
							<input type="email" name="email"
								class="w-full rounded-lg shadow-lg bg-neutral-100 border-neutral-800 shadow-lg dark:bg-slate-700 dark:border-slate-600 dark:text-neutral-200"
								placeholder="Your Email Address">
							<textarea name="" id="" class="w-full rounded-lg shadow-lg bg-neutral-100 border-neutral-800 shadow-lg p-2  dark:bg-slate-700 dark:border-slate-600 dark:text-neutral-200" placeholder="Your Message" rows="4"></textarea>
							<button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 py-2.5 rounded-lg text-blue-50">Submit</button>
						</div>
					</div>
					<div class="w-full lg:w-2/3 xl:w-2/3 bg-blue-50">
						<div class="w-full">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8285814118003!2d106.9348136!3d-6.911089799999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68493f84c24701%3A0x9bbad8a95961ef87!2sPRINTMAX%20-%20Digital%20Printing%20Sukabumi!5e0!3m2!1sen!2sid!4v1749371626432!5m2!1sen!2sid"
								width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy"
								referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

	<div class="text-center mb-12">
		<a href="<?= base_url('/') ?>" type="button"
			class="text-neutral-200 bg-blue-600 hover:bg-blue-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 border-neutral-200 border-2">
			<i class="fa-solid fa-chevron-left px-2 text-lg"></i>
			<span class="sr-only">Back to Home</span>
		</a>
	</div>

	<?php $this->load->view('public/parts/footer'); ?>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<script src="<?= base_url('_assets/js/helper.js'); ?>"></script>

	<!-- Script for Carousel -->
	<script>
		function changeImage(src) {
			document.getElementById('mainImage').src = src;
		}
	</script>
	<?php $this->load->view('cms/parts/addon'); ?>
	<?= $this->session->flashdata('flash'); ?>

</body>

</html>