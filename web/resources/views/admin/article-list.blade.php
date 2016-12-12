<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/header')
</head>

<body>
@include('admin/page-header)

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>
    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        @include('admin/page-left')

        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="#">首页</a>
                    </li>
                    <li class="active">控制台</li>
                </ul><!-- .breadcrumb -->

                <div class="nav-search" id="nav-search">
                </div><!-- #nav-search -->
            </div>

            <div class="page-content">
                <div class="page-header">
                    <h1>
                        文章管理
                        <small>
                            <i class="icon-double-angle-right"></i>
                            查看
                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="">
                            <a href="index.php?a=adminIndex&m=form&model={$model}" class="btn btn-primary"
                               action="form"
                            ><i class="icon-plus"></i>添加文章</a>
                            <a href="javascript:;" class="btn btn-danger" action='batch-delete' data = ""><i class="icon-trash"></i>删除文章</a>
                        </div>
                        <div class="hr hr32 hr-dotted"></div>
                        {/if}
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox"	class="ace" /> <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>文章标题</th>
                                    <th>发布时间</th>
                                    <th class='center'>
                                        操作
                                    </th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($list as $l)
                                <tr>
                                    <td class="center">
                                        <label>
                                            <input type="checkbox" class="ace ids" value='{{$l.id}}' />
                                            <span class="lbl"></span>
                                        </label>
                                    </td>
                                    <td>
                                        {{ $l.title }}}
                                    </td>
                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                            <a class="green alter" href="index.php?a=adminIndex&m=form&model={$model}&id={$l.id}"
                                            >
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>
                                            <a class="red delete" href="javascript:;"
                                               data="{{ $l.id }}"
                                            >
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div><!-- /.main-content -->

    </div><!-- /.main-container-inner -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

@include('admin/script')

<!-- inline scripts related to this page -->
<script>
    $(function(){
        var oTable1 = $('#table').dataTable( {
                "aoColumns" : [
                    {
                        "bSortable" : false
                    },
                    null, null,
                    {
                        "bSortable" : false
                    }
                ],
                "oLanguage": {
                    "sProcessing": "正在加载中......",
                    "sLengthMenu": "每页显示 _MENU_ 条记录",
                    "sZeroRecords": "对不起，查询不到相关数据！",
                    "sEmptyTable": "表中无数据存在！",
                    "sInfo": "当前显示 _START_ 到 _END_ 条，共 _TOTAL_ 条记录",
                    "sInfoFiltered": "数据表中共为 _MAX_ 条记录",
                    "sSearch": "搜索",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上一页",
                        "sNext": "下一页",
                        "sLast": "末页"
                    }
                },
            }
        );
        $('table th input:checkbox').on('click' , function(){
            var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
                .each(function(){
                    this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
                });

        });

        $('.bean-file').on('change', function(){
            $.common.ajaxUpload('index.php?a=adminDo&m=test', $(this).attr('name'));
        });
    });
</script>
</body>
</html>

