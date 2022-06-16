    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card card-plain">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0 font-weight-bolder text-white text-capitalize">
                <p class="mb-0">Nomor Outbound:</p>
                <?php echo 'OUT'.date('dmYhis'); ?>
              </h4>
            </div>
            <div class="card-body bg-white">
              <form role="form">
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">Nama Driver</label> -->
                      <select id="namaDriver" class="form-control text-capitalize">
                        <?php
                        $query = mysqli_query($konek, "SELECT namaDriver FROM `tabeldriver` ORDER BY `namaDriver`") or die(mysqli_error($konek));
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row[0]; ?>" class="text-capitalize"><?php echo $row[0]; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Plat Nomor</label>
                      <input type="text" class="form-control input-lg">
                    </div>
                  </div>
                </div>

                <div class="row border-top pt-3">
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama Barang</label>
                      <input type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Varian</label>
                      <input type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Jumlah</label>
                      <input type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group input-group-outline mb-3">
                      <button type="button" class="btn btn-md bg-gradient-primary btn-lg mt-2 mb-0">Tambah</button>
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
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"></th>
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
                        <button type="button" class="btn btn-sm bg-gradient-danger btn-lg mt-2 mb-0">Hapus</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
            <div class="card-footer">
              <div class="text-start">
                <button type="button" class="btn btn-lg bg-gradient-primary btn-lg mt-2 mb-0">Simpan dan Cetak Faktur</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>