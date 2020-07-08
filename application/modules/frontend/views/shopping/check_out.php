<h2>Konfirmasi Check Out</h2>
<div class="kotak2">
<?php
$grand_total = 0;
if ($cart = $this->cart->contents())
	{
		foreach ($cart as $item)
			{
				$grand_total = $grand_total + $item['subtotal'];
			}
		echo "<h4>Total Belanja: Rp.".number_format($grand_total,0,",",".")."</h4>";	
?>
<div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Isilah Data Diri Anda dengan Benar
        </div>
<form class="form-horizontal" action="<?php echo base_url()?>frontend/shopping/proses_order" method="post" name="frmCO" id="frmCO">
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="firstName">Nama* :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="Mail">Email* :</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="lastName">Alamat* :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="phoneNumber">Telp* :</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="send">Pengiriman* :</label>
            <div class="col-xs-9">
                <select type="option" class="form-control" name="pengiriman" id="pengiriman">
                <option>--Pilih--</option>
                <option value="GRAB">GRAB</option>
                <option value="JNE">JNE</option>
                <option value="JNT">JNT</option>
                </select>
            </div>
        </div>
        <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="message">Pesan :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="pesan" id="pesan" placeholder="Pesan">
            </div>
        </div>
         <div class="form-group  has-success has-feedback">
            <label class="control-label col-xs-3" for="pay">Pembayaran* :</label>
            <div class="col-xs-9">
                <select type="option" class="form-control" name="pembayaran" id="pembayaran">
                <option>--Pilih--</option>
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="MANDIRI">MANDIRI</option>
            </select>
            </div>
        </div>
        
        <div class="form-group  has-success has-feedback">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Verifikasi</button>
            </div>
        </div>
    </form>
    <?php
	}
	else
		{
			echo "<h5>Shopping Cart masih kosong</h5>";	
		}
	?>
</div>