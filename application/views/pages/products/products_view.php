
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
                    <li><a href="/"><i class="icon-dashboard"></i> Dasbor</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Produk</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <form class="input-group pull-left col-xs-5 col-lg-3" action="POST">
                            <input class="form-control" type="text" placeholder="Cari Produk">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                        <button class="btn btn-primary pull-right" onclick="window.location.href='products/create'"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
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

                                    if(empty($products)){
                                    ?>
                                    <tr>
                                        <td colspan="9" class="text-center text-muted" style="padding: 16px;"><i class="fa fa-exclamation-circle"></i>&nbsp;<strong>Produk Masih Kosong</strong></td>
                                    </tr>

                                    <?php 
                                    } else {
                                        foreach($products as $data):
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= isset($data['name_product']) ? $data['name_product'] : '-'; ?></td>
                                        <td><?= isset($data['qty_stock']) ? $data['qty_stock'] : '-'; ?></td>
                                        <td><?= isset($data['sell_price']) ? 'Rp ' . number_format($data['sell_price'], 0, ',', '.') : '-'; ?></td>
                                        <td>
                                            <?php if(isset($data['img_prod']) && $data['img_prod'] !== 'noimage.jpg'): ?> 
                                            
                                            <img src="<?= base_url('./assets/image/products/' . $data['img_prod']) ?>" style="width: 100px;">

                                            <?php elseif(isset($data['img_prod']) == 'noimage.jpg'): ?>

                                            <img src="<?= base_url('./assets/image/na-image.webp') ?>" alt="na-img" style="width: 100px">

                                            <?php endif; ?>
                                        </td>
                                        <td class="js-time"><?= isset($data['created_at']) ? $data['created_at'] : '-'; ?></td>
                                        <td class="js-time"><?= isset($data['updated_at']) ? $data['updated_at'] : '-'; ?></td>
                                        <td>
                                            <button class="btn btn-warning" onclick="window.location.href='<?= site_url('products/edit/' . $data['id']) ?>'"><i class="fa fa-edit"></i></button>
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