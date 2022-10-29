@extends('layouts.main')

@section('content')
<section class="section">
    

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Subscriptions</h4>
                    {{-- <div class="card-header-form">
                        <a href="{{route('category.create')}}" class="btn btn-dark">Add Category</a>
                    </div> --}}
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="role-table"
                            style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Sl no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Plan</th>
                                    <th>Free Trial End</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
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

<link rel="stylesheet" href="{{ URL::asset('theme-assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet"
    href="{{ URL::asset('theme-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ URL::asset('theme-assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
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
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax: '{!! route('all-subscriptions') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user.first_name', name: 'user.first_name' },
                    { data: 'user.email', name: 'user.email' },
                    { data: 'name', name: 'name' },
                    { data: 'trial_ends_at', name: 'trial_ends_at' },
                    { data: 'stripe_status', name: 'stripe_status' },
                    { data: 'created_at', name: 'created_at' },
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                "fnRowCallback" : function(nRow, aData, iDisplayIndex){
                    $("td:first", nRow).html(iDisplayIndex +1);
                    return nRow;
                },
                drawCallback: function(settings) {
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    pagination.toggle(this.api().page.info().pages > 1);
                }
            });
            // $(document).on('click', '.deleteBtn', function (e) {
            //     e.preventDefault();
            //     swal({
            //         text: 'Are you sure want to delete this?',
            //         buttons: true,
            //         dangerMode: true,
            //     }).then((willDelete) => {
            //         if (willDelete) {
            //             var url = $(this).attr('href');
    
            //             $.ajax({
            //                 url: url,
            //                 type: 'delete',
            //                 dataType: 'json',
            //                 data: {
            //                     method: '_DELETE',
            //                     submit: true,
            //                     "_token": "{{ csrf_token() }}",
            //                 },

            //             }).always(function (data) {
            //                 iziToast.success({
            //                     message: 'User Deleted Successfully',
            //                     position: 'topRight'
            //                 });
            //                 setTimeout(function(){
            //                     //location.reload();
            //                 }, 1000);

            //                 $('#role-table').DataTable().draw(false);
            //             });
            //         }
            //     });
            // });
        });
</script>
@endpush