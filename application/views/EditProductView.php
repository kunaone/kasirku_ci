<div id="page-wrapper">

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-lg-12">
                <h1>Edit Obat</h1>
                <ol class="breadcrumb">
                    <li><a href="/product"><i class="icon-dashboard"></i> Produk</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">

                            <?php if(isset($notif)){ ?>
                            <div class="alert alert-danger">
                                <?= $notif ?>
                            </div>
                            <?php } ?>
                            </div>
                            
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kode Obat</label>
                                    <input type="text" class="form-control" placeholder="Kode Obat" name="kode_obat">
                                </div>
                                <div class="form-group">
                                    <label>Kode Supplier</label>
                                    <select class="form-control" name="kode_supplier" id="">
                                        <option>Pilih Kode Supplier</option>
                                        <?php foreach($kode_supplier as $data):?>
                                        <option><?= $data->KODE_SUPPLIER ?>?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" placeholder="Nama Obat" name="nama_obat" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Produsen</label>
                                    <input type="text" class="form-control" placeholder="Kode Obat" name="produsen">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" placeholder="Kode Obat" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Stok</label>
                                    <input type="text" class="form-control" placeholder="Kode Obat" name="jml_stok">
                                </div>
                                <div class="form-group">
                                    <label>File Input</label>
                                    <input type="file" name="foto">
                                </div>
                                
                                <button type="submit" class="btn btn-success" name="submit">Simpan Perubahan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>