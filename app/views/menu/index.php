  <!-- Page content-->
  <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
      <div class="row">
          <div class="col-4">
              <h1 class="mt-4" style="margin-bottom: 5%;">Menu</h1>
          </div>

      </div>


      <div class="row">
          <div class="col-4">
              <?php Flasher::flash() ?>
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

              <button class="btn btn-lg btn-success addMenu" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                  Baru</button>
          </div>
          <div style="overflow-x:auto;">
              <table class="table table-bordered" id="dataTable">
                  <thead style=" border: 1px solid #ddd;">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Kode Menu</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Jenis</th>
                          <th scope="col">Deskripsi</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        if (!empty($data['row'])) {
                            $no = 1;
                            foreach ($data['row'] as $row) :
                                $datetime = explode(' ', $row['menu_date']);
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
                                  <td><?= $row['menu_code']; ?></td>
                                  <td><?= $row['menu_name']; ?></td>
                                  <td><?= $row['menu_category']; ?></td>
                                  <td><?= $row['menu_description']; ?></td>
                                  <td><?= 'Rp ' . $row['menu_price'] . ',-'; ?></td>
                                  <td><a href="" onclick="window.open('<?= BASEURL . '/uploads/images/' . $row['menu_image']; ?>','name','width= 600,height=400'); return false;">Lihat Foto</a></td>
                                  <td>
                                      <div class="dropdown">
                                          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Kelola
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                              <a class="dropdown-item editMenu" href="<?= BASEURL; ?>/menu/edit/<?= $row['menu_id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $row['menu_id']; ?>">Ubah</a>
                                              <a class="dropdown-item" href="<?= BASEURL; ?>/menu/delete/<?= $row['menu_id']; ?>" onclick="return confirm('yakin data <?= $row['menu_name']; ?>?')">Hapus</a>

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
                              <th class="text-center" colspan="9">--Tidak Ada Data--</th>
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
                  <h5 class="modal-title" id="formModalLabel">Tambah Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="form" class="needs-validation" novalidate action="<?= BASEURL; ?>/menu/add" method="post" enctype="multipart/form-data">
                      <span id="ckeditor" style="display: none;">available</span>
                      <input type="hidden" name="menu_id" id="id" />
                      <div class="form-group">
                          <label for="menu_name">Nama Menu</label>
                          <input type="text" class="form-control" id="menu_name" name="menu_name" required>
                          <div class="invalid-feedback">
                              Tentukan nama menu baru Anda
                          </div>
                      </div>


                      <div class="form-group">
                          <label for="menu_category">Kategori</label>
                          <select class="form-control" id="menu_category" name="menu_category">
                              <option value="Makanan">Makanan</option>
                              <option value="Minuman">Minuman</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="editor">Deskripsi</label>
                          <textarea class="form-control" type="text" id="editor" name="menu_description" required></textarea>
                          <div class="invalid-feedback " id="editor-error">
                              Jelaskan menu seperti apa yang Anda akan sajikan ke Pelanggan
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="menu_price">Harga</label>
                          <input type="number" class="form-control" id="menu_price" name="menu_price" required>
                          <div class="invalid-feedback">
                              Beri harga terbaik untuk pelanggan
                          </div>
                      </div>


                      <div class="form-group-a">
                          <label for="menu_image">Foto</label>
                          <br />
                          <a target="_blank" id="link_image">Lihat Foto</a>
                          <input type="file" class="form-control" id="menu_image" name="menu_image" required>
                          <div class="invalid-feedback">
                              Jangan lupa pasang fotonya
                          </div>

                          <input type="hidden" class="form-control" id="text_image" name="txt_image" readonly>
                      </div>




              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" id="submitbtn" class="btn btn-primary">Tambah</button>
                  </form>
              </div>


          </div>
      </div>
  </div>