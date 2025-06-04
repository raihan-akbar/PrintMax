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
                <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Products.</h3>
                <p class="font-base text-slate-800 dark:text-slate-200">
                    Page for Managing all Product that showing in Catalogue.
                </p>
            </div>
            <div class="w-full">
                <hr class="w-full h-px my-4 bg-slate-500 dark:bg-slate-600 border-0">
            </div>
            <!-- Content After HR -->
            <!-- New -->
            <div class="w-full mb-4">
                <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-full">
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
                        <ul class="py-2 w-full">
                            <div id="myUL"
                                class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                                <li class="py-1">
                                    <div
                                        class="max-w-full bg-center bg-no-repeat bg-[url('<?= base_url('src/item/bg-card.jpg') ?>')] bg-slate-700 dark:bg-slate-800 bg-blend-multiply rounded-lg">
                                        <div class="flex rounded-lg h-full flex-col shadow-lg backdrop-blur-sm">
                                            <div class="flex mx-auto w-screen max-w-full h-full">
                                                <div class="flex flex-col max-h-full my-auto items-center text-center w-full">
                                                    <button data-modal-target="add-item-modal" data-modal-toggle="add-item-modal"
                                                        class="py-8  md:my-36 text-slate-200 hover:text-slate-400 m-4">
                                                        <i class="fa-solid fa-plus text-2xl py-4"></i>
                                                        <p><a class="text-center text-xl font-bold">Add New Product</a></p>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="add-item-modal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                    <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                                        alt="Print-Max Logo" />
                                                    <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                                                        New Product Form
                                                    </h3>
                                                    <button type="button"
                                                        class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                        data-modal-toggle="add-item-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="post" action="<?= base_url('sys/add_product') ?>" class="p-4 md:p-5"
                                                    enctype="multipart/form-data">
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Name
                                                                of Product</label>
                                                            <input type="text" name="name" id="name"
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Type product name" required="">
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="price"
                                                                class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-100">Price</label>
                                                            <input type="text" name="price" id="quantity-input" data-input-counter
                                                                aria-describedby="helper-text-explanation"
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Price of Item" required />
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="category"
                                                                class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-100">Thumbnails</label>
                                                            <input name="thumbnails"
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full"
                                                                id="default_size" type="file" multiple>
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="description"
                                                                class="block mb-2 text-sm font-medium text-slate-900 dark:text-slate-100">Product
                                                                Description</label>
                                                            <textarea name="description" id="desc" rows="4"
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Write product description here"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="text-right space-x-2">
                                                        <button type="button"
                                                            class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                            data-modal-toggle="add-item-modal">Cancel</button>
                                                        <button type="submit"
                                                            class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Add
                                                            new product
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
                                </li>

                                <?php foreach ($getProduct as $a) { ?>
                                    <li class="py-1 ">
                                        <div class="w-full">
                                            <div
                                                class="flex rounded-lg h-full bg-slate-200 dark:bg-slate-800 flex-col shadow-lg">
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
                                                        <a class="text-2xl font-semibold"><?= $a->product_name; ?></a>
                                                        <a class="text-base text-sm py-2 font-regular">
                                                            <?= $a->product_token; ?>
                                                        </a>
                                                        <hr class="bg-blue-700 rounded border-1 border-blue-700">
                                                        <div class="text-center">
                                                            <a href="<?= base_url('cms/product/' . $a->product_token) ?>"
                                                                class="mt-5 text-slate-800 hover:text-blue-950 dark:text-slate-200 dark:hover:text-blue-200 inline-flex items-center">Customize
                                                                <i class="fa-solid fa-chevron-right text-xs ml-1"></i></a>
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
                </div>
            </div>
            <!-- !!! -->

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