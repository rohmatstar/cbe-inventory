    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card card-plain">
            <div class="card-header bg-primary text-white">
              <h4 class="mb-0 font-weight-bolder text-white text-capitalize">
                <p class="mb-0">Nomor Inbound:</p>
                <?php
                  $nomorInbound = 'IN'.date('dmYhis');
                  echo $nomorInbound;
                ?>
              </h4>
            </div>
            <div class="card-body bg-white">
              <form role="form">
                <div class="row">
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <!-- <label class="form-label">Nama Barang</label> -->
                      <input type="hidden" id="nomorInbound" value="<?php echo $nomorInbound; ?>">
                      <select id="namaBarang" class="form-control text-capitalize">
                        <?php
                        $query = mysqli_query($konek, "SELECT namaBarang FROM `tabelbarang` ORDER BY `namaBarang`") or die(mysqli_error($konek));
                        while($row = mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $row[0]; ?>" class="text-capitalize"><?php echo $row[0]; ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Varian</label>
                      <input id="varianBarang" type="text" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Jumlah</label>
                      <input id="jumlahBarang" type="number" min="1" step="1" class="form-control input-lg">
                    </div>
                  </div>
                  <div class="col">
                      <button type="button" onclick="saveDataInbound()" class="btn btn-md bg-gradient-primary btn-lg mt-2 mb-0">Tambah</button>
                      <button type="reset" class="ms-2 btn btn-lg bg-gradient-warning btn-lg mt-2 mb-0">Reset</button>
                  </div>
                </div>

                <div class="row">
                  <div class="col-auto">
                    <div id="info"></div>
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
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Jumlah</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="table">
                    <tr>
                      <td colspan="3" class="align-middle text-center">
                        Tidak ada Data tersedia
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-start">
                <button onclick="accDataInbound()" type="button" class="btn btn-lg bg-gradient-primary btn-lg mt-2 mb-0">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>

    <script type="text/javascript">
      function saveDataInbound(){
        $.post('api.php?saveDataInbound', {
            nomorInbound: $('#nomorInbound').val(),
            namaBarang: $('#namaBarang').val(),
            varianBarang: $('#varianBarang').val(),
            jumlahBarang: $('#jumlahBarang').val()
          }).done(function(response){
            $("#info").html(response);
            $.post("api.php?getDataInbound="+$('#nomorInbound').val(), function(data) {
              $("#table").html(data);
            });
        });
      }
      function deleteDataInbound(id){
        $.post('api.php?deleteDataInbound', {
            id: id
          }).done(function(response){
            $.post("api.php?getDataInbound="+$('#nomorInbound').val(), function(data) {
              $("#table").html(data);
            });
        });
      }
      function accDataInbound(){
        $.post('api.php?accDataInbound', {
            nomorInbound: $('#nomorInbound').val()
          }).done(function(response){
            document.location.href = '?page=data-barang';
        });
      }
    </script>