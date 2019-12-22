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
              <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-user"></i> <i class="fa fa-plus"></i></a>
            </span>
          </span>
      </div>
        <div class="header">
            <h3><i class="fa fa-user nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
        </div>
        <div class="content">
          <?php echo validation_errors(); echo $this->session->flashdata('failedadd'); echo $this->session->flashdata('failedaddp');?>
            <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url('admin/Users/addProccess');  ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" placeholder="Ex. Adam" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Ex. adam@sehari.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" minlength="8" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Avatar</label>
                    <div class="col-sm-6">
                        <input type="file" name="avatar">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Level</label>
                    <div class="col-sm-6">
                        <select class="select2" name="level" required>
                          <?php
                            foreach ($level as $p) {
                          ?>

                          <option value="<?php echo $p->level_id; ?>"><?php echo $p->name; ?></option>
                          <?php } ?>
                        </select>
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
