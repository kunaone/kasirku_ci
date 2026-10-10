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
                <h1>Tambah Produk</h1>
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

                        <?php if(empty($supplier)){ ?>

                        <div class="panel-body">
                            <p class="text-center text-muted">Supplier Masih Kosong!</p>
                        </div>

                        <?} else {?>

                        <form action="<?= base_url('AddProductController/simpan') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label">Kode Supplier</label>
                                <select class="form-control" name="kode_supplier">
                                    <option>Pilih Kode Supplier</option>
                                    <?php foreach ($supplier as $data): ?>
                                        <option
                                            value="<?= $data->KODE_SUPPLIER; ?>"
                                            <?= set_select('kode_supplier', $data->KODE_SUPPLIER); ?>
                                        >
                                            <?= $data->NAMA_SUPPLIER; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group <?= form_error('name_prod') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Produk</label>
                                <input type="text" class="form-control" name="name_prod" value="<?= isset($_POST['name_prod']) ? $_POST['name_prod'] : ''; ?>">
                                <?=  form_error('name_prod', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('sell_price') ? 'has-error' : '' ?>">
                                <label class="control-label">Harga Jual</label>
                                <input type="text" class="form-control" name="sell_price" value="<?= isset($_POST['sell_price']) ? $_POST['sell_price'] : ''; ?>" autofocus>
                                <?=  form_error('sell_price', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('qty_stock') ? 'has-error' : '' ?>">
                                <label class="control-label">Jumlah Stok</label>
                                <input type="text" class="form-control"  name="qty_stock" value="<?= isset($_POST['qty_stock']) ? $_POST['qty_stock'] : '';?>">
                                <?=  form_error('qty_stock', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Upload Gambar</label>
                                <input type="file" name="foto">
                            </div>
                            
                            <input type="submit" class="btn btn-success" name="submit" value="Submit">
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- container-fluid -->