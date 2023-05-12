@extends('dashboard.layouts.app')


@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="table table-dark table-hover">
                            <tr>
                                <th>No</th>
                                <th>Foto Profil</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Role</th>
                                <th width="10%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@foreach($users as $user)
    @include('dashboard.customer.edit')
@endforeach

@endsection


@push('scripts')
    <script>
        let datatable;
            $(document).ready(function () {
                datatable = $('table').DataTable({
                    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'<'table-responsive'tr>>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('customer.list') }}",
                    order: [],
                    columns: [
                        { data: 'DT_RowIndex', sortable: false, searchable: false },
                        { data: 'images', sortable: false, searchable: false },
                        { data: 'name' },
                        { data: 'email' },
                        { data: 'tanggal_lahir' },
                        { data: 'jenis_kelamin' },
                        { data: 'alamat' },
                        { data: 'role' },
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