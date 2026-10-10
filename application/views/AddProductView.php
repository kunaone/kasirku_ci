<div id="page-wrapper"> <!-- close tag page-wrapper on Footer.php -->

    <div class="container-fluid">

        <div class="modal fade" id="formAddProdErr" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><strong id="validationTitle">Perhatian!</strong></h4>
                </div>
                <div class="modal-body">
                    <p id="validationMessage">Data Supplier Masih Kosong</p>
                </div>
                <div class="modal-footer">
                    <button id="notifBtn" type="button" class="btn btn-primary">Add Supplier</button>
                </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="row">
            <div class="col-lg-12">
                <h1>Tambah Obat</h1>
                <ol class="breadcrumb">
                    <li><a href="/product"><i class="icon-dashboard"></i> Produk</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Tambah Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <?php if(isset($notif) || isset($success) == TRUE){ ?>

                            <div class="alert alert-success">
                                <i class="fa fa-check-circle"></i>&nbsp;
                                <strong>Success!</strong>&nbsp;<?= $notif ?>
                            </div>

                        <?php } elseif(isset($notif) && $success == FALSE) { ?>

                            <div class="alert alert-warning">
                                <?= $notif ?>
                            </div>

                        <?php } ?>

                        <form action="<?= base_url('AddProductController/simpan') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group <?= form_error('kode_obat') ? 'has-error' : '' ?>">
                                <label class="control-label">Kode Obat</label>
                                <input type="text" class="form-control" name="kode_obat" value="<?= isset($_POST['kode_obat']) ? $_POST['kode_obat'] : ''; ?>">
                                <?=  form_error('kode_obat', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Supplier</label>
                                <select class="form-control" name="kode_supplier">
                                    <option>Pilih Kode Supplier</option>
                                    <?php foreach ($kode_supplier as $data): ?>
                                        <option
                                            value="<?= $data->KODE_SUPPLIER; ?>"
                                            <?= set_select('kode_supplier', $data->KODE_SUPPLIER); ?>
                                        >
                                            <?= $data->NAMA_SUPPLIER; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group <?= form_error('nama_obat') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Obat</label>
                                <input type="text" class="form-control" name="nama_obat" value="<?= isset($_POST['nama_obat']) ? $_POST['nama_obat'] : ''; ?>" autofocus>
                                <?=  form_error('nama_obat', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('produsen') ? 'has-error' : '' ?>">
                                <label class="control-label">Produsen</label>
                                <input type="text" class="form-control"  name="produsen" value="<?= isset($_POST['produsen']) ? $_POST['produsen'] : '';?>">
                                <?=  form_error('produsen', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('harga') ? 'has-error' : '' ?>">
                                <label class="control-label">Harga</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><strong>Rp.</strong></span>
                                    <input type="text" class="form-control"  name="harga" value=<?= isset($_POST['harga']) ? $_POST['harga'] : ''; ?>>
                                </div>
                                
                                <?=  form_error('harga', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('jml_stok') ? 'has-error' : '' ?>">
                                <label class="control-label">Jumlah Stok</label>
                                <input type="text" class="form-control"  name="jml_stok" value=<?= isset($_POST['jml_stok']) ? $_POST['jml_stok'] : ''; ?>>
                                <?=  form_error('jml_stok', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">File Input</label>
                                <input type="file" name="foto">
                            </div>
                            
                            <input type="submit" class="btn btn-success" name="submit" value="Submit">
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- container-fluid -->