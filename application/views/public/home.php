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
	<script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
	<title>PrintMax</title>
</head>

<body class="bg-neutral-200">
	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->
	<section id="home" class="my-14">
		<div
			class="bg-center bg-no-repeat bg-[url('https://images.unsplash.com/photo-1592312040834-bb0d621713e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-neutral-500 bg-blend-multiply">
			<div class="px-4 mx-auto max-w-screen-xl text-center py-4 lg:py-32">
				<div class="grid justify-center place-items-center items-center">
					<div class="w-48 md:w-64 text-neutral-50 my-12">
						<img src="<?= base_url('_assets/img/hr-logo.png'); ?>" alt="">
					</div>
				</div>
				<div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
					<a href="contact.php"
						class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
						Kontak
					</a>
				</div>
			</div>
		</div>
	</section>
	<section id="catalogue">
		<div class="w-full bg-blue-950">
			<div class="w-full h-screen">

			</div>
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
		}

		else if (sess != localStorage.getItem("agent_token")) {
			location.href = "<?php echo base_url().'Main/sess_agent_token/';?>"+ls;

		}

	</script>
</body>

</html>
