           <!-- Page content-->
           <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
               <div class="row">
                   <div class="col-4">
                       <h1 class="mt-4" style="margin-bottom: 5%;">Transaksi</h1>
                   </div>

               </div>

               <div class="row" style="padding-right:15%">
                   <div class="col d-flex justify-content-end">

                       <!-- <div class="card" style=" width:18rem; color: black; border-radius: 10px;">
                           <div class="card-body">
                               <form>
                                   <span class="iconify" data-inline="false" data-icon="zmdi:search" style="font-size: 24px;"></span>
                                   <input type="text" placeholder="Cari" style="outline: none;  border-color: transparent;" />
                               </form>

                           </div>
                       </div> -->

                       <button class="btn btn-lg btn-success create" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Buat Invoice</button>
                   </div>
                   <div style="overflow-x:auto;">
                       <table class="table table-bordered" id="dataTable">
                           <thead style=" border: 1px solid #ddd;">
                               <tr>
                                   <th scope="col">#</th>
                                   <th scope="col">Tanggal</th>
                                   <th scope="col">Kode Invoice</th>
                                   <th scope="col">Nama Pelanggan</th>
                                   <th scope="col">Via Pembayaran</th>
                                   <th scope="col">Biaya</th>
                                   <th scope="col">Status</th>
                                   <th scope="col">Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                                if (!empty($data['row'])) {
                                    $no = 1;
                                    foreach ($data['row'] as $row) :
                                        $datetime = explode(' ', $row['transaction_date']);
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
                                ?>
                                       <tr>
                                           <th scope="row"><?= $no; ?></th>
                                           <td><?= $date['2'] . ' ' . $bulan . ' ' . $date['0'] . ' ' . $datetime[1]; ?></td>
                                           <td><?= $row['transaction_invoice_code']; ?></td>
                                           <td><?= $row['user_name']; ?></td>
                                           <td><?= $row['transaction_method'] ?></td>
                                           <td>Rp <?= $row['transaction_pay_total'] ?>,-</td>
                                           <td><?php
                                                switch ($row['transaction_status']) {
                                                    case 'Menunggu Konfirmasi';
                                                    ?>
                                                       <div class="alert alert-warning" style="max-width: 100%; text-align: center;"><?= $row['transaction_status']; ?></div>
                                                   <?php
                                                        break;
                                                    case 'Menunggu Pembayaran';
                                                    ?>
                                                       <div class="alert alert-info" style="max-width: 100%; text-align: center;"><?= $row['transaction_status']; ?></div>
                                                   <?php
                                                        break;
                                                    case 'Sedang Proses';
                                                    ?>
                                                       <div class="alert alert-danger" style="max-width: 100%; text-align: center;"><?= $row['transaction_status']; ?></div>
                                                   <?php
                                                        break;
                                                    case 'Lunas';
                                                    ?>
                                                       <div class="alert alert-success" style="max-width: 100%; text-align: center;"><?= $row['transaction_status']; ?></div>
                                               <?php
                                                        break;
                                                }
                                                ?>
                                           </td>
                                           <td>
                                               <div class="dropdown">
                                                   <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                       Select
                                                   </a>

                                                   <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                       <?php if ($row['transaction_status'] != 'Keranjang') {
                                                        ?>
                                                           <a class="dropdown-item" href="<?= BASEURL; ?>/transaction/detail/<?= $row['transaction_id']; ?>">Detail</a>
                                                       <?php
                                                        } else {
                                                        ?>
                                                           <a class="dropdown-item" href="<?= BASEURL; ?>/transaction/delete/<?= $row['transaction_id']; ?>" onclick="return confirm('yakin data <?= $row['transaction_invoice_code']; ?> akan dihapus?')">hapus</a>
                                                       <?php

                                                        } ?>


                                                       <!-- <a class="dropdown-item edituser" href="<?= BASEURL; ?>/user/edit/<?= $row['user_id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $row['user_id']; ?>">ubah</a> -->

                                                   </div>
                                               </div>
                                           </td>
                                       </tr>

                                   <?php
                                        $no++;
                                    endforeach;
                                } else {
                                    ?>
                                   <tr>
                                       <th class="text-center" colspan="6">--Tidak Ada Data--</th>

                                   </tr>
                               <?php
                                }
                                ?>
                           </tbody>
                       </table>
                   </div>

               </div>

           </div>
           </div>
           </div>

           <!-- Modal Dialog -->
           <div class="modal fade" id="formModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

               <div class="modal-dialog modal-xl" style="width: 30%; " role="document">

                   <div class="modal-content">

                       <div class="modal-body" style="padding-right: 10%; padding-left: 10%;">

                           <form id="form" class="needs-validation" novalidate method="post" action="<?= BASEURL; ?>/transaction/create">
                           <span id="page" style="display: none;">transaction</span>
                                <div class="row">
                                   <h1>Buat Pesanan</h1>
                                   <div class="col" style="border: solid; border-radius: 10px;">

                                       <div class="row">

                                           <div class="col" style="line-height: 2.8;">
                                               <!-- <label>Tanggal</label>
                                        <input type="text" class="form-control" data-date-format="dd/mm/yyyy"
                                            id="datepicker"> -->
                                               <!-- <div class="form-group">
                                                   <label for="transaction_invoice_code">Kode Invoice</label>
                                                   <input type="text" class="form-control" required readonly style="background-color: transparent;" name="transaction_invoice_code" id="transaction_invoice_code">
                                                   <div class="invalid-feedback" id="transaction_invoice_code_error">
                                                       Kode Invoice Telah Terpakai Silahkan Muat Ulang Halaman
                                                   </div>
                                               </div> -->
                                               <div class="form-group">
                                                   <label for="transaction_customer_name">Nama Pelanggan</label>
                                                   <input type="text" class="form-control" required name="transaction_customer_name" id="transaction_customer_name">
                                                   <div class="invalid-feedback">
                                                       Nama Pelanggan Wajib diisi
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                   <label for="transaction_customer_phone_number">Nomor Whatsapp</label>
                                                   <input type="text" class="form-control" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="transaction_customer_phone_number" id="transaction_customer_phone_number">
                                                   <div class="invalid-feedback">
                                                       Nomor Whatsapp Wajib diisi boleh '0' jika tidak ada
                                                   </div>
                                               </div>

                                               <div class="form-group">
                                                    <label for="transaction_customer_address">Alamat</label>
                                                    <textarea type="text" class="form-control" id="transaction_customer_address" name="transaction_customer_address" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Alamat wajib diisi boleh '-' jika tidak ada
                                                    </div>
                                                </div>




                                               <!-- <label id="img">Foto</label>
                                        <input type="file" id="img" class="form-control" accept="image/*"> -->


                                           </div>
                                       </div>

                                   </div>

                               </div>
                               <div class="modal-footer justify-content-center">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Nanti</button>
                                   <button type="submit" class="btn btn-lg btn-success">Buat</button>
                               </div>
                           </form>

                       </div>

                   </div>

               </div>