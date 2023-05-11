@extends('dashboard.layouts.app')


@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Armada
                    </a>

                    <table class="table">
                        <thead class="table table-dark table-hover">
                            <tr>
                                <th>No</th>
                                <th>Type Mobil</th>
                                <th>Plat Nomor</th>
                                <th>Harga</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('dashboard.armada.create', ['mobils' => $mobils])

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
                    ajax: "{{ route('armada.list') }}",
                    order: [],
                    columns: [
                        { data: 'DT_RowIndex', sortable: false, searchable: false },
                        { data: 'mobil_id' },
                        { data: 'plat_nomor' },
                        { data: 'harga' },
                        { data: 'status' },
                    ],
                });
            });

        const successMessage = "{{ session()->get('success') }}";
            if (successMessage) {
                toastr.success(successMessage)
            }
    </script>
@endpush