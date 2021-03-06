@extends('layouts.backoffice.staff.app') @section('css_before')
<link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" /> @stop
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
                    Show
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>profiles</strong> </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-9 b-r b-dashed b-grey">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>{{$profile->profileLang->first()->reference}}</h5>
                            <p>{{$profile->profileLang->first()->description}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card ">
        <div class="card-header">
            <h4 class="m-t-0 m-b-0"> <strong>Permissions</strong> </h4>
        </div>
        <br>
        <div class="card-body">
        <form action="{{url('profiles/'.$profile->id.'/permissions')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">

                @foreach($permissions as $permission)
                    
                <div class="col-md-6 b-r b-dashed b-grey">
                    <div class="row">
                    <input type="hidden" name="permissions[]" value="{{$permission->id}}">
                        <strong class="col-md-3">
                            {{$permission->permissionLang->first()->reference}}
                        </strong>
                        <div class="col-md-9 row">
                                        <div class="form-group form-group-default">
                                       <select class="cs-select cs-skin-slide cs-transparent" name="can[]" >
                                                <option value="0" 
                                                 @if($profile->permissions()->where('permission_id',$permission->id)->where('can_read',0)->where('can_write',0)->first())
                                                            selected 
                                                    @endif
                                                 >None</option>
                                                <option value="1" 
                                                     @if($profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',0)->first())
                                                            selected 
                                                    @endif
                                                >Read</option>
                                                <option value="2" 
                                                    @if($profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',1)->first())
                                                        selected 
                                                    @endif
                                                  >Read & Write</option>
                                        </select>
                                    </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>

        </div>
    </div>
</div>
@endsection @section('script')
<script src="{{ asset('plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script> @stop