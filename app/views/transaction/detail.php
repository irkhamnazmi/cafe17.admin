            <!-- Page content-->
            <div class="container-fluid" style="margin-left: 5%; margin-right: 5%; overflow-y:scroll; margin-bottom: 2%;">
                <div class="row" style="padding-right:15%;">
                    <div class="col">
                        <h1 class="mt-4" style="margin-bottom: 5%;">Transaksi</h1>
                        <?php
                        switch ($data['status']) {
                            case 'Menunggu Konfirmasi';
                            ?>
                                <div class="alert alert-warning" style="max-width: 100%; text-align: center;">
                                    <h4><?= $data['status']; ?></h4>
                                </div>
                            <?php
                                break;
                            case 'Menunggu Pembayaran';
                            ?>
                                <div class="alert alert-info" style="max-width: 100%; text-align: center;">
                                    <h4><?= $data['status']; ?></h4>
                                </div>
                            <?php
                                break;
                            case 'Belum Bayar';
                            ?>
                                <div class="alert alert-danger" style="max-width: 100%; text-align: center;">
                                    <h4><?= $data['status']; ?></h4>
                                </div>
                            <?php
                                break;
                            case 'Lunas';
                            ?>
                                <div class="alert alert-success" style="max-width: 100%; text-align: center;">
                                    <h4><?= $data['status']; ?></h4>
                                </div>
                        <?php
                                break;
                        }
                        ?>

                    </div>


                </div>

                <div class="row" style="padding-right:15%;">

                    <div class="col d-flex justify-content-end">
                        <div class="card" style="color: black; border: none;">
                            <div class="card-body">

                                <button class="btn btn-success"><span class="iconify" data-inline="false" data-icon="bi:whatsapp" style="color: #ffffff; font-size: 24px;" onclick="whatsapp('<?= $data['rowId']['transaction_id']; ?>')"></span>
                                    Kontak</button>
                                <button class="btn btn-danger delete"  data-id="<?= $data['rowId']['transaction_id']; ?>" data-toggle="modal" data-target="#formModal"><span class="iconify" data-inline="false" data-icon="ic:outline-cancel" style="color: #ffffff; font-size: 24px;"></span>
                                    Batal</button>
                                <button class="btn btn-primary confirm" data-toggle="modal" data-target="#formModal" data-id="<?= $data['rowId']['transaction_id']; ?>"><span class="iconify" data-inline="false" data-icon="akar-icons:circle-check" style="font-size: 24px;"></span> Proses</button>

                            </div>
                        </div>

                    </div>

                </div>


                <div class="row" style="padding-right:15%">

                    <div class="col">
                        <h1></h1>
                        <div class="card" style="color: black; border:none;">
                            <div class="card-body">
                                <form>
                        
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $data['rowId']['transaction_customer_name']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>No Whatsapp</label>
                                        <input type="text" class="form-control" style="background-color: transparent;" value="<?= $data['rowId']['transaction_customer_phone_number']; ?>" readonly>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" style="background-color: transparent;" value="<?= $data['rowId']['user_email']; ?>" readonly>
                                    </div> -->

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea type="text" readonly style="background-color: transparent;" class="form-control"><?= $data['rowId']['transaction_customer_address']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="transaction_category">Kategori Transaksi</label>
                                        <input class="form-control" type="text" readonly style="background-color: transparent;" value="<?= $data['rowId']['transaction_category'];?>">
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>

                    <div class="col">

                        <div class="card" style="color: black; border:none;">
                            <div class="card-body">
                                <form>

                                    <div class="form-group">
                                        <label>Invoice#</label>
                                        <input type="text" readonly style="background-color: transparent;" class="form-control" value="<?= $data['rowId']['transaction_invoice_code']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <?php
                                        $datetime = explode(' ', $data['rowId']['transaction_date']);
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
                                        <input type="text" readonly style="background-color: transparent;" class="form-control" value="<?= $date['2'] . ' ' . $bulan . ' ' . $date['0'] ?>">
                                    </div>
                                    

                                    <div class="form-group">
                                        <label>Biaya</label>
                                        <input type="email" class="form-control" style="background-color: transparent;" value="Rp <?= $data['rowId']['transaction_pay_total']; ?>,-" readonly>
                                    </div>
                                    

                                    <?php 
                        
                        if($data['rowId']['transaction_category'] == 'Online'){
                            ?>
                            
                            <?php
                        } else {
                            ?>
                            
                            
                            <?php 
                        }
                        
                        ?>    


                                </form>

                            </div>
                        </div>

                    </div>







                </div>
                <div class="row" style="padding-right: 15%;">

                    <div class="col d-flex justify-content-justify-content-start">
                        <h2>Daftar Menu Pesanan</h2>
                    </div>
                    <div class="col  d-flex justify-content-end">
                        <button class="btn btn-lg btn-success addOrder" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                            Baru</button>
                    </div>

                    <div style="overflow-x:auto;">
                        <table class="table table-bordered" id="dataTable">
                            <thead style=" border: 1px solid #ddd;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kode Menu</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data['row'])) {
                                    $no = 1;
                                    foreach ($data['row'] as $row) :

                                ?>
                                        <tr>
                                            <th scope="row"><?= $no; ?></th>
                                            <td><?= $row['menu_code']; ?></td>
                                            <td><?= $row['menu_name']; ?></td>
                                            <td><?= $row['transaction_detail_note']; ?></td>
                                            <td><?= 'Rp ' . $row['menu_price'] . ',-'; ?></td>
                                            <td><?= $row['transaction_detail_qty'] . ' porsi'; ?></td>
                                            <td><?= 'Rp ' . $row['transaction_detail_price_total'] . ',-'; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                        <a class="dropdown-item" href="<?= BASEURL; ?>/transaction/delete_detail/<?= $row['transaction_detail_id']; ?>" onclick="return confirm('yakin data <?= $row['menu_name']; ?> akan dihapus?')">Hapus</a>

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

                <div class="modal-dialog modal-xl" style="width: 50%; " role="document">

                    <div class="modal-content">

                        <div class="modal-body" id="process" style="padding-right: 10%; padding-left: 10%;" style="display:none">

                            <form method="post" action="<?= BASEURL;?>/transaction/confirm/<?= $data['rowId']['transaction_id'];?>">
                                <div class="row">
                                    <h1 id="title">Apakah Pesanan ini bersedia untuk diproses ke Pembayaran? </h1>
                                    <h3 id="subtitle">Pastikan Pesanan pembeli dalam keadaan siap untuk diantar ke Pelanggan. </h3>

                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nanti</button>
                                    <button id="btn" type="submit" class="btn btn-lg btn-success">Konfirmasi</button>
                                </div>
                            </form>

                        </div>
                        <div class="modal-body" id="menu" style="padding-right: 10%; padding-left: 10%;" style="display:none">

                            <form id="form" class="needs-validation" novalidate method="post" action="<?= BASEURL; ?>/transaction/addorder/<?= $data['rowId']['transaction_id']; ?>">
                                <span id="page" style="display: none;">transaction</span>
                                <div class="row">
                                    <h1>Tambah Menu</h1>
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
                                                    <label for="menu_id">Menu</label>
                                                    <select class="form-control" id="menu_id" name="menu_id" required>
                                                        <option value="">Pilih Menu</option>
                                                        <?php foreach ($data['rowMenu'] as $rowMenu) : ?>
                                                            <option value="<?= $rowMenu['menu_id']; ?>"><?= $rowMenu['menu_name']; ?> == Rp <?= $rowMenu['menu_price']; ?>,-/Porsi</option>
                                                        <?php
                                                        endforeach;
                                                        ?>

                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Menu wajib dipilih
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_detail_qty">Jumlah</label>
                                                    <input type="number" class="form-control" required oninput="calculate(this.value)" name="transaction_detail_qty" id="transaction_detail_qty">
                                                    <div class="invalid-feedback">
                                                        Jumlah harga wajib diisi
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_detail_price_total">Total Harga</label>
                                                    <input type="text" class="form-control" required readonly style="background-color: transparent;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" name="transaction_detail_price_total" id="transaction_detail_price_total">
                                                    <div class="invalid-feedback">
                                                        Total Harga wajib terisi
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_detail_note">Catatan</label>
                                                    <textarea type="text" class="form-control" id="transaction_detail_note" name="transaction_detail_note" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Catatan Wajib disi boleh '-' jika kosong
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
                                    <button type="submit" class="btn btn-lg btn-success">Tambah</button>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>