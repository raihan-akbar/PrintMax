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
				<h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Customer Order List</h3>
				<p class="font-base text-slate-800 dark:text-slate-200">
					Page for Managing Active Customer Order.
				</p>
			</div>
			<div class="w-full">
				<hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
			</div>
			<!-- Content After HR -->
			<div class="w-full mb-4">
				<div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-full">
					<h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Active Order List</h3>
					<hr class="w-full h-px my-2 bg-slate-400 border-0">
					<div class="w-full py-2">
						<div class="relative w-full md:w-full lg:w-1/3 xl:w-1/4">
							<div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
								<p class="text-slate-700 dark:text-slate-300"><i
										class="fa-solid fa-magnifying-glass fa-xs"></i></p>
							</div>
							<input type="text" id="myInput" onkeyup="myFunction()"
								class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
								placeholder="Search Active Order..." required />
						</div>
						<ul id="myUL" class="py-2 w-full">

							<div
								class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">
								<li class="py-1 h-full">
									<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-9">
										<div class="relative flex py-0 items-center mb-1">
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
											<span class="flex-shrink mx-0 mt-4 uppercase text-xs font-bold">
												<!-- <code class="text-slate-500"><?= 'a'; ?></code> -->
											</span>
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
										</div>
										<a href="<?= base_url('cms/make_order'); ?>"
											class="text-center text-slate-700 dark:text-slate-300 dark:hover:text-slate-500 hover:text-slate-600 cursor-pointer">
											<h1 class="mt-8"><i class="fa-solid fa-boxes"></i></h1>
											<p class="text-lg font-bold">Create Customer Order</p>
										</a>

										<div class="relative flex py-0 items-center mb-1 my-4 pt-8">
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
										</div>
									</div>
								</li>

								<?php foreach ($getBook as $b) { ?>
									<li class="py-1">
										<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
											<a href="#">
												<p class="w-full text-slate-700 dark:text-slate-300">
													<span class="font-bold text-lg"><i
															class="fa-solid fa-circle fa-xs fa-fw text-green-600 animate-pulse"></i>
														<?= "Order is Progress"; ?></span>
												</p>
												<hr class="my-2 opacity-45">
												<p class="text-slate-700 dark:text-slate-300">
													<span class="font-bold"><?= $b->customer_name; ?> - <span
															class=""><?= $b->customer_phone; ?></span></span>

												</p>
												<p class="text-slate-700 dark:text-slate-300">
													<?php
													$dateRaw = new DateTime($b->book_date);
													$dateString = date_format($dateRaw, 'd, F Y | H:i') . ' WIB';
													?>
													<span class=""><?= $dateString; ?></span>
												</p>
												<p class="text-slate-700 dark:text-slate-300">
													<?php
													if ($b->book_paid == 1) {
														$paidTxt = "Paid";
														$paidClr = "text-green-600";
													} else {
														$paidTxt = "Unpaid";
														$paidClr = "text-red-600";
													}
													?>
													<span class="">Total : Rp. <?= $b->price_total; ?></span>
													-
													<span class="<?= $paidClr; ?> font-medium"><?= $paidTxt; ?></span>
												</p>
												<p class="text-slate-700 dark:text-slate-300">

												</p>
												<p class="text-slate-700 dark:text-slate-300 text-sm mt-1">
													<span class="text-xs"><code><?= $b->book_key ?></code></span>
												</p>
											</a>
											<hr class="mt-4 mb-2 opacity-45">
											<p data-modal-target="view-order-<?= $b->book_key ?>"
												data-modal-toggle="view-order-<?= $b->book_key ?>"
												class="text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 text-center cursor-pointer">
												Order Overview
											</p>
										</div>
									</li>

									<!-- View Order Modal -->
									<div id="view-order-<?= $b->book_key ?>" tabindex="-1" aria-hidden="true"
										class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
										<div class="relative p-4 w-full max-w-2xl max-h-full">
											<!-- Modal content -->
											<div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
												<!-- Modal header -->
												<div
													class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
													<img src="<?= base_url('_assets/img/sq-logo.png') ?>"
														class="h-8 me-3" alt="Print-Max Logo" />
													<h3
														class="text-lg font-semibold text-slate-900 dark:text-slate-100">
														Order Overview
													</h3>
													<button type="button"
														class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
														data-modal-toggle="view-order-<?= $b->book_key ?>">
														<svg class="w-3 h-3" aria-hidden="true"
															xmlns="http://www.w3.org/2000/svg" fill="none"
															viewBox="0 0 14 14">
															<path stroke="currentColor" stroke-linecap="round"
																stroke-linejoin="round" stroke-width="2"
																d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
														</svg>
														<span class="sr-only">Close modal</span>
													</button>
												</div>
												<!-- Modal body -->
												<form method="post"
													action="<?= base_url('sys/order/add_to_cart') ?>"
													class="p-4 md:p-5" enctype="multipart/form-data">
													<div class="grid gap-4 mb-4 grid-cols-2">
														<div class="col-span-2">
															<p
																class="block mb-1 text-md font-medium dark:text-slate-100 text-slate-900"><?= $b->customer_name ?></p>
															<p
																class="block mb-0 text-md font-medium dark:text-slate-100 text-slate-900"><?= $b->customer_phone ?> <i class="fa-solid fa-file fa-xs fa-fw cursor-pointer"></i></p>
														</div>
														<hr class="opacity-30 mb-2 col-span-2">
														<?php
														$this->load->model('Mod');
														// $where_token = "book_token = '$b->book_token'";
														$getBookDetails = $this->db->query(" SELECT * FROM book,book_product,product,product_variant_1,product_variant_2 WHERE book.book_token=book_product.book_token AND book_product.product_token=product.product_token AND book_product.product_variant_1_id=product_variant_1.product_variant_1_id AND book_product.product_variant_2_id=product_variant_2.product_variant_2_id AND book_product.book_token='$b->book_token' ")->result();
														?>
														<div class="col-span-1">
															<p class="font-bold text-lg dark:text-neutral-200 text-neutral-800">Product's Name </p>
														</div>
														<div class="col-span-1">
															<p class="font-bold text-lg dark:text-neutral-200 text-neutral-800">Price </p>
														</div>
														<?php
														$total_product_price = 0;
														$total_of_price = 0;
														foreach ($getBookDetails as $bd) {
															if ($bd->product_variant_1_name == 'Default') {
																$var_1_name = "";
															} else {
																$var_1_name = " - " . $bd->product_variant_1_name;
															}
															if ($bd->product_variant_2_name == 'Default') {
																$var_2_name = "";
															} else {
																$var_2_name = " - " . $bd->product_variant_2_name;
															}

															$product_price = $bd->product_price + $bd->product_variant_1_price_mark + $bd->product_variant_2_price_mark;
															$qty = $bd->book_product_qty;
															// The Math
															$total_product_price = $product_price * $qty;
															$total_of_price += $total_product_price;
														?>

															<div class="col-span-1">
																<label for="name"
																	class="block text-md font-light dark:text-slate-100 text-slate-900">
																	<?= $bd->product_name ?> <?= $var_1_name ?> <?= $var_2_name ?></label>

															</div>
															<div class="col-span-1">
																<label class="block text-md font-light dark:text-slate-100 text-slate-900">
																	Rp<?= number_format($product_price, 0, ',', '.') ?> (x<?= $qty ?>)
																	=
																	<strong>Rp<?= number_format($total_product_price, 0, ',', '.') ?></strong>
																</label>
															</div>
														<?php } ?>
														<div class="grid gap-4 mb-4 grid-cols-2">
															<div class="col-span-1">
																<label class="block text-md font-light dark:text-slate-100 text-slate-900">
																	<p class="font-bold text-lg dark:text-neutral-200 text-neutral-800">Total Price: </p>
																</label>
															</div>
															<div class="col-span-1">
																<label class="block text-md font-light dark:text-slate-100 text-slate-900">
																	<p class="font-bold text-lg dark:text-neutral-200 text-neutral-800">Rp<?= number_format($total_of_price, 0, ',', '.') ?></p>
																</label>
															</div>
														</div>

													</div>

													<hr class="opacity-30 mb-3">
													<div class="w-full flex flex-wrap justify-between items-center">
														<div class="w-full">
															<h3
																class="text-sm font-semibold text-slate-900 dark:text-slate-100 text-center mb-2">
																Set Order Status
															</h3>
														</div>
														<div class="flex w-1/4">
															<a class="w-full text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cancel</a>
														</div>
														<div class="flex w-1/4">
															<a class="w-full text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Accept</a>
														</div>
														<div class="flex w-1/4">
															<a class="w-full text-white bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Progress</a>
														</div>
														<div class="flex w-1/4">
															<a class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Finish</a>
														</div>
													</div>
													<div class="text-right space-x-2">
														<button type="button"
															class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
															data-modal-toggle="view-order-<?= $b->book_key ?>">Close View</button>
														<!-- <button type="submit"
															class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Add
															to Cart
															<svg class="w-5 h-5" fill="currentColor"
																viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																	d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
																	clip-rule="evenodd"></path>
															</svg>
														</button> -->
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- & -->


								<?php } ?>


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



<!-- Order Status
Customer Name
Phone Number
Product Name
Order ID -->