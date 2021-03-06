@extends('layouts.backoffice.staff.app')

@section('before_css')
<link type="text/css" rel="stylesheet" href="{{ asset('plugins/summernote/css/summernote.css') }}">
@endsection

@section('content')
<!-- breadcrumb start -->
<div class="jumbotron no-margin">
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">DASHBOARD</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('/categories') }}">categories</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Add
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card card-transparent">
        <div class="card-header">
            <div class="card-title">
                Add a categorie
                <a 
                    href="javascript:;" 
                    data-toggle="tooltip" 
                    data-placement="bottom" 
                    data-html="true" 
                    trigger="click" 
                    title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                    <i class="fas fa-question-circle"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Category name</label>
                                        <input type="text" class="form-control" name="reference">
                                        <label class='error' for='reference'>
                                            @if ($errors->has('reference'))
                                                {{ $errors->first('reference') }}
                                            @endif
                                        </label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">description</label>
                            <div class="summernote-wrapper bg-white">
                                <div id="summernote"></div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Catrgory details 
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="from" id="lstview" class="form-control" size="13" multiple="multiple">
                                                <option value="HTML">HTML</option>
                                                <option value="2">CSS</option>
                                                <option value="CSS">CSS3</option>
                                                <option value="jQuery">jQuery</option>
                                                <option value="JavaScript">JavaScript</option>
                                                <option value="Bootstrap">Bootstrap</option>
                                                <option value="MySQL">MySQL</option>
                                                <option value="PHP">PHP</option>
                                                <option value="JSP">JSP</option>
                                                <option value="Rubi on Rails">Rubi on Rails</option>
                                                <option value="SQL">SQL</option>
                                                <option value="Java">Java</option>
                                                <option value="Python">Python</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="to" id="lstview_to" class="form-control" size="13" multiple="multiple"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Catrgory attributes 
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <select name="from" id="lstview" class="form-control" size="13" multiple="multiple">
                                                <option value="HTML">HTML</option>
                                                <option value="2">CSS</option>
                                                <option value="CSS">CSS3</option>
                                                <option value="jQuery">jQuery</option>
                                                <option value="JavaScript">JavaScript</option>
                                                <option value="Bootstrap">Bootstrap</option>
                                                <option value="MySQL">MySQL</option>
                                                <option value="PHP">PHP</option>
                                                <option value="JSP">JSP</option>
                                                <option value="Rubi on Rails">Rubi on Rails</option>
                                                <option value="SQL">SQL</option>
                                                <option value="Java">Java</option>
                                                <option value="Python">Python</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" id="lstview_undo" class="btn btn-transparent-danger btn-block"><i class="fas fa-ban"></i> <strong>undo</strong></button>
                                            <button type="button" id="lstview_rightAll" class="btn btn-transparent btn-block"><i class="fas fa-forward"></i></button>
                                            <button type="button" id="lstview_rightSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-right fa-lg"></i></button>
                                            <button type="button" id="lstview_leftSelected" class="btn btn-transparent btn-block"><i class="fas fa-caret-left fa-lg"></i></button>
                                            <button type="button" id="lstview_leftAll" class="btn btn-transparent btn-block"><i class="fas fa-backward"></i></button>
                                            <button type="button" id="lstview_redo" class="btn btn-transparent btn-block"><i class="fas fa-sync-alt"></i> redo</button>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="to" id="lstview_to" class="form-control" size="13" multiple="multiple"></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Publish
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><strong>save & new</strong></button>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear all</strong></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Category langue
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <select class="cs-select cs-skin-slide" data-init-plugin="cs-select">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <option value="">{{ $properties['native'] }} ({{ $properties['regional'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Category parent 
                                        <a 
                                            href="javascript:;" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            data-html="true" 
                                            trigger="click" 
                                            title= "<p class='tooltip-text'>You can use this form to create a new category if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 scroll b-t b-b b-dashed b-grey p-t-5 p-b-5">
                                            <div class="list-group list-group-root well list-categories">
                                                <a href="#" class="list-group-item list-group-item-action">Cras justo odio</a>
                                                <div class="list-group">
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action">Cras justo odio</a>
                                                    <div class="list-group">
                                                        <a href="#" data-category-id="" class="list-group-item list-group-item-action">Cras justo odio</a>
                                                        <a href="#" data-category-id="" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                                        <a href="#" data-category-id="" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                                        <a href="#" data-category-id="" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                                        <a href="#" data-category-id="" class="list-group-item list-group-item-action ">Vestibulum at eros</a>
                                                    </div>
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                                    <a href="#" data-category-id="" class="list-group-item list-group-item-action ">Vestibulum at eros</a>
                                                </div>
                                                <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                                <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                                <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                                <a href="#" class="list-group-item list-group-item-action ">Vestibulum at eros</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-15">
                                        <div class="col-md-8 m-t-5">
                                            Parent : <span id="selected-parent-name">none<span>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <button id="list-categories-clear" class="btn btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear</strong></button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="category_parent" id="category_parent"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_staff"
                                    alt="" srcset="" width="200" style="margin-left: calc(50% - 105px);">
                                <label for="path_staff" class="choose_photo">
                                    <span>
                                        <i class="fa fa-image"></i> Click here to uploade picture</span>
                                </label>
                                <input type="file" id="path_staff" name="path" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/multiselect.min.js') }}"></script>
    <script>
    $(".list-categories a").click( function () {
        $(".list-categories a").removeClass('active');
        $(this).addClass('active');
        $('#category_parent').val($(this).text());
        $('#selected-parent-name').html($(this).text());
    });
    $('#summernote').summernote({height: 250});
    $('#lstview').multiselect();

    $('#list-categories-clear').click( function () {
        $('.list-categories a').removeClass('active');
        $('#selected-parent-name').html('none');
    });
    </script>
@endsection