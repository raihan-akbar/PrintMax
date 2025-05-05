<!DOCTYPE html>
<html class="scroll-smooth">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Sources Assets -->
	<?php $this->load->view('cms/parts/source'); ?>
</head>

<body class="bg-slate-200 dark:bg-slate-950">
	<?php $this->load->view('cms/parts/navside'); ?>

	<!-- Page Script Here -->
	<div class="p-4 sm:ml-64">
		<div class="p-2 mt-14">
			<!-- Page Content Script Here -->
			<div id="page-header" class="w-full">
				<h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">PrintMax Users.</h3>
				<p class="font-base text-slate-800 dark:text-slate-200">
					Page for Managing all PrintMax User Account.
				</p>
			</div>
			<div class="w-full">
				<hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
			</div>
			<!-- Content After HR -->
			<div class="w-full mb-4">
				<div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-full">
					<h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">User Account List</h3>
					<hr class="w-full h-px my-2 bg-slate-400 border-0">
					<div class="w-full py-2">
						<div class="relative w-full md:w-full lg:w-1/3 xl:w-1/4">
							<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
								<p class="text-slate-700 dark:text-slate-300"><i
										class="fa-solid fa-magnifying-glass fa-xs"></i></p>
							</div>
							<input type="text" id="myInput" onkeyup="myFunction()"
								class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
								placeholder="Search Account..." required />
						</div>
						<ul id="myUL" class="py-2 w-full">

							<div
								class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
								<li class="py-1">
									<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
										<a href="#">
											<p class="w-full text-slate-700 dark:text-slate-300 text-lg">
												<span class="">Ghina Nur Agsya</span>
											</p>
											<span class="">Admin</span>
										</a>
										<hr class="w-full mt-4 border-blue-600 border-1">
									</div>
								</li>

								<li class="py-1">
									<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
										<hr class="w-full">
										<a href="#">
											<p class="w-full text-slate-700 dark:text-slate-300 text-lg">
												<span class="">Raihan Nur Agsya</span>
											</p>
											<span class="pl-2">Admin</span>
										</a>
									</div>
								</li>

								<li class="py-1">
									<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
										<hr class="w-full">
										<a href="#">
											<p class="w-full text-slate-700 dark:text-slate-300 text-lg">
												<span class="">Ghina Nur Agsya</span>
											</p>
											<span class="pl-2">Admin</span>
										</a>
									</div>
								</li>

							</div>


						</ul>
					</div>
				</div>
			</div>


		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<?php $this->load->view('cms/parts/addon'); ?>

	<?= $this->session->flashdata('flash'); ?>
	<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
	<script>
		ClassicEditor
			.create(document.querySelector('#ckdesc'))
			.catch(error => {
				console.error(error);
			});

	</script>
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