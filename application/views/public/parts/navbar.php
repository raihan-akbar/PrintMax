<!-- NavBar START -->
<nav class="bg-blue-950 fixed top-0 z-40 start-0 w-full shadow-lg">
	<div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 justify-between items-center">
		<a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Beranda</a>
				</li>
				<li>
					<a href="<?= base_url('/#catalogue') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Katalog</a>
				</li>
				<li>
					<a href="<?= base_url('/contact/') ?>"
						class="block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 hover:underline decoration-2 underline-offset-8">Kontak</a>
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
					<a href="" class="relative">
						<!-- <img class="w-6 h-6 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt=""> -->
						<i
							class="fa-solid fa-shopping-cart block px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw"></i>
						<span
							class="-top-1 left-6 md:left-4 absolute w-3 h-3 bg-red-700 border border-slate-900 rounded-full <?= $cart_ping; ?>"></span>
						<span
							class="-top-1 left-6 md:left-4 absolute w-3 h-3 bg-red-600 border border-slate-900 rounded-full animate-ping <?= $cart_ping; ?>"></span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('/' . $url . '/') ?>">
						<i
							class="fa-regular fa-sun block py-4 px-3 text-slate-300 rounded md:p-0 hover:text-slate-100 decoration-2 underline-offset-8 text-base fa-fw">
						</i>
					</a>
				</li>
				<li class="w-full text-center hidden">
					<p class="text-slate-100" data-collapse-toggle="navbar-multi-level"><i
							class="fa-solid fa-chevron-up"></i></p>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- NavBar END -->
