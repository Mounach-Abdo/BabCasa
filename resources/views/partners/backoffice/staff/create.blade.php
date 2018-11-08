@extends('layouts.backoffice.staff.app')

@section('before_css')
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}">
<link media="screen" type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
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
                        <a href="{{ url('/affiliates') }}">affiliate</a>
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
                Add a new affiliate
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
        <form action="{{url('affiliates')}}" method="POST" id="form" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Account informations{{$errors}} {{old('code_country.0') ? old('code_country.0'): 0}}{{old('numbers.0')}}
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                        <label class="error" for="name">
                                            {{ $errors->has('name') ? $errors->first('name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="error p-l-15" for="email">
                                        {{ $errors->has('email') ? $errors->first('email') : "" }}
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Administrator informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}">
                                        <label class="error" for="first_name">
                                            {{ $errors->has('first_name') ? $errors->first('first_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}">
                                        <label class="error" for="last_name">
                                            {{ $errors->has('last_name') ? $errors->first('last_name') : "" }}
                                        </label> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Email</label>
                                        <input type="admin_email" class="form-control" id="admin_email" name="admin_email" value="{{old('admin_email')}}">
                                        <label class="error p-l-15" for="admin_email">
                                            {{ $errors->has('admin_email') ? $errors->first('admin_email') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2 required">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" id="country_code" name="country_code" data-init-plugin="select2">
                                            <option value="0">Choose a country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if(old('country_code') == $country->id ) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="country_code">
                                            {{ $errors->has('country_code') ? $errors->first('country_code') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                            <input type="text" class="form-control" id="admin_number" name="admin_number" value="{{old('number')}}" />
                                            <label class="error p-l-15" for="admin_number">
                                                {{ $errors->has('admin_number') ? $errors->first('admin_number') : "" }}
                                            </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Company informations
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Company name</label>
                                        <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}">
                                        <label class="error p-l-15" for="company_name">
                                            {{ $errors->has('company_name') ? $errors->first('company_name') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-12">
                                    <label for="summernote" class="upper-title p-t-5 p-b-5 p-l-10">About company activities</label>
                                    <div class="summernote-wrapper bg-white">
                                        <div id="summernote"></div>
                                        <input type="hidden" name="about" id="description">
                                        <label class="error p-l-15" for="description">
                                            {{ $errors->has('description') ? $errors->first('description') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Taxe ID</label>
                                        <input type="text" name="taxe_id" id="taxe_id" class="form-control" value="{{ old('taxe_id') }}">
                                        <label class="error p-l-15" for="taxe_id">
                                            {{ $errors->has('taxe_id') ? $errors->first('taxe_id') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Company Address
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-group-default form-group-default-select2 required">
                                    <label class="">Country</label>
                                    <select class="full-width" data-placeholder="Select Country" id="country_id" name="country_id" data-init-plugin="select2">
                                        <option value="0">Choose a country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" @if(old('country_id') == $country->id ) selected @endif>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="error p-l-15" for="country_id">
                                        {{ $errors->has('country_id') ? $errors->first('country_id') : "" }}
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group form-group-default required">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}" />
                                </div>
                                <label class="error p-l-15" for="address">
                                    {{ $errors->has('address') ? $errors->first('address') : "" }}
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group form-group-default">
                                    <label>Line 2</label>
                                    <input type="text" class="form-control" name="address_two" value="{{old('address_two')}}" />
                                    <label class="error p-l-15" for="address_two">
                                        {{ $errors->has('address_two') ? $errors->first('address_two') : "" }}
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{old('city')}}" />
                                    </div>
                                    <label class="error p-l-15" for="city">
                                        {{ $errors->has('city') ? $errors->first('city') : "" }}
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>ZIP code</label>
                                        <input type="text" class="form-control" name="zip_code" value="{{old('zip_code')}}" />
                                    </div>
                                    <label class="error p-l-15" for="zip_code">
                                        {{ $errors->has('zip_code') ? $errors->first('zip_code') : "" }}
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        Company phones
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2 required">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            <option value="">Choose a country code</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if(old('code_country.0') == $country->id ) selected @endif>{{ $country->phone_code }}</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.0') ? $errors->first('code_country') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default required">
                                        <label>Phone number</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.0')}}" />
                                            <label class="error p-l-15" for="numbers.0">
                                                {{ $errors->has('numbers.0') ? $errors->first('numbers.0') : "" }}
                                            </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            <option value="">Choose a country code</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if(old('code_country.1') == $country->id ) selected @endif>{{ $country->phone_code }}</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.1') ? $errors->first('code_country') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Phone number 2</label>
                                            <input type="text" class="form-control" name="numbers[]" value="{{old('numbers.1')}}" />
                                            <label class="error p-l-15" for="numbers.1">
                                            {{ $errors->has('numbers.1') ? $errors->first('numbers.1') : "" }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default form-group-default-select2">
                                        <label class="">Code country</label>
                                        <select class="full-width" data-placeholder="Select Country" name="code_country[]" data-init-plugin="select2">
                                            <option value="">Choose a country code</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if(old('code_country.2') == $country->id ) selected @endif>{{ $country->phone_code }}</option>
                                            @endforeach
                                        </select>
                                        <label class="error p-l-15" for="code_country">
                                            {{ $errors->has('code_country.2') ? $errors->first('code_country') : "" }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Fax number</label>
                                            <input type="text" class="form-control" name="fax_number" value="{{old('fax_number')}}" />
                                            <label class="error p-l-15" for="fax_number">
                                            {{ $errors->has('fax_number') ? $errors->first('fax_number') : "" }}
                                        </label>
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
                                        <div class="col-md-12">
                                            Check if the affiliate had approve on the terms and conditions of babcasa.com
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkbox check-success">
                                                <input type="checkbox" name="is_approved" id="checkbox2" @if(old('is_approved')) checked @endif)>
                                                <label for="checkbox2">Affiliate approval</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="javascript:;" id="save" class="btn btn-block"><i class="fas fa-check"></i> <strong>save</strong></a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="javascript:;" id="save_new" class="btn btn-block"><strong>save & new</strong></a>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end b-t b-dashed b-grey m-t-20 p-t-20">
                                        <div class="col-md-6">
                                            <a href="{{ url()->current() }}" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>clear all</strong></a>
                                        </div>
                                    </div>
                                </div>
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
                                <input type="file" id="path_staff" name="path" class="form-control hide">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    Newsletter
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
                                <div class="checkbox check-success">
                                    <input type="checkbox" name="is_register_to_newsletter"id="checkbox" @if(old('is_register_to_newsletter')) checked @endif>
                                    <label for="checkbox">Enable newsletter subscription for this affiliate</label>
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
@endsection

@section('before_script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>    
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/js/summernote.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script>
            $(document).ready(function () {
                $("#path_staff").on("change", function () {
                    var _this = this;
                    var image_preview = $("#image_preview_staff");
                    showImage(_this, image_preview);
                });
    
                function showImage(_this, image_preview) {
                    var files = !!_this.files ? _this.files : [];
                    if (!files.length || !window.FileReader) return;
                    if (/^image/.test(files[0].type)) {
                        var ReaderObj = new FileReader();
                        ReaderObj.readAsDataURL(files[0]);
                        ReaderObj.onloadend = function () {
                            image_preview.attr('src', this.result);
                        }
                    } else {
                        alert("Please select an image");
                    }
                } 
            });
        $("#save").click( function () {
            $('#form').attr('action', '{{ url('affiliates') }}');
            $('#form').submit();
        });

        $("#save_new").click( function () {
            $('#form').attr('action', '{{ url('affiliates')."/create" }}');
            $('#form').submit();
        });

        $('#summernote').summernote({height: 250});

        $('#onClick').on('click', function(){       
            $('#description').val($('#summernote').summernote().code());
        });
        </script>
@endsection