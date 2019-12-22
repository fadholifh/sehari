<div class="cl-mcont">
    <div class="page-head">
      <ol class="breadcrumb">
          <li>
              <a href="<?php echo $linkadmin; ?>">
                  <?php echo $app ?>
              </a>
          </li>
          <li>
              <a href="<?php echo $linksub; ?>">
                  <?php echo $title ?>
              </a>
          </li>
          <li class="active">
              <?php echo $subtitle ?>
          </li>
      </ol>
  </div>
  <div class="block-flat">
      <div class="pull-right">
          <span class="spacer">
            <span class="btn-group">
              <a href="<?php echo $linkaddx; ?>" class="btn-default btn"><i class="fa fa-file-excel"> </i> <i class="fa fa-plus"> </i></a>
              <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-inbox"></i> <i class="fa fa-plus"></i></a>
            </span>
          </span>
      </div>
        <div class="header">
            <h3><i class="fa fa-inbox nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
        </div>
        <div class="content">
          <?php echo validation_errors(); echo $this->session->flashdata('failedadd'); echo $this->session->flashdata('failedaddp');?>
            <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url('admin/Productd/addProccess');  ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Product</label>
                    <div class="col-sm-6">
                        <select class="select2" name="product" required>
                          <?php
                            foreach ($products as $p) {
                          ?>
                          <option value="<?php echo $p->product_id; ?>"><?php echo $p->name; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Market</label>
                    <div class="col-sm-6">
                        <select class="select2" name="market" required>
                          <?php
                            foreach ($market as $m) {
                          ?>
                          <option value="<?php echo $m->market_id; ?>"><?php echo $m->name; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="price" placeholder="Ex. 15000" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                        <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
