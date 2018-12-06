@extends('layouts.backoffice.staff.app')

@section('css_before')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="container-fluid container-fixed-lg ">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Staff
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg bg-white">
        <div class="card card-transparent">
            <div class="card-header">
                <div class="card-title">List of staff</div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 text-right no-padding">
                            @if (auth()->guard('staff')->user()->can('write','staff'))
                            <a href="{{url('staff/create')}}" class="btn btn-primary btn-cons">New staff</a>
                            @endif
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                
            </div>
            <div class="card-body">
                <table id="tableWithSearch" class="table table-hover no-footer table-responsive-block" cellspacing="0" width="100%">
                    <thead>
                        <th style="width:20%" class="text-center">Name</th>
                        <th style="width:20%" class="text-center">Email</th> 
                        <th style="width:10%" class="text-center">Creation date</th> 
                        <th style="width:10%" class="text-center">Profile type</th>                
                        <th style="width:10%" class="text-center">Status</th> 
                         @if (auth()->guard('staff')->user()->can('write','staff'))               
                        <th style="width:10%" class="text-center"></th>            
                        @endif    
                    </thead>
            
                    <tbody> 
                        @foreach($staffs as $staff) 
                            <tr class="order-progress"  >
                                <td class="v-align-middle"><a href="{{url('staff/'.$staff->name)}}"><strong> {{$staff->first_name.' '.$staff->last_name}} </strong></a></td>
                                <td class="v-align-middle text-center"><strong> {{$staff->email}}</strong></td>                
                                <td class="v-align-middle text-center">{{date('d-m-Y', strtotime($staff->created_at))}}</td>      
                                <td class="v-align-middle text-center"><strong>{{$staff->profile->profileLang->first()->reference}}</strong></td> 
                                <td class="v-align-middle text-center"><strong>@if($staff->status) Active @else Desactive @endif</strong></td> 
                                 @if (auth()->guard('staff')->user()->can('write','staff'))
                                <td class="v-align-middle text-center">
                                        <a href="{{url('staff/'.$staff->name.'/edit')}}" class="btn btn-transparent"><i class="fa fa-pencil"></i></a>
                                        <a href="{{route('delete.staff',['staff'=>$staff->id])}}" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-transparent text-danger"><i class="fa fa-trash"></i></a>
                                    </td> 
                                  @endif
                            </tr> 
                            @endforeach
                            
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    
@endsection

@section('script')
        <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
        <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
        <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>

        <script>
    $(document).ready(function () { 

            var table = $('#tableWithSearch');

            var settings = {
                "sDom": "<t><'row'<p i>>",
                "destroy": true,  
                "scrollCollapse": true,
                "order": [
                    [0, "asc"]
                ],
                "iDisplayLength": 10
            };

            table.dataTable(settings);

            // search box for table
            $('#search-table').keyup(function() {
                table.fnFilter($(this).val());
            });
        });
    </script>

@endsection