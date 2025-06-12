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
					<div class="columns-2 w-fukk">
						<div class="w-full">
							<h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Active Order List</h3>
						</div>
						<div class="w-full text-right">
							<button data-modal-target="pending-order-modal" data-modal-toggle="pending-order-modal" type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
								Pending Order
								<?php
								$bookCheck = $this->db->where(['book_status' => 'Pending'])->order_by('book_id', 'DESC')->get('book')->num_rows();
								$bookPending = $this->db->where(['book_status' => 'Pending'])->order_by('book_id', 'DESC')->get('book')->result();
								?>
								<div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-slate-900"><?= $bookCheck ?></div>
							</button>
						</div>
					</div>


					<!-- Pending Order Modal -->
					<div id="pending-order-modal" tabindex="-1" aria-hidden="true"
						class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
						<div class="relative p-4 w-full max-w-2xl max-h-full">
							<!-- Modal content -->
							<div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
								<!-- Modal header -->
								<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
									<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
										alt="Print-Max Logo" />
									<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
										Pending Order <span class="font-regular text-md">(<?= $bookCheck; ?>)</span>
									</h3>
									<button type="button"
										class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
										data-modal-toggle="pending-order-modal">
										<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
											fill="none" viewBox="0 0 14 14">
											<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
												stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
										</svg>
										<span class="sr-only">Close modal</span>
									</button>
								</div>
								<!-- Modal body -->
								<form method="post" action="" class="p-4 md:p-5"
									enctype="multipart/form-data">
									<div class="w-full">
										<ul class="max-w-full divide-y divide-slate-200 dark:divide-slate-700 max-h-2xl">
											<div class="h-96 overflow-x-auto">
												<?php foreach ($bookPending as $bp) {
													$PendingDateRaw = new DateTime($bp->book_date);
													$PendingDateString = date_format($PendingDateRaw, 'd, F Y | H:i') . ' WIB';
												?>
													<li class="pb-3 sm:pb-4">
														<div class="flex items-center space-x-4 rtl:space-x-reverse">
															<div class="flex-1 min-w-0 pt-2">
																<p class="text-sm font-medium text-slate-900 truncate dark:text-white">
																	<?= $bp->customer_name ?>
																</p>
																<p class="text-sm text-slate-500 truncate dark:text-slate-400">
																	<?= $PendingDateString ?>
																</p>
															</div>
															<div class="inline-flex items-center text-base font-semibold text-slate-900 dark:text-white">
																<button type="button" onclick="cancel_<?= $bp->book_token ?>()" class="bg-red-100 hover:bg-red-200 text-red-800 text-sm font-medium px-1.5 py-0.5 rounded-sm dark:bg-slate-700 dark:text-red-400 border border-red-400 inline-flex items-center justify-center"><i class="fa-solid fa-xmark"></i></button>
															</div>
															<div class="inline-flex items-center text-base font-semibold text-slate-900 dark:text-white">
																<a href="<?= base_url('sys/accept_order/') . $bp->book_key; ?>" class="bg-green-100 hover:bg-green-200 text-green-800 text-sm font-medium px-1.5 py-0.5 rounded-sm dark:bg-slate-700 dark:text-green-400 border border-green-400 inline-flex items-center justify-center"><i class="fa-solid fa-check"></i></a>
															</div>
															<div class="inline-flex items-center text-base font-semibold text-slate-900 dark:text-white">
																<a href="<?= base_url('cust/track/') . $bp->book_key; ?>" target="_blank" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium px-1.5 py-0.5 rounded-sm dark:bg-slate-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center">Details <i class="fa-solid fa-external-link pl-1"></i></a>
															</div>
														</div>
														<hr class="opacity-50">
													</li>
												<?php } ?>
											</div>
										</ul>
									</div>

									<hr class="opacity-30 mb-2">

									<hr class="opacity-30 mb-4">
									<div class="text-right space-x-2">
										<button type="button"
											class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
											data-modal-toggle="pending-order-modal">Close View</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- & -->
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
									<?php
									if ($b->book_paid == 1) {
										$paidTxt = "Paid";
										$paidClr = "text-green-600";
									} else {
										$paidTxt = "Unpaid";
										$paidClr = "text-red-600";
									}

									if ($b->book_status == "Pending") {
										$statusTxt = "is Pending";
										$statusClr = "text-purple-800";
										$statusIcon = "fa-solid fa-hourglass-start";
										$statusAnimate = "animate-pulse";
										$statusBg = "bg-purple-300";
									} else if ($b->book_status == "Progress") {
										$statusTxt = "Now on Progress";
										$statusClr = "text-blue-800";
										$statusIcon = "fa-solid fa-gear";
										$statusAnimate = "animate-spin";
										$statusBg = "bg-blue-300";
									} else if ($b->book_status == "Finish") {
										$statusTxt = "is Finished";
										$statusClr = "text-green-800";
										$statusIcon = "fa-solid fa-circle-check";
										$statusAnimate = "animate-none";
										$statusBg = "bg-green-300";
									} else if ($b->book_status == "Cancel") {
										$statusTxt = "Canceled";
										$statusClr = "text-orange-800";
										$statusIcon = "fa-solid fa-circle-xmark";
										$statusAnimate = "animate-none";
										$statusBg = "bg-orange-300";
									} else {
										$statusTxt = "Error";
										$statusClr = "text-red-800";
										$statusIcon = "fa-solid fa-ban";
										$statusAnimate = "animate-none";
										$statusBg = "bg-purple-300";
									}
									?>
									<li class="py-1">
										<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
											<a>
												<p class="w-full text-slate-700 dark:text-slate-300">
													<span type="button" class="<?= $statusBg ?> font-medium rounded-full text-sm p-0.5 text-center inline-flex items-center me-0.5">
														<i
															class="<?= $statusIcon; ?> <?= $statusClr; ?> <?= $statusAnimate; ?>"></i>
													</span>
													<span><?= "Order " . $statusTxt; ?></span>
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

													<span class="">Total : Rp<?= number_format($b->price_total, 0, ',', '.') ?></span>

													-
													<span class="<?= $paidClr; ?> font-medium"><?= $paidTxt; ?></span>
												</p>
												<?php
												if ($b->book_paid == "1") {
													$paidTxtModal = "View Payment";
													$paidViewModal = "paid-modal";
												} else { {
														$paidTxtModal = "Add Payment";
														$paidViewModal = "add-payment-modal";
													}
												}
												?>
												<!-- <p class="text-slate-700 dark:text-slate-300">
													<a data-modal-target="<?= $paidViewModal ?>"
														data-modal-toggle="<?= $paidViewModal ?>" class="text-blue-500 hover:text-blue-700 cursor-pointer"><?= $paidTxtModal ?></a>
												</p> -->

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
																class="block mb-1 text-md font-medium dark:text-slate-100 text-slate-900"><?= $b->customer_name ?> - <span class="<?= $statusClr ?>"><?= $statusTxt ?></span> - <span class="<?= $paidClr ?>"><?= $paidTxt ?></span></p>
															<p
																class="block mb-0 text-md font-medium dark:text-slate-100 text-slate-900"><?= $b->customer_phone ?> <i class="fa-solid fa-file fa-xs fa-fw cursor-pointer"></i></p>
															<p
																class="block mb-0 text-md font-regular dark:text-blue-500 text-blue-500"><a href="<?= base_url('sys/cust_chat/') . $b->book_token ?>" target="_blank">Chat Customer on Whatsapp <i class="fa-solid fa-external-link fa-xs fa-fw cursor-pointer"></i></a></p>
														</div>
														<hr class="opacity-30 mb-2 col-span-2">
														<?php
														$this->load->model('Mod');
														$where_token = "book_token = '$b->book_token'";
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
															if ($b->book_paid == "1") {
																$paidTxt = "Paid";
																$paidClr = "green-600";
															} else {
																$paidTxt = "Unpaid";
																$paidClr = "red-600";
															}
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
														<div class="col-span-2">
															<hr class="opacity-30">

														</div>
														<div class="col-span-1">
															<label for="name"
																class="block text-lg font-semibold dark:text-slate-100 text-slate-900">
																Total Price:
															</label>
														</div>
														<div class="col-span-1">
															<label class="block text-lg font-bold dark:text-slate-100 text-slate-900">
																<strong>Rp<?= number_format($total_of_price, 0, ',', '.') ?></strong>
															</label>
														</div>
													</div>

													<hr class="opacity-30 mb-3">
													<div class="w-full flex flex-wrap justify-between items-center cursor-pointer">
														<div class="w-full">
															<h3
																class="text-sm font-semibold text-slate-900 dark:text-slate-100 text-center mb-2">
																Set Order Status
															</h3>
														</div>

														<div class="flex w-1/3">
															<a onclick="cancel_<?= $bd->book_token ?>()"class="w-full text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 cursor-pointer">Cancel</a>
														</div>
														<div class="flex w-1/3">
															<a href="<?= base_url('sys/pending_order/') . $bd->book_key; ?>" class="w-full text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Pending</a>
														</div>
														<div class="flex w-1/3">
															<a href="<?= base_url('sys/finish_order/') . $bd->book_key; ?>" class="w-full text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Finish</a>
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
	<script>
		const dropzone = document.getElementById('dropzone');
		const fileInput = document.getElementById('file-upload');
		const preview = document.getElementById('preview');
		const ph = document.getElementById('ph');

		function displayPreview(file) {
			const reader = new FileReader();
			reader.onload = () => {
				preview.src = reader.result;
				preview.classList.remove('hidden');
				ph.classList.add('hidden');
			};
			reader.readAsDataURL(file);
		}

		dropzone.addEventListener('dragover', e => {
			e.preventDefault();
			dropzone.classList.add('border-blue-600');
		});

		dropzone.addEventListener('dragleave', e => {
			e.preventDefault();
			dropzone.classList.remove('border-blue-600');
		});

		dropzone.addEventListener('drop', e => {
			e.preventDefault();
			dropzone.classList.remove('border-blue-600');

			const file = e.dataTransfer.files[0];
			if (file) {
				displayPreview(file);
				const dataTransfer = new DataTransfer();
				dataTransfer.items.add(file);
				fileInput.files = dataTransfer.files;
			}
		});

		fileInput.addEventListener('change', e => {
			const file = e.target.files[0];
			if (file) {
				displayPreview(file);
			}
		});
	</script>
	<?php
	$getAllBook = $this->db->where(['book_status !=' => 'Cancel'])->order_by('book_id', 'DESC')->get('book')->result();
	foreach ($getAllBook as $b) { ?>
		<!-- Cancel Order Confirmation -->
		<script>
			function cancel_<?= $b->book_token ?>() {
				swal({
						title: "Are Your Sure Cancel This Order?",
						text: "Just to make sure, you can't turn back the data.",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							location.href = " <?php echo base_url() . 'sys/cancel_order/' . $b->book_key; ?> ";
						}
					});

			}
		</script>

	<?php } ?>
</body>

</html>
