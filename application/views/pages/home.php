<div id="page-wrapper">

  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard <small>Statistics Overview</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
      </ol>
    </div>
  </div><!-- /.row -->

  <?php

    $arr = array(array("color" => "panel-info", "icon" => "fa fa-bar-chart-o", "label" => "Omset Hari Ini", "value" => ""), 
                 array("color" => "panel-warning", "icon" => "fa fa-shopping-cart", "label" => "Jumlah Transaksi", "value" => ""), 
                 array("color" => "panel-danger", "icon" => "fa fa-list", "label" => "Rata-rata", "value" => ""), 
                 array("color" => "panel-success", "icon" => "fa fa-check-square-o", "label" => "Item Terjual", "value" => ""));
  
  ?>

  <div class="row">
    <?php foreach($arr as $value): ?>
    <div class="col-lg-3">
      <div class="panel <?=$value['color']?>">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class="<?=$value['icon']?> fa-5x"></i>
            </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading">456</p>
              <p class="announcement-text"><?= $value['label'] ?></p>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Details
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
    
  </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Penjualan per Bulan</h3>
        </div>
        <div class="panel-body">
          <div id="chart-dasar" class="chart-box"></div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-money"></i> Recent Transactions</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
              <thead>
                <tr>
                  <th>Order # <i class="fa fa-sort"></i></th>
                  <th>Order Date <i class="fa fa-sort"></i></th>
                  <th>Order Time <i class="fa fa-sort"></i></th>
                  <th>Amount (USD) <i class="fa fa-sort"></i></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>3326</td>
                  <td>10/21/2013</td>
                  <td>3:29 PM</td>
                  <td>$321.33</td>
                </tr>
                <tr>
                  <td>3325</td>
                  <td>10/21/2013</td>
                  <td>3:20 PM</td>
                  <td>$234.34</td>
                </tr>
                <tr>
                  <td>3324</td>
                  <td>10/21/2013</td>
                  <td>3:03 PM</td>
                  <td>$724.17</td>
                </tr>
                <tr>
                  <td>3323</td>
                  <td>10/21/2013</td>
                  <td>3:00 PM</td>
                  <td>$23.71</td>
                </tr>
                <tr>
                  <td>3322</td>
                  <td>10/21/2013</td>
                  <td>2:49 PM</td>
                  <td>$8345.23</td>
                </tr>
                <tr>
                  <td>3321</td>
                  <td>10/21/2013</td>
                  <td>2:23 PM</td>
                  <td>$245.12</td>
                </tr>
                <tr>
                  <td>3320</td>
                  <td>10/21/2013</td>
                  <td>2:15 PM</td>
                  <td>$5663.54</td>
                </tr>
                <tr>
                  <td>3319</td>
                  <td>10/21/2013</td>
                  <td>2:13 PM</td>
                  <td>$943.45</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-right">
            <a href="#">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>