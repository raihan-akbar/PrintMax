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
        <section id="tracker" class="my-8">
            <div class="w-full h-screen">
                <!-- Heading -->
                <div class="w-full text-center py-12 items-center justify-center">
                    <h1 class="text-slate-950 text-2xl font-bold">Your Order Details</h1>
                    <div class="inline-flex items-center justify-center w-full">
                        <hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-800">
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

</html>