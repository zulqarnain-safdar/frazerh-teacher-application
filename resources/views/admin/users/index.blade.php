@extends('layouts.main')

@section('content')
<section class="section">
   
    <div class="mt-4 float-right">
        <a href="{{ url('export-excel-csv-file') }}" style="padding: 14px 25px;
                border: 1px solid;
                background-color: #6777ef;
                color: #fff;">
            Download CSV
        </a>
    </div>
    <div class="row" style="margin-top:4rem;clear:both">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header">
                    <h4>All Users</h4>
                    {{-- <div class="card-header-form">
                        <a href="{{route('category.create')}}" class="btn btn-dark">Add Category</a>
                    </div> --}}
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <div style="display:flex;justify-content: space-between;">
                            <div class="display-flex">
                                <div>
                                    <label>User Email</label>
                                    <div class="form-group">
                                        <select id="userEmail" class="form-control select2" style="width: 200px">
                                            <option value="All">All</option>
                                            @foreach($userlist as $user)
                                            <option value="{{ $user->email }}">{{ $user->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <label class="ml-3">Account Type</label>
                                    <div class="form-group ml-3">
                                        <select id='accountType' class="form-control" style="width: 200px">
                                            <option value="All">All</option>
                                            {{-- <option value="Full Free Access">Full Free Access</option> --}}
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Unpaid">Unpaid</option>
                                            <option value="14 Days Trail">14 Days Trail</option>
                                            {{-- <option value="Paused">Paused</option> --}}
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <div class="mt-4">
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown"
                                        class="btn btn-primary dropdown-toggle">Action</a>
                                    <div class="dropdown-menu">
                                        <a href='{{ route('change-account-to-free-paid') }}'
                                            class='dropdown-item has-icon free-paid-user'><i
                                                class='fas fa-shield-alt'></i>Free Paid User</a>
                                        <a href='{{ route('change-account') }}'
                                            class='dropdown-item has-icon trial-button'><i
                                                class='fas fa-shield-alt'></i>14 Days Trail</a>
                                        {{-- <a href=''
                                            class='dropdown-item has-icon paused-button'><i
                                                class='fas fa-shield-alt'></i>Paused</a> --}}
                                        <a href=''
                                            class='dropdown-item has-icon deleteBtn'><i
                                                class='fa fa-trash'></i>Delete</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <table class="table table-striped table-bordered table-hover" id="role-table"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Ranking Score</th>
                                    {{-- <th>Account Type</th> --}}
                                    {{-- <th>Status</th> --}}
                                    <th>Account Type</th>
                                    <th>Created Date</th>
                                    <!--<th>Action</th>-->
                                    {{-- <th>Notes</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('custom-css')
<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/izitoast/css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('theme-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

@endpush
@push('scripts')
<script src="{{ URL::asset('theme-assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('theme-assets/bundles/izitoast/js/iziToast.min.js') }}"></script>

<script>
    $(function() {
            $('#role-table').DataTable({
                processing: true,
                serverSide: true,
                dom: 'frtip',
                buttons: [
                    {
                        extend: 'csv',
                        title: "User List",
                        exportOptions: {
                            columns: [1, 2, 3, 4],
                        }
                        
                    },
                    {
                        extend: 'excel',
                        title: "User List",
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'pdf',
                        title: "User List",
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'print',
                        title: "User List",
                        exportOptions: {
                            columns: [1, 2, 3, 4]
                        }
                    }
                ],
                ajax: {
                url: "{{ route('users.index') }}",
                data: function (d) {
                        d.user_email = $('#userEmail').val(),
                        d.account_type = $('#accountType').val(),
                        d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    { data: 'check', name: 'check' },
                    { data: 'id', name: 'id' },
                    { data: 'first_name', name: 'first_name' },
                    { data: 'email', name: 'email' },
                    { data: 'profile.ranking_score', name: 'profile.ranking_score' },
                    // { data: 'name_ar', name: 'name_ar' },
                    // { data: 'image', name: 'image' },
                    // { data: 'status', name: 'status' },
                    { data: 'account_type', name: 'account_type' },
                    { data: 'created_at', name: 'created_at' },
                    // {data: 'actions', name: 'actions', orderable: false, searchable: false},
                    // { data: 'notes', name: 'notes' },
                ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    $("td:eq(1)", nRow).html(iDisplayIndex +1);
                    return nRow;
                },
                drawCallback: function(settings) {
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    pagination.toggle(this.api().page.info().pages > 1);
                }
            });

            $('#accountType').change(function(){
                $('#role-table').DataTable().draw();
                
            });
            
            $('#userEmail').change(function(){
                $('#role-table').DataTable().draw();
                
            });

            

            $(document).on('click', '.deleteBtn', function (e) {
                e.preventDefault();
                swal({
                    text: 'Are you sure want to delete this?',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = $(this).attr('href');
                        var ids= [];
                        
                        $(".users_checkbox:checked").each(function(){
                           ids.push($(this).val()); 
                        });
                        $.ajax({
                            url: '{{ route('users.remove') }}',
                            type: 'post',
                           
                            data: {
                                
                                ids:ids,
                                submit: true,
                                "_token": "{{ csrf_token() }}",
                            },

                        }).always(function (data) {
                            iziToast.success({
                                message: 'User Deleted Successfully',
                                position: 'topRight'
                            });
                            setTimeout(function(){
                                //location.reload();
                            }, 1000);

                            $('#role-table').DataTable().draw(false);
                        });
                    }
                });
            });
            
          
            $(document).on('click', '.trial-button', function (e) {
                e.preventDefault();
                swal({
                    text: 'Are you sure want to give 14 days free trial?',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = $(this).attr('href');
                        var ids= [];
                        
                        $(".users_checkbox:checked").each(function(){
                           ids.push($(this).val()); 
                        });
                        $.ajax({
                            url: url,
                            type: 'Get',
                            dataType: 'json',
                            data: {
                                ids:ids,
                                submit: true,
                                "_token": "{{ csrf_token() }}",
                            },

                        }).always(function (data) {
                            iziToast.success({
                                message: 'The Account Type changed successfully',
                                position: 'topRight'
                            });
                            setTimeout(function(){
                                //location.reload();
                            }, 1000);

                            $('#role-table').DataTable().draw(false);
                        });
                    }
                });
            });

            $(document).on('click', '.free-paid-user', function (e) {
                e.preventDefault();
                swal({
                    text: 'Are you sure to change status to Free Paid User?',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var url = $(this).attr('href');
                        var ids= [];
                        
                        $(".users_checkbox:checked").each(function(){
                           ids.push($(this).val()); 
                        });
                        $.ajax({
                            url: url,
                            type: 'Get',
                            dataType: 'json',
                            data: {
                                ids:ids,
                                submit: true,
                                "_token": "{{ csrf_token() }}",
                            },

                        }).always(function (data) {
                            iziToast.success({
                                message: 'The Account Type changed successfully',
                                position: 'topRight'
                            });
                            setTimeout(function(){
                                //location.reload();
                            }, 1000);

                            $('#role-table').DataTable().draw(false);
                        });
                    }
                });
            });
            
        });
</script>
@endpush