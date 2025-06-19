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
				<h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100"><?= $this->session->userdata('user_name'); ?>.</h3>
				<p class="font-base text-slate-800 dark:text-slate-200">
					Welcome to PrintMax CMS, this is your dashboard. You can manage your products, orders, and users from here.
				</p>
			</div>
			<div class="w-full">
				<hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
			</div>
			<!-- Content After HR -->
			<?php
			//  Counter Setup
			$start = date('Y-m-01 00:00:00');
			$end = date('Y-m-t 23:59:59');
			$total_order    = $this->db->where("book_date >=", $start)->where("book_date <=", $end)->get('book')->num_rows();
			$success_check  = $this->db->where("book_status", "Finish")->where("book_date >=", $start)->where("book_date <=", $end)->get('book')->num_rows();
			$cancel_check   = $this->db->where("book_status", "Cancel")->where("book_date >=", $start)->where("book_date <=", $end)->get('book')->num_rows();
			$progress_check = $this->db->where("book_status", "Progress")->where("book_date >=", $start)->where("book_date <=", $end)->get('book')->num_rows();

			?>
			<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">This <strong><?= date('F') ?></strong> Order Overview</h3>
			<div class="columns-4">
				<div class="bg-blue-700 dark:bg-blue-800 p-4 rounded-lg shadow-md mb-4">
					<h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Total Orders</h3>
					<?php
					// $product_check = $this->Mod->get('book', array('book_status !=' => 'Pending'))->num_rows();
					?>
					<p class="text-2xl font-bold text-slate-900 dark:text-slate-100"><?= $total_order ?></p>
					<p class="text-sm text-slate-800 dark:text-slate-400">In Total of this month.</p>
				</div>
				<div class="bg-green-700 dark:bg-green-800 p-4 rounded-lg shadow-md mb-4">
					<h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Success Order</h3>
					<?php
					// $success_check = $this->Mod->get('book', array('book_status' => 'Finish'))->num_rows();
					?>
					<p class="text-2xl font-bold text-slate-900 dark:text-slate-100"><?= $success_check ?></p>
					<p class="text-sm text-slate-800 dark:text-slate-400">In Total of this month.</p>
				</div>
				<div class="bg-orange-700 dark:bg-orange-800 p-4 rounded-lg shadow-md mb-4">
					<h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Canceled Orders</h3>
					<?php
					// $cancel_check = $this->Mod->get('book', array('book_status' => 'Cancel'))->num_rows();
					?>
					<p class="text-2xl font-bold text-slate-900 dark:text-slate-100"><?= $cancel_check ?></p>
					<p class="text-sm text-slate-800 dark:text-slate-400">In Total of this month.</p>
				</div>
				<div class="bg-purple-700 dark:bg-purple-800 p-4 rounded-lg shadow-md mb-4">
					<h3 class="text-xl font-semibold text-slate-900 dark:text-slate-100 mb-2">Orders in Progress</h3>
					<?php
					// $progress_check = $this->Mod->get('book', array('book_status' => 'Progress'))->num_rows();
					?>
					<p class="text-2xl font-bold text-slate-900 dark:text-slate-100"><?= $progress_check ?></p>
					<p class="text-sm text-slate-800 dark:text-slate-400">In Total of this month.</p>
				</div>
			</div>

			<div class="columns-2 mt-4">
				<div class="">
					<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2"><a href="<?= base_url("cms/order") ?>">5 Latest Pending Order <i class="fa-solid fa-external-link fa-xs"></i></a></h3>
					<div class="relative overflow-x-auto rounded-lg">
						<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th scope="col" class="px-6 py-3">
										Name
									</th>
									<th scope="col" class="px-6 py-3">
										Phone
									</th>
									<th scope="col" class="px-6 py-3">
										Total Price
									</th>
								</tr>
							</thead>
							<?php $five_pending = $this->db->query(" SELECT * FROM book WHERE book_status = 'Pending' ORDER BY book_id DESC LIMIT 5 ")->result(); ?>
							<tbody>
								<?php foreach ($five_pending as $f) { ?>
									<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
										<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
											<?= $f->customer_name; ?>
										</th>
										<td class="px-6 py-4">
											<?= $f->customer_phone; ?>

										</td>
										<td class="px-6 py-4">
											Rp <?= number_format($f->price_total, 0, ',', '.') ?>

										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="">
					<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100 mb-2">Last 5 Recently Order</h3>
					<div class="relative overflow-x-auto rounded-lg">
						<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
							<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
								<tr>
									<th scope="col" class="px-6 py-3">
										Name
									</th>
									<th scope="col" class="px-6 py-3">
										Phone
									</th>
									<th scope="col" class="px-6 py-3">
										Total Price
									</th>
								</tr>
							</thead>
							<?php $five_order = $this->db->query(" SELECT * FROM book WHERE book_status != 'Pending' ORDER BY book_id ASC LIMIT 5 ")->result(); ?>
							<tbody>
								<?php foreach ($five_order as $f) { ?>
									<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
										<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
											<?= $f->customer_name; ?>
										</th>
										<td class="px-6 py-4">
											<?= $f->customer_phone; ?>

										</td>
										<td class="px-6 py-4">
											Rp <?= number_format($f->price_total, 0, ',', '.') ?>

										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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