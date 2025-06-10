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
	<script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
	<title>PrintMax</title>
</head>

<body class="bg-neutral-200">
	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->
	<section id="home">
		<div id="default-carousel"
			class="relative w-full bg-[url('https://zimages.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply"
			data-carousel="slide">

			<!-- Carousel wrapper -->
			<div class="relative h-screen overflow-hidden">
				<!-- Item 0 -->
				<div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
					<div
						class="bg-[url('https://images.unsplash.com/photo-1592312040834-bb0d621713e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
						<div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
							<div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
								<div class="w-64 mt-24 md:mt-14 mb-4">
									<img src="<?= base_url('_assets/img/hr-logo.png'); ?>" class=""
										alt="PrintMAX Logo" />


									<!-- <i class="fa-solid fa-people-group text-4xl text-blue-700"></i> -->
								</div>
								<!-- <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
									Studio Driya Media
								</h1> -->
								<div
									class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
									<a href="#catalogue"
										class="inline-flex items-center px-4 py-2 text-white bg-blue-700 hover:bg-blue-700 font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 transition duration-300">
										<span class="mr-2">Our Products</span>
										<i class="fa-solid fa-arrow-down animate-bounce"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Item 1 -->
				<div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
					<div
						class="bg-[url('https://images.unsplash.com/photo-1527689368864-3a821dbccc34?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
						<div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
							<div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
								<div class="w-16 mt-24 md:mt-14 mb-4">
									<!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
									<i class="fa-solid fa-laptop text-4xl text-blue-700"></i>
								</div>
								<h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
									Print Anything in Just a Few Clicks
								</h1>
								<div
									class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
									<p class="text-blue-50 pt-3">
										<span class="font-regular">
											Order from anywhere, anytime. Simply choose your product, and relax while we
											do the printing.
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Item 2 -->
				<div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
					<div
						class="bg-[url('https://images.unsplash.com/photo-1654481414716-2f4ab5fe0fbe?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
						<div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
							<div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
								<div class="w-16 mt-24 md:mt-14 mb-4">
									<!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
									<i class="fa-solid fa-layer-group text-4xl text-blue-700"></i>
								</div>
								<h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
									From Flyers to Merchandise — We Print It All
								</h1>
								<div
									class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
									<p class="text-blue-50 pt-3">
										<span class="font-regular">
											Business cards, invitations, posters, banners, books, stickers, custom
											gifts, and more — all in one place.
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Item 3 -->
				<div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
					<div
						class="bg-[url('https://images.unsplash.com/photo-1707921645827-f498ff0bd2a4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
						<div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
							<div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
								<div class="w-16 mt-24 md:mt-14 mb-4">
									<!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
									<i class="fa-solid fa-check-circle text-4xl text-blue-700"></i>
								</div>
								<h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
									Top-Notch Quality Without Breaking the Bank
								</h1>
								<div
									class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
									<p class="text-blue-50 pt-3">
										<span class="font-regular">
											Powered by modern printing technology and experienced staff to deliver
											professional results at friendly prices.
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Item 4 -->
				<div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
					<div
						class="bg-[url('https://images.unsplash.com/photo-1560087459-7665dcbd23c8?q=80&w=2188&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
						<div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
							<div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
								<div class="w-16 mt-24 md:mt-14 mb-4">
									<!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
									<i class="fa-solid fa-tasks text-4xl text-blue-700"></i>
								</div>
								<h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
									Track Your Order Status Instantly
								</h1>
								<div
									class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
									<p class="text-blue-50 pt-3">
										<span class="font-regular">
											Stay updated on your print job progress through your dashboard — from
											processing to ready-for-pickup.
										</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Slider indicators -->
			<!-- <div class="absolute z-30 flex left-1/2 -translate-x-1/2 bottom-5 space-x-3 rtl:space-x-reverse">
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="true"
					aria-label="Slide 1" data-carousel-slide-to="0"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 2" data-carousel-slide-to="1"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 3" data-carousel-slide-to="2"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 4" data-carousel-slide-to="3"></button>
			</div> -->
			<!-- Slider controls -->
			<div class="pt-96 xl:pt-0">
				<button type="button"
					class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pt-96 xl:pt-0 opacity-25 hover:opacity-85"
					data-carousel-prev>
					<i class="fa-solid fa-arrow-left text-blue-100 text-2xl shadow-lg hover:animate-pulse"></i>
				</button>
				<button type="button"
					class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pt-96 xl:pt-0 opacity-25 hover:opacity-85"
					data-carousel-next>
					<i class="fa-solid fa-arrow-right text-blue-100 text-2xl shadow-lg hover:animate-pulse"></i>
				</button>
			</div>
		</div>
	</section>

	<section id="client">
		<div class="max-w-3xl mx-auto px-5 my-20">
			<div class="flex flex-col justify-center">

				<div class="text-center">
					<h2 class="font-bold text-2xl md:text-3xl text-blue-950 mb-1">We're Trusted By Brand and Companies
					</h2>
					<div class="inline-flex items-center justify-center w-full mb-8">
						<hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-950">
					</div>
				</div>


				<div class="flex flex-wrap items-center justify-center gap-4 mt-2 md:justify-around">


					<!-- <div class="text-neutral-400">
						<svg xmlns="http://www.w3.org/2000/svg" width="120" height="60"
							fill-rule="evenodd">
							<g transform="matrix(.06928 0 0 .06928 7.367398 13.505331)" fill="none">
								<circle r="50.167" cy="237.628" cx="269.529" fill="#00d8ff"></circle>
								<g stroke="#00d8ff" stroke-width="24">
									<path
										d="M269.53 135.628c67.356 0 129.928 9.665 177.107 25.907 56.844 19.57 91.794 49.233 91.794 76.093 0 27.99-37.04 59.503-98.083 79.728-46.15 15.29-106.88 23.272-170.818 23.272-65.554 0-127.63-7.492-174.3-23.44-59.046-20.182-94.61-52.103-94.61-79.56 0-26.642 33.37-56.076 89.415-75.616 47.355-16.51 111.472-26.384 179.486-26.384z">
									</path>
									<path
										d="M180.736 186.922c33.65-58.348 73.28-107.724 110.92-140.48C337.006 6.976 380.163-8.48 403.43 4.937c24.248 13.983 33.042 61.814 20.067 124.796-9.8 47.618-33.234 104.212-65.176 159.6-32.75 56.788-70.25 106.82-107.377 139.272-46.98 41.068-92.4 55.93-116.185 42.213-23.08-13.3-31.906-56.92-20.834-115.233 9.355-49.27 32.832-109.745 66.8-168.664z">
									</path>
									<path
										d="M180.82 289.482C147.075 231.2 124.1 172.195 114.51 123.227c-11.544-59-3.382-104.11 19.864-117.566 24.224-14.024 70.055 2.244 118.14 44.94 36.356 32.28 73.688 80.837 105.723 136.173 32.844 56.733 57.46 114.21 67.036 162.582 12.117 61.213 2.31 107.984-21.453 121.74-23.057 13.348-65.25-.784-110.24-39.5-38.013-32.71-78.682-83.253-112.76-142.115z">
									</path>
								</g>
							</g>
							<path
								d="M64.62 38.848l-4.26-6.436c2.153-.19 4.093-1.75 4.093-4.6 0-2.9-2.058-4.756-4.945-4.756h-6.34v15.78h1.964v-6.27h3.147l4.022 6.27zm-5.347-7.997h-4.14v-6.033h4.14c1.87 0 3.147 1.23 3.147 3.005s-1.278 3.03-3.147 3.03zm12.658 8.28c1.87 0 3.407-.615 4.543-1.75l-.852-1.16c-.9.923-2.224 1.443-3.525 1.443-2.46 0-3.975-1.798-4.117-3.95h9.25v-.45c0-3.43-2.035-6.128-5.49-6.128-3.265 0-5.63 2.674-5.63 5.986 0 3.573 2.437 6 5.82 6zm3.55-6.72h-7.5c.095-1.75 1.3-3.81 3.738-3.81 2.603 0 3.738 2.106 3.762 3.81zm13.534 6.436v-7.855c0-2.768-2.01-3.857-4.424-3.857-1.87 0-3.336.615-4.566 1.893l.828 1.23c1.017-1.088 2.13-1.585 3.502-1.585 1.656 0 2.887.875 2.887 2.413v2.058c-.923-1.065-2.224-1.562-3.786-1.562-1.94 0-4 1.207-4 3.762 0 2.484 2.058 3.786 4 3.786 1.538 0 2.84-.544 3.786-1.585v1.3zm-4.92-.994c-1.656 0-2.816-1.04-2.816-2.484 0-1.467 1.16-2.508 2.816-2.508 1.254 0 2.46.473 3.147 1.42v2.153c-.686.946-1.893 1.42-3.147 1.42zm13.5 1.278c2.082 0 3.312-.852 4.188-1.987l-1.183-1.088c-.757 1.017-1.727 1.49-2.9 1.49-2.437 0-3.95-1.893-3.95-4.424s1.514-4.4 3.95-4.4c1.183 0 2.153.45 2.9 1.49l1.183-1.088c-.875-1.136-2.106-1.987-4.188-1.987-3.407 0-5.702 2.603-5.702 5.986 0 3.407 2.295 6 5.702 6zm9.56 0c1.04 0 1.68-.308 2.13-.733l-.52-1.325c-.237.26-.7.473-1.207.473-.78 0-1.16-.615-1.16-1.467v-7.098h2.32V27.42h-2.32v-3.123h-1.775v3.123h-1.893v1.562h1.893v7.477c0 1.704.852 2.674 2.532 2.674z"
								fill="#00d8ff"></path>
						</svg>
					</div> -->
					<div class="text-neutral-400">
						<img src="https://i.imgur.com/ObRTqta.png" alt="VR Logo"
							class="max-w-[120px] max-h-[60px]">
					</div>
					<div class="text-neutral-400">
						<img src="https://upload.wikimedia.org/wikipedia/id/thumb/a/ad/TASPEN.svg/1200px-TASPEN.svg.png" alt="Taspen Logo"
							class="max-w-[120px] max-h-[60px]">
					</div>
					<div class="text-neutral-400">
						<img src="https://static.wixstatic.com/media/4928fe_2b4c005ad41741e3894c3753b206ec21~mv2.png/v1/fill/w_884,h_550,al_c/4928fe_2b4c005ad41741e3894c3753b206ec21~mv2.png" alt="Sapa Logo"
							class="max-w-[120px] max-h-[60px]">
					</div>
					<div class="text-neutral-400">
						<img src="https://panel.dpcperadipurwokerto.or.id/images/logo-peradi.png" alt="Gojek Logo"
							class="max-w-[120px] max-h-[60px]">
					</div>
					<div class="text-neutral-400">
						<img src="https://cdn.worldvectorlogo.com/logos/grab.svg" alt="Grab Logo"
							class="max-w-[120px] max-h-[60px]">
					</div>



				</div>

			</div>

		</div>
	</section>

	<section id="catalogue">
		<div class="w-full bg-blue-950">
			<!-- Heading -->
			<div class="w-full text-center py-12 items-center justify-center">
				<h1 class="text-blue-50 text-2xl font-bold">Products Catalogue</h1>
				<div class="inline-flex items-center justify-center w-full">
					<hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-200">
				</div>
			</div>
			<!-- Search -->

			<!-- Card Section -->

			<div class="w-full px-12">
				<ul id="myUL" class="py-2 w-full pb-24">
					<div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-8">
						<?php foreach ($getProduct as $a) { ?>
							<li class="py-1s">
								<div class="w-full">
									<div class="flex rounded-lg h-full bg-slate-200 dark:bg-slate-900 flex-col shadow-lg">
										<div class="w-full h-auto">
											<a href="<?= base_url('cust/item/' . $a->product_token) ?>">
												<img class="rounded-t-lg shadow-lg"
													src="<?= base_url('src/item/_thumbnails/' . $a->product_thumbnails); ?>"
													alt="" />
											</a>
										</div>
										<div class="flex items-center">
											<div
												class="flex flex-col justify-between flex-grow p-4 text-slate-800 dark:text-slate-200">
												<a class="text-2xl font-semibold"><?= $a->product_name; ?></a>
												<div class="columns-2">
													<p class="text-2xl text-sm py-2 font-regular">
														Rp<?= number_format($a->product_price, 0, ',', '.') ?>
													</p>
													<p class="text-2xl text-sm py-2 font-regular text-right">
														<i class="fa-solid fa-cart-flatbed"></i> <?= $a->product_sold ?>
													</p>
												</div>
												<hr class="bg-blue-700 rounded border-1 border-blue-700">
												<div class="text-center">
													<a href="<?= base_url('cust/item/' . $a->product_token) ?>"
														class="mt-5 text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 inline-flex items-center">Select
														Product
														<i class="fa-solid fa-plus text-xs ml-1"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>

						<!-- Here -->

					</div>
				</ul>
			</div>

			<!-- End of Cards -->

		</div>
	</section>
	<?php $this->load->view('public/parts/footer'); ?>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<script src="<?= base_url('_assets/js/helper.js'); ?>"></script>

	<?php $raw_agent_token = strtolower(bin2hex(random_bytes(50))) ?>
	<?php $session_agent_token = $this->session->userdata('agent_token'); ?>


	<script>
		var sess = "<?= $session_agent_token ?>";
		var ls = localStorage.getItem("agent_token");
		console.log(sess);

		if (localStorage.getItem("agent_token") == null) {
			localStorage.setItem("agent_token", "<?= $raw_agent_token; ?>");
			location.href = "<?php echo base_url() . 'Main/add_agent_token/' . $raw_agent_token; ?>";
		} else if (sess != localStorage.getItem("agent_token")) {
			location.href = "<?php echo base_url() . 'Main/sess_agent_token/'; ?>" + ls;

		}
	</script>
	<?php $this->load->view('cms/parts/addon'); ?>
	<?= $this->session->flashdata('flash'); ?>
	<script>
		function myFunction() {
			// Declare variables
			var input, filter, ul, li, a, i, txtValue;
			input = document.getElementById('myInput');
			filter = input.value.toUpperCase();
			ul = document.getElementById("myUL");
			li = ul.getElementsByTagName('li');

			// Loop through all list items, and hide those who don't match the search query
			for (i = 0; i < li.length; i++) {
				a = li[i].getElementsByTagName("a")[0];
				txtValue = a.textContent || a.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					li[i].style.display = "";
				} else {
					li[i].style.display = "none";
				}
			}
		}
	</script>
</body>

</html>