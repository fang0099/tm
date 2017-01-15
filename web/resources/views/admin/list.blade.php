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
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>{{ $config['name'] }}</span>
                            </li>
                        </ul>
                      
                    </div>
                    
                    <div class='row'>
                        <div class='col-xs-12'>
                            <div class="portlet-body" style='margin-top: 20px'>
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                    <button id="sample_editable_1_new" class="btn sbold green add" > 添加
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                    <button id="sample_editable_1_new" class="btn sbold red batch-delete" > 删除
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    @if($model == 'article')
                                                    <button id="sample_editable_1_new" class="btn sbold red batch-check" > 批量通过
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    @endif
                                                
                                            </div>
                                            @if($model == 'article')
                                                @if(isset($_GET['checked']))
                                                    <div class="col-md-6">
                                                        <div class="btn-group pull-right">
                                                            <button class="btn green  btn-outline show-all">
                                                                显示全部
                                                            </button>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <div class="btn-group pull-right">
                                                            <button class="btn green  btn-outline show-unchecked">
                                                                只显示未审核
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif

                                            @endif
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
                                                @foreach($config['list'] as $l)
                                                    @if($loop->index == 0)
                                                        <th width="30%"> {{ $l['head'] }} </th>
                                                    @else
                                                        <th> {{ $l['head'] }} </th>
                                                    @endif

                                                @endforeach
                                                <th> 操作 </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $d)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <input type="checkbox" class="checkboxes" value="{{$d['id']}}" />
                                                </td>
                                                @foreach($config['list'] as $l)
                                                <td>
                                                    @if($l['type'] == 'text')
                                                    {{$d[$l['value']]}}
                                                    @elseif($l['type'] == 'image')
                                                    <img src="{{$d[$l['value']]}}" width="100" />
                                                    @elseif($l['type'] == 'rel')
                                                        @if($l['rel']['type'] == 'one')
                                                            <a href="javascript:;" class="show-page" data="{'model' : '{{ $l['rel']['ref']['model'] }}', 'id': {{ $d[$l['rel']['relation']['from']] }}}">{{ $d[$l['value']][$l['rel']['value']] }}</a>
                                                        @elseif($l['rel']['type'] == 'many')
                                                            <a href="javascript:;" class="show-list" data="{{$d['id']}}">{{ $l['rel']['value'] }}({{ $d[$l['value']] }})</a>
                                                        @endif
                                                    @endif
                                                </td>
                                                @endforeach
                                                <td>
                                                    <a href='javascript:;' class='green opt update' title="modify" data="{{ $d['id'] }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href='javascript:;' class='red opt delete' title="delete" data="{{ $d['id'] }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    @if($model == 'article')
                                                        <a href='javascript:;' class='red opt check' data="{{ $d['id'] }}">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    @endif
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
        
        <!-- BEGIN FOOTER -->
<input type="hidden" name="model" id="model" value="{{ $model }}"/>
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
        <script src="../../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

        <script src="../../assets/global/scripts/datatable.js" type="text/javascript"></script>
        
        <script src="../../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        
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

                $('.batch-check').click(function(){
                    var ids = '';
                    $('.checkboxes:checked').each(function (k, v) {
                        ids += $(v).val() + ",";
                    });
                    if(ids == ''){
                        __.utils.reminder('没有选中任何行');
                    }else {
                        // batch-check article/bcheck
                        $.ajax({
                            url : 'article/bcheck',
                            data : {ids : ids},
                            dataType : 'json',
                            success : function(data){
                                if(data.success){
                                    //__.utils.reminder('操作成功');
                                    location.reload();
                                }else {
                                    __.utils.reminder(data.message);
                                }
                            }
                        });
                    }
                });
                $('.show-unchecked').click(function(){
                    var page = "list?model=article&checked=1&filter[has_checked eq]=0";
                    $('body', parent.document).find('iframe[name=main]').attr('src', page);
                    //location.href = page;
                });
                $('.show-all').click(function(){
                    var page = "list?model=article";
                    $('body', parent.document).find('iframe[name=main]').attr('src', page);
                    //location.href = page;
                });
                $('.check').click(function(){
                    var data = $(this).attr('data');
                    var pageUrl = 'checkarticle?id=' + data;
                    __.components.iframe.outOpenRightSlider(pageUrl);
                });
            });
        </script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>