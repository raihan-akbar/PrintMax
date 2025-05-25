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
</body>

</html>