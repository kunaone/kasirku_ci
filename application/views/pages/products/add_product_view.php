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
                    <li><a href="/products"><i class="icon-dashboard"></i> Produk</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Tambah Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <?php if(validation_errors()): ?>
                        
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Perhatian!</strong> <?= isset($notif) ? $notif : '' ?>
                        </div>
                        
                        <?php elseif($this->session->flashdata('success')) :?>
                        
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
                        </div>
                        
                        <?php endif;?>

                        <!-- JIKA SUPPLIER MASIH KOSONG, TAMPILKAN PANEL PESAN SUPPLIER KOSONG -->
                        <?php if(empty($supplier)){ ?>

                        <div class="panel-body">
                            <p class="text-center text-muted">Supplier Masih Kosong!</p>
                        </div>

                        <?} else {?>

                        <?php
                            echo form_open_multipart('products/create');
                        ?>
                            <div class="form-group <?= form_error('supplier_id') ? 'has-error' : '' ?>">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" name="supplier_id">
                                    <option>Pilih Supplier</option>
                                    <?php foreach ($supplier as $data): ?>
                                        <option
                                            value="<?= $data['id']; ?>"
                                            <?= set_select('supplier_id', $data['id']) ?>
                                        >
                                            <?= $data['supplier_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?=  form_error('supplier_id', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('product') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product" value="<?= set_value('product') ?>">
                                <?=  form_error('product', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('price') ? 'has-error' : '' ?>">
                                <label class="control-label">Harga Jual</label>
                                <input type="text" class="form-control" name="price" value="<?= set_value('price') ?>" autofocus>
                                <?=  form_error('price', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('stock') ? 'has-error' : '' ?>">
                                <label class="control-label">Jumlah Stok</label>
                                <input type="text" class="form-control"  name="stock" value="<?= set_value('stock') ?>">
                                <?=  form_error('stock', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Upload Gambar</label>
                                <input type="file" name="userfile" size="20">
                            </div>
                            
                            <div style="margin-top: 32px;">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- container-fluid -->
    