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

                   <div class="card" style=" width:18rem; color: black; border-radius: 10px;">
                       <div class="card-body">
                           <form>
                               <span class="iconify" data-inline="false" data-icon="zmdi:search" style="font-size: 24px;"></span>
                               <input type="text" placeholder="Cari" style="outline: none;  border-color: transparent;" />
                           </form>

                       </div>
                   </div>

                   <button class="btn btn-lg btn-success addCashier" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                       Kasir</button>
               </div>
               <div style="overflow-x:auto;">
                   <table class="table table-bordered">
                       <thead style=" border: 1px solid #ddd;">
                           <tr>
                               <th scope="col">#</th>
                               <th scope="col">Tanggal</th>
                               <th scope="col">Nama</th>
                               <th scope="col">Jenis</th>
                               <th scope="col">Email</th>
                               <th scope="col">No Hp</th>
                               <!-- <th scope="col">Sandi</th> -->
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
                                       <td><?= $row['cashier_date']; ?></td>
                                       <td><?= $row['cashier_name']; ?></td>
                                       <td><?= $row['cashier_type']; ?></td>
                                       <td><?= $row['cashier_email']; ?></td>
                                       <td><?= $row['cashier_phone_number']; ?></td>
                                       <!-- <td ><input class="border-0" type="password" value="<?= $row['cashier_password']; ?>"/></td> -->
                                       <td>  <div class="dropdown">
                                               <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Select
                                               </a>

                                               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                   <a class="dropdown-item" href="<?= BASEURL; ?>/cashier/delete/<?= $row['cashier_id']; ?>" onclick="return confirm('yakin data <?= $row['cashier_name']; ?>?')">hapus</a>
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
                                   <th class="text-center" colspan="6">--Tidak Ada Data-</th>


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
                       <form action="<?= BASEURL; ?>/cashier/add" method="post">
                           <input type="hidden" name="cashier_id" id="cashier_id" />
                           <div class="form-group">
                               <label for="cashier_name">Nama Kasir</label>
                               <input type="text" class="form-control" id="cashier_name" name="cashier_name">
                           </div>

                           <div class="form-group">
                               <label for="cashier_address">Alamat</label>
                               <textarea type="text" class="form-control" id="cashier_address" name="cashier_address"></textarea>
                           </div>

                           <div class="form-group">
                               <label for="cashier_type">Jenis</label>
                               <select class="form-control" id="cashier_type" name="cashier_type">
                                   <option value="Admin">Admin</option>
                                   <option value="Cashier">Kasir</option>
                               </select>
                           </div>

                           <div class="form-group">
                               <label for="cashier_email">Email</label>
                               <input type="text" class="form-control" id="cashier_email" name="cashier_email">
                           </div>

                           <div class="form-group">
                               <label for="cashier_phone_number">Nomor HP</label>
                               <input type="text" class="form-control" id="cashier_phone_number" name="cashier_phone_number">
                           </div>

                           <div class="form-group">
                               <label for="password">Sandi</label>
                               <input type="password" class="form-control" id="password" name="cashier_password">
                               <input type="checkbox" onclick="myFunction()"> Tampilkan Sandi 
                           </div>


                           <!-- <div class="form-group">
                          <label for="menu_image">Foto</label>
                          <input type="file" class="form-control" id="menu_image" name="menu_image">
                      </div> -->



                           <!-- <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknologi Pangan">Teknologi Pangan</option>
                            <option value="Teknik Planologi">Teknik Planologi</option>
                            <option value="Teknik Lingkungan">Teknik Lingkungan</option>

                        </select>
                    </div> -->

                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                       <button type="submit" class="btn btn-primary">Tambah</button>
                       </form>
                   </div>


               </div>
           </div>
       </div>