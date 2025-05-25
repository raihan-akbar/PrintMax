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
    <script src="https://cdn.jsdelivr.net/npm/theme-change@2.0.2/index.js"></script>
    <title>PrintMax</title>
</head>

<body class="bg-neutral-200">
    <?php $this->load->view('public/parts/navbar'); ?>
    <!-- Page Script Here -->
    <section id="home">
        <div id="default-carousel"
            class="relative w-full bg-[url('https://zimages.unsplash.com/photo-1582213782179-e0d53f98f2ca?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply"
            data-carousel="slide">

            <!-- Carousel wrapper -->
            <div class="relative h-screen overflow-hidden">
                <!-- Item 0 -->
                <div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
                    <div
                        class="bg-[url('https://images.unsplash.com/photo-1592312040834-bb0d621713e1?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
                        <div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
                            <div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
                                <div class="w-64 mt-24 md:mt-14 mb-4">
                                    <img src="<?= base_url('_assets/img/hr-logo.png'); ?>" class="" alt="PrintMAX Logo" />


                                    <!-- <i class="fa-solid fa-people-group text-4xl text-blue-700"></i> -->
                                </div>
                                <!-- <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
                                    Studio Driya Media
                                </h1> -->
                                <div
                                    class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
                                    <a href="#catalogue" class="inline-flex items-center px-4 py-2 text-white bg-blue-700 hover:bg-blue-700 font-medium text-sm rounded-lg focus:ring-4 focus:ring-blue-300 transition duration-300">
                                        <span class="mr-2">Our Products</span>
                                        <i class="fa-solid fa-arrow-down animate-bounce"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
                    <div
                        class="bg-[url('https://images.unsplash.com/photo-1527689368864-3a821dbccc34?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
                        <div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
                            <div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
                                <div class="w-16 mt-24 md:mt-14 mb-4">
                                    <!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
                                    <i class="fa-solid fa-laptop text-4xl text-blue-700"></i>
                                </div>
                                <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
                                    Print Anything in Just a Few Clicks
                                </h1>
                                <div
                                    class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
                                    <p class="text-blue-50 pt-3">
                                        <span class="font-regular">
                                            Order from anywhere, anytime. Simply choose your product, and relax while we do the printing.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
                    <div
                        class="bg-[url('https://images.unsplash.com/photo-1654481414716-2f4ab5fe0fbe?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
                        <div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
                            <div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
                                <div class="w-16 mt-24 md:mt-14 mb-4">
                                    <!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
                                    <i class="fa-solid fa-layer-group text-4xl text-blue-700"></i>
                                </div>
                                <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
                                    From Flyers to Merchandise — We Print It All
                                </h1>
                                <div
                                    class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
                                    <p class="text-blue-50 pt-3">
                                        <span class="font-regular">
                                            Business cards, invitations, posters, banners, books, stickers, custom gifts, and more — all in one place.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
                    <div
                        class="bg-[url('https://images.unsplash.com/photo-1707921645827-f498ff0bd2a4?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
                        <div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
                            <div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
                                <div class="w-16 mt-24 md:mt-14 mb-4">
                                    <!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
                                    <i class="fa-solid fa-check-circle text-4xl text-blue-700"></i>
                                </div>
                                <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
                                    Top-Notch Quality Without Breaking the Bank
                                </h1>
                                <div
                                    class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
                                    <p class="text-blue-50 pt-3">
                                        <span class="font-regular">
                                            Powered by modern printing technology and experienced staff to deliver professional results at friendly prices.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in delay-[700]" data-carousel-item>
                    <div
                        class="bg-[url('https://images.unsplash.com/photo-1560087459-7665dcbd23c8?q=80&w=2188&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] h-screen bg-center bg-no-repeat bg-gray-700 bg-blend-multiply">
                        <div class="flex rounded-lg h-screen flex-col shadow-lg sticky">
                            <div class="flex flex-col max-h-full my-auto items-center text-center w-full opacity-100">
                                <div class="w-16 mt-24 md:mt-14 mb-4">
                                    <!-- <img src="https://raw.githubusercontent.com/raihan-akbar/bm/refs/heads/main/_assets/img/sys/main-logo.png"
										alt="" class="w-full"> -->
                                    <i class="fa-solid fa-tasks text-4xl text-blue-700"></i>
                                </div>
                                <h1 class="text-center text-blue-50 font-black text-2xl md:text-3xl lg:text-4xl">
                                    Track Your Order Status Instantly
                                </h1>
                                <div
                                    class="flex flex-col max-h-full my-auto items-center text-center w-full mb-28 max-w-screen-2xl lg:max-w-screen-xl px-4 px-2 md:px-8">
                                    <p class="text-blue-50 pt-3">
                                        <span class="font-regular">
                                            Stay updated on your print job progress through your dashboard — from processing to ready-for-pickup.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <!-- <div class="absolute z-30 flex left-1/2 -translate-x-1/2 bottom-5 space-x-3 rtl:space-x-reverse">
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="true"
					aria-label="Slide 1" data-carousel-slide-to="0"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 2" data-carousel-slide-to="1"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 3" data-carousel-slide-to="2"></button>
				<button type="button" class="w-3 h-3 rounded-full bg-blue-300" aria-current="false"
					aria-label="Slide 4" data-carousel-slide-to="3"></button>
			</div> -->
            <!-- Slider controls -->
            <div class="pt-96 xl:pt-0">
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pt-96 xl:pt-0 opacity-25 hover:opacity-85"
                    data-carousel-prev>
                    <i class="fa-solid fa-arrow-left text-blue-100 text-2xl shadow-lg hover:animate-pulse"></i>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none pt-96 xl:pt-0 opacity-25 hover:opacity-85"
                    data-carousel-next>
                    <i class="fa-solid fa-arrow-right text-blue-100 text-2xl shadow-lg hover:animate-pulse"></i>
                </button>
            </div>
        </div>
    </section>


    <section id="catalogue">
        <div class="w-full bg-blue-950">
            <!-- Heading -->
            <div class="w-full text-center py-12 items-center justify-center">
                <h1 class="text-blue-50 text-2xl font-bold">Products Catalogue</h1>
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-24 h-1 my-2  border-0 rounded-sm bg-blue-200">
                </div>
            </div>
            <!-- Search -->

            <!-- Card Section -->
            <div>
                <ul id="myUL" class="py-2 w-full pb-24">
                    <div
                        class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 px-8">
                        <?php foreach ($getProduct as $a) { ?>
                            <li class="py-1s">
                                <div class="w-full">
                                    <div
                                        class="flex rounded-lg h-full bg-slate-200 dark:bg-slate-900 flex-col shadow-lg">
                                        <div class="w-full h-auto">
                                            <a href="#">
                                                <img class="rounded-t-lg shadow-lg"
                                                    src="<?= base_url('src/item/_thumbnails/' . $a->product_thumbnails); ?>"
                                                    alt="" />
                                            </a>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="flex flex-col justify-between flex-grow p-4 text-slate-800 dark:text-slate-200">
                                                <h4 class="text-2xl font-semibold"><?= $a->product_name; ?></h4>
                                                <div class="columns-2">
                                                    <p class="text-2xl text-sm py-2 font-regular">
                                                        Rp<?= number_format($a->product_price, 0, ',', '.') ?>
                                                    </p>
                                                    <p class="text-2xl text-sm py-2 font-regular text-right">
                                                        <i class="fa-solid fa-cart-flatbed"></i> <?= $a->product_sold ?>
                                                    </p>
                                                </div>
                                                <hr class="bg-blue-700 rounded border-1 border-blue-700">
                                                <div class="text-center">
                                                    <a href="<?= base_url('cust/item/' . $a->product_token) ?>"
                                                        class="mt-5 text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 inline-flex items-center">Select Product
                                                        <i class="fa-solid fa-plus text-xs ml-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                        <!-- Here -->

                    </div>
                </ul>
            </div>

            <!-- End of Cards -->

        </div>
    </section>
    <?php $this->load->view('public/parts/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="<?= base_url('_assets/js/helper.js'); ?>"></script>

    <?php $raw_agent_token = strtolower(bin2hex(random_bytes(50))) ?>
    <?php $session_agent_token = $this->session->userdata('agent_token'); ?>


    <script>
        var sess = "<?= $session_agent_token ?>";
        var ls = localStorage.getItem("agent_token");
        console.log(sess);

        if (localStorage.getItem("agent_token") == null) {
            localStorage.setItem("agent_token", "<?= $raw_agent_token; ?>");
            location.href = "<?php echo base_url() . 'Main/add_agent_token/' . $raw_agent_token; ?>";
        } else if (sess != localStorage.getItem("agent_token")) {
            location.href = "<?php echo base_url() . 'Main/sess_agent_token/'; ?>" + ls;

        }
    </script>
    <?php $this->load->view('cms/parts/addon'); ?>
    <?= $this->session->flashdata('flash'); ?>
</body>

</html>