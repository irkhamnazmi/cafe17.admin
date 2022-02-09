<body>

    <table width="100%">
        <tr>


            <td colspan="2" align="center">
                <h1>CAFE 17 - Purwokerto</h1>
                <p>Pesan Antar melalui www.cafe17-purwokerto.com</p>
                <p>Atau Hub/SMS 085725003400, 085799963000 </p>
                <p>Jl. Sunan Bonang Perempatan Dukuhwaluh Utara <u>+</u> 20m</p>
            </td>

        </tr>

        <tr>
            <td colspan="3">
                <div style="border: none; border-top: 1px dashed #000;"></div>
            </td>

        </tr>
    </table>
    <table width="100%">
        <!-- <tr>
            <td>Nama Kasir </td>
            <td colspan="2" align="right"></td>
        </tr> -->
        <tr>
            <td>Waktu </td>
            <td colspan="2" align="right"><p><?php $datetime = explode(' ', $data['rowId']['transaction_date']);
                                $date = explode('-', $datetime[0]);
                                switch ($date[1]) {
                                    case '01';
                                        $bulan = 'Januari';
                                        break;
                                    case '02';
                                        $bulan = 'Februari';
                                        break;
                                    case '03';
                                        $bulan = 'Maret';
                                        break;
                                    case '04';
                                        $bulan = 'April';
                                        break;
                                    case '05';
                                        $bulan = 'Mei';
                                        break;
                                    case '06';
                                        $bulan = 'Juni';
                                        break;
                                    case '07';
                                        $bulan = 'Juli';
                                        break;
                                    case '08';
                                        $bulan = 'Agustus';
                                        break;
                                    case '09';
                                        $bulan = 'September';
                                        break;
                                    case '10';
                                        $bulan = 'Oktober';
                                        break;
                                    case '11';
                                        $bulan = 'November';
                                        break;
                                    case '12';
                                        $bulan = 'Desember';
                                        break;
                                }
                                echo $date['2'] . ' ' . $bulan . ' ' . $date['0']. ' ' . $datetime[1]; ?></p></td>
        </tr>
        <tr>
            <td>No Invoice</td>
            <td colspan="2" align="right"><p><?= $data['rowId']['transaction_invoice_code'];?></p></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td colspan="2" align="right"><p><?= $data['rowId']['transaction_customer_name'];?></p></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td colspan="2" align="right"><p><?= $data['rowId']['transaction_category'];?></p></td>
        </tr>
        <tr>
            <td>Via Pembayaran</td>
            <td colspan="2" align="right"><p><?= $data['rowId']['transaction_method'];?></p></td>
        </tr>

        <tr>
            <td colspan="3">
                <div style="border: none; border-top: 1px dashed #000;"></div>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <h1>#<?= $v = ($data['rowId']['transaction_status'] != 'Lunas') ? 'BELUM BAYAR':'LUNAS';?>#</h1>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div style="border: none; border-top: 1px dashed #000;"></div>
            </td>
        </tr>

    </table>

    <table width="100%">
     <?php
            foreach($data['row'] AS $row):
     ?>
        <tr>
            <td><strong><?= $row['menu_name'];?> </strong> </td>
        </tr>
        <tr>
          
            <td><?= 'Rp '.$row['menu_price'].',- x '. $row['transaction_detail_qty'];?> </td>
            <td colspan="3"></td>
            <td align="right"><?= 'Rp '.$row['transaction_detail_price_total'].',-'?></td>
           
        </tr>
        <?php 
            endforeach;
            ?>
        <tr>
            <td colspan="5">
                <div style="border: none; border-top: 1px dashed #000;"></div>
            </td>
        </tr>
    </table>
    <table width="100%">
        <!-- <tr>
            <td>Sub total</td>
            <td colspan="3"></td>
            <td align="right">10000</td>
        </tr> -->
        <tr>
            <td><strong>Total Bayar</strong> </td>
            <td colspan="3"></td>
            <td align="right"><?= 'Rp '.$data['rowId']['transaction_pay_total'].',-';?></td>
        </tr>
        <!-- <tr>
            <td>Bayar</td>
            <td colspan="3"></td>
            <td align="right">10000</td>
        </tr> -->

        <tr>
            <td colspan="5" align="center">
                <p>Selamat Menikmati!</p>
            </td>
        </tr>
        <tr>
            <td colspan="5" align="center">
                <p>Powered By Cafe17 Purwokerto</p>
            </td>
        </tr>


    </table>

    <br />


</body>

</html>