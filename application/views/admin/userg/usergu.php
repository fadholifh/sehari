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
                <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-users"></i> <i class="fa fa-plus"></i></a>
              </span>
            </span>
        </div>
        <div class="header">
            <h3><i class="fa fa-users nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
        </div>
        <div class="content">
          <?php echo validation_errors(); echo $this->session->flashdata('failedupdate');?>
            <form class="form-horizontal group-border-dashed" style="border-radius: 0px;" role="form" method="post" action="<?php echo base_url('admin/Userg/updateProccess'); ?>">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                        <input type="hidden" class="form-control" name="uid" value="<?php echo $data->level_id; ?>" required>
                        <input type="text" class="form-control" name="name" value="<?php echo $data->name; ?>" placeholder="ex. Admin" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="market" <?php echo $this->mfunction->checked($data->market); ?>> Market</td>
                                        <td>
                                            <input type="checkbox" name="messages" <?php echo $this->mfunction->checked($data->messages); ?>> Message</td>
                                        <td>
                                            <input type="checkbox" name="news" <?php echo $this->mfunction->checked($data->news); ?>> News</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="product" <?php echo $this->mfunction->checked($data->product); ?>> Product</td>
                                        <td>
                                            <input type="checkbox" name="user" <?php echo $this->mfunction->checked($data->user); ?>> User</td>
                                        <td>
                                            <input type="checkbox" name="userg" <?php echo $this->mfunction->checked($data->level); ?>> Userg</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="pages" <?php echo $this->mfunction->checked($data->pages); ?>> Pages</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
