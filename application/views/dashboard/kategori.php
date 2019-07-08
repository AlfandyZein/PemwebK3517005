
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <form method="post" action="<?php echo site_url('book/findbooks'); // arahkan form submit ke kontroller 'book/findbooks ?>">
    <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" name="key" style="border: 1px solid #cccccc; margin-top: 20px;">
    </form>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Kategori</h1>
      </div>

       <?php
      // arahkan form submit ke kontroller 'book/insert' 
      echo form_open_multipart('NewKategori/insert'); 
      ?>

                <div class="form-group row">
              <label for="judul" class="col-sm-2 col-form-label">Kategori Baru</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="judul" placeholder="Masukkan judul kategori">
              </div>
          </div>
                    <div class="form-group row">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mb-2">Submit Data Kategori</button>      
              </div>
          </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Kategori Tersedia</th>
              <th>Action</th>
              <tbody>
            <?php 
            // menampilkan data buku
            foreach ($kategori as $kategori_item): 

            ?>
            <tr>
              <td><?php echo $kategori_item['kategori']?></td>
              <td><?php echo anchor ('dashboard/editkategori/'.$kategori_item['idkategori'], 'Edit', 'Edit Kategori') ?> | <?php echo anchor('NewKategori/delete/'.$kategori_item['idkategori'], 'Del', 'Hapus Kategori'); ?>
                  
                </td>
            </tr>



            <?php endforeach; ?>
          </tbody>
            </tr>
          </thead>
        </table>
      </div>
    </main>
  