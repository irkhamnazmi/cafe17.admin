            <!-- Page content-->
            <div class="container-fluid" style="margin-left: 5%; margin-right: 5%;">
                <div class="row">
                    <div class="col-4">
                        <h1 class="mt-4" style="margin-bottom: 5%;">Laporan</h1>
                    </div>

                </div>

                <div class="row" style="padding-right:15%">
                    <div class="col">
                        
                        <div class="card" style="color: black; border-radius: 10px;">
                            <div class="card-body">
                                <form novalidate action="<?= BASEURL; ?>/report/by_date" method="POST">
                                    <div class="form-group">
                                        <label id="data">Data</label>
                                        <select id="data" class="form-control custom-select">
                                            <option value="">Pilih Data</option>
                                            <option value="Pelanggan">Pelanggan</option>
                                            <option value="Transaksi">Transaksi</option>
                                          </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Dari</label>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="date" onclick="checkDate()" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                      Tanggal
                                                    </label>
                                                  </div>
                                                
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="month"  onclick="checkMonth()">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                      Bulan
                                                    </label>
                                                  </div>   
                                            </div>

                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="year"  onclick="checkYear()" >
                                                    <label class="form-check-label" for="exampleRadios3">
                                                      Tahun
                                                    </label>
                                                  </div>   
                                            </div>
                                        </div>

                                    
                                      
                                      
                                    </div>

                                    <div class="form-group">
                                        <label id="dateLabel">Tanggal</label>
                                        <div class="row" id="datepicker">
                                            <div class="col-2">
                                            <input type="date" class="form-control">
                                            </div>
                                       
                                        </div>
                                        <div class="row">
                                            <div class="col-2"  style="display:none;" id="selectMonth" >
                                            <select class="form-control custom-select" >
                                            <option value="">Pilih Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>

                                            </div>
                                            <div class="col-2"  id="selectYear" style="display:none;">

                                        <select  class="form-control custom-select">
                                            <option value="">Pilih Tahun</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                      
                                            </div>
                                        </div>
                                      
                                       
                                    </div>
                                   
                                
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                    </div>
                                   
                                </form>

                            </div>
                        </div> 
                        <!-- <div class="card" style=" width:18rem; color: black; border-radius: 10px;">
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
                    <!-- <div style="overflow-x:auto;">
                        <table class="table table-bordered">
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
                                <tr>
                                    <th scope="row"></th>
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
                                    
                                </tr>


                            </tbody>
                        </table>
                    </div> -->

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