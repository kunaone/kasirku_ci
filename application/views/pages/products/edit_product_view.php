<div id="page-wrapper"> <!-- close tag page-wrapper on Footer.php -->

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1>Edit Produk</h1>
                <ol class="breadcrumb">
                    <li><a href="/products"><i class="icon-dashboard"></i> Produk</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <?php if($this->session->flashdata('error')): ?>
                        
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Perhatian!</strong> <?= isset($notif) ? $notif : '' ?> <?= $this->session->flashdata('error') ?>
                        </div>
                        
                        <?php elseif($this->session->flashdata('success')) :?>
                        
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
                        </div>
                        
                        <?php endif;?>

                        <?= form_open_multipart('products/update/' . $product['id']) ?>
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <div class="form-group <?= form_error('supplier_id') ? 'has-error' : '' ?>">
                                <label class="control-label">Supplier</label>
                                <select class="form-control" name="supplier_id">
                                    <option>Pilih Supplier</option>
                                    <?php foreach ($supplier as $data): ?>
                                        <option
                                            value="<?= $data['id']; ?>"
                                            <?= set_select('supplier_id', $data['id'], $data['id'] == $product['supplier_id']) ?>
                                        >
                                            <?= $data['supplier_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?=  form_error('supplier_id', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('product') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product" value="<?= isset($data['product']) ? set_value('product') : $product['name_product'] ?>">
                                <?=  form_error('product', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('price') ? 'has-error' : '' ?>">
                                <label class="control-label">Harga Jual</label>
                                <input type="text" class="form-control" name="price" value="<?= isset($data['price']) ? set_value('price') : $product['sell_price'] ?>" autofocus>
                                <?=  form_error('price', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('stock') ? 'has-error' : '' ?>">
                                <label class="control-label">Jumlah Stok</label>
                                <input type="text" class="form-control"  name="stock" value="<?= isset($data['stock']) ? set_value('stock') : $product['qty_stock'] ?>">
                                <?=  form_error('stock', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Upload Gambar</label>
                                <input type="file" name="userfile">
                                <small class="text-muted">*File wajib berformat jpeg, jpg, png </small>
                            </div>
                            
                            <div style="margin-top: 32px;">
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- container-fluid -->