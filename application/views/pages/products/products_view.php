
<div id="page-wrapper">
    
    <div class="container-fluid">

        <?php if(isset($notif)){?>
        <div class="alert alert-danger">
            <?= $notif ?>
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <h1>Daftar Produk</h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="icon-dashboard"></i> Dasbor</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <form class="input-group pull-left col-sm-5 col-lg-3" action="POST">
                            <input class="form-control" type="text" placeholder="Cari Produk">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#addProduct"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td><strong>No</strong></td>
                                        <td><strong>Produk</strong></td>
                                        <td><strong>Stok</strong></td>
                                        <td><strong>Harga Satuan</strong></td>
                                        <td><strong>Gambar</strong></td>
                                        <td><strong>Created</strong></td>
                                        <td><strong>Updated</strong></td>
                                        <td><strong>Aksi</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;

                                    if(empty($product)){
                                    ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted" style="padding: 16px;"><i class="fa fa-exclamation-circle"></i>&nbsp;<strong>Produk Masih Kosong</strong></td>
                                    </tr>

                                    <?php 
                                    } else {
                                        foreach($product as $data):
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= isset($data->name_product) ? $data->name_product : '-'; ?></td>
                                        <td><?= isset($data->qty_stock) ? $data->qty_stock : '-'; ?></td>
                                        <td><?= isset($data->sell_price) ? $data->sell_price : '-'; ?></td>
                                        <td><?= isset($data->img_prod) ? $data->img_prod : '-'; ?></td>
                                        <td><?= isset($data->created_at) ? $data->created_at : '-'; ?></td>
                                        <td><?= isset($data->updated_at) ? $data->updated_at : '-'; ?></td>
                                        <td>
                                            <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
    <div class="modal fade" id="addProduct">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Produk</h4>
                </div>
                <div class="modal-body">
                    
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

                        <?php
                            $attr = array('enctype' => 'multipart/form-data');
                            echo form_open('products/create', $attr);
                        ?>
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
                            <div class="form-group <?= form_error('product') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product" value="<?= set_value('product'); ?>">
                                <?=  form_error('product', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('price') ? 'has-error' : '' ?>">
                                <label class="control-label">Harga Jual</label>
                                <input type="text" class="form-control" name="price" value="<?= set_value('price'); ?>">
                                <?=  form_error('price', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('stock') ? 'has-error' : '' ?>">
                                <label class="control-label">Jumlah Stok</label>
                                <input type="text" class="form-control"  name="stock" value="<?= set_value('stock'); ?>">
                                <?=  form_error('stock', '<span class="help-block">', '</span>') ?>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->