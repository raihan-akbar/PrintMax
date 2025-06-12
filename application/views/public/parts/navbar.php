<!-- NavBar START -->
<nav class="bg-blue-950 fixed top-0 z-40 start-0 w-full shadow-lg">
	<div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 justify-between items-center">
		<a href="<?= base_url('/') ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
			<img src="<?= base_url('_assets/img/sq-logo.png'); ?>" class="h-7" alt="PrintMAX Logo" />
			<span class="self-center text-2xl font-semibold whitespace-nowrap text-blue-50"></span>
		</a>
		<button data-collapse-toggle="navbar-multi-level" type="button"
			class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 hover:text-blue-50 rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
			aria-controls="navbar-multi-level" aria-expanded="false">
			<span class="sr-only">Open main menu</span>
			<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					d="M1 1h15M1 7h15M1 13h15" />
			</svg>
		</button>
		<div class="hidden  w-full md:block md:w-auto rounded-lg py-2 bg-transparent" id="navbar-multi-level">
			<ul
				class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg space-y-4 md:space-y-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
				<li>
					<a href="<?= base_url('/#home') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Home</a>
				</li>
				<li>
					<a href="<?= base_url('/#catalogue') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Catalogue</a>
				</li>
				<li>
					<a href="<?= base_url('/contact/') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Contact</a>
				</li>
				<li>
					<a href="<?= base_url('/guide/') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Guide</a>
				</li>
				<?php
				if ($this->session->userdata('auth') == true) {
					$addon_menu = null;
					$url = 'cms';
					$addon_name = 'Dashboard';
				} else {
					$addon_menu = 'hidden';
					$url = null;
					$addon_name = null;
				}

				if ($this->session->userdata('cart_ping') == true) {
					$cart_ping = "";
				} else {
					$cart_ping = "hidden";
				}

				?>
				<li class="<?= $addon_menu; ?>">
					<a href="<?= base_url('/' . $url . '/') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">
						<?= $addon_name; ?>
					</a>
				</li>

				<li class="">
					<a data-modal-target="view-cart" data-modal-toggle="view-cart" class="relative cursor-pointer">
						<!-- <img class="w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt=""> -->
						<i
							class="fa-solid fa-shopping-cart block text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw px-4"></i>
						<span
							class="-top-1 left-6 md:left-4 absolute w-3 h-3 bg-red-700 border border-slate-900 rounded-full <?= $cart_ping; ?>"></span>
						<span
							class="-top-1 left-6 md:left-4 absolute w-3 h-3 bg-red-600 border border-slate-900 rounded-full animate-ping <?= $cart_ping; ?>"></span>
					</a>

				</li>
				<li class="">
					<a data-modal-target="track-finder" data-modal-toggle="track-finder" class="relative cursor-pointer">
						<i
							class="fa-solid fa-dolly block px-4 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw"></i>
					</a>
				</li>
				<li>
					<button id="theme-toggle" class="relative cursor-pointer">
						<span id="theme-toggle-dark-icon" class="hidden">
							<i class="fa-solid fa-moon block px-4 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw"></i>
						</span>
						<span id="theme-toggle-light-icon" class="hidden">
							<i class="fa-solid fa-sun block px-4 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw"></i>
						</span>
					</button>
				</li>
				<!-- <li>
					<a href="<?= base_url('/' . $url . '/') ?>">
						<i
							class="fa-regular fa-sun block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw">
						</i>
					</a>
				</li> -->
				<li class="w-full text-center hidden">
					<p class="text-slate-100" data-collapse-toggle="navbar-multi-level"><i
							class="fa-solid fa-chevron-up"></i></p>
				</li>
			</ul>
		</div>

	</div>
</nav>

<!-- View Cart Modal -->
<div id="view-cart" tabindex="-1" aria-hidden="true"
	class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden">

	<!-- Overlay (fade only) -->
	<div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity duration-300"></div>

	<!-- Modal content wrapper -->
	<div class="relative w-full max-w-2xl mx-auto my-16 z-50">
		<!-- Modal Box -->
		<div class="bg-white dark:bg-slate-900 rounded-lg shadow-lg overflow-hidden">
			<!-- Modal header -->
			<div class="flex items-center justify-between p-4 border-b dark:border-slate-700">
				<div class="flex items-center space-x-2">
					<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8" alt="Print-Max Logo">
					<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Your Cart</h3>
				</div>
				<button type="button"
					class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition"
					data-modal-hide="view-cart">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 14 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
							stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
					</svg>
				</button>
			</div>

			<!-- Modal body -->
			<form method="post" action="<?= base_url('cust/make_order/') ?>"
				class="p-5 space-y-4" enctype="multipart/form-data">
				<div class="grid grid-cols-2 gap-4">
					<div><label class="text-sm font-medium dark:text-white">Product(s)</label></div>
					<div><label class="text-sm font-medium dark:text-white">Price</label></div>

					<?php
					$total_of_price = 0;
					foreach ($getAgentCart as $u) {
						$var_1_name = ($u->product_variant_1_name != 'Default') ? " - " . $u->product_variant_1_name : "";
						$var_2_name = ($u->product_variant_2_name != 'Default') ? " - " . $u->product_variant_2_name : "";
						$product_price = $u->product_price + $u->product_variant_1_price_mark + $u->product_variant_2_price_mark;
						$qty = $u->agent_cart_qty;
						$total_product_price = $product_price * $qty;
						$total_of_price += $total_product_price;
					?>
						<div>
							<label class="text-sm dark:text-white">
								<a href="<?= base_url('cust/remove_agent_cart/' . $u->agent_cart_id) ?>"
									class="text-red-500 font-bold pr-2 hover:underline">X</a>
								<?= $u->product_name . $var_1_name . $var_2_name ?>
							</label>
						</div>
						<div>
							<label class="text-sm dark:text-white">
								Rp<?= number_format($product_price, 0, ',', '.') ?> x<?= $qty ?> =
								<strong>Rp<?= number_format($total_product_price, 0, ',', '.') ?></strong>
							</label>
						</div>
					<?php } ?>
				</div>

				<hr class="opacity-30 my-2">

				<div class="text-right text-lg font-semibold dark:text-white">
					Total: Rp<?= number_format($total_of_price, 0, ',', '.') ?>
				</div>

				<hr class="opacity-30 my-4">

				<div class="grid grid-cols-2 gap-4">
					<div>
						<label class="block text-sm font-medium dark:text-white mb-1">Customer Name</label>
						<input type="text" name="customer_name" required
							class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white p-2.5 text-sm" placeholder="Insert Your Name">
					</div>
					<div>
						<label for="customer_phone" class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">
							Customer Phone
						</label>
						<div class="flex">
							<span class="inline-flex items-center px-3 text-sm text-slate-900 bg-slate-200 dark:bg-slate-800 dark:text-slate-100 rounded-l-md border border-r-0 border-slate-300 dark:border-slate-700">
								+62
							</span>
							<input type="text" id="customer_phone" name="customer_phone"
								class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-r-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
								placeholder="81234567890" required pattern="^[1-9][0-9]{7,14}$"
								inputmode="numeric" oninput="validatePhone(this)">
						</div>
					</div>
				</div>

				<div class="flex justify-end space-x-2 pt-4">
					<button type="button" data-modal-hide="view-cart"
						class="px-5 py-2.5 rounded-lg text-sm font-medium text-slate-700 dark:text-white bg-transparent hover:bg-slate-200 dark:hover:bg-slate-700 transition">
						Cancel
					</button>
					<button type="submit"
						class="px-5 py-2.5 rounded-lg text-sm font-medium text-white bg-green-600 hover:bg-green-700 transition">
						Order Now <i class="fa-solid fa-cart-shopping animate-bounce"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ; -->

<!-- Track Finder Modal -->
<div id="track-finder" tabindex="-1" aria-hidden="true"
	class="fixed inset-0 z-50 hidden overflow-y-auto overflow-x-hidden">

	<!-- Overlay -->
	<div class="fixed inset-0 bg-gray-900 bg-opacity-50 transition-opacity duration-300"></div>

	<!-- Modal content wrapper -->
	<div class="relative w-full max-w-2xl mx-auto my-16 z-50">
		<!-- Modal Box -->
		<div class="bg-white dark:bg-slate-900 rounded-lg shadow-lg overflow-hidden">
			<!-- Modal header -->
			<div class="flex items-center justify-between p-4 border-b dark:border-slate-700">
				<div class="flex items-center space-x-2">
					<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8" alt="Print-Max Logo">
					<h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">Track Your Order</h3>
				</div>
				<button type="button"
					class="text-slate-400 hover:text-slate-900 dark:hover:text-white transition"
					data-modal-hide="track-finder">
					<svg class="w-5 h-5" fill="none" viewBox="0 0 14 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
							stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
					</svg>
				</button>
			</div>

			<!-- Modal body -->
			<form method="post" action="<?= base_url('cust/find_order/') ?>"
				class="p-5 space-y-4" enctype="multipart/form-data">

				<!-- Booking Code input -->
				<div>
					<label for="booking_code" class="block text-sm font-medium dark:text-white mb-1">Order ID</label>
					<input type="text" name="book_key" id="booking_code"
						class="w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-white p-2.5 text-sm uppercase"
						placeholder="( XXXXX-XXXXX )" maxlength="11" oninput="formatBookingCode(this)" required>
				</div>


				<!-- Buttons -->
				<div class="flex justify-end space-x-2 pt-4">
					<button type="button" data-modal-hide="track-finder"
						class="px-5 py-2.5 rounded-lg text-sm font-medium text-slate-700 dark:text-white bg-transparent hover:bg-slate-200 dark:hover:bg-slate-700 transition">
						Cancel
					</button>
					<button type="submit"
						class="px-5 py-2.5 rounded-lg text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 transition">
						Find Order
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Script format kode booking -->
<script>
	function formatBookingCode(input) {
		let value = input.value.replace(/[^a-zA-Z0-9]/g, ''); // Hapus selain alphanumeric
		if (value.length > 5) {
			value = value.slice(0, 5) + '-' + value.slice(5, 10);
		}
		input.value = value.slice(0, 11); // Maks 11 karakter total
	}
</script>
<script>
	function validatePhone(input) {
		// Hanya angka, hapus karakter non-numeric
		input.value = input.value.replace(/\D/g, '');

		// Hapus awalan 0 atau 62 jika ada
		if (input.value.startsWith('0')) {
			input.value = input.value.slice(1);
		} else if (input.value.startsWith('62')) {
			input.value = input.value.slice(2);
		}
	}
</script>


<!-- NavBar END -->