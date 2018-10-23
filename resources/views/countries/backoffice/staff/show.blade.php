@extends('layouts.backoffice.staff.app')
@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
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
                    <a href="{{ url('/tags') }}">Countries</a>
                </li>
                <li class="breadcrumb-item active">
                    ID : 1
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
                        Country id : 1
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Name
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            xx
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Alpha 2 Code
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            xx
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Phone code
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            +212
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Currency
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            Dirham
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5>
                                Currency Symbole
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            DH
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
                                    Status : 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Creation date : 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Last update :
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    Remove date : 
                                </div>
                            </div>
                            <div class="row b-t b-dashed b-grey m-t-20 p-t-20">
                                <div class="col-md-6">
                                    <a href="" class="btn btn-block "><i class="fas fa-pen"></i> <strong>Edit</strong></a>                                    
                                </div>
                                <div class="col-md-6">
                                    <a  href="" data-method="delete"  data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="btn btn-block btn-transparent-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a>
                                    <form action="" method="POST">
                                        {{ csrf_field() }}
                                        <button class="btn btn-block btn-transparent-danger" type="submit"><i class="fas fa-undo-alt"></i> <strong>Restore</strong></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('tags.backoffice.staff.componments.table')
</div>
@endsection

@section('after_script')
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
                    [0, "desc"]
                ],
            "iDisplayLength": 10
        };

        table.dataTable(settings);

        // search box for table
        $('#search-table').keyup(function() {
            table.fnFilter($(this).val());
        });

            $('#tableWithSearch input[type=checkbox]').click(function() {
            if ($(this).is(':checked')) {
                $(this).closest('tr').addClass('selected');

            } else {
                $(this).closest('tr').removeClass('selected');
            }

        });
    });
    </script>
@endsection
        