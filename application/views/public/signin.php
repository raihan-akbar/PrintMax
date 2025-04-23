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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<title>PrintMax</title>
</head>

<body class="bg-neutral-200 h-screen">
	<!-- Page Script Here -->
	<section id="home" class="h-screen">
		<div
			class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1592312040834-bb0d621713e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-neutral-800 bg-blend-multiply h-full w-screen flex items-center">
			<div class="mx-auto w-screen text-center mt-32">
				<div class="grid justify-center place-items-center items-center">
					<div class="h-full w-48 md:w-60 text-neutral-50 py-4">
						<img src="<?= base_url('_assets/img/hr-logo.png'); ?>" alt="">
					</div>
					<div class="">
						<p class="text-red-600 font-semibold text-lg"><span class="text-transparent">.</span>
							<?= $this->session->flashdata('flash'); ?></p>
					</div>
					<form action="<?= base_url('sys/auth') ?>" method="post">
						<div class="w-screen max-w-xl px-2 space-y-2 my-6">
							<input type="email" name="email"
								class="w-full rounded-lg shadow-lg bg-neutral-100 border-neutral-800 shadow-lg"
								placeholder="Account Username">
							<div class="inline-flex w-full items-center h-10 overflow-hidden bg-blue-950 rounded-lg">
								<span class="py-1.5 text-[12px] font-medium w-full">
									<input type="password" name="password"
										class="w-full shadow-lg bg-neutral-100 border-neutral-800 shadow-lg "
										placeholder="Password">
								</span>

								<button
									class="inline-flex items-center justify-center w-24 h-24 bg-blue-600 transition-color hover:bg-blue-800 focus:outline-none focus:ring py-4 text-neutral-200"
									type="submit">
									<span class="sr-only"> Close </span>

									<!-- <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
										fill="currentColor">
										<path fill-rule="evenodd"
											d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
											clip-rule="evenodd" />
									</svg> -->
									<!-- <i class="fa-solid fa-sign-in text-lg"></i> -->
									<p class="text-neutral-100 font-semibold">Log in</p>
								</button>
							</div>
							<!-- <p class="text-neutral-200 pt-4 font-medium"><a href="<?= base_url('/') ?>">Kembali ke Beranda</a></p> -->
							<div class="pt-36">
								<a href="<?= base_url('/') ?>" type="button"
									class="text-white bg-transparent hover:bg-neutral-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 border-neutral-200 border-2">
									<i class="fa-solid fa-chevron-left px-2 text-lg"></i>
									<span class="sr-only">Back to Home</span>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
