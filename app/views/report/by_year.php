           <body>

               <table width="100%">
                   <tr>
                       <td valign="top"></td>
                       <td align="center">
                           <h3>Laporan <?= $data['data']; ?></h3>

                       </td>
                   </tr>

               </table>

               <table width="100%">
                   <tr>
                       <td><strong>Per Tahun:</strong> <?= $data['year']; ?> </td>
                       <!-- <td><strong>To:</strong> Linblum - Barrio Comercial</td> -->
                   </tr>

               </table>

               <br />

               <table width="100%">
                   <?php
                    switch ($data['data']) {
                        case 'User':
                    ?>
                           <thead style="background-color: lightgray;">
                               <tr>
                                   <th>#</th>
                                   <th>Tanggal</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Alamat</th>;
                                   <th>Nomor HP</th>
                               </tr>
                           </thead>

                           <tbody>
                            
                                   <?php
                                    $no = 1;
                                    foreach ($data['row'] as $row) : ?>
                                       <tr>
                                       <td><?= $no; ?></td>
                                       <td><?php $datetime = explode(' ', $row['user_date']);
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
                                            echo $date['2'] . ' ' . $bulan . ' ' . $date['0'];       ?></td>
                                       <td align="left"><?= $row['user_name']; ?></td>
                                       <td align="left"><?= $row['user_email']; ?></td>
                                       <td align="left"><?= $row['user_address']; ?></td>
                                       </tr>
                                   <?php
                                        $no++;
                                    endforeach; ?>
                              

                           </tbody>

                           <tfoot>
                               <tr>
                                   <td colspan="4"></td>
                                   <td align="right">Total Pelanggan</td>
                                   <td align="left"><?= $data['rowId']['total']; ?></td>
                               </tr>
                           </tfoot>;
                       <?php
                            break;
                        case 'Transaction':
                        ?>
                           <thead style="background-color: lightgray;">
                               <tr>
                                   <th>#</th>
                                   <th>Tanggal</th>
                                   <th>Kode Invoice</th>
                                   <th>Nama</th>
                                   <th>Kategori</th>
                                   <th>Pembayaran</th>
                                   <th>Biaya</th>
                               </tr>
                           </thead>

                           <tbody>
                             
                                   <?php
                                    $no = 1;
                                    foreach ($data['row'] as $row) : ?>
                                      <tr>
                                       <td><?= $no; ?></td>
                                       <td><?php $datetime = explode(' ', $row['transaction_date']);
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
                                            echo $date['2'] . ' ' . $bulan . ' ' . $date['0'];       ?></td>
                                       <td align="left"><?= $row['transaction_invoice_code']; ?></td>
                                       <td align="left"><?= $row['user_name']; ?></td>
                                       <td align="left"><?= $row['transaction_category']; ?></td>
                                       <td align="left"><?= $row['transaction_method']; ?></td>
                                       <td align="left"><?= $row['transaction_pay_total']; ?></td>
                                       </tr>
                                   <?php
                                        $no++;
                                    endforeach; ?>
                               

                           </tbody>

                           <tfoot>
                               <tr>
                                   <td colspan="5"></td>
                                   <td align="right">Total Pendapatan</td>
                                   <td align="left"><?= 'Rp ' . $data['rowId']['transaction_all_pay_total'] . ',-'; ?></td>
                               </tr>
                               <tr>
                                   <td colspan="5"></td>
                                   <td align="right">Jumlah Transaksi</td>
                                   <td align="left"><?= $data['rowId']['transaction_all_count']; ?></td>
                               </tr>
                           </tfoot>;
                   <?php
                            break;
                    }
                    ?>


               </table>
               <br>
               <table width="100%">
                   <tr>

                       <td align="center">
                           <h1 style="padding-left: 7.0em"></h1>
                       </td>
                       <td align="center">
                           <h5>Mengetahui</h5>

                       </td>

                   </tr>
                   <tr>

                       <td align="center">
                           <h1 style="padding-left: 7.0em"></h1>
                       </td>
                       <td align="center">
                           <h5>Pemilik Cafe 17</h5>

                       </td>
                   </tr>

               </table>

           </body>

           </html>