            <!-- Page content-->
            <div class="container-fluid" style="margin-left: 5%;">
                <h1 class="mt-4" style="margin-bottom: 5%;">Beranda</h1>
                <div class="row">

                <h2 class="mt-4" style="margin-bottom: 5%;">Pendapatan Hari ini</h2>

                </div>
               
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <div class="card" style="width: 20rem; background-color: #FF0000;">
                            <div class="card-body">
                              <h2 class="card-title">Pelanggan</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title"><?= $data['new_user']['qty'];?></h2>
                            </div>
                          </div>
                    </div>
                    <div class="col" style="text-align: center;">
                        <div class="card" style="width: 20rem; background-color: #0500FF;">
                            <div class="card-body">
                              <h2 class="card-title">Pemasukan</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title"><?= $v = (empty($data['money_income']['total'])) ? 0 : $data['money_income']['total'];?></h2>
                            </div>
                          </div>
                    </div>

                    <div class="col" style="text-align: center;">
                        <div class="card" style="width: 20rem; background-color: #00C236;">
                            <div class="card-body">
                              <h2 class="card-title">Transaksi</h2>
                              <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                            
                            </div>
                            <div class="card-footer text-end" style="border: none;">
                                <h2 class="card-title"><?= $data['transaction_total']['qty'];?></h2>
                            </div>
                          </div>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
   