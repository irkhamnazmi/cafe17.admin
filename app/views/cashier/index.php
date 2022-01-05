       <!-- Page content-->
       <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">

           <div class="row">
               <div class="col-4">
                   <h1 class="mt-4" style="margin-bottom: 5%;">Kasir</h1>
               </div>

           </div>


           <div class="row">
               <div class="col-4">
                   <?php Flasher::flash() ?>
               </div>

           </div>


           <div class="row" style="padding-right:15%">
               <div class="col d-flex justify-content-end">

                   <button class="btn btn-lg btn-success addCashier" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                       Kasir</button>
               </div>
               <div style="overflow-x:auto;">
                   <table class="table table-bordered" id="dataTable">



                       <thead style=" border: 1px solid #ddd;">
                           <tr>
                               <th scope="col">#</th>
                               <th scope="col">Tanggal</th>
                               <th scope="col">Nama</th>
                               <th scope="col">Jenis</th>
                               <th scope="col">Email</th>
                               <th scope="col">No Hp</th>
                               <th scope="col">Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php
                    if (!empty($data['row'])) {
                        $no = 1;
                        foreach ($data['row'] as $row) :
                            $datetime = explode(' ', $row['cashier_date']);
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
                                       <td><?= $row['cashier_name']; ?></td>
                                       <td><?= $row['cashier_category']; ?></td>
                                       <td><?= $row['cashier_email']; ?></td>
                                       <td><?= $row['cashier_phone_number']; ?></td>
                                       <!-- <td ><input class="border-0" type="password" value="<?= $row['cashier_password']; ?>"/></td> -->
                                       <td>
                                           <div class="dropdown">
                                               <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Select
                                               </a>

                                               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                   <a class="dropdown-item" href="<?= BASEURL; ?>/cashier/delete/<?= $row['cashier_id']; ?>" onclick="return confirm('yakin data <?= $row['cashier_name']; ?> akan dihapus?')">hapus</a>
                                                   <a class="dropdown-item editCashier" href="<?= BASEURL; ?>/cashier/edit/<?= $row['cashier_id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $row['cashier_id']; ?>">ubah</a>

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
       <!-- Modal -->
       <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="formModalLabel">Tambah Kasier</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <div class="modal-body">
                       <form id="form" class="needs-validation" novalidate action="<?= BASEURL; ?>/cashier/add" method="post">
                           <span id="page" style="display: none;">cashier</span>
                           <input type="hidden" name="cashier_id" id="cashier_id" />
                           <div class="form-group">
                               <label for="cashier_name">Nama Kasir</label>
                               <input type="text" class="form-control" id="cashier_name" name="cashier_name" required>
                               <div class="invalid-feedback">
                                   Diisi dengan Nama Lengkap Member
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="cashier_address">Alamat</label>
                               <textarea type="text" class="form-control" id="cashier_address" name="cashier_address" required></textarea>
                               <div class="invalid-feedback">
                                   Jelaskan Alamat Rumah member
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="cashier_category">Kategori</label>
                               <select class="form-control" id="cashier_category" name="cashier_category">
                                   <option value="Admin">Admin</option>
                                   <option value="Kasir">Kasir</option>
                               </select>
                           </div>

                           <div class="form-group">
                               <label for="cashier_email">Email</label>
                               <input type="email" class="form-control" id="cashier_email" name="cashier_email" required>
                               <div class="invalid-feedback">
                                   Isi email valid yang member miliki
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="cashier_phone_number">Nomor HP</label>
                               <input type="text" class="form-control" id="cashier_phone_number" name="cashier_phone_number" required>
                               <div class="invalid-feedback">
                                   Isi Nomor Hp aktif Member yang bisa dihubungi dengan WhatsApp
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="password">Sandi</label>
                               <input type="password" class="form-control" id="password" name="cashier_password" required>
                               <input type="checkbox" onclick="myFunction()"> Tampilkan Sandi
                               <div class="invalid-feedback">
                                   Harap disi password untuk member
                               </div>
                           </div>


                    
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                       <button type="submit" class="btn btn-primary">Tambah</button>
                       </form>
                   </div>


               </div>
           </div>
       </div>