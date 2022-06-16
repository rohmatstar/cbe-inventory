    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card card-plain">
            <div class="card-body border-radius-lg bg-white mb-0">
              <form role="form">
                <div class="row">
                  <div class="col-md-4">
                    <div class="mb-0 input-group input-group-outline">
                      <label class="form-label">Nomor Faktur</label>
                      <input type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-0 input-group input-group-outline">
                      <label class="form-label">Nama Driver</label>
                      <input readonly="true" disabled="disabled" type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="mb-0 input-group input-group-outline">
                      <label class="form-label">Plat Nomor</label>
                      <input readonly="true" disabled="disabled" type="text" class="form-control input-lg">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-12 mt-4">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"><?php echo str_replace('-',' ',$_GET['page']); echo ' '.date('d-M-Y'); ?></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Varian</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Terjual</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Tersisa</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Pendapatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="align-middle text-center">
                        Minyak Goreng
                      </td>
                      <td class="align-middle text-center">
                        250 mL
                      </td>
                      <td class="align-middle text-center">
                        <div class="input-group input-group-outline">
                          <input type="text" class="form-control input-lg" style="width: 15px;">
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        0
                      </td>
                      <td class="align-middle text-center">
                        Rp. 240.000
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <h6>Jumlah Barang Retur: 12</h6>
              <h6>Total Pendapatan: Rp. 457.000,-</h6>
              <div class="alert text-danger bg-white ps-0 font-weight-bolder py-0 d-inline-block">
                Pastikan UANG yang disetorkan Driver telah sesuai!
              </div>
              <div class="text-start">
                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg mt-2 mb-0">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>