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
                <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Invoice</h3>
                <p class="font-base text-slate-800 dark:text-slate-200">
                    Page for Show/Print All of Invoice.
                </p>
            </div>
            <div class="w-full">
                <hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
            </div>
            <!-- Content After HR -->
            <div class="w-full mb-4">
                <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-full">
                    <div class="columns-2 w-fukk">
                        <div class="w-full">
                            <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Active Order List</h3>
                        </div>
                        <div class="w-full text-right">
                            <button data-modal-target="summary-modal" data-modal-toggle="summary-modal" type="button" class="relative inline-flex items-center py-1 px-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get Summary
                        </div>
                        </button>
                    </div>

                    <!-- Track Finder Modal -->
                    <div id="summary-modal" tabindex="-1" aria-hidden="true"
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
                                        data-modal-hide="summary-modal">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Modal body -->
                                <form method="post" action="<?= base_url('cms/catch_summary/') ?>"
                                    class="p-5 space-y-4" enctype="multipart/form-data">
                                    <!-- Booking Code input -->
                                    <div>
                                        <label for="booking_code" class="block text-sm font-medium dark:text-white mb-1">Select Date Range of Transaction</label>
                                        <div class="flex items-center">
                                            <div class="w-full relative">
                                                <input type="date" id="start_date" name="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                                            </div>
                                            <span class="mx-4 text-gray-500">to</span>
                                            <div class="w-full relative">
                                                <input type="date" id="end_date" name="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- Buttons -->
                                    <div class="flex justify-end space-x-2 pt-4">
                                        <button type="button" data-modal-hide="summary-modal"
                                            class="px-5 py-2.5 rounded-lg text-sm font-medium text-slate-700 dark:text-white bg-transparent hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="px-5 py-2.5 rounded-lg text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 transition">
                                            Download Summary
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end Summary Modal -->
                    </div>
                </div>
                <hr class="w-full h-px my-2 bg-slate-400 border-0">
                <div class="w-full py-2">
                    <div class="relative w-full md:w-full lg:w-1/3 xl:w-1/4">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <p class="text-slate-700 dark:text-slate-300"><i
                                    class="fa-solid fa-magnifying-glass fa-xs"></i></p>
                        </div>
                        <input type="text" id="myInput" onkeyup="myFunction()"
                            class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                            placeholder="Search Active Order..." required />
                    </div>
                    <ul id="myUL" class="py-2 w-full">

                        <div
                            class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">
                            <?php foreach ($getBook as $b) { ?>
                                <li class="py-1">
                                    <div class="w-full bg-slate-200 dark:bg-slate-800 rounded-lg p-4">
                                        <a href="#">
                                            <p class="text-slate-700 dark:text-slate-300">
                                                <span class="font-bold"><?= $b->customer_name; ?> - <span
                                                        class=""><?= $b->customer_phone; ?></span></span>

                                            </p>
                                            <p class="text-slate-700 dark:text-slate-300">
                                                <?php
                                                $dateRaw = new DateTime($b->book_date);
                                                $dateString = date_format($dateRaw, 'd, F Y | H:i') . ' WIB';
                                                ?>
                                                <span class=""><?= $dateString; ?></span>
                                            </p>
                                            <p class="text-slate-700 dark:text-slate-300">
                                                <?php
                                                if ($b->book_paid == 1) {
                                                    $paidTxt = "Paid";
                                                    $paidClr = "text-green-600";
                                                } else {
                                                    $paidTxt = "Unpaid";
                                                    $paidClr = "text-red-600";
                                                }
                                                ?>
                                                <span class="">Total : Rp. <?= $b->price_total; ?></span>
                                                -
                                                <span class="<?= $paidClr; ?> font-medium"><?= $paidTxt; ?></span>
                                            </p>
                                            <p class="text-slate-700 dark:text-slate-300">

                                            </p>
                                            <p class="text-slate-700 dark:text-slate-300 text-sm mt-1">
                                                <span class="text-xs"><code><?= $b->book_key ?></code></span>
                                            </p>
                                        </a>
                                        <hr class="mt-4 mb-2 opacity-45">
                                        <a href="<?= base_url('cms/catch_invoice/' . $b->book_token); ?>" target="_blank"
                                            class="text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 text-center cursor-pointer">
                                            Download Invoice <i class="fa-solid fa-download fa-sm fa-fw"></i>
                                        </a>
                                    </div>
                                </li>

                            <?php } ?>


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
</body>

</html>



<!-- Order Status
Customer Name
Phone Number
Product Name
Order ID -->