<!DOCTYPE html>
<html style="background-image: url('<?= base_url('_assets/img/bg-pattern.png'); ?>');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;" lang="en">

<head>
    <!-- Css Style -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    <!-- First Section -->

    <!-- CSS Summary Summon -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <?php $this->load->view("cms/parts/css_summary"); ?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section class="first y" id="first">
        <table width="100%" style="padding: 10px;">
            <tr>
                <td style="" width="30%"><a><img src="<?= base_url('_assets/img/sq-logo.png') ?>" alt="" style="width: 50px;"></a></td>
                <td style="text-align: center;" width="40%">
                    <h2 style="margin: 0;">PrintMax Summary</h2>
                    <?php
                    $start_date = $this->session->userdata('sum_start_date') . " 00:00:00";
                    $end_date = $this->session->userdata('sum_end_date') . " 23:59:59";
                    $start = $this->session->userdata('sum_start_date');
                    $end = $this->session->userdata('sum_end_date');
                    ?>
                    <p style="margin: 0;">Periode : <?= $start; ?> - <?= $end; ?></p>
                </td>
                <td style="" width="30%">

                </td>
            </tr>
        </table>
    </section>
    <section style="padding-top: 20px;" class="seccond y" id="seccond">
        <h3 style="margin: 0; text-align: center;">Jumlah Detail Order</h3>
        <?php
        $totalTransaksi = $this->db->query("
            SELECT COUNT(*) as total 
            FROM book 
            WHERE DATE(book_date) BETWEEN '$start_date' AND '$end_date'
            ")->row()->total;

        ?>
        <table width="100%">
            <tr>
                <td style="max-width: 100%; border-radius: 8px;" width="33.33%">
                    <div style="background-color:rgb(138, 169, 236); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 28px; font-weight: bold; margin:0 ;"><?= $totalTransaksi ?></p>
                        <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Total Order</p>
                    </div>
                </td>
                <td style="max-width: 100%; border-radius: 8px;" width="33.33%">
                    <div style="background-color:rgb(135, 226, 140); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 28px; font-weight: bold; margin:0 ;">4</p>
                        <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Order Berhasil</p>
                    </div>
                </td>
                <td style="max-width: 100%; border-radius: 8px;" width="33.33%">
                    <div style="background-color:rgb(204, 182, 122); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 28px; font-weight: bold; margin:0 ;">2</p>
                        <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Order Batal</p>
                    </div>
                </td>
            </tr>
        </table>
    </section>
    <section style="padding-top: 50px;" class="third y" id="third">
        <table width="100%" style="min-width: 100%;">
            <tr>
                <td style="border-radius: 8px;" width="33.33%">
                    <h3 style="margin: 0; font-size: 18px; text-align: center;">Total Pendapatan</h3>
                    <div style="max-width: 100%; background-color:rgb(192, 138, 236); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 20px; font-weight: bold; margin:0 ;">Rp<?= number_format($income = 2044500, 0, ',', '.') ?></p>
                    </div>
                </td>
                <td style="border-radius: 8px;" width="33.33%">
                    <h3 style="margin: 0; font-size: 18px; text-align: center;">Produk Terjual</h3>
                    <div style="max-width: 100%; background-color:rgb(149, 135, 226); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 20px; font-weight: bold; margin:0 ;">219</p>
                    </div>
                </td>
                <td style="border-radius: 8px;" width="33.33%">
                    <h3 style="margin: 0; font-size: 18px; text-align: center;">Rata-rata Order Value</h3>
                    <div style="max-width: 100%; background-color:rgb(122, 201, 204); padding: 10px; border-radius: 8px; text-align: center;">
                        <p style="font-size: 20px; font-weight: bold; margin:0 ;">Rp<?= number_format($avg = 136300, 0, ',', '.') ?></p>
                    </div>
                </td>
            </tr>
        </table>
    </section>
    <section style="padding-top: 50px;" class="fourth y" id="fourth">
        <h3 style="margin: 0; text-align: left; padding-left: 2px;">Produk Paling Banyak Terjual</h3>
        <table width="100%" style="background-color: lightgray; border-radius: 8px; padding: 6px;">
            <tr style="margin: 0; padding: 0; ">
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Produk</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Harga</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Status</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Terjual</p>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Sticker Chromo</p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Rp<?= number_format($income = 4000, 0, ',', '.') ?></p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Aktif</p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">7567</p>
                </td>
            </tr>
        </table>
    </section>
    <section style="padding-top: 50px;" class="fifth y" id="fifth">
        <h3 style="margin: 0; text-align: left; padding-left: 2px;">Produk Paling Sedikit Terjual</h3>
        <table width="100%" style="background-color: lightgray; border-radius: 8px; padding: 6px;">
            <tr style="margin: 0; padding: 0; ">
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Produk</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Harga</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Status</p>
                </td>
                <td style="margin: 0; padding: 0;">
                    <p style="font-size: 18px; font-weight: bolder; margin:0 ;">Terjual</p>
                </td>
            </tr>
            <tr>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Medali (10 Pcs)</p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Rp<?= number_format($income = 45000, 0, ',', '.') ?></p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">Aktif</p>
                </td>
                <td style="padding-top: 8px">
                    <p style="font-size: 18px; font-weight: regular; margin:0 ;">103</p>
                </td>
            </tr>
        </table>
    </section>
    <section style="padding-top: 80px;" class="sixth y" id="sixth">
        <hr style="border: 0; height: 1.5px; background-color: rgb(19, 19, 19); margin: 0;">
        <pre style="margin: 0%; margin-top: 10px; font-size: 12px; text-align: center; color: rgb(19, 19, 19);">Automatic Generated Summary Report</pre>
        <pre style="margin: 0%; margin-top: 3px; font-size: 12px; text-align: center; color: rgb(19, 19, 19);"><?= date('l d, F Y - H:i') ?> WIB</pre>
        <pre style="margin: 0%; margin-top: 3px; font-size: 12px; text-align: center; color: rgb(19, 19, 19);">Ghina Nur Agsya</pre>
    </section>
</body>

</html>