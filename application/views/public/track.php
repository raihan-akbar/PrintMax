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
    <!-- <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script> -->
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>

    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>


    <title>PrintMax</title>
</head>

<?php foreach ($book as $b) { ?>

    <body class="bg-neutral-200 dark:bg-slate-800">

        <?php $this->load->view('public/parts/navbar'); ?>
        <!-- Page Script Here -->
        <section id="tracker" class="my-8">
            <div class="w-full h-screen">
                <!-- Heading -->
                <div class="w-full text-center py-12 items-center justify-center">
                    <h1 class="text-slate-950 dark:text-slate-50 text-2xl font-bold">Your Order Details</h1>
                    <div class="inline-flex items-center justify-center w-full">
                        <hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-800 dark:bg-blue-200">
                    </div>
                </div>
                <div class="container px-4 mx-auto">
                    <div class="max-w-5xl mx-auto bg-neutral-100 dark:bg-slate-950 p-8 rounded-lg shadow-xl">
                        <div class="flex flex-wrap items-center -mx-5">
                            <div class="w-full lg:w-1/2 px-5">
                                <ul>
                                    <?php
                                    if ($b->book_status == "Pending") {
                                        $statusPending = "bg-blue-300 text-blue-600";
                                        $statusProgress = "bg-neutral-300 text-neutral-600";
                                        $statusFinish = "bg-neutral-300 text-neutral-600";
                                        $statusCancel = "bg-neutral-300 text-neutral-600";
                                    } else if ($b->book_status == "Progress") {
                                        $statusPending = "bg-blue-300 text-blue-600";
                                        $statusProgress = "bg-blue-300 text-blue-600";
                                        $statusFinish = "bg-neutral-300 text-neutral-600";
                                        $statusCancel = "bg-neutral-300 text-neutral-600";
                                    } else if ($b->book_status == "Finish") {
                                        $statusPending = "bg-blue-300 text-blue-600";
                                        $statusProgress = "bg-blue-300 text-blue-600";
                                        $statusFinish = "bg-blue-300 text-blue-600";
                                        $statusCancel = "bg-neutral-300 text-neutral-600";
                                    } else if ($b->book_status == "Finish") {
                                        $statusPending = "bg-blue-300 text-blue-600";
                                        $statusProgress = "bg-blue-300 text-blue-600";
                                        $statusFinish = "bg-green-300 text-green-600";
                                        $statusCancel = "bg-blue-300 text-blue-600";
                                    } else {
                                        $statusPending = "bg-orange-300 text-red-600";
                                        $statusProgress = "bg-orange-300 text-red-600";
                                        $statusFinish = "bg-orange-300 text-red-600";
                                        $statusCancel = "bg-orange-300 text-red-600";
                                    }
                                    ?>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 <?= $statusPending; ?> text-lg font-bold rounded-full"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700 dark:text-neutral-300">Order Created</h3>
                                            <p class="text-md text-neutral-500">PrintMax Admin Should be Accept Your Order Immediately</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 <?= $statusProgress; ?> text-lg font-bold rounded-full"><i class="fa-solid fa-handshake"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700 dark:text-neutral-300">Order Accepted by Admin</h3>
                                            <p class="text-md text-neutral-500">We're Currently Preparing for Your Order, Still in Queue</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 <?= $statusProgress; ?> text-lg font-bold rounded-full"><i class="fa-solid fa-gear"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700 dark:text-neutral-300">On Progress</h3>
                                            <p class="text-md text-neutral-500">We Working on Your Order Now, Please Be Patient</p>
                                        </div>
                                    </li>
                                    <li class="flex pb-4 mb-2 border-b border-neutral-200">
                                        <div class="mr-8">
                                            <span class="flex justify-center items-center w-14 h-14 <?= $statusFinish; ?> text-lg font-bold rounded-full"><i class="fa-solid fa-flag-checkered"></i></span>
                                        </div>
                                        <div class="max-w-xs">
                                            <h3 class="mb-2 text-lg font-bold text-neutral-700 dark:text-neutral-300">Your Order is Ready</h3>
                                            <p class="text-md text-neutral-500">You Can Take Your Product Now, It's Finished</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="w-full lg:w-1/2 px-5 mb-5 lg:mb-4">
                                <div class="max-w-md">
                                    <div class="columns-2">
                                        <p class="text-lg font-extrabold text-neutral-800 dark:text-neutral-200">Order Overview</p>
                                        <?php
                                        if ($b->book_paid == 1) {
                                            $paidTxt = "Paid";
                                            $paidClr = "text-green-600";
                                        } else {
                                            $paidTxt = "Unpaid";
                                            $paidClr = "text-red-600";
                                        }
                                        ?>
                                        <p class="<?= $paidClr ?> text-right font-bold"><?= $paidTxt ?></p>
                                    </div>
                                    <hr class="h-px my-1 bg-neutral-600 border-0">
                                    <p class="text-neutral-800 dark:text-neutral-200"><?= $b->customer_name; ?> (<?= $b->customer_phone; ?>)</p>
                                    <p class="text-neutral-800 dark:text-neutral-200">Created on <?= date('l d, F Y') ?></p>
                                    <p class="text-neutral-800 dark:text-neutral-200">Order ID : <?= $b->book_key; ?></p>

                                    <hr class="h-px my-1 bg-neutral-600 border-0">
                                    <div class="columns-2 pt-2">
                                        <div class="w-full text-left">
                                            <p class="text-neutral-800 font-semibold text-neutral-800 dark:text-neutral-200">Product's</p>
                                        </div>
                                        <div class="w-full text-left">
                                            <p class="text-neutral-800 font-semibold text-neutral-800 dark:text-neutral-200">Price</p>
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
                                                <p class="text-neutral-700 dark:text-neutral-300 font-medium"><?= $bd->product_name ?> <?= $var_1_name ?> <?= $var_2_name ?></p>
                                            </div>
                                            <div class="w-full text-left">
                                                <p class="text-neutral-700 dark:text-neutral-300 font-medium">Rp <?= number_format($total_product_price, 0, ',', '.') ?> (x<?= $qty ?>)</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <hr class="h-px bg-neutral-600 border-0 mt-4">
                                    <div class="columns-2 py-2 ">
                                        <div class="w-full text-left">
                                            <p class="text-lg text-neutral-800 font-semibold text-neutral-800 dark:text-neutral-200">Total Price</p>
                                        </div>

                                        <div class="w-full text-left">
                                            <p class="text-lg text-neutral-800 font-semibold text-neutral-800 dark:text-neutral-200">Rp<?= number_format($total_of_price, 0, ',', '.') ?></p>
                                        </div>
                                    </div>
                                    <hr class="h-px mt-1 bg-neutral-600 border-0">
                                    <?php
                                    if ($bd->book_status == "Pending") {
                                        $chatBtn = "";
                                    } else {
                                        $chatBtn = "hidden";
                                    }
                                    ?>
                                    <div class="w-full">
                                        <p class="text-sm text-blue-600 hover:text-blue-600 font-medium pt-2"><a <a href="<?= base_url('cust/catch_invoice/' . $b->book_token); ?> " target="_blank"><i class="fa-solid fa-download  fa-xs fa-fw"></i> Download Order Invoice</a></p>
                                    </div>
                                    <div class="columns-1 py-2 <?= $chatBtn ?>">
                                        <div class="w-full text-left">
                                            <p class="text-sm text-neutral-950 dark:text-neutral-50 font-base"><i class="fa-solid fa-chevron-right text-red-600 fa-xs fa-fw"></i> You should message to Our Whats'app so PrintMax Admin can Notice Your Order. Click This Button Below</p>
                                        </div>
                                        <div class="flex w-full text-center pt-2">
                                            <a href="<?= base_url('cust/send_confirm/') . $bd->book_key ?>" target="_blank" class="w-full p-2 bg-green-700 hover:bg-green-900 text-neutral-50 rounded-lg cursor-pointer">
                                                Send Order Confirmation <i class="fab fa-whatsapp fa-lg"></i>
                                            </a>
                                        </div>
                                    </div>
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