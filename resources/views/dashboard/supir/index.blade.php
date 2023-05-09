@extends('dashboard.layouts.app')


@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table table-dark table-hover">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th class="col-2">Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th width="10%" class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.modal-delete')

@endsection


@push('scripts')
    <script>
        let userDatatable;
            $(document).ready(function () {
                userDatatable = $('table').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('supir.list') }}",
                    order: [],
                    columns: [
                        { data: 'DT_RowIndex', sortable: false, searchable: false },
                        { data: 'nama' },
                        { data: 'alamat' },
                        { data: 'jenis_kelamin' },
                        { data: 'status' },
                        { data: 'action', sortable: false },
                    ],
                    
                });
            });


        const successMessage = "{{ session()->get('success') }}";
            if (successMessage) {
                toastr.success(successMessage)
            }
    </script>
@endpush