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

<body class="bg-slate-200 dark:bg-slate-950">

	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->
	<?php foreach ($item as $i) { ?>
		<form method="post" action="<?= base_url('cust/add_cart/' . $i->product_token) ?>" enctype="multipart/form-data">
			<section id="item" class="my-24">
				<div class="w-full">
					<div class="text-center">
						<h2 class="font-bold text-2xl md:text-3xl text-blue-950 dark:text-blue-50 mb-1">Product Details
						</h2>
						<div class="inline-flex items-center justify-center w-full mb-8">
							<hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-950 dark:bg-blue-50">
						</div>
					</div>
					<div class="bg-slate-200 dark:bg-slate-950">
						<div class="container mx-auto px-4">
							<div class="flex flex-wrap -mx-4">
								<!-- Product Images -->
								<div class="w-full md:w-1/2 px-4 mb-8">
									<div class="flex h-xl min-h-md bg-transparent justify-center items-center rounded-xl">
										<img src="<?= base_url('src/item/_thumbnails/' . $i->product_thumbnails) ?>"
											alt="Product" class="w-md max-h-sm rounded-xl shadow-md mb-4" id="mainImage">
									</div>
									<div class="flex gap-4 py-4 justify-center overflow-x-auto">
										<img src="<?= base_url('src/item/_thumbnails/' . $i->product_thumbnails) ?>"
											alt="Thumbnail 1"
											class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
											onclick="changeImage(this.src)">

										<?php
										$this->load->model('Mod');
										$where = "product_token = '$i->product_token'";
										$getImage = $this->Mod->get('product_image', $where)->result();
										?>

										<?php

										foreach ($getImage as $gi) { ?>
											<img src="<?= base_url('src/item/' . $gi->product_image_name) ?>" alt=""
												class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
												onclick="changeImage(this.src)">
										<?php } ?>
									</div>
								</div>

								<!-- Product Details -->
								<div class="w-full md:w-1/2 px-4">
									<h2 class="text-3xl font-bold mb-2 text-neutral-800 dark:text-neutral-200"><?= $i->product_name ?></h2>
									<div class="mb-4">
										<span class="text-2xl font-bold mr-2 text-neutral-800 dark:text-neutral-200">Rp <span
												class="rp"><?= $i->product_price ?></span></span>
										<span class="text-neutral-500">Base Price</span>
									</div>
									<div class="mb-6">
										<h3 class="text-lg font-semibold mb-2 text-neutral-800 dark:text-neutral-200">Select Variant :</h3>
									</div>
									<div class="mb-6">
										<div class="flex space-x-2">
											<ul class="grid w-full gap-6 md:grid-cols-2">
												<li>
													<label for="hosting-small"
														class="inline-flex items-center justify-between p-2 text-gray-500 bg-neutral-100 border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
														<select name="variant_1" id="" class="border-0">
															<?php
															foreach ($getVariant1 as $v1) {

															?>
																<option value="<?= $v1->product_variant_1_id ?>">
																	<?= $v1->product_variant_1_name ?>
																	(+Rp<?= number_format($v1->product_variant_1_price_mark, 0, ',', '.') ?>)
																</option>

															<?php } ?>
														</select>
														<br>
													</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="mb-6">
										<div class="flex space-x-2">
											<ul class="grid w-full gap-6 md:grid-cols-2">
												<li>
													<label for="hosting-small"
														class="inline-flex items-center justify-between p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
														<select name="variant_2" id="" class="border-0">
															<?php
															foreach ($getVariant2 as $v2) {

															?>
																<option value="<?= $v2->product_variant_2_id ?>">
																	<?= $v2->product_variant_2_name ?>
																	(+Rp<?= number_format($v2->product_variant_2_price_mark, 0, ',', '.') ?>)
																</option>

															<?php } ?>
														</select>
														<br>
													</label>
												</li>
											</ul>
										</div>
									</div>

									<div class="mb-6">
										<label for="quantity"
											class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 mb-2">Quantity:</label>
										<input type="number" id="qty" name="qty" min="1" value="1"
											class="w-16 text-center rounded-md border-neutral-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
									</div>
									<input type="hidden" name="product_name" value="<?= $i->product_name ?>">
									<div class="flex space-x-4 mb-6">
										<button type="submit"
											class="bg-indigo-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
												stroke-width="1.5" stroke="currentColor" class="size-6">
												<path stroke-linecap="round" stroke-linejoin="round"
													d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
											</svg>
											Add to Cart
										</button>
									</div>

									<div>
										<h3 class="text-lg font-semibold mb-2 text-neutral-700 dark:text-neutral-300">About Item:</h3>
										<ul class="list-disc list-inside text-neutral-700 dark:text-neutral-300">
											<p><?= $i->product_desc ?></p>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	<?php } ?>
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