@extends('layouts.backoffice.staff.app')
@section('css_before')
 <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')
<!-- breadcrumb start -->
<div class="container-fluid container-fixed-lg ">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">DASHBOARD</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/particular-clients') }}">particular Clients</a>
                </li>
                <li class="breadcrumb-item active">
                    Update
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Create new particularClient</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal"  method="POST" action="{{url('particular-clients/'.$particularClient->id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}

                        <ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white" id="tab-3">
                            <li class="nav-item">
                                <a href="#" class="active show" data-toggle="tab" data-target="#general">General
                                    information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="tab" data-target="#address" class="">Address & Phone</a>
                            </li>
                        </ul> <!-- END TABS -->
                        <div class="tab-content bg-white">
                            <!-- START FIRST TAB CONTENT GENRAL -->
                            <div class="tab-pane active show" id="general">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Name</label>
                                            <input type="text" class="form-control"  value="{{$particularClient->name}}" name="name" placeholder="Name" disabled>
                                        </div>
                                        <label class='error' for='name'>
                                                @if ($errors->has('name'))
                                                    {{ $errors->first('name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                               
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>First name</label>
                                            <input type="text" class="form-control" value="{{$particularClient->first_name}}"  name="first_name">
                                        </div>
                                        <label class='error' for='first_name'>
                                                @if ($errors->has('first_name'))
                                                    {{ $errors->first('first_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default ">
                                            <label>Last name</label>
                                            <input type="text" class="form-control" value="{{$particularClient->last_name}}"  name="last_name">
                                        </div>
                                        <label class='error' for='last_name'>
                                                @if ($errors->has('last_name'))
                                                    {{ $errors->first('last_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{$particularClient->email}}"  name="email" placeholder="Email">
                                        </div>
                                        <label class='error' for='email'>
                                                @if ($errors->has('email'))
                                                    {{ $errors->first('email') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <label class='error' for='password'>
                                                @if ($errors->has('password'))
                                                    {{ $errors->first('password') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default input-group">
                                            <div class="form-input-group">
                                                <label>Birthday</label>
                                                <input type="text" name="birthday" value="{{$particularClient->birthday}}"  class="form-control" placeholder="Birthday"
                                                    id="birthday">
                                            </div>
                                            <label class='error' for='birthday'>
                                                    @if ($errors->has('birthday'))
                                                        {{ $errors->first('birthday') }}
                                                    @endif
                                            </label> 
                                            <div class="input-group-append ">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" data-init-plugin="switchery" name="is_register_to_newsletter" data-size="small" data-color="primary" @if($particularClient->is_register_to_newsletter) checked="checked" @endif /> 
                                        <label for="">Is register to newsletter</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="radio radio-success">
                                            <input type="radio" value="1" @if($particularClient->gender_id == 1) checked @endif name="gender" id="male">
                                            <label for="male">Male</label>
                                            <input type="radio"  value="0" @if($particularClient->gender_id == 0) checked @endif name="gender" name="gender" id="female">
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                            <div class="form-group form-group-default">
                                                    <img src="{{ Storage::url($particularClient->picture->path)}}" id="image_preview_particularClient"
                                                        alt="" srcset="" width="100">
                                                    <label for="path_particularClient" class="choose_photo">
                                                        <span>
                                                            <i class="fa fa-image"></i> Choisir une photo</span>
                                                    </label>
                                                    <input type="file" id="path_particularClient" name="path" class="form-control hide">
                                                </div>
                                        {{-- <label class='error' for='path'>
                                                @if ($errors->has('path'))
                                                    {{ $errors->first('path') }}
                                                @endif
                                        </label>  --}}
                                    </div>
                                </div>
                            </div> <!-- END FIRST TAB CONTENT GENRAL -->
                            <!-- START FIRST TAB CONTENT ADDRESS -->
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="{{$particularClient->address->address}}"  placeholder="Name">
                                        </div>
                                        <label class='error' for='address'>
                                                @if ($errors->has('address'))
                                                    {{ $errors->first('address') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Address tow</label>
                                            <input type="text" class="form-control" name="address_tow" value="{{$particularClient->address->address_tow}}"  placeholder="Name">
                                        </div>
                                        <label class='error' for='address_tow'>
                                                @if ($errors->has('address_tow'))
                                                    {{ $errors->first('address_tow') }}
                                                @endif
                                        </label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Full name</label>
                                            <input type="text" class="form-control" name="full_name" value="{{$particularClient->address->full_name}}"  placeholder="Full name">
                                        </div>
                                        <label class='error' for='full_name'>
                                                @if ($errors->has('full_name'))
                                                    {{ $errors->first('full_name') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>Zip code</label>
                                            <input type="text" class="form-control" name="zip_code" value="{{$particularClient->address->zip_code}}"  maxlength="6"  placeholder="Zip code">
                                        </div>
                                        <label class='error' for='zip_code'>
                                                @if ($errors->has('zip_code'))
                                                    {{ $errors->first('zip_code') }}
                                                @endif
                                        </label> 
                                    </div>
                                    <div class="col-md-3"> 
                                        <div class="form-group form-group-default">
                                            <label>Country</label>
                                            <select class="cs-select cs-skin-slide cs-transparent" name="country_id" data-init-plugin="cs-select">
                                                    @foreach($countries as $Country)
                                                    <option value="{{$Country->id}}" @if($particularClient->address->country_id == $Country->id) selected @endif >{{$Country->name}}</option>
                                                        @endforeach 
                                            </select> 
                                            <label class='error' for='country'>
                                                    @if ($errors->has('country'))
                                                        {{ $errors->first('country') }}
                                                    @endif
                                            </label> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-group-default">
                                            <label>City</label>
                                            <input type="text" class="form-control" name="city" value="{{$particularClient->address->city}}"  placeholder="City">
                                        </div>
                                        <label class='error' for='city'>
                                                @if ($errors->has('city'))
                                                    {{ $errors->first('city') }}
                                                @endif
                                        </label> 
                                    </div> 
                                </div> 
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                            <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]"  data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}"  @if($particularClient->phones[0]->country->country_id == $country->id) selected @endif >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                <input type="hidden" name="phone_id[]" value="{{$particularClient->phones[0]->id}}">
                                                    <div class="form-input-group flex-1">
                                                        <label>Phone one</label>
                                                        <input type="text" id="phone" name="numbers[]" value="{{$particularClient->phones[0]->number}}" class="form-control">
                                                        @if ($errors->has('numbers.0'))
                                                        <label class='error' for='phone'>{{ $errors->first('numbers.0') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                       
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}"  @if($particularClient->phones[1]->country->country_id == $country->id) selected @endif >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="phone_id[]" value="{{$particularClient->phones[1]->id}}">
                                                    <div class="form-input-group flex-1">
                                                        <label>Phone tow</label>
                                                        <input type="text" id="phone" name="numbers[]" value="{{$particularClient->phones[1]->number}}" class="form-control">
                                                        @if ($errors->has('numbers.1'))
                                                        <label class='error' for='phone'>{{ $errors->first('numbers .1') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}"  @if($particularClient->phones[2]->country->country_id == $country->id) selected @endif >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="fax_id" value="{{$particularClient->phones[2]->id}}">
                                                    <div class="form-input-group flex-1">
                                                        <label>Fax</label>
                                                        <input type="text" id="phone" name="fax_number" value="{{$particularClient->phones[2]->number}}" class="form-control">
                                                        @if ($errors->has('fax_number'))
                                                        <label class='error' for='phone'>{{ $errors->first('fax_number') }}</label>
                                                        @endif
                                                    </div>
                                                </div> 
                                    </div>
                                </div>
                            </div> <!-- END FIRST TAB CONTENT ADDRESS -->
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
     <script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#birthday').datepicker();

            /* Image preview */
            $("#path_particularClient").on("change", function () {
                var _this = this;
                var image_preview = $("#image_preview_particularClient");
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
                    alert("Upload an image");
                }
            } 

        });
    </script>
@stop