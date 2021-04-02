<div class="row">
    <div class=col-md-12 >
        <?php foreach($barang as $row):?>
        <div class="col-xs-2 text-center ">
                <div class="kotak-barcode mb-4">
                   <div  class="bg-white p-2" style="border:1px solid #000; padding:10px"> 
                        <?= "<img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=".$row->kode_barcode."&code=EAN13&multiplebarcodes=true&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0' />" ?><br>
                   </div>
                        <h5 class="text-center mb-1 mt-2" style="color:#000;"><strong><?= $row->nama_barang; ?></strong></h5>
                        <h5 class="text-center font-weight-normal mb-1" style="color:#000;"><?= 'Rp. '.number_format($row->harga_jual,0,"","."); ?></h5>
                </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<script>
    window.print();
</script>