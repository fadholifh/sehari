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
          <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-shopping-cart"></i> <i class="fa fa-plus"></i></a>
        </span>
      </span>
  </div>
    <div class="header">
        <h3><i class="fa fa-shopping-cart nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
    </div>
    <div class="content">
    <?php echo validation_errors(); echo $this->session->flashdata('faileupdate'); ?>
        <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url('admin/Market/updateProccess');  ?>">
            <div class="form-group">
                <label class="col-sm-3 control-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $data->name; ?>" placeholder="Ex. Bringharjo Market" required>
                    <input type="hidden" class="form-control" name="mid" value="<?php echo $data->market_id ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="address" placeholder="Ex. Jl. Bringharjo No.1, Yogyakarta, Yogyakarta"><?php echo $data->address; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Images</label>
                <div class="col-sm-6">
                    <img src="<?php echo base_url('assets/images/market/'); ?><?php echo $data->img; ?>" width="100px;">
                    <input type="file" class="" name="img">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Status</label>
                <div class="col-sm-6">
                    <input class="switch" type="checkbox" data-on-color="success" data-size="small" name="status" <?php echo $this->mfunction->checked($data->status); ?>>
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
