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
            <div class="table-responsive">
                <?php
                      echo $this->session->flashdata('successadd');
                      echo $this->session->flashdata('successupdate');
                      echo $this->session->flashdata('failedupdate');
                      echo $this->session->flashdata('successdelete');
                      echo $this->session->flashdata('faileddelete');
                ?>
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th style="width:2%;">No</th>
                                <th><strong>Name</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Phone</strong></th>
                                <th><strong>Content</strong></th>
                                <th><strong>Date Time</strong></th>
                                <th><strong>Status</strong></th>
                                <th class="text-center"><strong>Action</strong></th>
                            </tr>
                        </thead>
                        <tbody class="no-border-y">
                            <?php $no=1;
                            foreach ($data as $msg) {
                      ?>
                            <tr>
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $msg->name; ?>
                                </td>
                                <td>
                                    <?php echo $msg->email; ?>
                                </td>
                                <td>
                                    <?php echo $msg->phone; ?>
                                </td>
                                <td>
                                    <?php echo $this->mfunction->limContent($msg->content); ?>
                                </td>
                                <td>
                                    <?php echo $msg->created_at; ?>
                                </td>
                                <td id="statusm">
                                   <p></p> <?php echo $this->mfunction->statur($msg->status); ?>
                                </td>
                                <td class="text-center">
                                    <a class="label label-info md-trigger" id="getMessage" data-id="<?php echo $msg->message_id; ?>" data-toggle="modal" data-target="#form-bp1"><i class="fa fa-eye"></i></a>
                                    <?php if ($this->session->userdata("level") == 1) { ?>
                                      <a class="label label-default" href="<?php echo $linkupdate; ?><?php echo $msg->message_id; ?>"><i class="fa fa-pencil-alt"></i></a>
                                      <a class="label label-danger" href="<?php echo $linkdelete; ?><?php echo $msg->message_id; ?>" onClick="javascript: return confirm('Are you sure delete this data?');"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
            <!-- Nifty Modal -->
            <div class="modal fade colored-header" id="form-bp1" tabindex="-1" role="dialog">
              <div class="modal-dialog custom-width">
                <div class="md-content">
                    <div class="modal-header text-center">
                        <h3>Read</h3>
                        <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                          <p class="col-sm-5">Name</p>
                          <div class="col-sm-7">
                              <p id="txtName"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Email</p>
                          <div class="col-sm-7">
                              <p id="txtEmail"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Phone</p>
                          <div class="col-sm-7">
                              <p id="txtPhone"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Content</p>
                          <div class="col-sm-7">
                              <p id="txtContent"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Status</p>
                          <div class="col-sm-7">
                              <?php $this->mfunction->statur('<p id="txtStatus"></p>'); ?>
                          </div>
                      </div>
                      <div class="text-center">
                        <h5>.</h5>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-flat md-close" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
