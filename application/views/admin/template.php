<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/icons.png">
        <title>Sehari - Admin</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fonts/css/font-awesome.min.css">
        <link href="<?php echo base_url(); ?>assets/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/css/fontawesome-all.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.nanoscroller/nanoscroller.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap.summernote/dist/summernote.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jasny.bootstrap/extend/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap.switch/bootstrap-switch.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.select2/select2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap.slider/css/slider.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.icheck/skins/flat/green.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/bootstrap.daterangepicker/daterangepicker-bs3.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/jquery.niftymodals/css/component.css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    </head>

    <body class="animated">
        <div id="cl-wrapper">
            <div class="cl-sidebar">
                <div class="cl-toggle"><i class="fa fa-bars"></i></div>
                <div class="cl-navblock">
                    <div class="menu-space">
                        <div class="content">
                            <div class="sidebar-logo">
                                <div class="logo">
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="side-user">
                                <div class="avatar"><img src="<?php echo base_url(); ?>assets/images/avatar/<?php echo $this->session->userdata('avatar'); ?>" alt="Foto" class="rounded" style="width:50px;height:50px;" /></div>
                                <div class="info">
                                    <p>
                                      </i><?php echo $this->session->userdata('name'); ?>
                                    </p>
                                    <div class="">
                                        <?php if ($this->session->userdata("online") == "Yes") { ?>
                                        <p><i style="color: yellow" class="fa fa-circle"></i><i> Online</i></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <ul class="cl-vnavigation">
                                <li><a href="<?php echo base_url('admin/Admin');?>"><i class="fa fa-chart-area"></i><span>Dashboard</span></a>
                                </li>
                                <?php if ($this->session->userdata("amarket") == 1) { ?>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i><span>Market</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/Market/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i> Add Market</a></li>
                                        <li><a href="<?php echo base_url('admin/Market');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List Market</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("amessages") == 1) { ?>
                                <li><a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                                    <ul class="sub-menu">
                                      <?php if ($this->session->userdata("level") == 1) { ?>
                                        <li><a href="<?php echo base_url('admin/Messages/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add Messages</a></li>
                                      <?php } ?>
                                        <li><a href="<?php echo base_url('admin/Messages');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List Messages</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("anews") == 1) { ?>
                                <li><a href="#"><i class="fa fa-newspaper nav-icon"></i><span>News</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/News/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add News</a></li>
                                        <li><a href="<?php echo base_url('admin/News');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List News</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("apages") == 1) { ?>
                                </li>
                                <li><a href="#"><i class="fa fa-file nav-icon"></i><span>Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/Pages/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add Pages</a></li>
                                        <li><a href="<?php echo base_url('admin/Pages');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List Pages</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("aproduct") == 1) { ?>
                                <li><a href="#"><i class="fa fa-inbox nav-icon"></i><span>Product</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/Products/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add Product</a></li>
                                        <li><a href="<?php echo base_url('admin/Productd/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add Product Details</a></li>
                                        <li><a href="<?php echo base_url('admin/Products');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List Product</a></li>
                                        <li><a href="<?php echo base_url('admin/Productd');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List Product Details</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("auser") == 1) { ?>
                                <li><a href="#"><i class="fa fa-user nav-icon"></i><span>User</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/Users/add');?>"><span class="pull-right"></span><i class="fa fa-plus"></i>Add User</a></li>
                                        <li><a href="<?php echo base_url('admin/Users');?>"><span class="pull-right"></span><i class="fa fa-list"></i>List User</a></li>
                                        <?php if ($this->session->userdata("alevel") == 1) { ?>
                                        <li><a href="<?php echo base_url('admin/Userg');?>"><i class="fa fa-users nav-icon"></i><span>User Group</span></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if ($this->session->userdata("aproduct") == 1) { ?>
                                <li><a href="#"><i class="fa fa-tasks nav-icon"></i><span>Report</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo base_url('admin/Products/add');?>"><span class="pull-right"></span><i class="fa fa-sun"></i>Daily</a></li>
                                        <li><a href="<?php echo base_url('admin/Productd/add');?>"><span class="pull-right"></span><i class="fa fa-moon"></i>Monthly</a></li>
                                        <li><a href="<?php echo base_url('admin/Products');?>"><span class="pull-right"></span><i class="far fa-calendar-check"></i>Weekly</a></li>
                                        <li><a href="<?php echo base_url('admin/Products');?>"><span class="pull-right"></span><i class="fa fa-inbox"></i>By Product</a></li>
                                        <li><a href="<?php echo base_url('admin/Products');?>"><span class="pull-right"></span><i class="fa fa-shopping-cart"></i>By Market</a></li>
                                    </ul>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="text-right collapse-button" style="padding:7px 9px;">
                        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
                    </div>
                </div>
            </div>
            <div class="container-fluid" id="pcont">
                <!-- TOP NAVBAR -->
                <div id="head-nav" class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right user-nav">
                                <li class="dropdown profile_menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="<?php echo base_url(); ?>assets/images/avatar/<?php echo $this->session->userdata('avatar'); ?>" style="width:30px;height:30px;" /><span><?php echo $this->session->userdata('name'); ?></span> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>" target="_blank">Frontend</a></li>
                                        <li><a href="<?php echo base_url('admin/Profile/update/'.$this->session->userdata('user_id')); ?>">My Profile</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo base_url('login/logout') ?>">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse animate-collapse -->
                    </div>
                </div>
                <!-- CONTEN -->
                <?php $this->load->view($container); ?>
                <!-- /CONTEN -->
                </nav>
                <!-- footer -->
                <script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/jquery.cookie/jquery.cookie.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/jquery.pushmenu/js/jPushMenu.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.sparkline/jquery.sparkline.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.ui/jquery-ui.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.gritter/js/jquery.gritter.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/behaviour/core.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jasny.bootstrap/extend/js/jasny-bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.daterangepicker/moment.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.daterangepicker/daterangepicker.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.touchspin/bootstrap-touchspin/bootstrap.touchspin.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.switch/bootstrap-switch.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.select2/select2.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.slider/js/bootstrap-slider.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.icheck/icheck.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.summernote/dist/summernote.min.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.jeditable/jquery.jeditable.mini.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.datatables/jquery.datatables.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.datatables/bootstrap-adapter/js/datatables.js"></script>
                <script src="<?php echo base_url(); ?>assets/js/jquery.niftymodals/js/jquery.modalEffects.js"></script>
                <script type="text/javascript">
                $(document).ready(function() {
                    //initialize the javascript
                    $('#summernote').summernote({
                        onImageUpload: function(file, editor, editable) {
                            uploadMedia(file[0], editor, editable);
                        }
                    });

                    // function upload images to media
                    function uploadMedia(file, editor, editable) {
                        data = new FormData();
                        data.append("image", file);
                        $.ajax({
                            url: '<?php echo base_url('Uploadimg/do_upload') ?>',
                            data: data,
                            cache: false,
                            contentType: false,
                            processData: false,
                            type: 'POST',
                            success: function(data) {
                                editor.insertImage(editable, data);
                                console.log(data);
                            }
                        })
                    }
                });
                $(document).ready(function() {
                    $('#button').click(function() {
                        $.ajax({
                            type: "POST",
                            url: "your url to controller function here",
                        }).done(function(html) {
                            $(".bootstrap_modal").html(html);
                        })
                    });
                    /*Date Range Picker*/
                    $('#reservation').daterangepicker();
                    $('#reservationtime').daterangepicker({
                        timePicker: true,
                        timePickerIncrement: 30,
                        format: 'MM/DD/YYYY h:mm A'
                    });
                    var cb = function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + "]");
                    }

                    var optionSet1 = {
                        startDate: moment().subtract('days', 29),
                        endDate: moment(),
                        minDate: '01/01/2012',
                        maxDate: '12/31/2014',
                        dateLimit: { days: 60 },
                        showDropdowns: true,
                        showWeekNumbers: true,
                        timePicker: false,
                        timePickerIncrement: 1,
                        timePicker12Hour: true,
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                            'Last 7 Days': [moment().subtract('days', 6), moment()],
                            'Last 30 Days': [moment().subtract('days', 29), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                        },
                        opens: 'left',
                        buttonClasses: ['btn btn-default'],
                        applyClass: 'btn-small btn-primary',
                        cancelClass: 'btn-small',
                        format: 'MM/DD/YYYY',
                        separator: ' to ',
                        locale: {
                            applyLabel: 'Submit',
                            cancelLabel: 'Clear',
                            fromLabel: 'From',
                            toLabel: 'To',
                            customRangeLabel: 'Custom',
                            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                            firstDay: 1
                        }
                    };

                    var optionSet2 = {
                        startDate: moment().subtract('days', 7),
                        endDate: moment(),
                        opens: 'left',
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                            'Last 7 Days': [moment().subtract('days', 6), moment()],
                            'Last 30 Days': [moment().subtract('days', 29), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                        }
                    };

                    $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

                    $('#reportrange').daterangepicker(optionSet1, cb);

                    $('#reportrange').on('show', function() { console.log("show event fired"); });
                    $('#reportrange').on('hide', function() { console.log("hide event fired"); });
                    $('#reportrange').on('apply', function(ev, picker) {
                        alert("mama mia");
                        console.log("apply event fired, start/end dates are " +
                            picker.startDate.format('MMMM D, YYYY') +
                            " to " +
                            picker.endDate.format('MMMM D, YYYY')
                        );
                    });
                    $('#reportrange').on('cancel', function(ev, picker) { console.log("cancel event fired"); });
                    /*Switch*/
                    $('.switch').bootstrapSwitch();
                    /*DateTime Picker*/
                    $(".datetime").datetimepicker({ format: 'yyyy-mm-dd hh:ii' });
                    $("#datetime1").datetimepicker({ format: 'yyyy-mm-dd' });

                    /*Select2*/
                    $(".select2").select2({
                        width: '100%'
                    });

                    /*Tags*/
                    $(".tags").select2({ tags: 0, width: '100%' });

                    /*Slider*/
                    $('.bslider').slider();

                    /*Input & Radio Buttons*/
                    $('.icheck').iCheck({
                        checkboxClass: 'icheckbox_flat-green',
                        radioClass: 'iradio_flat-green'
                    });
                    /*spinners*/
                    $("input[name='cleaninit']").TouchSpin();
                    $("input[name='demo1']").TouchSpin({
                        min: 0,
                        max: 100,
                        step: 0.1,
                        decimals: 2,
                        boostat: 5,
                        maxboostedstep: 10,
                        postfix: '%'
                    });
                    $("input[name='demo2']").TouchSpin({
                        min: -1000000000,
                        max: 1000000000,
                        stepinterval: 50,
                        maxboostedstep: 10000000,
                        prefix: '$'
                    });
                    $("input[name='demo4']").TouchSpin({
                        postfix: "a button",
                        postfix_extraclass: "btn btn-default"
                    });
                    /*End of spinners*/
                    /*Color Picker*/
                    $('.demo1').colorpicker({
                        format: 'hex', // force this format
                    });
                    $('.demo2').colorpicker({
                        format: 'hex', // force this format
                    });
                    $('.demo-auto').colorpicker();
                    // Disabled / enabled triggers
                    $(".disable-button").click(function(e) {
                        e.preventDefault();
                        $("#demo_endis").colorpicker('disable');
                    });

                    $(".enable-button").click(function(e) {
                        e.preventDefault();
                        $("#demo_endis").colorpicker('enable');
                    });

                    /*End of Color Picker*/
                });
                $(document).ready(function(){
                  //initialize the javascript
                  $("[data-mask='date']").mask("99/99/9999");
                  $("[data-mask='phone']").mask("(999) 999-9999");
                  $("[data-mask='phone-ext']").mask("(999) 999-9999? x99999");
                  $("[data-mask='phone-int']").mask("+33 999 999 999");
                  $("[data-mask='taxid']").mask("99-9999999");
                  $("[data-mask='ssn']").mask("999-99-9999");
                  $("[data-mask='product-key']").mask("a*-999-a999");
                  $("[data-mask='percent']").mask("99%");
                  $("[data-mask='currency']").mask("$999,999,999.99");

                });

                $(document).ready(function($) {
                  $('#date-picker-filter').datetimepicker({
                    maxDate: moment(),
                    viewMode: 'year'
                  });
                });
                /*Add dataTable Functions
                var functions = $('<div class="btn-group"><button class="btn btn-default btn-xs" type="button">Actions</button><button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button><ul role="menu" class="dropdown-menu"><li><a href="#">Edit</a></li><li><a href="#">Copy</a></li><li><a href="#">Details</a></li><li class="divider"></li><li><a href="#">Remove</a></li></ul></div>');
                $("#datatable tbody tr td:last-child").each(function(){
                  $(this).html("");
                  functions.clone().appendTo(this);
                });
                 */
                $(document).ready(function() {
                    //initialize the javascript
                    //Basic Instance
                    $("#datatable").dataTable();

                    //Search input style
                    $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
                    $('.dataTables_length select').addClass('form-control');

                    /* Formating function for row details */
                    function fnFormatDetails(oTable, nTr) {
                        var aData = oTable.fnGetData(nTr);
                        var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
                        sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
                        sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
                        sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
                        sOut += '</table>';

                        return sOut;
                    }

                    /*
                     * Insert a 'details' column to the table
                     */
                    var nCloneTh = document.createElement('th');
                    var nCloneTd = document.createElement('td');
                    nCloneTd.innerHTML = '<img class="toggle-details" src="<?php echo base_url(); ?>assets/images/plus.png" />';
                    nCloneTd.className = "center";
                });
                $(document).ready(function() {
                    /*Colors*/
                    $('#not-success-add').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->addMessageSuccess(); ?>
                        );
                    });
                    $('#not-danger-add').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->addMessageFailed(); ?>
                        );
                    });
                    $('#not-danger-addp').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->addMessageFailedP(); ?>
                        );
                    });
                    $('#not-success-update').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->updateMessageSuccess(); ?>
                        );
                    });
                    $('#not-danger-update').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->updateMessageFailed(); ?>
                        );
                    });
                    $('#not-success-delete').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->deleteMessageSuccess(); ?>
                        );
                    });
                    $('#not-danger-delete').show(function() {
                        $.gritter.add(
                            <?php $this->mfunction->deleteMessageFailed(); ?>
                        );
                    });
                });
                $(document).ready(function() {
                  function check(id){
                    if(id==1){
                      return '<i class="fa fa-check"></i>';
                    }else{
                      return '<i class="fa fa-times">';
                    }
                  }
                  function status(stat){
                    if (stat == 1) {
                        return "Active";
                      }else {
                        return "Non active";
                      }
                  }

                  function statur(stat){
                    if (stat == 1) {
                        return "Unread";
                      }else {
                        return "Read";
                      }
                  }
                    $(document).on('click', '#getMarket', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Market/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtName').html(data.name);
                                $('#txtAddress').html(data.address);
                                $('#txtImg').html('<img width="100px" src="<?php echo base_url('assets/images/market/') ?>'+data.img+'"/>');
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtCreated').html(data.created_at);
                                $('#txtAuthor').html(data.author);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getMessage', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Messages/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                document.getElementById("statusm").innerHTML=statur(data.status);
                                $('#txtName').html(data.name);
                                $('#txtEmail').html(data.email);
                                $('#txtPhone').html(data.phone);
                                $('#txtContent').html(data.content);
                                $('#txtCreated').html(data.created_at);
                                $('#txtStatus').html(statur(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getNews', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/News/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtTitle').html(data.title);
                                $('#txtContent').html(data.content);
                                $('#txtImg').html('<img width="100px" src="<?php echo base_url('assets/images/news/') ?>'+data.img+'"/>');
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtCreated').html(data.created_at);
                                $('#txtAuthor').html(data.author);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getPages', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Pages/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtTitle').html(data.title);
                                $('#txtContent').html(data.content);
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtCreated').html(data.created_at);
                                $('#txtAuthor').html(data.author);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getProductd', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Productd/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtName').html(data.name);
                                $('#txtUnit').html(data.unit);
                                $('#txtImg').html('<img width="100px" src="<?php echo base_url('assets/images/product/') ?>'+data.img+'"/>');
                                $('#txtUpdated').html(data.price);
                                $('#txtCreated').html(data.date);
                                $('#txtMarket').html(data.market);
                                $('#txtAuthor').html(data.author);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getProducts', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Products/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtName').html(data.name);
                                $('#txtUnit').html(data.unit);
                                $('#txtImg').html('<img width="100px" src="<?php echo base_url('assets/images/product/') ?>'+data.img+'"/>');
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtCreated').html(data.created_at);
                                $('#txtAuthor').html(data.author);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getUsers', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Users/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtName').html(data.name);
                                $('#txtEmail').html(data.email);
                                $('#txtAvatar').html('<img width="100px" src="<?php echo base_url('assets/images/avatar/') ?>'+data.avatar+'"/>');
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtCreated').html(data.created_at);
                                $('#txtLevel').html(data.userg);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                    $(document).on('click', '#getUserg', function(e) {

                        e.preventDefault();

                        var uid = $(this).data('id'); // get id of clicked row

                        $.ajax({
                                url: '<?php echo base_url('admin/Userg/ajaxShow') ?>',
                                type: 'POST',
                                data: 'id=' + uid,
                                dataType: 'json'
                            })
                            .done(function(data) {
                                console.log(data);
                                $('#txtName').html(data.name);
                                $('#txtMessages').html(check(data.messages));
                                $('#txtPages').html(check(data.pages));
                                $('#txtNews').html(check(data.news));
                                $('#txtMarket').html(check(data.market));
                                $('#txtProduct').html(check(data.product));
                                $('#txtUser').html(check(data.user));
                                $('#txtLevel').html(check(data.level));
                                $('#txtCreated').html(data.created_at);
                                $('#txtUpdated').html(data.updated_at);
                                $('#txtStatus').html(status(data.status));
                            })
                            .fail(function() {
                                $('.modal-body').html('<i class="fa fa-times"></i> Something went wrong, Please try again...');
                            });

                    });

                });
                </script>
                <!-- Bootstrap core JavaScript
                    ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="<?php echo base_url(); ?>assets/js/bootstrap/dist/js/bootstrap.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.pie.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.resize.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.flot/jquery.flot.labels.js"></script>
    </body>

    </html>
    <!-- /FOOTER -->
