<div id="page-wrapper"> <!-- close tag page-wrapper on Footer.php -->

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1>Edit Supplier</h1>
                <ol class="breadcrumb">
                    <li><a href="/suppliers"><i class="icon-dashboard"></i> Supplier</a></li>
                    <li class="active"><i class="icon-file-alt"></i> Edit Supplier</li>
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
                        <?php else: '' ; endif;?>
                        
                        <?= form_open('suppliers/update'); ?>
                            <input type="hidden" name="id" value=<?= $supplier['id'] ?>>
                            <div class="form-group <?= form_error('supplier_name') ? 'has-error' : '' ?>">
                                <label class="control-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="supplier_name" value="<?= isset($data['supplier_name']) ? set_value('supplier_name') : $supplier['supplier_name']; ?>" autofocus>
                                <?=  form_error('supplier_name', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('contact_person') ? 'has-error' : '' ?>">
                                <label class="control-label">Contact Person</label>
                                <input type="text" class="form-control" name="contact_person" value="<?= isset($data['contact_person']) ? set_value('contact_person') : $supplier['contact_person']; ?>">
                                <?=  form_error('contact_person', '<span class="help-block">', '</span>') ?>
                            </div>
                            <div class="form-group <?= form_error('phone') ? 'has-error' : '' ?>">
                                <label class="control-label">No. Whatsapp</label>
                                <input type="text" class="form-control"  name="phone" value="<?= isset($data['phone']) ? set_value('phone') : $supplier['phone']; ?>">
                                <?=  form_error('phone', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                            <input type="submit" class="btn btn-primary" name="submit" value="Update">
                            <button type="button" class="btn btn-default">Back</button>
                        </form>
                    </div>
                </div>
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- container-fluid -->