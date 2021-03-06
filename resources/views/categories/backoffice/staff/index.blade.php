@extends('layouts.backoffice.staff.app')

@section('before_css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@endsection

@section('content')
    <!-- breadcrumb start -->
    <div class="jumbotron">
        <div class="container-fluid container-fixed-lg ">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}">DASHBOARD</a>
                        </li>
                        <li class="breadcrumb-item active">
                            categories
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="container-fluid container-fixed-lg">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Categories list 
                    <a 
                        href="javascript:;" 
                        data-toggle="tooltip" 
                        data-placement="bottom" 
                        data-html="true" 
                        trigger="click" 
                        title= "<p class='tooltip-text'>This table is containing all the categories in the BABCasa platforme.
                                <br> You can (add, edit or remove) a category if you have the right permissions.
                                If you have any difficulties please <a href='#'>contact the support</a></p>"> 
                        <i class="fas fa-question-circle"></i>
                    </a>
                </div>
                <div class="pull-right">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-3 text-right no-padding">
                                    @if (auth()->guard('staff')->user()->can('write','category'))
                                    <a href="{{url('categories/create')}}" class="btn btn-transparent"><i class="fas fa-plus fa-sm"></i> <strong>Add</strong></a>
                                    @endif
                                    </div>
                            <div class="col-md-3 text-right no-padding">
                                <a href="#" class="btn btn-transparent-danger"><i class="fas fa-trash-alt fa-sm"></i> <strong>Trash</strong></a>
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
                        <th class="text-center" style="width:35px"><a href="#"><i class="fas fa-trash-alt"></i></a></th>
                        <th style="width:62px"></th>
                        <th style="width:62px"></th>
                        <th style="width:80px">Picture</th>
                        <th style="width:150px">Category name</th>
                        <th style="width:250px">Description</th> 
                        <th style="width:100px">Parent</th>                
                        <th style="width:80px">Articles</th>             
                        <th style="width:80px">Languages</th>             
                    </thead>
            
                    <tbody> 
                        <tr role="row" id="0">
                            <td class="v-align-middle p-l-5 p-r-5">
                                <div class="checkbox no-padding no-margin text-center">
                                    <input type="checkbox" id="checkbox2">
                                    <label for="checkbox2" class="no-padding no-margin"></label>
                                </div>
                            </td>
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="{{url('categories/create')}}"><i class="fas fa-pen fa-sm"></i> <strong>Edit</strong></a>
                                </td> 
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="#" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a></td>
                            <td class="v-align-middle picture">
                                <a href="#"><img src="https://ae01.alicdn.com/kf/HTB1nN1pXcrrK1Rjy1zeq6xalFXaS.jpg_220x220.jpg" alt="cat1"></a>
                            </td>
                            <td class="v-align-middle"><a href="#"><strong>Cat</strong></a></td>
                            <td class="v-align-middle">Desc cat</td>
                            <td class="v-align-middle">-</td>
                            <td class="v-align-middle">10</td>
                            <td class="v-align-middle">
                                <a href="#" class="btn btn-tag">En</a>
                                <a href="#" class="btn btn-tag">Fr</a>
                            </td>
                        </tr>
                        <tr role="row" id="1" data-parent="0">
                            <td class="v-align-middle p-l-5 p-r-5 text-center">
                                <div class="checkbox no-padding no-margin text-center">
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1" class="no-padding no-margin"></label>
                                </div>
                            </td>
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="{{url('categories/create')}}"><i class="fas fa-pen fa-sm"></i> <strong>Edit</strong></a>
                                </td> 
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="#" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a></td>
                            <td class="v-align-middle picture">
                                <a href="#"><img src="https://ae01.alicdn.com/kf/HTB1VGbHiZuYBuNkSmRy763A3pXaX.png" alt="cat1-1"></a>
                            </td>
                            <td class="v-align-middle "><a href="#"><strong>— Sub cat</strong></a></td>
                            <td class="v-align-middle ">Desc subcat</td>
                            <td class="v-align-middle"><a href="#"><strong>Cat</strong></a></td>
                            <td class="v-align-middle">5</td>
                            <td class="v-align-middle">
                                <a href="#" class="btn btn-tag">En</a>
                                <a href="#" class="btn btn-tag">Fr</a>
                            </td>
                        </tr>
                        <tr role="row" id="2">
                            <td class="v-align-middle p-l-5 p-r-5 text-center">
                                <div class="checkbox no-padding no-margin text-center">
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3" class="no-padding no-margin"></label>
                                </div>
                            </td>
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="{{url('categories/create')}}"><i class="fas fa-pen fa-sm"></i> <strong>Edit</strong></a>
                                </td> 
                            <td class="v-align-middle text-center p-l-5 p-r-5">
                                <a href="#" class="text-danger"><i class="fas fa-times"></i> <strong>Remove</strong></a></td>
                            <td class="v-align-middle picture">
                                <a href="#"><img src="https://ae01.alicdn.com/kf/HTB1VGbHiZuYBuNkSmRy763A3pXaX.png" alt="cat1-1"></a>
                            </td>
                            <td class="v-align-middle "><a href="#"><strong>— — Sub sub cat</strong></a></td>
                            <td class="v-align-middle ">Desc subsubcat</td>
                            <td class="v-align-middle"><a href="#"><strong>Sub cat</strong></a></td>
                            <td class="v-align-middle">1</td>
                            <td class="v-align-middle">
                                <a href="#" class="btn btn-tag">En</a>
                                <a href="#" class="btn btn-tag">Fr</a>
                            </td>
                        </tr>                                         
                    </tbody>
                </table>
            </div>
        </div> 
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
                        [3, "desc"]
                    ],
                    "columnDefs": [
                        { "orderable": false, "targets": 0 },
                        { "orderable": false, "targets": 1 },
                        { "orderable": false, "targets": 2 },
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
                    console.log($(this).closest('tr').html());

                } else {
                    $(this).closest('tr').removeClass('selected');
                }

            });
        });
        </script>

@endsection