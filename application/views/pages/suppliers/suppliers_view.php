
<div id="page-wrapper">
    
    <div class="container-fluid">

        <?php if(isset($notif)){?>
        <div class="alert alert-danger">
            <?= $notif ?>
        </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <h1>Daftar Supplier</h1>
                <ol class="breadcrumb">
                    <li><a href="/"><i class="icon-dashboard"></i> Dasbor</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Supplier</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <form class="input-group pull-left col-sm-5 col-lg-3" action="POST">
                            <input class="form-control" type="text" placeholder="Cari Supplier">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </form>
                        <button class="btn btn-primary pull-right" onclick="window.location.href='/suppliers/create'"><i class="fa fa-plus"></i>&nbsp;Tambah Supplier</button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td><strong>No</strong></td>
                                        <td><strong>Supplier</strong></td>
                                        <td><strong>Contact Person</strong></td>
                                        <td><strong>No. Whatsapp</strong></td>
                                        <td><strong>Created</strong></td>
                                        <td><strong>Updated</strong></td>
                                        <td><strong>Aksi</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; if(empty($suppliers)): ?>
                                    <tr>
                                        <td colspan="7" class="text-muted text-center" style="padding: 23px;">
                                            <i class="fa fa-exclamation-circle "></i>&nbsp;<strong>Supplier Masih Kosong</strong>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                        else:
                                            foreach($suppliers as $data): 
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= isset($data['supplier_name']) ? $data['supplier_name'] : '-'; ?></td>
                                        <td><?= isset($data['contact_person']) ? $data['contact_person'] : '-'; ?></td>
                                        <td><?= isset($data['phone']) ? $data['phone'] : '-'; ?></td>
                                        <td><?= isset($data['created_at']) ? $data['created_at'] : '-'; ?></td>
                                        <td><?= isset($data['updated_at']) ? $data['updated_at'] : '-'; ?></td>
                                        <td class="clearfix" width="100px">
                                            <button class="btn btn-warning" onclick="window.location.href='<?= site_url('suppliers/edit/' . $data['id']) ?>'"><i class="fa fa-edit"></i></button>
                                            <?php 
                                                $attr = array('class' => 'pull-right');
                                                echo form_open('suppliers/delete/'. $data['id'], $attr); 
                                            ?>
                                                <button class="btn btn-danger btn-delete-id" type="submit" disabled><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- modal for confirm delete -->
        <div class="modal fade" id="confirm_delete_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Peringatan!</h4>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda ingin menghapus</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="confirm_delete_btn" data-id="">Delete</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <!-- notif after delete -->
        <div class="modal fade" id="supplier_deleted" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Notifikasi</h4>
                    </div>
                    <div class="modal-body">
                        <p>Supplier telah dihapus</p>
                    </div>
                    <div class="modal-footer clearfix">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
