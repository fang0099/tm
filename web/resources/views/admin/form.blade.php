<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | Form Validation</title>
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
        <link href="../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../assets/global/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
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
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-content-white">
        <!-- BEGIN HEADER -->
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-iframe">

                    <div class="row">
                        <div class="col-xs-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form">
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="do/{{ $action }}" method = "POST" class="form-horizontal" id='form' callback="{{ $config['callback'] or 'closeAndRefreshMain' }}">
                                        <div class="form-body">
                                            <input type="hidden" value="{{ $_GET['model'] }}" name="model" />
                                            @foreach($config['fields'] as $f)
                                                @if($f['type'] == 'hidden')
                                                    <input type="hidden" name="{{ $f['name'] }}"
                                                       @if($action == 'update')
                                                       value = "{{ $data[$f['value']] }}"
                                                       @endif
                                                    />
                                                @else
                                                    <div class="form-group">
                                                        <label class="control-label col-xs-2" for="{{ $f['name']  }}">{{ $f['label'] }}</label>
                                                        <div class="col-xs-10">
                                                            <?php
                                                                $atts = 'id="' . $f['name'] . '" name="' . $f['name'] . '" ';
                                                                if(isset($f['attribute'])){
                                                                    foreach ($f['attribute'] as $k => $v){
                                                                        $atts .= $k . ' = "' . $v . '" ';
                                                                    }
                                                                }
                                                            ?>
                                                            @if($f['type'] == 'text')
                                                            <input type="text" class="form-control" {!! $atts !!}
                                                                @if($action == 'update')
                                                                    value = "{{ $data[$f['value']] }}"
                                                                @endif
                                                            />
                                                            @elseif($f['type'] == 'textarea')
                                                            <textarea class="form-control" {!! $atts !!}>@if($action == 'update'){{ $data[$f['value']] }}@endif</textarea>
                                                            @elseif($f['type'] == 'file')
                                                            <input class="form-control ajax" type="file" id="{{$f['value']}}" name="{{$f['value']}}" ref="{{ $f['value'] }}" />
                                                            <input class="form-control" {!! $atts !!} type="hidden" value="@if($action == 'update'){{ $data[$f['value']] }}@endif"/>
                                                            @elseif($f['type'] == 'preview')
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="@if($action == 'update')../../{{ $data[$f['value']] }}@else http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image @endif" alt="" preview="{{ $f['value'] }}">
                                                            </div>
                                                            @elseif($f['type'] == 'select')
                                                                    @if($f['select']['type'] == 'ajax')
                                                                    <select class="bs-select form-control" select-type="ajax" url="{{$f['select']['data']}}" {!! $atts !!}>

                                                                    </select>
                                                                    @else
                                                                    <select class="bs-select form-control"  {!! $atts !!}>
                                                                        @foreach($f['select']['data'] as $k => $v)
                                                                            <option value="{{$v}}">{{$k}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @endif
                                                            @elseif($f['type'] == 'wysihtml5')
                                                                    <textarea class="wysihtml5 form-control" rows="6" {!! $atts !!}>@if($action == 'update'){{ $data[$f['value']] }}@endif</textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-xs-offset-3 col-xs-6">
                                                    <button type="submit" class="btn green">提交</button>
                                                    <button type="reset" class="btn default cancle">取消</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
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
        <script src="../../assets/global/plugins/jquery.form.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../../assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/ajaxfileupload.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
       
        <!-- END THEME LAYOUT SCRIPTS -->
        <!-- BEGIN TM SCRIPTS -->
        <script src="../../assets/layouts/global/scripts/tm.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/tm-utils.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/components/tm-iframe.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/services/tm-form.js" type="text/javascript"></script>
        <!-- END TM SCRIPTS --> 

    </body>

</html>