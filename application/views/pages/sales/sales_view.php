<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Kasir</h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="icon-dashboard"></i> Dasbor</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Kasir</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                         <form class="input-group col-xs-5 col-lg-5" action="POST">
                            <input class="form-control" type="text" placeholder="Cari Produk">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = $offset + 1;
                                    if(!empty($products)):
                                        foreach($products as $product):
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $product->name_product ?></td>
                                        <td><?= isset($product->sell_price) ? 'Rp ' . number_format($product->sell_price, 0, ',', '.') : '-'; ?></td>
                                        <td><?= $product->qty_stock ?></td>
                                        <td>
                                            <button class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-xs-offset-4">
                                <?= $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong style="font-size: 16px;"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Keranjang</strong>
                    </div>
                    <div class="panel-body">
                        <p class="text-muted text-center">Pilih produk untuk memulai transaksi</p>
                        <table class="table">
                            <tr>
                                <td style="vertical-align: middle;">Ajinomoto 100gr</td>
                                <td>
                                    <div class="input-group" style="margin-left: auto; width: 120px;">
                                        <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-minus"></button></i></span>
                                        <input class="form-control text-center" type="text" value="1">
                                        <span class="input-group-btn"><button class="btn btn-default"><i class="fa fa-plus"></button></i></span>
                                    </div>
                                </td>
                            </tr>
                            <tr style="font-size: 20px;">
                                <td><strong>Total</strong></td>
                                <td style="text-align: right;"><strong>Rp 0</strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-block btn-primary">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>