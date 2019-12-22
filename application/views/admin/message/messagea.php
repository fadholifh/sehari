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
                <?php if ($this->session->userdata("level") == 1) { ?>
                  <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-envelope"></i> <i class="fa fa-plus"></i></a>
                <?php } ?>
              </span>
            </span>
        </div>
        <div class="header">
            <h3><i class="fa fa-envelope nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
        </div>
        <div class="content">
          <?php echo validation_errors(); echo $this->session->flashdata('failedadd');?>
            <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" enctype="multipart/form-data" role="form" method="post" action="<?php echo base_url('admin/Messages/addProccess');  ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" name="mid" placeholder="Ex. 1" required>
                        <input type="text" class="form-control" name="name" placeholder="Ex. John" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email"  placeholder="Ex. admin@sehari.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="phone"  placeholder="Ex. +62838238" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Content</label>
                    <div class="col-sm-6">
                        <textarea class="form-control" name="content" placeholder="Ex. what is ..." required></textarea>
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
