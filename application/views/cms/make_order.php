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
                <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Customer Order Form</h3>
                <p class="font-base text-slate-800 dark:text-slate-200">
                    Page for Make Manual Order.
                </p>
            </div>
            <div class="w-full">
                <hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
            </div>
            <!-- Content After HR -->
            <div class="w-full mb-4">
                <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-full">
                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Select Product to Make Order
                    </h3>
                    <p data-modal-target="view-cart" data-modal-toggle="view-cart"
                        class="text-md font-medium text-slate-700 dark:text-blue-300 cursor-pointer">View Cart</p>

                    <!-- View Cart Modal -->
                    <div id="view-cart" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                    <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                        alt="Print-Max Logo" />
                                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                                        <?= $this->session->userdata('user_name'); ?>'s Cart
                                    </h3>
                                    <button type="button"
                                        class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-toggle="view-cart">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="post" action="<?= base_url('sys/add_user_book/') ?>" class="p-4 md:p-5"
                                    enctype="multipart/form-data">
                                    <div class="grid gap-4 mb-4 grid-cols-2">

                                        <div class="col-span-1">
                                            <label for="name"
                                                class="block mb-2 text-md font-medium dark:text-slate-100 text-slate-900">Product's'</label>

                                        </div>
                                        <div class="col-span-1">
                                            <label for="name"
                                                class="block mb-2 text-md font-medium dark:text-slate-100 text-slate-900">Price</label>

                                        </div>

                                        <?php
                                        $total_of_price = 0;

                                        foreach ($getUserCart as $u) {
                                            if ($u->product_variant_1_name == 'Default') {
                                                $var_1_name = "";
                                            } else {
                                                $var_1_name = " - " . $u->product_variant_1_name;
                                            }
                                            if ($u->product_variant_2_name == 'Default') {
                                                $var_2_name = "";
                                            } else {
                                                $var_2_name = " - " . $u->product_variant_2_name;
                                            }

                                            $product_price = $u->product_price + $u->product_variant_1_price_mark + $u->product_variant_2_price_mark;
                                            $qty = $u->user_cart_qty;
                                            // The Math
                                            $total_product_price = $product_price * $qty;
                                            $total_of_price += $total_product_price;

                                        ?>
                                            <div class="col-span-1">
                                                <label for="name"
                                                    class="block text-md font-light dark:text-slate-100 text-slate-900"><span
                                                        class="pr-1 text-sm font-bold text-red-500 cursor-pointer"><a
                                                            href="<?= base_url('sys/remove_user_cart/' . $u->user_cart_id) ?>">X</a></span>
                                                    <?= $u->product_name ?> <?= $var_1_name ?> <?= $var_2_name ?></label>

                                            </div>
                                            <div class="col-span-1">
                                                <label class="block text-md font-light dark:text-slate-100 text-slate-900">
                                                    Rp<?= number_format($product_price, 0, ',', '.') ?> (x<?= $qty ?>)
                                                    =
                                                    <strong>Rp<?= number_format($total_product_price, 0, ',', '.') ?></strong>
                                                </label>
                                            </div>

                                        <?php } ?>
                                        <div class="col-span-2 mt-4">
                                            <label
                                                class="block text-lg font-semibold text-right dark:text-slate-100 text-slate-900">
                                                Total: Rp<?= number_format($total_of_price, 0, ',', '.') ?>
                                            </label>
                                        </div>
                                    </div>

                                    <hr class="opacity-30 mb-2">
                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                        <div class="col-span-1">
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Customer
                                                Name</label>
                                            <input type="text" name="customer_name" id="name"
                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                placeholder="Insert Customer Name" required="">
                                        </div>
                                        <div class="col-span-1">
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
                                    <hr class="opacity-30 mb-4">
                                    <div class="text-right space-x-2">
                                        <button type="button"
                                            class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                            data-modal-toggle="view-cart">Cancel</button>
                                        <button type="submit"
                                            class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Move
                                            to Order
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
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
                    <!-- & -->
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
                                class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                                <?php foreach ($getProduct as $a) { ?>
                                    <li class="py-1 ">
                                        <div class="w-full">
                                            <div
                                                class="flex rounded-lg h-full bg-slate-50 dark:bg-slate-800 flex-col shadow-lg">
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
                                                        <p class="text-base text-sm py-2 font-regular">
                                                            <?= $a->product_token; ?>
                                                        </p>
                                                        <hr class="bg-blue-700 rounded border-1 border-blue-700">
                                                        <div class="text-center">
                                                            <a data-modal-target="add-product-<?= $a->product_token ?>"
                                                                data-modal-toggle="add-product-<?= $a->product_token ?>"
                                                                class="mt-5 text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 inline-flex items-center cursor-pointer">Select Product
                                                                <i class="fa-solid fa-plus text-xs ml-1"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Select Product Modal -->
                                    <div id="add-product-<?= $a->product_token ?>" tabindex="-1" aria-hidden="true"
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
                                                        <?= $a->product_name; ?>
                                                    </h3>
                                                    <button type="button"
                                                        class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                        data-modal-toggle="add-product-<?= $a->product_token ?>">
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
                                                <form method="post"
                                                    action="<?= base_url('sys/add_make_order_cart/' . $a->product_token) ?>"
                                                    class="p-4 md:p-5" enctype="multipart/form-data">
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Select
                                                                Variant 1</label>
                                                            <select name="variant_1" id=""
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                                <?php
                                                                $this->load->model('Mod');
                                                                $where_v1 = "product_token = '$a->product_token'";
                                                                $getVariant1 = $this->Mod->get('product_variant_1', $where_v1)->result();
                                                                ?>
                                                                <?php
                                                                foreach ($getVariant1 as $v1) { ?>
                                                                    <option value="<?= $v1->product_variant_1_id; ?>">
                                                                        <?= $v1->product_variant_1_name; ?>
                                                                        (Rp.<?= $v1->product_variant_1_price_mark; ?>)
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Select
                                                                Variant 2</label>
                                                            <select name="variant_2" id=""
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                                <?php
                                                                $this->load->model('Mod');
                                                                $where_v2 = "product_token = '$a->product_token'";
                                                                $getVariant2 = $this->Mod->get('product_variant_2', $where_v2)->result();
                                                                ?>
                                                                <?php
                                                                foreach ($getVariant2 as $v2) { ?>
                                                                    <option value="<?= $v2->product_variant_2_id; ?>">
                                                                        <?= $v2->product_variant_2_name; ?>
                                                                        (Rp.<?= $v2->product_variant_2_price_mark; ?>)
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Variant
                                                                Name</label>
                                                            <input name="qty" type="number" min="1"
                                                                name="variant_name" id="name"
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Quantity of Product" required="">
                                                        </div>

                                                    </div>

                                                    <hr class="opacity-30 mb-8">
                                                    <input type="hidden" name="product_name"
                                                        value="<?= $a->product_name ?>">
                                                    <div class="text-right space-x-2">
                                                        <button type="button"
                                                            class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                            data-modal-toggle="add-product-<?= $a->product_token ?>">Cancel</button>
                                                        <button type="submit"
                                                            class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Add
                                                            to Cart
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
                                    <!-- & -->
                                <?php } ?>

                                <!-- Here -->


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
</body>

</html>



<!-- Order Status
Customer Name
Phone Number
Product Name
Order ID -->