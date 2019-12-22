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
							<div class="table-responsive">
                <?php
                      echo $this->session->flashdata('successadd');
                      echo $this->session->flashdata('successupdate');
                      echo $this->session->flashdata('failedupdate');
                      echo $this->session->flashdata('successdelete');
                      echo $this->session->flashdata('faileddelete');
                ?>
								<table class="table table-bordered" id="datatable" >
                    <thead>
                        <tr>
                            <th style="width:2%;">No</th>
                            <th><strong>Name</strong></th>
                            <th><strong>Level</strong></th>
                            <th><strong>Market</strong></th>
                            <th><strong>Messages</strong></th>
                            <th><strong>User</strong></th>
                            <th><strong>News</strong></th>
                            <th><strong>Product</strong></th>
                            <th><strong>Pages</strong></th>
                            <th><strong>Created</strong></th>
                            <th><strong>Updated</strong></th>
                            <th><strong>Status</strong></th>
                            <th class="text-center"><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody class="no-border-y">
                      <?php $no=1;
                            foreach ($data as $userg) {
                      ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $userg->name; ?></td>
                            <td><?php echo $this->mfunction->check($userg->level); ?></td>
                            <td><?php echo $this->mfunction->check($userg->market); ?></td>
                            <td><?php echo $this->mfunction->check($userg->messages); ?></td>
                            <td><?php echo $this->mfunction->check($userg->user); ?></td>
                            <td><?php echo $this->mfunction->check($userg->news); ?></td>
                            <td><?php echo $this->mfunction->check($userg->product); ?></td>
                            <td><?php echo $this->mfunction->check($userg->pages); ?></td>
                            <td><?php echo $userg->created_at; ?></td>
                            <td><?php echo $userg->updated_at; ?></td>
                            <td><?php echo $this->mfunction->status($userg->status); ?>
                            </td>
                            <td class="text-center">
                                <a class="label label-info md-trigger" id="getUserg" data-id="<?php echo $userg->level_id; ?>" data-toggle="modal" data-target="#form-bp1"><i class="fa fa-eye"></i></a>
                                <?php if ($userg->level_id != 1) { ?>
                                  <a class="label label-default" href="<?php echo $linkupdate; ?><?php echo $userg->level_id; ?>"><i class="fa fa-pencil-alt"></i></a>
                                  <a class="label label-danger" href="<?php echo $linkdelete; ?><?php echo $userg->level_id; ?>" onClick="javascript: return confirm('Are you sure delete this data?');"><i class="fa fa-trash"></i></a>
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
                          <p class="col-sm-5">Status</p>
                          <div class="col-sm-7">
                              <div class="table-responsive">
                                  <table class="table no-border hover">
                                      <tbody class="no-border-y">
                                          <tr>
                                              <td>
                                                  <p id="txtMarket"></p> Market</td>
                                              <td>
                                                  <p id="txtMessages"></p> Message</td>
                                              <td>
                                                  <p id="txtNews"></p> News</td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <p id="txtProduct"></p> Product</td>
                                              <td>
                                                  <p id="txtUser"></p> User</td>
                                              <td>
                                                  <p id="txtLevel"></p> Userg</td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <p id="txtPages"></p> Pages</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Created</p>
                          <div class="col-sm-7">
                              <p id="txtCreated"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Updated</p>
                          <div class="col-sm-7">
                              <p id="txtUpdated"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Status</p>
                          <div class="col-sm-7">
                              <p id="txtStatus"></p>
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
