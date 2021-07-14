  <!-- Page content-->
  <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
      <div class="row">
          <div class="col-4">
              <h1 class="mt-4" style="margin-bottom: 5%;">Menu</h1>
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

              <button class="btn btn-lg btn-success" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Tambah
                  Baru</button>
          </div>
          <div style="overflow-x:auto;">
              <table class="table table-bordered">
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
                        ?>
                              <tr>
                                  <th scope="row"><?= $no; ?></th>
                                  <td><?= $row['menu_date']; ?></td>
                                  <td><?= $row['menu_code']; ?></td>
                                  <td><?= $row['menu_name']; ?></td>
                                  <td><?= $row['menu_type']; ?></td>
                                  <td><?= $row['menu_description']; ?></td>
                                  <td><?= $row['menu_price']; ?></td>
                                  <td><?= $row['menu_image']; ?></td>
                                  <td></td>
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
                  <h5 class="modal-title" id="formModalLabel">Tambah Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= BASEURL; ?>/menu/add" method="post">
                      <input type="hidden" name="id" id="id" />
                      <div class="form-group">
                          <label for="menu_name">Nama Menu</label>
                          <input type="text" class="form-control" id="menu_name" name="menu_name">
                      </div>

                      <div class="form-group">
                          <label for="menu_type">Jenis</label>
                          <select class="form-control" id="menu_type" name="menu_type">
                              <option value="Makanan">Makanan</option>
                              <option value="Minuman">Minuman</option><!--  -->
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="editor">Deskripsi</label>
                          <textarea id="editor" name="menu_description"></textarea>
                      </div>

                      <div class="form-group">
                          <label for="menu_price">Harga</label>
                          <input type="text" class="form-control" id="menu_price" name="menu_price">
                      </div>


                      <div class="form-group">
                          <label for="menu_image">Foto</label>
                          <input type="file" class="form-control" id="menu_image" name="menu_image">
                      </div>



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