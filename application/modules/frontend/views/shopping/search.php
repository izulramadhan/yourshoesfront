<h2>YourSHOES</h2>
                <?php echo form_open('frontend/shopping/search') ?>
                    <div class="col-sm-10">
                      <input type="text" name="keyword" class="form-control" placeholder="Cari Barang">
                    </div>
                    <button type="submit" name="search_submit" value="Cari" class="btn btn-sm btn-success" id="btn-search">Cari</button> </td>
                  <br><br>
                  <?php echo form_close() ?>

<?php
  foreach ($results as $row) {
?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="kotak2">
              <form method="post" action="<?php echo base_url();?>frontend/shopping/tambah" method="post" accept-charset="utf-8">
                <a href="<?php echo base_url();?>frontend/shopping/detail_produk/<?php echo $row->id_produk ?>"><img class="img-thumbnail" src="<?php echo base_url() . 'gambar/product/'.$row->gambar ?>"/></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="<?php echo base_url();?>frontend/shopping/detail_produk/<?php echo $row->id_produk ?>"><?php echo $row->nama_produk ?></a>
                  </h4>
                  <h5>Rp. <?php echo number_format($row->harga,0,",",".") ?></h5>
                  <p class="card-text"><?php echo $row->deskripsi ?></p>
                </div>
                <div class="card-footer">

                  <input type="hidden" name="id" value="<?php echo $row->id_produk ?>" />
                  <input type="hidden" name="nama" value="<?php echo $row->nama_produk ?>" />
                  <input type="hidden" name="harga" value="<?php echo $row->harga ?>" />
                  <input type="hidden" name="gambar" value="<?php echo $row->gambar ?>" />
                  <input type="hidden" name="qty" value="1" />
                  <button type="submit" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Add to Cart</button>
                </div>
                </form>
              </div>
            </div>
<?php
  }
?>