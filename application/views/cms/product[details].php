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
    <?php foreach ($getProduct as $i) { ?>
        <!-- Page Script Here -->
        <div class="p-4 sm:ml-64">
            <div class="p-2 mt-14">
                <!-- Page Content Script Here -->
                <div id="page-header" class="w-full">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100">Product Details</h3>
                    <p class="font-base text-slate-800 dark:text-slate-200">Showing Details Result for
                        <b><?= $i->product_name; ?></b>.
                    </p>
                </div>
                <div class="w-full">
                    <hr class="w-full h-px my-4 bg-slate-500 border-0">
                </div>
                <!-- Content After HR -->
                <div class="w-full">
                    <div class="flex flex-wrap -mb-4 -mx-2">
                        <div class="w-full lg:w-1/3 mb-4 px-2">
                            <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 space-y-2 h-96">
                                <div class="columns-2">
                                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300">Product Details</h3>
                                    <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300 text-right">

                                        <button onclick="remove_product_<?= $i->product_token ?>()"
                                            class="px-2 py-1 rounded-lg text-sm font-medium text-center text-slate-100 dark:text-slate-900 rounded-lg bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300">Delete <i class="fa-solid fa-trash fa-xs"></i></button>
                                    </h3>
                                </div>
                                <hr class="w-full h-px my-2 bg-slate-400 border-0">
                                <form method="post" action="<?= base_url('sys/update_product') ?>">
                                    <div class="w-full">
                                        <label for="name"
                                            class="block text-sm font-medium text-slate-600 dark:text-slate-400">Name
                                            of Product</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                            placeholder="Type product name" required value="<?= $i->product_name ?>" />
                                    </div>
                                    <div class="w-full">
                                        <label for="price"
                                            class="block text-sm font-medium text-slate-600 dark:text-slate-400">Price</label>
                                        <div class="relative w-full">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                <p class="text-slate-400">Rp.</p>
                                            </div>
                                            <input type="text" name="price" id="quantity-input" data-input-counter
                                                aria-describedby="helper-text-explanation"
                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                                                placeholder="Price of Item" required value="<?= $i->product_price ?>" />
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <label for="description"
                                            class="block text-sm font-medium text-slate-600 dark:text-slate-400">Product
                                            Description</label>
                                        <textarea name="description" id="desc" rows="3"
                                            class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-2 h-fixed"
                                            style="resize: none;"
                                            placeholder="Write product description here"><?= $i->product_desc ?></textarea>
                                    </div>
                                    <input type="hidden" name="token" value="<?= $i->product_token ?>">
                                    <div class="w-full text-right pt-4">
                                        <button type="submit"
                                            class="w-full inline-flex justify-center items-center py-2 px-4 text-base font-medium text-center text-slate-100 dark:text-slate-900 rounded-lg bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300">
                                            Update Data
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="w-full lg:w-1/3 mb-4 px-2">
                            <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 h-96 overflow-x-auto">
                                <div class="columns-2 text-right">
                                    <h3 class="text-lg font-semibold text-slate-700 text-left dark:text-slate-300">Variant 1
                                        Lists</h3>
                                    <!-- <p data-modal-target="add-variant-1-modal" data-modal-toggle="add-variant-1-modal"
										class="text-blue-600` font-semibold text-sm">[ Add <i
											class="fa-solid fa-plus fa-xs"></i> ]</p> -->
                                    <button data-modal-target="add-variant-1-modal" data-modal-toggle="add-variant-1-modal"
                                        class="px-2 py-1 rounded-lg text-sm font-medium text-center text-slate-100 dark:text-slate-900 rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">Add
                                        New <i class="fa-solid fa-plus fa-xs"></i></button>
                                </div>
                                <!-- Add Variant 1 Modal -->
                                <div id="add-variant-1-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                                    alt="Print-Max Logo" />
                                                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                                                    Add New <?= $i->product_name; ?> Variant 1
                                                </h3>
                                                <button type="button"
                                                    class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="add-variant-1-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form method="post" action="<?= base_url('sys/add_variant_1') ?>"
                                                class="p-4 md:p-5" enctype="multipart/form-data">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Variant
                                                            Name</label>
                                                        <input type="text" name="variant_name" id="name"
                                                            class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                            placeholder="Insert Variant Name" required="">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Variant
                                                            Price</label>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                <p class="text-slate-400">Rp.</p>
                                                            </div>
                                                            <input type="text" name="variant_price" id="simple-search"
                                                                data-input-counter
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-bl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                                                                placeholder="Insert Variant Price" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="opacity-30 mb-8">
                                                <input type="hidden" name="token" value="<?= $i->product_token ?>">
                                                <input type="hidden" name="name" value="<?= $i->product_name ?>">
                                                <div class="text-right space-x-2">
                                                    <button type="button"
                                                        class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                        data-modal-toggle="add-variant-1-modal">Cancel</button>
                                                    <button type="submit"
                                                        class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Save
                                                        Variant
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

                                <div class="pb-4">
                                    <hr class="w-full h-px my-2 bg-slate-400 border-0">
                                </div>


                                <?php foreach ($getVariant1 as $a) { ?>
                                    <!-- Card -->
                                    <form method="post"
                                        action="<?= base_url('sys/update_variant_1/') . $a->product_variant_1_id ?>"
                                        class="pb-4" enctype="multipart/form-data">
                                        <div class="flex items-center mx-auto w-full text-right">
                                            <div class="relative w-full">
                                                <input type="text" name="variant_name"
                                                    class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-tl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="Variant Name" value="<?= $a->product_variant_1_name; ?>"
                                                    required />
                                            </div>
                                            <input type="hidden" name="token" value="<?= $i->product_token ?>">
                                            <button type="submit"
                                                class="p-2.5 text-sm font-medium text-slate-100 bg-blue-500 rounded-tr-lg border border-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                <i class="fa-solid fa-floppy-disk px-2"></i>
                                            </button>
                                        </div>
                                        <div class="flex items-center mx-auto w-full text-right">
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <p class="text-slate-400">Rp.</p>
                                                </div>
                                                <input type="text" name="variant_price" id="simple-search" data-input-counter
                                                    class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-bl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                                                    placeholder="Variant Price" value="<?= $a->product_variant_1_price_mark; ?>"
                                                    required />
                                            </div>
                                            <button type="button" onclick="remove_v1_<?= $a->product_variant_1_id ?>()"
                                                class="p-2.5 text-sm font-medium text-slate-100 bg-red-500 rounded-br-lg border border-red-400 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                                                <i class="fa-solid fa-trash px-2"></i>
                                            </button>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <!--  -->

                        <div class="w-full lg:w-1/3 mb-4 px-2">
                            <div class="bg-slate-100 dark:bg-slate-900 rounded-lg shadow-lg p-4 h-96 overflow-x-auto">
                                <div class="columns-2 text-right">
                                    <h3 class="text-lg font-semibold text-slate-700 text-left dark:text-slate-300">Variant 2
                                        Lists</h3>
                                    <!-- <p data-modal-target="add-variant-2-modal" data-modal-toggle="add-variant-2-modal"
										class="text-blue-600` font-semibold text-sm">[ Add <i
											class="fa-solid fa-plus fa-xs"></i> ]</p> -->
                                    <button data-modal-target="add-variant-2-modal" data-modal-toggle="add-variant-2-modal"
                                        class="px-2 py-1 rounded-lg text-sm font-medium text-center text-slate-100 dark:text-slate-900 rounded-lg bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300">Add
                                        New <i class="fa-solid fa-plus fa-xs"></i></button>
                                </div>
                                <!-- Add Variant 2 Modal -->
                                <div id="add-variant-2-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                                    alt="Print-Max Logo" />
                                                <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                                                    Add New <?= $i->product_name; ?> Variant 2
                                                </h3>
                                                <button type="button"
                                                    class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="add-variant-2-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form method="post" action="<?= base_url('sys/add_variant_2') ?>"
                                                class="p-4 md:p-5" enctype="multipart/form-data">
                                                <div class="grid gap-4 mb-4 grid-cols-2">
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Variant
                                                            Name</label>
                                                        <input type="text" name="variant_name" id="name"
                                                            class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                            placeholder="Insert Variant Name" required="">
                                                    </div>
                                                    <div class="col-span-2">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium dark:text-slate-100 text-slate-900">Variant
                                                            Price</label>
                                                        <div class="relative w-full">
                                                            <div
                                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                <p class="text-slate-400">Rp.</p>
                                                            </div>
                                                            <input type="text" name="variant_price" id="simple-search"
                                                                data-input-counter
                                                                class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-bl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                                                                placeholder="Insert Variant Price" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="opacity-30 mb-8">
                                                <input type="hidden" name="token" value="<?= $i->product_token ?>">
                                                <input type="hidden" name="name" value="<?= $i->product_name ?>">
                                                <div class="text-right space-x-2">
                                                    <button type="button"
                                                        class="text-slate-700 inline-flex items-center bg-slate-0 hover:text-slate-500 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                                        data-modal-toggle="add-variant-2-modal">Cancel</button>
                                                    <button type="submit"
                                                        class="text-slate-50 dark:text-slate-950 inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">Save
                                                        Variant
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

                                <div class="pb-4">
                                    <hr class="w-full h-px my-2 bg-slate-400 border-0">
                                </div>


                                <?php foreach ($getVariant2 as $a) { ?>
                                    <!-- Card -->
                                    <form method="post"
                                        action="<?= base_url('sys/update_variant_2/') . $a->product_variant_2_id ?>"
                                        class="pb-4" enctype="multipart/form-data">
                                        <div class="flex items-center mx-auto w-full text-right">
                                            <div class="relative w-full">
                                                <input type="text" name="variant_name"
                                                    class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-tl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    placeholder="Variant Name" value="<?= $a->product_variant_2_name; ?>"
                                                    required />
                                            </div>
                                            <input type="hidden" name="token" value="<?= $i->product_token ?>">
                                            <button type="submit"
                                                class="p-2.5 text-sm font-medium text-slate-100 bg-blue-500 rounded-tr-lg border border-blue-400 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                <i class="fa-solid fa-floppy-disk px-2"></i>
                                            </button>
                                        </div>
                                        <div class="flex items-center mx-auto w-full text-right">
                                            <div class="relative w-full">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <p class="text-slate-400">Rp.</p>
                                                </div>
                                                <input type="text" name="variant_price" id="simple-search" data-input-counter
                                                    class="bg-slate-50 dark:bg-slate-950 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-sm rounded-bl-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 ps-10"
                                                    placeholder="Variant Price" value="<?= $a->product_variant_2_price_mark; ?>"
                                                    required />
                                            </div>
                                            <button type="button" onclick="remove_v2_<?= $a->product_variant_2_id ?>()"
                                                class="p-2.5 text-sm font-medium text-slate-100 bg-red-500 rounded-br-lg border border-red-400 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300">
                                                <i class="fa-solid fa-trash px-2"></i>
                                            </button>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                        <!--  -->

                    </div>

                    <!-- Gallery -->
                    <div class="w-full bg-slate-100 dark:bg-slate-900 p-4 mt-4 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold text-slate-700 dark:text-slate-300"><?= $i->product_name ?> Images
                            Catalogue</h3>
                        <hr class="w-full h-px my-2 bg-slate-400 dark:bg-slate-600 border-0">
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                            <!-- /Images -->
                            <div
                                class="flex rounded-lg bg-center bg-no-repeat bg-[url('<?= base_url('src/item/bg-card.jpg') ?>')] bg-slate-700 bg-blend-multiply shadow-xl items-center text-center">
                                <div class="flex w-full">
                                    <a class="w-full py-0 cursor-pointer" data-modal-target="add-image-modal"
                                        data-modal-toggle="add-image-modal">
                                        <p class="text-4xl text-slate-200"><i class="fa-regular fa-image"></i></p>
                                        <p class="text-lg text-slate-200 font-bold">Add Image</p>
                                    </a>
                                </div>
                            </div>
                            <!-- Add Image Modal -->
                            <div id="add-image-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-4xl max-h-full rounded-lg">
                                    <!-- Modal content -->
                                    <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                                alt="Print-Max Logo" />
                                            <h3 class="text-lg font-semibold text-slate-900 dark:text-slate-100">
                                                Add <?= $i->product_name; ?> Image
                                            </h3>
                                            <button type="button"
                                                class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-500 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-toggle="add-image-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form method="post"
                                            action="<?= base_url('sys/add_product_image/' . $i->product_token) ?>"
                                            class="p-4 md:p-5" enctype="multipart/form-data">
                                            <div class="grid gap-4 mb-4">
                                                <div class="w-full bg-slate-200 dark:bg-slate-800 relative border-2 border-slate-300 border-slate-700 border-dashed rounded-lg p-2 py-8 lg:py-8"
                                                    id="dropzone">

                                                    <img src="" class="mt-4 mx-auto max-h-96 hidden shadow-lg rounded-md"
                                                        id="preview">

                                                    <input type="file" name="image" id="file-upload"
                                                        class="absolute inset-0 w-full h-full opacity-0 z-50" required>

                                                    <div class="text-center">
                                                        <h3
                                                            class="mt-2 text-sm font-medium text-slate-900 dark:text-slate-100">
                                                            <i class="text-center fa-regular fa-image text-6xl w-full text-slate-800 dark:text-slate-200 pb-4"
                                                                id="ph"></i>
                                                            <label for="file-upload"
                                                                class="relative cursor-pointer text-md">
                                                                <span>Drag and drop</span>
                                                                <span class="text-blue-600 font-semibold"> or browse</span>
                                                                <span>to upload</span>
                                                            </label>
                                                        </h3>
                                                        <p class="mt-1 text-xs text-slate-500 ">PNG, JPG, JPEG |
                                                            Recommendations is 1:1 Resolution</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center space-x-2 w-full">
                                                <button type="submit"
                                                    class="w-full text-slate-100 dark:text-slate-900 items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">
                                                    Upload Image
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /Images -->
                            <div
                                class="rounded-lg bg-slate-50 dark:bg-slate-950 shadow-xl border border-slate-50 dark:border-slate-950">
                                <!-- <div class="relative inline-flex rounded-lg max-h-80 h-screen "> -->
                                <div
                                    class="relative inline-flex bg-center bg-cover rounded-t-lg max-h-36 md:max-h-32 lg:max-h-36 xl:max-h-64 bg-[url('<?= base_url('src/item/_thumbnails/' . $i->product_thumbnails) ?>')]">
                                    <p class="cursor-pointer" data-modal-target="popup-modal-<?= $i->product_token ?>"
                                        data-modal-toggle="popup-modal-<?= $i->product_token ?>">
                                        <img class="h-screen max-h-full w-full max-w-full rounded-t-md shadow-lg bg-transparent opacity-0"
                                            src="<?= base_url('src/item/_thumbnails/' . $i->product_thumbnails); ?>" alt="">
                                    </p>
                                    <div
                                        class="absolute inline-flex items-center justify-center w-fit text-center text-xs font-medium text-slate-100 dark:text-slate-900 bg-purple-600 rounded-br-md rounded-tl-md p-1">
                                        Thumbnails
                                    </div>
                                    <!-- <div
										class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
										20</div> -->
                                </div>
                                <div id="popup-modal-<?= $i->product_token ?>" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-8xl max-w-8xl max-h-full">
                                        <div class="relative transparent rounded-lg">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-slate-400 bg-transparent rounded-lg text-lg w-10 h-10 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="popup-modal-<?= $i->product_token ?>">
                                                <i clmageass="fa-so_imagelid fa-x text-red-400 hover:text-red-600"></i>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="text-center">
                                                <img class="h-auto w-full max-w-full rounded shadow-lg"
                                                    src="<?= base_url('src/item/_thumbnails/' . $i->product_thumbnails); ?>"
                                                    alt="" style="max-height: 690px;">
                                                <div class="w-full text-right pt-4">
                                                    <button data-modal-hide="popup-modal-<?= $i->product_token ?>"
                                                        type="button"
                                                        class=" ms-3 text-md font-medium text-slate-200 hover:text-slate-400">Close
                                                        View</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="flex flex-wrap w-full">
                                        <p class="bg-red-500 w-1/2 text-center rounded-bl-lg text-slate-100 dark:text-slate-900 text-semibold py-1 text-sm hover:bg-red-600 cursor-pointer"
                                            onclick="remove_thumbnails_<?= $i->product_token ?>()">
                                            Remove
                                        </p>
                                        <p class="bg-green-500 w-1/2 text-center rounded-br-lg text-slate-100 dark:text-slate-900 text-semibold py-1 text-sm hover:bg-green-600 cursor-pointer z-99"
                                            data-modal-target="change-thumbnails-modal"
                                            data-modal-toggle="change-thumbnails-modal">
                                            Change
                                        </p>
                                    </div>
                                </div>
                                <!-- Change Thumbnails Modal -->
                                <div id="change-thumbnails-modal" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-4xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-slate-100 dark:bg-slate-900 rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <img src="<?= base_url('_assets/img/sq-logo.png') ?>" class="h-8 me-3"
                                                    alt="Print-Max Logo" />
                                                <h3 class="text-lg font-semibold text-slate-900">
                                                    Change <?= $i->product_name; ?> Thumbnails
                                                </h3>
                                                <button type="button"
                                                    class="text-slate-400 dark:text-slate-600 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="change-thumbnails-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form method="post"
                                                action="<?= base_url('sys/change_product_thumbnails/' . $i->product_token) ?>"
                                                class="p-4 md:p-5" enctype="multipart/form-data">
                                                <div class="grid gap-4 mb-4">
                                                    <div class="w-full bg-slate-200 dark:bg-slate-800 relative border-2 border-slate-300 dark:border-slate-700 border-dashed rounded-lg p-2 py-8 lg:py-8"
                                                        id="dropzone2">

                                                        <img src=""
                                                            class="mt-4 mx-auto max-h-96 hidden shadow-lg rounded-md"
                                                            id="preview2">

                                                        <input type="file" name="thumbnails" id="file-upload2"
                                                            class="absolute inset-0 w-full h-full opacity-0 z-50" required>

                                                        <div class="text-center">
                                                            <h3 class="mt-2 text-sm font-medium text-slate-900">
                                                                <i class="text-center fa-regular fa-image text-6xl w-full text-slate-800 dark:text-slate-200 pb-4"
                                                                    id="ph2"></i>
                                                                <label for="file-upload2"
                                                                    class="relative cursor-pointer text-md">
                                                                    <span>Drag and drop</span>
                                                                    <span class="text-blue-600 font-semibold"> or
                                                                        browse</span>
                                                                    <span>to upload</span>
                                                                </label>
                                                            </h3>
                                                            <p class="mt-1 text-xs text-slate-500">PNG, JPG, JPEG |
                                                                Recommendations is 1:1 Resolution</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center space-x-2 w-full">
                                                    <button type="submit"
                                                        class="w-full text-slate-100 dark:text-slate-900 items-center bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center">
                                                        Update Thumbnails
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Image END -->
                            <?php $n = 3;
                            foreach ($getImage as $image) { ?>
                                <!-- /Images -->
                                <div
                                    class="rounded-xl bg-slate-50 dark:bg-slate-950 shadow-xl border border-slate-50 dark:border-slate-950 rounded-lg max-h-full">
                                    <div
                                        class="relative inline-flex bg-center bg-cover rounded-t-lg max-h-36 md:max-h-32 lg:max-h-36 xl:max-h-64 bg-[url('<?= base_url('src/item/' . $image->product_image_name) ?>')]">
                                        <p class="cursor-pointer"
                                            data-modal-target="popup-modal-<?= $image->product_image_token ?>"
                                            data-modal-toggle="popup-modal-<?= $image->product_image_token ?>">
                                            <img class="h-screen max-h-full w-full max-w-full rounded-t-md shadow-lg bg-transparent opacity-0"
                                                src="<?= base_url('src/item/' . $image->product_image_name); ?>" alt="">
                                        </p>
                                        <!-- <div
											class="absolute inline-flex items-center justify-center w-fit text-center text-xs font-medium text-slate-100 bg-blue-950 rounded-br-md rounded-tl-md p-1">
											Thumbnails
										</div> -->
                                    </div>
                                    <div id="popup-modal-<?= $image->product_image_token ?>" tabindex="-1"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-8xl max-w-8xl max-h-full">
                                            <div class="relative transparent rounded-lg">
                                                <!-- <button type="button"
													class="absolute top-3 end-2.5 text-slate-400 bg-transparent rounded-lg text-lg w-10 h-10 ms-auto inline-flex justify-center items-center"
													data-modal-hide="popup-modal-<?= $image->product_image_token ?>">
													<i class="fa-solid fa-x text-red-400 hover:text-red-600"></i>
													<span class="sr-only">Close modal</span>
												</button> -->
                                                <div class="text-center">
                                                    <img class="h-auto max-h-lg w-full max-w-full rounded shadow-lg"
                                                        src="<?= base_url('src/item/' . $image->product_image_name); ?>" alt=""
                                                        style="max-height: 690px;">
                                                    <div class="w-full text-right pt-4">
                                                        <button data-modal-hide="popup-modal-<?= $image->product_image_token ?>"
                                                            type="button"
                                                            class=" ms-3 text-md font-medium text-slate-200 hover:text-slate-400">Close
                                                            View</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-wrap w-full">
                                            <p class="bg-red-500 w-full text-center rounded-b-lg text-slate-100 dark:text-slate-900 text-semibold py-1 text-sm hover:bg-red-600 cursor-pointer"
                                                onclick="remove_<?= $image->product_image_token ?>()">
                                                Remove
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <!-- /Image END -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function remove_thumbnails_<?= $i->product_token ?>() {
                swal({
                        title: "Are you sure?",
                        text: "<?= $i->product_name; ?> Thumbnails will be deleted permanently",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href =
                                "<?php echo base_url() . 'sys/remove_product_thumbnails/' . $i->product_token; ?>";;
                        }
                    });

            }
        </script>
    <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <?php $this->load->view('cms/parts/addon'); ?>

    <?= $this->session->flashdata('flash'); ?>
    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('file-upload');
        const preview = document.getElementById('preview');
        const ph = document.getElementById('ph');

        function displayPreview(file) {
            const reader = new FileReader();
            reader.onload = () => {
                preview.src = reader.result;
                preview.classList.remove('hidden');
                ph.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        dropzone.addEventListener('dragover', e => {
            e.preventDefault();
            dropzone.classList.add('border-blue-600');
        });

        dropzone.addEventListener('dragleave', e => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-600');
        });

        dropzone.addEventListener('drop', e => {
            e.preventDefault();
            dropzone.classList.remove('border-blue-600');

            const file = e.dataTransfer.files[0];
            if (file) {
                displayPreview(file);
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
            }
        });

        fileInput.addEventListener('change', e => {
            const file = e.target.files[0];
            if (file) {
                displayPreview(file);
            }
        });
    </script>
    <script>
        const dropzone2 = document.getElementById('dropzone2');
        const fileInput2 = document.getElementById('file-upload2');
        const preview2 = document.getElementById('preview2');
        const ph2 = document.getElementById('ph2');

        function displayPreview2(file) {
            const reader = new FileReader();
            reader.onload = () => {
                preview2.src = reader.result;
                preview2.classList.remove('hidden');
                ph2.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        dropzone2.addEventListener('dragover', e => {
            e.preventDefault();
            dropzone2.classList.add('border-blue-600');
        });

        dropzone2.addEventListener('dragleave', e => {
            e.preventDefault();
            dropzone2.classList.remove('border-blue-600');
        });

        dropzone2.addEventListener('drop', e => {
            e.preventDefault();
            dropzone2.classList.remove('border-blue-600');

            const file = e.dataTransfer.files[0];
            if (file) {
                displayPreview2(file);
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput2.files = dataTransfer.files;
            }
        });

        fileInput2.addEventListener('change', e => {
            const file = e.target.files[0];
            if (file) {
                displayPreview2(file);
            }
        });
    </script>

    <?php foreach ($getImage as $image) { ?>
        <!-- Delete Image Confirmation -->

        <script>
            function remove_<?= $image->product_image_token ?>() {
                swal({
                        title: "Delete This Image?",
                        text: "Just to make sure, the file will be deleted permanently.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = "
                            <?php echo base_url() . 'sys/remove_product_image/' . $image->product_token;
                            echo '-';
                            echo $image->product_image_token; ?> ";
                        }
                    });

            }
        </script>

    <?php } ?>
    <?php foreach ($getVariant1 as $var1) { ?>
        <!-- Delete Variant 1 Confirmation -->


        <script>
            function remove_v1_<?= $var1->product_variant_1_id ?>() {
                swal({
                        title: "Delete This Variant 1?",
                        text: "Just to make sure, this data will be deleted permanently.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = "<?php echo base_url() . 'sys/remove_variant_1/' . $var1->product_token;
                                                echo '-';
                                                echo $var1->product_variant_1_id; ?>";
                        }
                    });

            }
        </script>


    <?php } ?>
    <?php foreach ($getVariant2 as $var2) { ?>
        <script>
            function remove_v2_<?= $var2->product_variant_2_id ?>() {
                swal({
                        title: "Delete This Variant 2?",
                        text: "Just to make sure, this data will be deleted permanently.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = "<?php echo base_url() . 'sys/remove_variant_2/' . $var2->product_token;
                                                echo '-';
                                                echo $var2->product_variant_2_id; ?>";
                        }
                    });

            }
        </script>

    <?php } ?>
    <script>
        function remove_product_<?= $i->product_token ?>() {
            swal({
                    title: "Delete This Product?",
                    text: "Just to make sure, this data will be not displayed anymore.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = "<?php echo base_url() . 'sys/remove_product/' . $i->product_token;?>";
                    }
                });

        }
    </script>
</body>

</html>