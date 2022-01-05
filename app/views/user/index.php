          <!-- Page content-->
          <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
                <div class="row">
                    <div class="col-4">
                        <h1 class="mt-4" style="margin-bottom: 5%;">Pelanggan</h1>
                    </div>

                </div>

                <div class="row" style="padding-right:15%">
                    <div class="col d-flex justify-content-end">
<!-- 
                        <div class="card" style=" width:18rem; color: black; border-radius: 10px;">
                            <div class="card-body">
                                <form>
                                    <span class="iconify" data-inline="false" data-icon="zmdi:search"
                                        style="font-size: 24px;"></span>
                                    <input type="text" placeholder="Cari"
                                        style="outline: none;  border-color: transparent;" />
                                </form>

                            </div>
                        </div> -->

                        <!-- <button class="btn btn-lg btn-success" type="button"
                            style="margin-left: 2%; border-radius: 10px;" data-toggle="modal"
                            data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                            Baru</button> -->
                    </div>
                    <div style="overflow-x:auto;">
                        <table class="table table-bordered" id="dataTable">
                            <thead style=" border: 1px solid #ddd;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Sandi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    if (!empty($data['row'])) {
                        $no = 1;
                        foreach ($data['row'] as $row) :
                            $datetime = explode(' ', $row['user_date']);
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
                                   <td><?= $row['user_name']; ?></td>
                                   <td><?= $row['user_email']; ?></td>
                                   <td><?= $row['user_phone_number']; ?></td>
                                   <td><?= $row['user_address']; ?></td>
                                   <td><?= '*****'; ?></td>
                                   <td>
                                           <div class="dropdown">
                                               <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Select
                                               </a>

                                               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                   <a class="dropdown-item" href="<?= BASEURL; ?>/user/delete/<?= $row['user_id']; ?>" onclick="return confirm('yakin data <?= $row['user_name']; ?> akan dihapus?')">hapus</a>
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
                              <th class="text-center" colspan="8">--Tidak Ada Data--</th>


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

                    <form>
                        <div class="row">

                            <div class="col" style="border: solid; border-radius: 10px;">

                                <div class="row">

                                    <div class="col" style="line-height: 2.8;">
                                        <!-- <label>Tanggal</label>
                                        <input type="text" class="form-control" data-date-format="dd/mm/yyyy"
                                            id="datepicker"> -->

                                        <label>Nama Menu</label>
                                        <input type="text" class="form-control">

                                        <label>Jenis</label>
                                        <input type="text" class="form-control">

                                        <label>Email</label>
                                        <input type="text" class="form-control">

                                        <label>No HP</label>
                                        <input type="text" class="form-control">
                                        
                                        <label>Alamat</label>
                                        <textarea type="text" class="form-control"> </textarea>   
                                        
                                        <label>Sandi</label>
                                        <input type="password" class="form-control">

                                        <!-- <label id="img">Foto</label>
                                        <input type="file" id="img" class="form-control" accept="image/*"> -->

                                        
                                    </div>
                                </div>

                            </div>





                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" onclick="signup()">Reset</button>
                            <button type="button" class="btn btn-lg btn-success">Ubah</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>