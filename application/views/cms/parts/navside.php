<nav class="fixed top-0 z-30 w-full bg-blue-950 dark:bg-slate-900 shadow-md bg-sl">
	<div class="px-3 py-3 lg:px-5 lg:pl-3">
		<div class="flex items-center justify-between">
			<div class="flex items-center justify-start rtl:justify-end">
				<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
					type="button"
					class="inline-flex items-center p-2 text-sm text-neutral-500 rounded-lg sm:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200">
					<span class="sr-only">Open sidebar</span>
					<svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
						xmlns="http://www.w3.org/2000/svg">
						<path clip-rule="evenodd" fill-rule="evenodd"
							d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
						</path>
					</svg>
				</button>
				<a href="<?= base_url('/cms/') ?>" class="flex ms-2 md:me-24">
					<img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-6 me-3" alt="Print-Max Logo" />
					<p class="text-neutral-100 font-regular">PRINT<span class="font-bold">MAX</span></p>
				</a>
			</div>

			<ul>
				<li>
					<button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
						class="flex text-sm bg-slate-800 rounded-full md:me-0 focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600"
						type="button">
						<span class="sr-only">Open user menu</span>
						<img class="w-8 h-8 rounded-full" src="<?= base_url('_assets/img/avatar.png') ?>"
							alt="user photo">
					</button>

					<!-- Dropdown menu -->
					<div id="dropdownAvatar"
						class="z-10 hidden bg-neutral-100 divide-y divide-neutral-400 rounded-lg shadow-lg w-44 dark:bg-slate-700 dark:divide-slate-600 w-full sm:w-72">
						<div class="px-4 py-3 text-sm text-slate-900 dark:text-neural-100">
							<div class="font-medium text-neutral-600 dark:text-neutral-200">
								<?= $this->session->userdata('user_name'); ?>
							</div>
							<div class="truncate text-xs text-neutral-600 dark:text-neutral-200">
								<?= $this->session->userdata('role_name'); ?>
							</div>
						</div>
						<ul class="py-2 text-sm text-slate-700 dark:text-slate-200"
							aria-labelledby="dropdownUserAvatarButton">
							<li>
								<a href="<?= base_url('/sys/unauth/') ?>"
									class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-neural-100">
									<i class="fa-solid fa-gear fa-fw"></i>
									Settings
								</a>
							</li>
							<li>
								<a href="<?= base_url('/sys/unauth/') ?>"
									class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-neural-100">
									<i class="fa-solid fa-envelope fa-fw"></i>
									Customer Message
								</a>
							</li>
							<li>
								<a href="#"
									class="block w-full hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-neural-100">
									<button id="theme-toggle" class="w-full h-full px-4 py-2">
										<p id="theme-toggle-dark-icon" class="w-full text-left h-full hidden">
											<i class="fa-solid fa-circle-half-stroke fa-fw"></i>
											Dark Mode
										</p>
										<p id="theme-toggle-light-icon" class="w-full text-left h-full hidden">
											<i class="fa-solid fa-circle-half-stroke fa-fw"></i>
											Light Mode
										</p>
									</button>
								</a>
							</li>
						</ul>
						<div class="py-2">
							<a href="<?= base_url('/sys/unauth/') ?>"
								class="block w-full px-4 py-2 text-sm text-slate-700 hover:bg-slate-100 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-neural-100">
								<i class="fa-solid fa-sign-out fa-rotate-180 fa-fw text-red-500"></i>
								Sign out
							</a>
						</div>
					</div>
				</li>
			</ul>

		</div>
	</div>
</nav>

<aside id="logo-sidebar"
	class="fixed top-0 left-0 z-40 w-64 h-screen pt-18 transition-transform -translate-x-full bg-blue-950 dark:bg-slate-900 sm:translate-x-0"
	aria-label="Sidebar">
	<div class="w-full">
		<img src="<?= base_url('_assets/img/hr-logo.png') ?>" alt="" class="px-14 pt-4">
	</div>
	<div class="h-full px-3 pb-4 overflow-y-auto bg-blue-950 dark:bg-slate-900 mt-2">
		<div class="inline-flex items-center justify-center w-full">
			<hr class="w-64 h-px my-8 bg-neutral-500 border-0">
			<span
				class="absolute px-3 font-medium text-neutral-400 -translate-x-1/2 bg-blue-950 dark:bg-slate-900 left-1/2 text-sm">Navigation</span>
		</div>
		<ul class="space-y-2 font-regular">
			<?php
			foreach ($getMenu as $menu) { ?>
				<?php
				$menu_id = $menu->menu_id;
				$menu_active = $this->session->userdata('menu_active');
				if ($menu_active == $menu_id) {
					$active_style = 'bg-blue-900';
				} else {
					$active_style = null;
				}
				?>
				<li class="<?= $active_style; ?> hover:bg-neutral-950 rounded-lg hover:opacity-50">
					<a href="<?= base_url($menu->menu_path); ?>"
						class="flex items-center p-2 text-neutral-100 rounded-lg font-medium">
						<i class="<?= $menu->menu_icon; ?> fa-sm fa-fw text-neutral-300"></i>
						<span class="ms-3 ml-2"><?= $menu->menu_name; ?></span>
					</a>
				</li>
			<?php } ?>
			<li class="pt-80">

			</li>
			<li class="hover:bg-neutral-950 rounded-lg hover:opacity-50">
				<a href="<?= base_url('/'); ?>" class="flex items-center p-2 text-neutral-100 rounded-lg font-medium">
					<i class="fa fa-map fa-sm fa-fw text-neutral-300"></i>
					<span class="ms-3 ml-2">Homepage</span>
				</a>
			</li>
			<li class="">
				<hr class="opacity-50">
			</li>
			<li class="hover:bg-neutral-950 rounded-lg hover:opacity-50">
				<a href="<?= base_url('signout'); ?>" class="flex items-center p-2 text-red-600 rounded-lg">
					<i class="fa fa-sign-out fa-rotate-180 fa-sm fa-fw text-red-800"></i>
					<span class="ms-3 ml-2">Sign out</span>
				</a>
			</li>

			<li class="pt-4 md:pt-6 lg:pt-16"></li>
			<li class="w-full">
				<p class="text-neutral-400 text-xs text-justify">Web App Artisan : <br> <b>Ghina Nur Agsya</b> &copy
					<?= date('Y') ?>
				</p>
			</li>
		</ul>
	</div>
</aside>
