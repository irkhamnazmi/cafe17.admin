<div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
    <div class="row">
        <div class="col-4">
            <h1 class="mt-4" style="margin-bottom: 5%;">Blog</h1>
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

            <button class="btn btn-lg btn-success addBlog" type="button" style="margin-left: 2%; border-radius: 10px;" data-toggle="modal" data-target="#formModal"><i class="bi bi-plus"></i> Buat
                Baru</button>
        </div>
        <div style="overflow-x:auto;">
            <table class="table table-bordered" id="dataTable">
                <thead style=" border: 1px solid #ddd;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($data['row'])) {
                        $no = 1;
                        foreach ($data['row'] as $row) :
                            $datetime = explode(' ', $row['blog_date']);
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
                                <td><?= $row['blog_title']; ?></td>
                                <td><?= $row['cashier_name']; ?></td>
                                <td><?= $row['blog_description']; ?></td>
                                <td><a href="" onclick="window.open('<?= BASEURL . '/uploads/blog/images/' . $row['blog_image']; ?>','name','width= 600,height=400'); return false;">Lihat Foto</a></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Kelola
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item editBlog" href="<?= BASEURL; ?>/blog/edit/<?= $row['blog_id']; ?>" data-toggle="modal" data-target="#formModal" data-id="<?= $row['blog_id']; ?>">Ubah</a>
                                            <a class="dropdown-item" href="<?= BASEURL; ?>/blog/delete/<?= $row['blog_id']; ?>" onclick="return confirm('yakin data <?= $row['blog_name']; ?>?')">Hapus</a>
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


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Buat Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" class="needs-validation" novalidate action="<?= BASEURL; ?>/blog/add" method="post" enctype="multipart/form-data">
                    <span id="ckeditor" style="display: none;">available</span>
                    <input type="hidden" name="blog_id" id="id" />
                    <div class="form-group">
                        <label for="blog_title">Judul</label>
                        <input type="text" class="form-control" id="blog_title" name="blog_title" required>
                        <div class="invalid-feedback">
                            Tentukan judul blog yang relevan
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cashier_name">Penulis</label>
                        <input type="text" class="form-control" id="cashier_name" value="<?= $_SESSION['cashier']['cashier_name']; ?>" readonly>
                        <input type="hidden" class="form-control" id="cashier_id" value="<?= $_SESSION['cashier']['cashier_id']; ?>" name="cashier_id" readonly>
                    </div>

                    <div class="form-group">
                        <label for="blog_image">Foto</label>
                        <br />
                        <a target="_blank" id="link_image">Lihat Foto</a>
                        <input type="file" class="form-control" id="blog_image" name="blog_image" required>
                        <div class="invalid-feedback">
                            Beri Foto untuk menggambarkan deskripsi blog anda
                        </div>
                        <input type="hidden" class="form-control" id="text_image" name="txt_image" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editor">Deskripsi</label>
                        <textarea type="text" class="form-control textarea" id="editor" name="blog_description" required></textarea>
                        <div class="invalid-feedback" id="editor-error">
                            Jelaskan artikel seperti apa yang Anda akan sajikan ke Pembaca
                        </div>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>


        </div>
    </div>
</div>