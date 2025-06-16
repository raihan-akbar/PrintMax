<!-- Footer START -->
<footer class="bg-slate-50 dark:bg-slate-950 rounded-lg shadow">
	<div class="w-full max-w-screen-xl mx-auto pt-2">
		<hr class="my-2 border-neutral-200 dark:border-neutral-900 sm:mx-auto" />
		<span class="block text-sm text-gray-500 text-center pb-4">
			<a href="https://foxlabs.id/" class="hover:underline">PrintMax <?= date("Y") ?> &copy; </a>All Rights Reserved.
			<p class="text-center text-xs font-light casc" style="font-size: 5px;"><?= $this->session->userdata('agent_token') ?></p>
		</span>
	</div>
</footer>
<!-- Footer END -->