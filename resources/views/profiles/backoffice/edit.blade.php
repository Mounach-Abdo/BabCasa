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
                    <a href="{{ url('/profiles') }}">profiles</a>
                </li>
                <li class="breadcrumb-item active">
                    Create
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>update profile</strong> </h4>
             <label class='error' >
             @if($errors->count()>0)
                You have {{$errors->count()}} ERROR(S) !!
            @endif
             </label>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-12">
                    <form id="form-personal" method="POST" action="{{url('profiles/'.$profile->id)}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>profiles name</label>
                                    <input type="text" class="form-control" name="reference" value="{{$profile->profileLang->first()->reference}}" placeholder="profile name">
                                    <label class='error' for='reference'>
                                            @if ($errors->has('reference'))
                                                {{ $errors->first('reference') }}
                                            @endif
                                        </label> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <textarea name="description" id="" cols="30" rows="15" class="form-control">{{$profile->profileLang->first()->description}}</textarea>
                                    <label class='error' for='description'>
                                            @if ($errors->has('description'))
                                                {{ $errors->first('description') }}
                                            @endif
                                    </label>
                                </div>
                            </div>
                        </div> 
                        <button class="btn btn-primary" type="submit">Save</button>
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
        });
    </script>
@stop