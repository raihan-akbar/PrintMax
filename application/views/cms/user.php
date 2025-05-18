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
					<?php

					?>
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
								class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
								<li class="py-1 h-full">
									<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-6">
										<div class="relative flex py-0 items-center mb-1">
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
											<span class="flex-shrink mx-0 mt-4 uppercase text-xs font-bold">
												<!-- <code class="text-slate-500"><?= 'a'; ?></code> -->
											</span>
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
										</div>
										<a data-modal-target="add-user-modal" data-modal-toggle="add-user-modal"
											class="text-center text-slate-700 dark:text-slate-300 dark:hover:text-slate-500 hover:text-slate-600 cursor-pointer">
											<h1 class="mt-8"><i class="fa-solid fa-user-plus"></i></h1>
											<p class="text-lg font-bold">Add New User</p>
										</a>
										
										<!-- Add User Modal -->
										<div id="add-user-modal" tabindex="-1" aria-hidden="true"
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
															New User Form
														</h3>
														<button type="button"
															class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
															data-modal-toggle="add-user-modal">
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
													<form method="post" action="<?= base_url('sys/add_user') ?>"
														class="p-4 md:p-5" enctype="multipart/form-data">
														<div class="grid gap-4 mb-4 grid-cols-2">
															<div class="col-span-2">
																<label for="name"
																	class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Full
																	Name</label>
																<input type="text" name="name" id="name"
																	class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																	placeholder="User Full Name" required="">
															</div>
															<div class="col-span-2 sm:col-span-1">
																<label for="email"
																	class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Email
																	Address</label>
																<input type="email" name="email" id="email"
																	class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																	placeholder="User Email Address" required="">
															</div>
															<div class="col-span-2 sm:col-span-1">
																<label for="phone"
																	class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Phone
																	Number</label>
																<input type="text" name="phone" id="phone"
																	class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																	placeholder="User Phone Number" required="">
															</div>
															<div class="col-span-2 sm:col-span-1">
																<label for="rold"
																	class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Select
																	Role</label>
																<select name="role" id="role"
																	class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																	required="">
																	<option selected="select" disabled="disabled">Select
																		User Role</option>
																	<option value="2">Admin</option>
																	<option value="3">Staff</option>
																</select>
															</div>
															<div class="col-span-2 sm:col-span-1">
																<label for="password"
																	class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">User
																	Password</label>
																<input type="password" name="password" id="password"
																	class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																	placeholder="New User Password" required="">
															</div>
														</div>
														<hr class="opacity-30 mb-8">
														<div class="text-right space-x-2">
															<button type="button"
																class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
																data-modal-toggle="add-user-modal">Cancel</button>
															<button type="submit"
																class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Add
																New User
																<svg class="w-5 h-5" fill="currentColor"
																	viewBox="0 0 20 20"
																	xmlns="http://www.w3.org/2000/svg">
																	<path fill-rule="evenodd"
																		d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
																		clip-rule="evenodd"></path>
																</svg>
															</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										<div class="relative flex py-0 items-center mb-1 my-4 pt-8">
											<!-- <div class="flex-grow border-t border-slate-500"></div> -->
										</div>
									</div>
								</li>
								<?php foreach ($getUserList as $i) { ?>
									<li class="py-1">
										<div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
											<div class="relative flex py-0 items-center mb-1">
												<div class="flex-grow border-t border-slate-500"></div>
												<span class="flex-shrink mx-2 uppercase text-xs font-bold">
													<code class="text-slate-500"><?= $i->role_name; ?></code>
													<code class="text-slate-500">-</code>
													<code class="text-slate-500"><?= $i->user_status; ?></code>
												</span>
												<div class="flex-grow border-t border-slate-500"></div>
											</div>
											<a href="#">
												<p class="w-full text-slate-700 dark:text-slate-300">
													<span class="font-bold text-lg"><?= $i->user_name; ?></span>
												</p>
												<p class="text-slate-700 dark:text-slate-300">
													<span class=""><?= $i->user_email; ?></span>
												</p>
												<p class="text-slate-700 dark:text-slate-300">
													<span class=""><?= $i->user_phone; ?></span>
												</p>
												<p class="text-slate-700 dark:text-slate-300">
													<a data-modal-target="password-user-modal-<?= $i->user_token ?>"
													data-modal-toggle="password-user-modal-<?= $i->user_token ?>"
														class="text-blue-600 hover:text-blue-800 text-sm font-medium cursor-pointer">Change
														Password</a>
												</p>
											</a>
											<div class="relative flex py-0 items-center mb-1 my-4">
												<div class="flex-grow border-t border-slate-500"></div>
											</div>
											<div class="text-center text-sm">
												<a data-modal-target="view-user-modal-<?= $i->user_token ?>"
													data-modal-toggle="view-user-modal-<?= $i->user_token ?>"
													class="cursor-pointer mt-2 text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-600 inline-flex items-center transparent">
													User Overview</a>
											</div>
										</div>
									</li>
									<!-- Password Overview Modal -->
									<div id="password-user-modal-<?= $i->user_token ?>" tabindex="-1" aria-hidden="true"
										class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
										<div class="relative p-4 w-full max-w-2xl max-h-full">
											<!-- Modal content -->
											<div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
												<!-- Modal header -->
												<div
													class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
													<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
														alt="Print-Max Logo" />
													<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
														Reset Password Form
													</h3>
													<button type="button"
														class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
														data-modal-toggle="password-user-modal-<?= $i->user_token ?>">
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
												<form method="post" action="<?= base_url('sys/update_user_password') ?>"
													class="p-4 md:p-5" enctype="multipart/form-data">
													<div class="grid gap-4 mb-4 grid-cols-2">
														
														<div class="col-span-2">
															<label for="password"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">New Password for <span class="text-bold"><?= $i->user_name ?></span></label>
															<input type="password" name="password" id="password"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																placeholder="Set New Password" required="">
														</div>
													</div>
													<hr class="opacity-30 mb-8">
													<div class="text-right space-x-2">
														<button type="button"
															class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
															data-modal-toggle="password-user-modal-<?= $i->user_token ?>">Cancel</button>
															<input type="hidden" name="token" value="<?= $i->user_token ?>">
															<input type="hidden" name="name" value="<?= $i->user_name ?>">
														<button type="submit"
															class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Set New Password
															<i class="fa-solid fa-check fa-fw ml-1"></i>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- & -->

									<!-- User Overview Modal -->
									<div id="view-user-modal-<?= $i->user_token ?>" tabindex="-1" aria-hidden="true"
										class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
										<div class="relative p-4 w-full max-w-2xl max-h-full">
											<!-- Modal content -->
											<div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
												<!-- Modal header -->
												<div
													class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
													<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
														alt="Print-Max Logo" />
													<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
														<?= $i->user_name ?>, Data Overview
													</h3>
													<button type="button"
														class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
														data-modal-toggle="view-user-modal-<?= $i->user_token ?>">
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
												<form method="post" action="<?= base_url('sys/update_user') ?>"
													class="p-4 md:p-5" enctype="multipart/form-data">
													<div class="grid gap-4 mb-4 grid-cols-2">
														<div class="col-span-2">
															<label for="name"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Full
																Name</label>
															<input type="text" name="name" id="name"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																placeholder="User Full Name" required=""
																value="<?= $i->user_name ?>">
														</div>
														<div class="col-span-2 sm:col-span-1">
															<label for="email"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Email
																Address</label>
															<input type="email" name="email" id="email"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																placeholder="User Email Address" required=""
																value="<?= $i->user_email ?>">
														</div>
														<div class="col-span-2 sm:col-span-1">
															<label for="phone"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Phone
																Number</label>
															<input type="text" name="phone" id="phone"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																placeholder="User Phone Number" required=""
																value="<?= $i->user_phone ?>">
														</div>
														<div class="col-span-2 sm:col-span-1">
															<label for="rold"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Select
																Role</label>
															<select name="role" id="role"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																required="">
																<!-- <option selected="select" disabled="disabled">Select
																	User Role</option> -->
																<option selected value="<?= $i->role_id; ?>">
																	<?= $i->role_name; ?></option>
																<option value="2">Admin</option>
																<option value="3">Staff</option>
															</select>
														</div>
														<div class="col-span-2 sm:col-span-1">
															<label for="password"
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">User
																Status</label>
															<?php if ($i->user_status == "Active") {
																$txt_color = "green";
															} else {
																$txt_color = "red";
															} ?>
															<input type="text"
																class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-<?= $txt_color ?>-900 dark:text-<?= $txt_color ?>-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
																placeholder="User Password" disabled
																value="<?= $i->user_status ?>">
														</div>

														<div class="col-span-2 sm:col-span-1">
															<label
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Status
																Option</label>
															<?php if ($i->user_status == "Active") {
																$txt_status = "Deactive";
															} else {
																$txt_status = "Active";
															} ?>
															<p
																class="text-slate-900 dark:text-slate-100 text-lg font-medium">
																Set Status to <a
																	class="text-purple-400 underline cursor-pointer font-bold">[<?= $txt_status ?>]</a>
															</p>
														</div>
														<div class="col-span-2 sm:col-span-1">
															<label
																class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">User
																Option</label>
															<p
																class="text-slate-900 dark:text-slate-100 text-lg font-medium">
																<a
																	class="text-red-600 underline cursor-pointer font-bold">[<?= "Delete" ?>]</a>
																This User
															</p>
														</div>
													</div>
													<hr class="opacity-30 mb-8">
													<div class="text-right space-x-2">
														<button type="button"
															class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
															data-modal-toggle="view-user-modal-<?= $i->user_token ?>">Cancel</button>
															<input type="hidden" name="token" value="<?= $i->user_token ?>">
														<button type="submit"
															class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Save
															Data
															<i class="fa-solid fa-check fa-fw ml-1"></i>
														</button>
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
