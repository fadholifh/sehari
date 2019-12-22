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
                <a href="<?php echo $linkadd; ?>" class="btn-default btn"><i class="fa fa-file"></i> <i class="fa fa-plus"></i></a>
              </span>
            </span>
        </div>
        <div class="header">
            <h3><i class="fa fa-file nav-icon"></i> <?php echo $subtitle ?> <?php echo $title ?></h3>
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
                            <th><strong>Title</strong></th>
                            <th><strong>Created</strong></th>
                            <th><strong>Updated</strong></th>
                            <th><strong>Author</strong></th>
                            <th><strong>Status</strong></th>
                            <th class="text-center"><strong>Action</strong></th>
                        </tr>
                    </thead>
                    <tbody class="no-border-y">
                      <?php $no=1;
                            foreach ($data as $pages) {
                      ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pages->title; ?></td>
                            <td><?php echo $pages->created_at; ?></td>
                            <td><?php echo $pages->updated_at; ?></td>
                            <td><?php echo $pages->author; ?></td>
                            <td><?php echo $this->mfunction->status($pages->status); ?>
                            </td>
                            <td class="text-center">
                                <a class="label label-info md-trigger" id="getPages" data-id="<?php echo $pages->page_id; ?>" data-toggle="modal" data-target="#form-bp1"><i class="fa fa-eye"></i></a>
                                <a class="label label-default" href="<?php echo $linkupdate; ?><?php echo $pages->page_id; ?>"><i class="fa fa-pencil-alt"></i></a>
                                <a class="label label-danger" href="<?php echo $linkdelete; ?><?php echo $pages->page_id; ?>" onClick="javascript: return confirm('Are you sure delete this data?');"><i class="fa fa-trash"></i></a>
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
                          <p class="col-sm-5">Title</p>
                          <div class="col-sm-7">
                              <p id="txtTitle"></p>
                          </div>
                      </div>
                      <div class="form-group">
                          <p class="col-sm-5">Content</p>
                          <div class="col-sm-7">
                              <p id="txtContent"></p>
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
                          <p class="col-sm-5">Author</p>
                          <div class="col-sm-7">
                              <p id="txtAuthor"></p>
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
