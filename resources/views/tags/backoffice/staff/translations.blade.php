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
                            <a href="{{ url('tags') }}">Tags</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('tags/') }}">ID : </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Tanslations
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <div class="container-fluid container-fixed-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Tag translations
                                    <a 
                                        href="javascript:;" 
                                        data-toggle="tooltip" 
                                        data-placement="bottom" 
                                        data-html="true" 
                                        trigger="click" 
                                        title= "<p class='tooltip-text'>You can use this form to create a new Detail if you have the right permissions.<br>
                                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                        <i class="fas fa-question-circle"></i>
                                    </a>    
                                </div>
                            </div>
                            <form action="" method="POST">
                              {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <h5>
                                        Name in
                                    </h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>English</label>
                                                <input type="text" class="form-control" name="values[]">
                                                <label class='error' for='values.0'>
                                                    @if ($errors->has('values.0'))
                                                        {{ $errors->first('values.0') }}
                                                    @endif
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label>Français</label>
                                                <input type="text" class="form-control" name="values[]">
                                                <label class='error' for='values.0'>
                                                    @if ($errors->has('values.0'))
                                                        {{ $errors->first('values.0') }}
                                                    @endif
                                                </label> 
                                            </div>
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
                                            title= "<p class='tooltip-text'>You can use this form to create a new Detail if you have the right permissions.<br>
                                                    If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                            <i class="fas fa-question-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            Status : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Creation date : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Last update : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            Remove date : <strong></strong>
                                        </div>
                                    </div>
                                    <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <button class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type='reset' class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>cancel</strong></button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
@endsection