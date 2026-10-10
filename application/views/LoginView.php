<div id="page-wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                
                <div class="panel panel-default" style="margin-top: 25%;">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <!-- ERROR ALERT -->
                        <?php if(isset($notif)){ ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <span><strong>Error:</strong></span>
                            <?= $notif ?>
                        </div>
                        <?php } ?>
                        <!-- FORM LOGIN -->
                        <form action="<?= site_url('LoginController/dologin') ?>" method="POST">
                            <div class="form-group <?= isset($notif) ? 'has-error' : ''?>">
                                <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                            </div>
                            <div class="form-group <?= isset($notif) ? 'has-error' : ''?>">
                                <input type="password" class="form-control" name="password" placeholder="Password">    
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox"> Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>