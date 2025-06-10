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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="<?= base_url('_assets/js/sweetalert.min.js') ?>"></script>
	<link href="<?= base_url('_assets/css/custom.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
		integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>PrintMax</title>
</head>

<body class="bg-neutral-200">
	<?php $this->load->view('public/parts/navbar'); ?>
	<!-- Page Script Here -->

	<section id="guide-id" class="my-24">
		<div class="w-full">
			<div class="text-center">
				<h2 class="font-bold text-2xl md:text-3xl text-blue-950 mb-1">How to Order
				</h2>
				<div class="inline-flex items-center justify-center w-full mb-8">
					<hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-950">
				</div>

			</div>
			<div
				class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 justify-between items-center bg-neutral-100 rounded-lg shadow-xl">
				<p class="text-xs"><strong>ID</strong></p>
				<div class="w-full py-4">
					<h4 class="text-neutral-950 font-bold text-2xl">Cara Memesan Product</h4>
					<hr class="opacity-65">
					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-hand-point-up text-blue-700 pr-1"></i>
						Memilih Produk</h4>
					<p class="text-lg font-regular text-neutral-900">Pertama anda harus memilih satu atau lebih dari
						produk yang tertera pada Bagian Katalog di<a href="<?= base_url('#catalogue') ?>"
							target="_blank" class="text-blue-600"> Halaman Utama</a> kami.</p>
					<p class="text-lg font-regular text-neutral-900">Setelah anda menemukan produk yang ingin dipesan
						anda akan diarahkan ke <strong>Form Detail Produk</strong>.</p>

					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-cart-arrow-down text-blue-700 pr-1"></i> Masukan Produk ke Keranjang</h4>
					<p class="text-lg font-regular text-neutral-900">Pada <strong>Form Detail Produk</strong> Pilih 2
						Opsi Varian jika tersedia.</p>
					<p class="text-lg font-regular text-neutral-900">Isi Jumlah (Quantity) Sesuai keperluan anda lalu
						klik Tombol <strong>Add to Cart</strong> agar produk masuk ke Keranjang.</p>

					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-cash-register text-blue-700 pr-1"></i> Melakukan Order/Checkout</h4>
					<p class="text-lg font-regular text-neutral-900">Pada Menu Navigasi Atas Terdapat Icon <strong><i
								class="fa-solid fa-shopping-cart"></i> (Cart)</strong> Untuk melihat semua produk dalam
						keranjang.</p>
					<p class="text-lg font-regular text-neutral-900">Klik Icon tersebut lalu jendela keranjang akan
						terbuka menampilkan seluruh produk yang telah disimpan dengan <strong>Jumlah</strong> dan
						<strong>Harga</strong>.
					</p>
					<p class="text-lg font-regular text-neutral-900">Selanjutya Isi Nama Anda dan Nomor Whatsapp Anda
						lalu klik Tombol <strong>Order Now</strong></p>
					<p class="text-lg font-regular text-neutral-900">Terakhir Anda akan diarahkan ke <strong>Halaman
							Detail Order</strong> anda lalu klik Tombol <strong>Send Order Confirmation</strong> agar
						pesanan anda dilanjutkan oleh Admin PrintMax.</p>
				</div>
			</div>
		</div>
	</section>
	<section id="guide-en" class="my-24">
		<div class="w-full">
			<div
				class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 justify-between items-center bg-neutral-100 rounded-lg shadow-xl">
				<p class="text-xs"><strong>EN</strong></p>
				<div class="w-full py-4">
					<h4 class="text-neutral-950 font-bold text-2xl">How to Order Item</h4>
					<hr class="opacity-65">
					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-hand-point-up text-blue-700 pr-1"></i> Pick a Product</h4>
					<p class="text-lg font-regular text-neutral-900">First You should pick one or more of our product
						showed on Catalogue Section at our<a href="<?= base_url('#catalogue') ?>" target="_blank"
							class="text-blue-600"> Main Page</a>.</p>
					<p class="text-lg font-regular text-neutral-900">After you choose the product, you should redirected
						to <strong>Product Form Details</strong>.</p>

					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-cart-arrow-down text-blue-700 pr-1"></i> Put product into Cart</h4>
					<p class="text-lg font-regular text-neutral-900">In <strong>Product Form Details</strong> Page Pick
						2 Variant Option if it's Available.</p>
					<p class="text-lg font-regular text-neutral-900">Fill the Quantity form that you need and Click the
						<strong>Add to Cart</strong> Button for saving the product to Cart.</p>

					<h4 class="text-neutral-950 font-bold text-xl pt-4"><i class="fa-solid fa-cash-register text-blue-700 pr-1"></i> Do Order/Checkout</h4>
					<p class="text-lg font-regular text-neutral-900">On the Top Navigation Menu the is a <strong><i
								class="fa-solid fa-shopping-cart"></i> (Cart)</strong> Icon for Showing your saved
						product in your Cart.</p>
					<p class="text-lg font-regular text-neutral-900">Click the Icon and Window of your Cart will showing
						with all of your saved Products with the <strong>Quantity</strong> and
						<strong>Price</strong>.
					</p>
					<p class="text-lg font-regular text-neutral-900">Next Fill Your Name and Your Whatsapp Number then
						Click <strong>Order Now</strong> Button</p>
					<p class="text-lg font-regular text-neutral-900">Last you will redirected to <strong>Order Details
							Page</strong> the Click <strong>Send Order Confirmation</strong> Button so your order will
						be Accepted by PrintMax Admin.</p>
				</div>
			</div>
		</div>
	</section>

	<div class="text-center mb-12">
		<a href="<?= base_url('/') ?>" type="button"
			class="text-neutral-200 bg-blue-600 hover:bg-blue-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 border-neutral-200 border-2">
			<i class="fa-solid fa-chevron-left px-2 text-lg"></i>
			<span class="sr-only">Back to Home</span>
		</a>
	</div>

	<?php $this->load->view('public/parts/footer'); ?>
	<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
	<script src="<?= base_url('_assets/js/helper.js'); ?>"></script>

	<!-- Script for Carousel -->
	<script>
		function changeImage(src) {
			document.getElementById('mainImage').src = src;
		}
	</script>
	<?php $this->load->view('cms/parts/addon'); ?>
	<?= $this->session->flashdata('flash'); ?>

</body>

</html>