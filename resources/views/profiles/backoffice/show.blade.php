@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
    <link href="{{ asset('plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
@stop
@section('content')

@if (isset(Session::get('messages')['error']))
    <div class="alert alert-danger" role="alert">
        <button class="close" data-dismiss="alert"></button>
        <strong>Error: </strong>{{ Session::get('messages')['error'] }}
    </div>
@endif

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
                    ID : {{$profile->id}}
                </li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb end -->

<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-9">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
                        Member  id :  {{$profile->id}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row m-b-10">
                        <div class="col-md-12">
                            <span class="uppercase">Name</span> in
                        </div>
                    </div>
                     
                    
                   @foreach($languages as $language)
                        @if(isset($profile->profileLangs->where('lang_id',$language->id)->first()->reference) && !empty($profile->profileLangs->where('lang_id',$language->id)->first()->reference))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="hint-text small">
                                        {{$language->name}}
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <strong>
                                        {{$profile->profileLangs->where('lang_id',$language->id)->first()->reference}}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach
                    <div class="row m-t-20">
                        <div class="col-md-12">
                            <span class="uppercase">Description</span> in
                        </div>
                    </div>

                     @foreach($languages as $language)
                        @if(isset($profile->profileLangs->where('lang_id',$language->id)->first()->description) && !empty($profile->profileLangs->where('lang_id',$language->id)->first()->description))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <span class="hint-text small">
                                        {{$language->name}}
                                    </span>
                                </div>
                                <div class="col-md-10">
                                    <strong>
                                         {!!$profile->profileLangs->where('lang_id',$language->id)->first()->description!!}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endif
                    @endforeach

                    <div class="row m-t-20">
                        <div class="col-md-12">
                            <h5>
                                Permissions
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                      @foreach($permissions as $permission)
                        <div class="col-md-6 m-t-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="uppercase">{{$permission->permissionLang()->reference}}</span> 
                                    <a 
                                        href="javascript:;" 
                                        data-toggle="tooltip" 
                                        data-placement="bottom" 
                                        data-html="true" 
                                        trigger="click" 
                                        title= "<p class='tooltip-text'>{{$permission->permissionLang()->description}}<br>
                                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                        <i class="fas fa-question-circle"></i>
                                    </a>
                                    : <strong>
                                    {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',0)->where('can_write',0)->first() ? 'none' :''}}
                                    {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',0)->first() ? 'read' :''}}
                                    {{$profile->permissions()->where('permission_id',$permission->id)->where('can_read',1)->where('can_write',1)->first() ? 'read/write' :''}}
                                    </strong>  
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                                    title= "<p class='tooltip-text'>You can use this form to create a new staff if you have the right permissions.<br>
                                            If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                                    <i class="fas fa-question-circle"></i>
                                </a>
                            </div>
                        </div>
                         <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    Status : <strong>@if($profile->deleted_at == NULL) Publish @else Removed @endif</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : <strong>{{$profile->created_at}}</strong>
                                </div>
                            </div>
                            @if($profile->updated_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Last update : <strong>{{$profile->updated_at}}</strong>
                                </div>
                            </div>
                            @endif
                            @if($profile->deleted_at != NULL)
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : <strong>{{$profile->deleted_at}}</strong>
                                </div>
                            </div>
                            @endif
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                            @if($profile->deleted_at == NULL)
                                <div class="col-md-6">
                                    <a href="{{url('profiles/'.$profile->id.'/edit')}}" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                            @endif
                                <div class="col-md-6">
                                @if($profile->deleted_at == NULL)
                                    <a  href="{{route('delete.profile',['profile'=>$profile->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                @else
                                    <form action="{{url('profiles/'.$profile->id.'/restore')}}" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                        </form>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection