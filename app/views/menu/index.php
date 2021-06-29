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
                                    <span class="iconify" data-inline="false" data-icon="zmdi:search"
                                        style="font-size: 24px;"></span>
                                    <input type="text" placeholder="Cari"
                                        style="outline: none;  border-color: transparent;" />
                                </form>

                            </div>
                        </div>

                        <button class="btn btn-lg btn-success" type="button"
                            style="margin-left: 2%; border-radius: 10px;" data-toggle="modal"
                            data-target="#formModal"><i class="bi bi-plus"></i> Tambah
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
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>


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

                                        <label>Deskripsi</label>
                                        <div id="editor">

                                        </div>

                                        <label>Harga</label>
                                        <input type="text" class="form-control">

                                        <label id="img">Foto</label>
                                        <input type="file" id="img" class="form-control" accept="image/*">

                                        
                                    </div>
                                </div>

                            </div>





                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" onclick="signup()">Reset</button>
                            <button type="button" class="btn btn-lg btn-success">Tambah</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>