
<div id="page-wrapper">
    
    <div class="container-fluid">

        <?php if(!empty($notif)){?>
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
                        <form class="input-group pull-left col-lg-3" action="POST">
                            <input class="form-control" type="text" placeholder="Cari Produk">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                        <button class="btn btn-primary pull-right" onclick="window.location.href='/add_product'"><i class="fa fa-plus"></i>&nbsp;Tambah Produk</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td><strong>No</strong></td>
                                        <td><strong>Kode Obat</strong></td>
                                        <td><strong>Kode Supplier</strong></td>
                                        <td><strong>Nama Obat</strong></td>
                                        <td><strong>Produsen</strong></td>
                                        <td><strong>Harga</strong></td>
                                        <td><strong>Jumlah Stok</strong></td>
                                        <td><strong>Foto</strong></td>
                                        <td><strong>Aksi</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    /** $obat = array(
                                        array(
                                            "KODE_OBAT" => "PRD-001",
                                            "KODE_SUPPLIER" => "SUPP-001",
                                            "NAMA_OBAT" => "Paracetamol 500 mg",
                                            "PRODUSEN" => "PT Kimia Farma",
                                            "HARGA" => "5000",
                                            "JML_STOK" => "120",
                                            "FOTO" => ""
                                        ),
                                        array(
                                            "KODE_OBAT" => "PRD-002",
                                            "KODE_SUPPLIER" => "SUPP-002",
                                            "NAMA_OBAT" => "Amoxicillin 500 mg",
                                            "PRODUSEN" => "PT Sanbe Farma",
                                            "HARGA" => "8500",
                                            "JML_STOK" => "75",
                                            "FOTO" => ""
                                        ),
                                        array(
                                            "KODE_OBAT" => "PRD-003",
                                            "KODE_SUPPLIER" => "SUPP-001",
                                            "NAMA_OBAT" => "Ibuprofen 400 mg",
                                            "PRODUSEN" => "PT Kimia Farma",
                                            "HARGA" => "7000",
                                            "JML_STOK" => "64",
                                            "FOTO" => ""
                                        ),
                                    ); **/

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
                                        <td><?= isset($data->KODE_OBAT) ? $data->KODE_OBAT : '-'; ?></td>
                                        <td><?= isset($data->KODE_SUPPLIER) ? $data->KODE_SUPPLIER : '-'; ?></td>
                                        <td><?= isset($data->NAMA_OBAT) ? $data->NAMA_OBAT : '-'; ?></td>
                                        <td><?= isset($data->PRODUSEN) ? $data->PRODUSEN : '-'; ?></td>
                                        <td><?= isset($data->HARGA) ? $data->HARGA : '-'; ?></td>
                                        <td><?= isset($data->JML_STOK) ? $data->JML_STOK : '-'; ?></td>
                                        <td><?= isset($data->FOTO) ? $data->FOTO : '-'; ?></td>
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
