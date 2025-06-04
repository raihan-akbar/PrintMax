<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PrintMax Invoice</title>

    <style>
        .invoice-box {
            max-width: 1000px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<?php
$this->load->model('Mod');

$invoice_token = $this->session->userdata('invoice_token');
// $getBook = $this->Mod->get('book', array('book_token' => $invoice_token))->result();
$getBook = $this->db->query(" SELECT * FROM book WHERE book_token='$invoice_token'")->result();
$getInvoice = $this->db->query(" SELECT * FROM book,book_product,product,product_variant_1,product_variant_2,user WHERE book.book_token=book_product.book_token AND book_product.product_token=product.product_token AND book_product.product_variant_1_id=product_variant_1.product_variant_1_id AND book_product.product_variant_2_id=product_variant_2.product_variant_2_id AND book_product.book_token='$invoice_token' AND book.user_token=user.user_token ")->result();
?>
<?php
foreach ($getBook as $b) {
?>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img
                                        src="<?= base_url('_assets/img/sq-logo.png') ?>"
                                        style="width: 100%; max-width: 80px" />
                                </td>
                                <?php
                                $dateRaw = new DateTime($b->book_date);
                                $dateString = date_format($dateRaw, 'd, F Y | H:i') . ' WIB';
                                ?>
                                <td>
                                    Order ID : <?= $b->book_key ?> <br />
                                    Order Date: <?= $dateString; ?><br />
                                    Invoice Created : <?= date('d, F Y | H:i') . ' WIB'; ?><br />

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    PrintMax<br />
                                    Sukabumi 43111<br />
                                    PrintMax Payment Invoice
                                </td>
                                <?php
                                if ($b->book_paid == 1) {
                                    $paidTxt = "Paid";
                                    $paidClr = "text-green-600";
                                } else {
                                    $paidTxt = "Unpaid";
                                    $paidClr = "text-red-600";
                                }
                                ?>
                                <td>
                                    To: <?= $b->customer_name; ?>
                                    <br />
                                    Total : Rp<?= number_format($b->price_total, 0, ',', '.') ?>
                                    <br />
                                    Payment : <?= $paidTxt ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr class="heading">
                    <td>Product</td>
                    <td>Price</td>
                </tr>
                <?php
                $total_product_price = 0;
                $total_of_price = 0;
                foreach ($getInvoice as $bd) {
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
                    $per_product_price = $bd->product_price + $bd->product_variant_1_price_mark + $bd->product_variant_2_price_mark;
                    $qty = $bd->book_product_qty;
                    // The Math
                    $total_product_price = $product_price * $qty;
                    $total_of_price += $total_product_price;
                ?>
                    <tr class="item">
                        <td><?= $bd->product_name ?> <?= $var_1_name ?> <?= $var_2_name ?></td>
                        <td>Rp<?= number_format($product_price, 0, ',', '.') ?> x <?= $qty ?></td>
                    </tr>
                <?php } ?>
                <tr class="item" style="margin-top: 4px;">
                    <td><strong>Total Price</strong></td>
                    <td><strong>Rp<?= number_format($total_of_price, 0, ',', '.') ?></strong></td>
                </tr>

                <tr class="item">
                    <td>
                        <p>Best Regards,<br> <?= $bd->user_name ?> </p>
                    </td>
                </tr>

            </table>
            <hr>
        </div>
    </body>
<?php } ?>

</html>