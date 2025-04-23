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

<body class="bg-neutral-200">
	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->
	<?php foreach ($product as $i) { ?>
		<section id="item" class="my-24">
			<div class="w-full">
				<div class="bg-neutral-200">
					<div class="container mx-auto px-4">
						<div class="flex flex-wrap -mx-4">
							<!-- Product Images -->
							<div class="w-full md:w-1/2 px-4 mb-8">
								<div class="flex h-2xl min-h-lg bg-blue-950 justify-center items-center rounded-xl">
									<img src="<?= base_url('src/item/' . $i->product_thumbnail) ?>" alt="Product"
										class="w-lg max-h-sm rounded-xl shadow-md mb-4" id="mainImage">
								</div>
								<div class="flex gap-4 py-4 justify-center overflow-x-auto">
									<img src="https://images.unsplash.com/photo-1505751171710-1f6d0ace5a85?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMnx8aGVhZHBob25lfGVufDB8MHx8fDE3MjEzMDM2OTB8MA&ixlib=rb-4.0.3&q=80&w=1080"
										alt="Thumbnail 1"
										class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
										onclick="changeImage(this.src)">
									<img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw0fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
										alt="Thumbnail 2"
										class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
										onclick="changeImage(this.src)">
									<img src="https://images.unsplash.com/photo-1496957961599-e35b69ef5d7c?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
										alt="Thumbnail 3"
										class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
										onclick="changeImage(this.src)">
									<img src="https://images.unsplash.com/photo-1528148343865-51218c4a13e6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwzfHxoZWFkcGhvbmV8ZW58MHwwfHx8MTcyMTMwMzY5MHww&ixlib=rb-4.0.3&q=80&w=1080"
										alt="Thumbnail 4"
										class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
										onclick="changeImage(this.src)">
								</div>
							</div>

							<!-- Product Details -->
							<div class="w-full md:w-1/2 px-4">
								<h2 class="text-3xl font-bold mb-2"><?= $i->product_name ?></h2>
								<div class="mb-4">
									<span class="text-2xl font-bold mr-2">Rp <span
											class="rp"><?= $i->product_price ?></span></span>
									<span class="text-neutral-500">Harga Item</span>
								</div>
								<div class="flex items-center mb-4">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										class="size-6 text-yellow-500">
										<path fill-rule="evenodd"
											d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
											clip-rule="evenodd" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										class="size-6 text-yellow-500">
										<path fill-rule="evenodd"
											d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
											clip-rule="evenodd" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										class="size-6 text-yellow-500">
										<path fill-rule="evenodd"
											d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
											clip-rule="evenodd" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										class="size-6 text-yellow-500">
										<path fill-rule="evenodd"
											d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
											clip-rule="evenodd" />
									</svg>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
										class="size-6 text-yellow-500">
										<path fill-rule="evenodd"
											d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
											clip-rule="evenodd" />
									</svg>
								</div>
								<div class="mb-6">
									<h3 class="text-lg font-semibold mb-2">Varian 2 :</h3>
									<div class="flex space-x-2">
										<button
											class="w-8 h-8 bg-black rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"></button>
										<button
											class="w-8 h-8 bg-neutral-300 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-300"></button>
										<button
											class="w-8 h-8 bg-blue-500 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"></button>
									</div>
								</div>

								<div class="mb-6">
									<h3 class="text-lg font-semibold mb-2">Varian 1 :</h3>
									<div class="flex space-x-2">
										<ul class="grid w-full gap-6 md:grid-cols-2">
											<li>
												<input type="radio" id="hosting-small" name="hosting" value="hosting-small"
													class="hidden peer" required />
												<label for="hosting-small"
													class="inline-flex items-center justify-between p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
													<p>Rexio</p>
												</label>
											</li>
										</ul>
									</div>
								</div>

								<div class="mb-6">
									<label for="quantity"
										class="block text-sm font-medium text-neutral-700 mb-2">Quantity:</label>
									<input type="number" id="quantity" name="quantity" min="1" value="1"
										class="w-16 text-center rounded-md border-neutral-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
								</div>

								<div class="flex space-x-4 mb-6">
									<button
										class="bg-indigo-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											stroke-width="1.5" stroke="currentColor" class="size-6">
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
										</svg>
										Add to Cart
									</button>
									<button
										class="bg-neutral-200 flex gap-2 items-center  text-neutral-800 px-6 py-2 rounded-md hover:bg-neutral-300 focus:outline-none focus:ring-2 focus:ring-neutral-500 focus:ring-offset-2">
										<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
											stroke-width="1.5" stroke="currentColor" class="size-6">
											<path stroke-linecap="round" stroke-linejoin="round"
												d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
										</svg>
										Wishlist
									</button>
								</div>

								<div>
									<h3 class="text-lg font-semibold mb-2">Key Features:</h3>
									<ul class="list-disc list-inside text-neutral-700">
										<li>Industry-leading noise cancellation</li>
										<li>30-hour battery life</li>
										<li>Touch sensor controls</li>
										<li>Speak-to-chat technology</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	<div class="text-center">
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
</body>

</html>
