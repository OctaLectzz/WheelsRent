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
                                <th>Mobil</th>
                                <th>Nama</th>
                                <th>Lama Sewa</th>
                                <th>Harga</th>
                                <th>Tanggal Sewa</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

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
                    ajax: "{{ route('transaksi.batallist') }}",
                    order: [],
                    columns: [
                        { data: 'DT_RowIndex', sortable: false, searchable: false },
                        { data: 'armada' },
                        { data: 'nama' },
                        { data: 'waktu' },
                        { data: 'harga' },
                        { data: 'tanggal' },
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