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

<body class="bg-neutral-200 h-screen">
	<!-- Page Script Here -->
	<section id="home" class="h-screen">
		<div
			class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1592312040834-bb0d621713e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-neutral-800 bg-blend-multiply h-full w-screen flex items-center">
			<div class="mx-auto w-screen text-center mt-64">
				<div class="grid justify-center place-items-center items-center">
					<div class="w-full">
						<h1 class="text-5xl font-bold text-neutral-200 casc animate-typing mt-24"> 404.</h1>
						<p class="text-white"><code
								class="text-white hidden"><?= strtoupper(bin2hex(random_bytes(8))); ?></code></p>
						<p class="text-neutral-200 font-semibold p-2">The link you followed may be <br>Maintenance /
							Broken / Missing</p>
					</div>
					<div class="w-screen max-w-xl px-2 space-y-2 my-6 mb-24 mt-16">
						<div class="pb-36">
							<a href="<?= base_url('/') ?>" type="button"
								class="text-white bg-transparent hover:bg-neutral-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 border-neutral-200 border-2">
								<i class="fa-solid fa-chevron-left px-2 text-lg"></i>
								<span class="sr-only">Back to Home</span>
							</a>
						</div>
						<p class="text-neutral-200 font-base">Better go back for best experiece please.</p>
					</div>
					<div class="h-full w-24 md:w-42 text-neutral-50 py-4">
						<img src="<?= base_url('_assets/img/hr-logo.png'); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
