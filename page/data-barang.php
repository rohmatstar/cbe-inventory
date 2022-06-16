    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-8">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3"><?php echo str_replace('-',' ',$_GET['page']) ?></h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Nama Barang</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Varian</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Harga Beli</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Harga Jual</th>
                      <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Stok Gudang</th>
                    </tr>
                  </thead>
                  <tbody id="table">
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card card-plain">
            <div class="card-header bg-primary text-white">
              <h4 class="font-weight-bolder text-white text-capitalize">Tambah <?php echo str_replace('-',' ',$_GET['page']) ?></h4>
              <p class="mb-0">Formulir untuk tambah barang, bukan untuk penambahan stok.</p>
            </div>
            <div class="card-body bg-white">
              <form role="form">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Nama Barang</label>
                  <input required="required" id="namaBarang" type="text" class="form-control input-lg">
                </div>
                <div class="input-group input-group-outline mb-0">
                  <label class="form-label">Varian</label>
                  <input required="required" id="varianBarang" type="text" class="form-control input-lg">
                </div>
                <div class="mb-3">Untuk memasukan lebih dari 1 varian, gunakan tanda koma sebagai pemisah</div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Harga Beli</label>
                  <input required="required" id="hargaBeli" type="text" class="form-control input-lg">
                </div>
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Harga Jual</label>
                  <input required="required" id="hargaJual" type="text" class="form-control input-lg">
                </div>

                <div id="info" class="mt-3">
                  
                </div>

                <div class="text-start">
                  <button type="button" onclick="saveDataBarang()" class="btn btn-lg bg-gradient-primary btn-lg mt-0 mb-0">Simpan</button>
                  <button type="reset" class="btn btn-lg bg-gradient-warning btn-lg mt-0 mb-0">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php include('footer.php'); ?>
    </div>

    <script type="text/javascript">
      $.post("api.php?getDataBarang", function(data) {
        $("#table").html(data);
      });

      function saveDataBarang(){
        //e.preventDefault();
        $.post('api.php?saveDataBarang', {
            namaBarang: $('#namaBarang').val(),
            varianBarang: $('#varianBarang').val(),
            hargaBeli: $('#hargaBeli').val(),
            hargaJual: $('#hargaJual').val()
          }).done(function(response){
            $("#info").html(response);
            $.post("api.php?getDataBarang", function(data) {
              $("#table").html(data);
            });
        });
      }
    </script>