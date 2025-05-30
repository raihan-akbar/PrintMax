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
<?php foreach ($book as $b) { ?>

    <body class="bg-neutral-200">
        <?php $this->load->view('public/parts/navbar'); ?>
        <!-- Page Script Here -->
        <section id="tracker" class="my-8">
            <div class="w-full h-screen">
                <!-- Heading -->
                <div class="w-full text-center py-12 items-center justify-center">
                    <h1 class="text-slate-950 text-2xl font-bold">Your Order Details</h1>
                    <div class="inline-flex items-center justify-center w-full">
                        <hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-800">
                    </div>
                </div>
                <div class="container px-4 mx-auto">
                    <div class="max-w-5xl mx-auto">
                        <div class="flex flex-wrap items-center -mx-5">
                            <div class="w-full lg:w-1/2 px-5">
                                <ul>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 bg-blue-200 text-lg font-bold rounded-full text-blue-600"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700">Order Created</h3>
                                            <p class="text-md text-neutral-500">PrintMax Admin Should be Accept Your Order Immediately</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 bg-blue-50 text-lg font-bold rounded-full text-neutral-600"><i class="fa-solid fa-handshake"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700">Order Accepted by Admin</h3>
                                            <p class="text-md text-neutral-500">We're Currently Preparing for Your Order, Still in Queue</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 bg-blue-50 text-lg font-bold rounded-full text-neutral-600"><i class="fa-solid fa-flag-checkered"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700">On Progress</h3>
                                            <p class="text-md text-neutral-500">We Working on Your Order Now, Please Be Patient</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 bg-blue-50 text-lg font-bold rounded-full text-neutral-600"><i class="fa-solid fa-flag-checkered"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700">Your Order is Ready</h3>
                                            <p class="text-md text-neutral-500">You Can Take Your Product Now, It's Finished</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full lg:w-1/2 px-5 mb-5 lg:mb-4">
                                <div class="max-w-md">
                                    <div class="columns-2">
                                        <p class="text-lg font-extrabold text-neutral-800">Order Overview</p>
                                        <p class="text-red-600 text-right font-bold">Unpaid</p>
                                    </div>
                                    <hr class="h-px my-1 bg-neutral-600 border-0">
                                    <p><?= $b->customer_name; ?> (<?= $b->customer_phone; ?>)</p>
                                    <p>Created on <?= date('l d, F Y') ?></p>
                                    <hr class="h-px my-1 bg-neutral-600 border-0">
                                    <div class="columns-2 pt-2">
                                        <div class="w-full text-left">
                                            <p class="text-neutral-800 font-semibold">Product's</p>
                                        </div>
                                        <div class="w-full text-left">
                                            <p class="text-neutral-800 font-semibold">Price</p>
                                        </div>
                                    </div>
                                    <?php
                                    $this->load->model('Mod');
                                    // $where_token = "book_token = '$b->book_token'";
                                    $getBookDetails = $this->db->query(" SELECT * FROM book,book_product,product,product_variant_1,product_variant_2 WHERE book.book_token=book_product.book_token AND book_product.product_token=product.product_token AND book_product.product_variant_1_id=product_variant_1.product_variant_1_id AND book_product.product_variant_2_id=product_variant_2.product_variant_2_id AND book_product.book_token='$b->book_token' ")->result();
                                    ?>
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
                                        <div class="columns-2 pt-0">

                                            <div class="w-full text-left">
                                                <p class="text-neutral-700 font-medium"><?= $bd->product_name ?> <?= $var_1_name ?> <?= $var_2_name ?></p>
                                            </div>
                                            <div class="w-full text-left">
                                                <p class="text-neutral-700 font-medium">Rp <?= number_format($total_product_price, 0, ',', '.') ?> (x<?= $qty ?>)</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <hr class="h-px bg-neutral-600 border-0 mt-4">
                                    <div class="columns-2 py-2 ">
                                        <div class="w-full text-left">
                                            <p class="text-lg text-neutral-800 font-semibold">Total Price</p>
                                        </div>

                                        <div class="w-full text-left">
                                            <p class="text-lg text-neutral-800 font-semibold">Rp<?= number_format($total_of_price, 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                                    <hr class="h-px mt-1 bg-neutral-600 border-0">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="text-center pt-24">
                        <a href="<?= base_url('/') ?>" type="button"
                            class="text-neutral-200 bg-blue-600 hover:bg-blue-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 border-neutral-200 border-2">
                            <i class="fa-solid fa-chevron-left px-2 text-lg"></i>
                            <span class="sr-only">Back to Home</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
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
<?php } ?>

</html>