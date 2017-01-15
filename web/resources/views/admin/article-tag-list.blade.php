<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        -->
        <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            body {
                background: #fff !important
            }
            a.opt {
                margin : 0px 5px;
            }
            a.red {
                color: #dd5a43!important;
            }

        </style>    
    </head>
    <!-- END HEAD -->

    <body class="page-content-white">
        <!-- BEGIN HEADER -->
        
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-iframe">
                    <!-- BEGIN PAGE HEADER-->
                    <div class='row'>
                        <div class='col-xs-12'>
                            <div class="portlet-body" style='margin-top: 20px'>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                    <button id="sample_editable_1_new" data-target="#tag-modal" class="btn sbold green tag-add" > 添加
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                <!--
                                                    <button id="sample_editable_1_new" class="btn sbold red tag-batch-delete" > 删除
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                -->
                                            </div>
                                            <!--
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /> 
                                                </th>
                                                <th> 标签名称 </th>
                                                <th> 操作 </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $d)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <input type="checkbox" class="checkboxes" value="{{$d['id']}}" />
                                                </td>
                                                <td>
                                                    {{$d['name']}}
                                                </td>
                                                <td>
                                                    <a href='javascript:;' class='red opt tag-delete' title="delete" data="{{ $d['id'] }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>

                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->

        <!-- right slider bar -->
        <!-- select tag modal -->
        <div id="modal_demo_1" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">为文章添加标签</h4>
                    </div>
                    <div class="modal-body">
                        <form action="#" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-xs-2">选择标签</label>
                                <div class="col-xs-8">
                                    <select class="form-control select2-multiple" id="tags" multiple>
                                            @foreach($tags as $t)
                                            <option value="{{$t['id']}}">{{$t['name']}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn dark btn-outline" data-dismiss="modal" aria-hidden="true">取消</button>
                        <button class="btn green save-tags" data-dismiss="modal">保存</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN FOOTER -->
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="../../assets/global/scripts/datatable.js" type="text/javascript"></script>
        
        <script src="../../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="../../chosen-master/chosen.jquery.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/underscore.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/tm.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/tm-utils.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/components/tm-iframe.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/services/tm-page.js" type="text/javascript"></script>
        <script type="text/javascript">
            var articleId = "<?php echo $_GET['id']; ?>";
            $(document).ready(function(){
                (function () {

                    var table = $('#sample_1');

                    // begin first table
                    table.dataTable({

                        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                        "language": {
                            "aria": {
                                "sortAscending": ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            },
                            "emptyTable": "没有数据",
                            "info": "显示 _START_ 到 _END_ 共 _TOTAL_ 条记录",
                            "infoEmpty": "无记录",
                            "infoFiltered": "(从 _MAX_ 记录)",
                            "lengthMenu": "显示 _MENU_",
                            "search": "搜索:",
                            "zeroRecords": "没有匹配项",
                            "paginate": {
                                "previous":"上一页",
                                "next": "下一页",
                                "last": "最后一页",
                                "first": "首页"
                            }
                        },

                        // Or you can use remote translation file
                        //"language": {
                        //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                        //},

                        // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                        // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                        // So when dropdowns used the scrollable div should be removed.
                        //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

                        "bStateSave": true, // save datatable state(pagination, sort, etc) in cookie.

                        "columnDefs": [ {
                            "targets": 0,
                            "orderable": false,
                            "searchable": false
                        }],

                        "lengthMenu": [
                            [5, 15, 20, -1],
                            [5, 15, 20, "All"] // change per page values here
                        ],
                        // set the initial value
                        "pageLength": 15,
                        "pagingType": "bootstrap_full_number",
                        "columnDefs": [{  // set default column settings
                            'orderable': false,
                            'targets': [0]
                        }, {
                            "searchable": false,
                            "targets": [0]
                        }],
                        "order": [
                            [1, "asc"]
                        ] // set first column as a default sort by asc
                    });

                    var tableWrapper = jQuery('#sample_1_wrapper');

                    table.find('.group-checkable').change(function () {
                        var set = jQuery(this).attr("data-set");
                        var checked = jQuery(this).is(":checked");
                        jQuery(set).each(function () {
                            if (checked) {
                                $(this).prop("checked", true);
                                $(this).parents('tr').addClass("active");
                            } else {
                                $(this).prop("checked", false);
                                $(this).parents('tr').removeClass("active");
                            }
                        });
                        jQuery.uniform.update(set);
                    });

                    table.on('change', 'tbody tr .checkboxes', function () {
                        $(this).parents('tr').toggleClass("active");
                    });
                })();
                $('#sample_1_filter').addClass('pull-right');

                $('.add').click(function(){
                    __.components.iframe.outOpenRightSlider();
                });

                $('.tag-delete').click(function(){
                    var id = $(this).attr('data');
                    console.log(id);
                    $.ajax({
                        url : 'articletag/delete',
                        data : {articleId : articleId, tags : id},
                        dataType : 'json',
                        success : function(data){
                            if(data.success){
                                location.reload();
                            }else {
                                __.utils.reminder(data.message);
                            }
                        }
                    });
                });
                $('.tag-add').click(function(){
                    $('#modal_demo_1').modal();
                });

                $('.save-tags').click(function(){
                    var data = $('#tags').val();
                    var ids = '';
                    if(data.length > 0){
                        for(var i = 0 ; i < data.length ; i++){
                            ids += ',' + data[i];
                        }
                        $.ajax({
                            url : 'articletag/add',
                            data : {articleId : articleId, ids : ids},
                            dataType : 'json',
                            success : function(data) {
                                if (data.success) {
                                    location.reload();
                                } else {
                                    __.utils.reminder(data.message);
                                }
                            }
                        });
                    }

                    console.log(data);
                });

                (function() {

                    // Set the "bootstrap" theme as the default theme for all Select2
                    // widgets.
                    //
                    // @see https://github.com/select2/select2/issues/2927
                    $.fn.select2.defaults.set("theme", "bootstrap");

                    var placeholder = "Select a State";

                    $(".select2, .select2-multiple").select2({
                        placeholder: '选择标签',
                        width: null
                    });

                    $(".select2-allow-clear").select2({
                        allowClear: true,
                        placeholder: placeholder,
                        width: null
                    });

                    // @see https://select2.github.io/examples.html#data-ajax
                    function formatRepo(repo) {
                        if (repo.loading) return repo.text;

                        var markup = "<div class='select2-result-repository clearfix'>" +
                            "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
                            "<div class='select2-result-repository__meta'>" +
                            "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

                        if (repo.description) {
                            markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
                        }

                        markup += "<div class='select2-result-repository__statistics'>" +
                            "<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
                            "<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
                            "<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
                            "</div>" +
                            "</div></div>";

                        return markup;
                    }

                    function formatRepoSelection(repo) {
                        return repo.full_name || repo.text;
                    }

                    $(".js-data-example-ajax").select2({
                        width: "off",
                        ajax: {
                            url: "https://api.github.com/search/repositories",
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    q: params.term, // search term
                                    page: params.page
                                };
                            },
                            processResults: function(data, page) {
                                // parse the results into the format expected by Select2.
                                // since we are using custom formatting functions we do not need to
                                // alter the remote JSON data
                                return {
                                    results: data.items
                                };
                            },
                            cache: true
                        },
                        escapeMarkup: function(markup) {
                            return markup;
                        }, // let our custom formatter work
                        minimumInputLength: 1,
                        templateResult: formatRepo,
                        templateSelection: formatRepoSelection
                    });

                    $("button[data-select2-open]").click(function() {
                        $("#" + $(this).data("select2-open")).select2("open");
                    });

                    $(":checkbox").on("click", function() {
                        $(this).parent().nextAll("select").prop("disabled", !this.checked);
                    });

                    // copy Bootstrap validation states to Select2 dropdown
                    //
                    // add .has-waring, .has-error, .has-succes to the Select2 dropdown
                    // (was #select2-drop in Select2 v3.x, in Select2 v4 can be selected via
                    // body > .select2-container) if _any_ of the opened Select2's parents
                    // has one of these forementioned classes (YUCK! ;-))
                    $(".select2, .select2-multiple, .select2-allow-clear, .js-data-example-ajax").on("select2:open", function() {
                        if ($(this).parents("[class*='has-']").length) {
                            var classNames = $(this).parents("[class*='has-']")[0].className.split(/\s+/);

                            for (var i = 0; i < classNames.length; ++i) {
                                if (classNames[i].match("has-")) {
                                    $("body > .select2-container").addClass(classNames[i]);
                                }
                            }
                        }
                    });

                    $(".js-btn-set-scaling-classes").on("click", function() {
                        $("#select2-multiple-input-sm, #select2-single-input-sm").next(".select2-container--bootstrap").addClass("input-sm");
                        $("#select2-multiple-input-lg, #select2-single-input-lg").next(".select2-container--bootstrap").addClass("input-lg");
                        $(this).removeClass("btn-primary btn-outline").prop("disabled", true);
                    });
                })();
            });
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>