@extends('layouts/contentNavbarLayout')

@section('title', 'Mahasiswa')

@section('vendor-style')

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">

    <link href="{{ url('https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ url('https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js') }}">
    </script>
@endsection

@section('content')

    {{-- <div class="row">
        <div class="col">
            <div class="float-start mb-3">
                <div class="input-group-append">
                    <form action="{{ route('ranking.hitung') }}" method="get">
                        @csrf
                        <button class="btn btn-primary square" id="btnProsesHitung" type="submit"><i
                                class="ft-upload mr-1"></i>
                            Proses Hitung</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="float-end mb-3">
                <div class="input-group-append">
                    <button class="btn btn-warning square" type="submit"><i class="ft-upload mr-1"></i>
                        Export</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div id="your-alert-container"></div>

    <div class="card">
        <div class="table-responsive text-nowrap m-4">
            <table id="tabelKlasifikasiKaryaTulis" class="table table-striped dataTable" style="width: 100%;"
                aria-describedby="tabelKlasifikasiKaryaTulis_info">
                <thead>
                    <tr class="table-primary">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis"
                            aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 0px;">No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis" colspan="1"
                            aria-label="Kriteria: activate to sort column ascending" style="width: 132px;">Kriteria</th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis"
                            aria-sort="ascending" aria-label="Periode: activate to sort column descending"
                            style="width: 20px;">Periode
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis" colspan="1"
                            aria-label="Klasifikasi: activate to sort column ascending" style="width: 55px;">Klasifikasi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis" colspan="1"
                            aria-label="Nilai: activate to sort column ascending" style="width: 55px;">Nilai</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKlasifikasiKaryaTulis" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $key => $klasifikasi_kt)
                        <tr>
                            {{-- @dd($klasifikasi_kt->kriteria->kriteria); --}}
                            <td>{{ ++$key }}</td>
                            <td>{{ $klasifikasi_kt->kriteria->kriteria ?? '' }}</td>
                            <td>{{ $klasifikasi_kt->kriteria->periode }}</td>
                            <td>{{ $klasifikasi_kt->klasifikasi ?? '' }}</td>
                            <td>{{ $klasifikasi_kt->nilai ?? 0 }}</td>
                            <td>
                                <div class="inline">
                                    <span data-id="{{ $klasifikasi_kt->id }}" class="text-success btnEdit"
                                        data-bs-toggle="modal" data-bs-target="#modalEditklasifikasi_kt"><i
                                            class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
                                    {{-- <span data-id="{{ $klasifikasi_kt->id }}" class="text-danger btnHapus" data-bs-toggle="modal"
                                    data-bs-target="#modalHapusklasifikasi_kt"><i class="bx bx-trash bx-sm me-2"></i>
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>Maaf data masih kosong!</p>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
    {{-- End Tabel klasifikasi_kt --}}

    {{-- modal edit --}}
    <div class="modal fade" id="modalEditklasifikasi_kt" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditMhs">Edit Data klasifikasi_kt</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="id_klasifikasi_kt" class="form-label">ID</label>
                                <input type="number" id="id_klasifikasi_kt" class="form-control" placeholder="0" readonly
                                    disabled>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="kriteria_klasifikasi_kt" class="form-label">Kriteria</label>
                                <input type="text" id="kriteria_klasifikasi_kt" class="form-control"
                                    placeholder="Karya Tulis" disabled readonly>
                            </div>

                            <div class="col mb-3">
                                <label for="periode_klasifikasi_kt" class="form-label">Periode</label>
                                <input type="number" id="periode_klasifikasi_kt" class="form-control" placeholder="2023"
                                    disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="klasifikasi_klasifikasi_kt" class="form-label">Klasifikasi</label>
                                <input type="text" id="klasifikasi_klasifikasi_kt" class="form-control"
                                    placeholder="IPK" required disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nilai_klasifikasi_kt" class="form-label">Nilai</label>
                                <input type="number" min="0" max="10" id="nilai_klasifikasi_kt"
                                    class="form-control" placeholder="0.8" step="0.1">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center" id="loading" style="display: none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div>
                                <small>Sedang melakukan update...</small>
                            </div>
                        </div>

                        <button type="button" id="btnModalClose" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btnModalEditKlasifikasi">Save
                            changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    @push('pricing-script')
        <script>
            $('#periode_klasifikasi_kt').datepicker({
                minViewMode: 2,
                autoclose: true,
                startDate: "2015",
                endDate: "2023",
                format: 'yyyy'
            });

            $(document).ready(function() {
                $('#tabelKlasifikasiKaryaTulis').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',
                });



                // Ketika tombol edit diklik
                $('.btnEdit').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var klasifikasiId = $(this).data('id');
                    // console.log(klasifikasiId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $.ajax({
                        url: '/admin/kriterias/get-klasifikasi/' + klasifikasiId,
                        method: 'GET',
                        dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                        success: function(data) {
                            // console.log(data);
                            // Update konten modal dengan data yang diterima
                            $('#id_klasifikasi_kt').val(data[0].id);
                            $('#kriteria_klasifikasi_kt').val(data[0].kriteria);
                            $('#periode_klasifikasi_kt').val(data[0].periode);
                            $('#klasifikasi_klasifikasi_kt').val(data[0].klasifikasi);
                            $('#nilai_klasifikasi_kt').val(data[0].nilai);

                        },
                        error: function() {
                            console.log('Gagal mengambil data mahasiswa.');
                        }
                    });
                });


                $('#btnModalEditKlasifikasi').click(function() {
                    // JavaScript
                    $("btnModalEditKlasifikasi").attr("disabled", true);
                    klasifikasiId = $('#id_klasifikasi_kt').val();

                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/admin/kriterias/update-klasifikasi/${klasifikasiId}`,
                        data: {
                            '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                            'nilai': $('#nilai_klasifikasi_kt').val(),
                        },
                        success: function(response) {
                            // $('#modalEditMhs').modal('hide');
                            $("#btnModalEditKlasifikasi").hide();

                            // Tanggapi success
                            var alert = `
                                    <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                                        <div class="toast-header">
                                            <i class="bx bx-bell me-2"></i>
                                            <div class="me-auto fw-medium">Briliant</div>
                                            <small>1 seconds ago</small>
                                        </div>
                                        <div class="toast-body">
                                            ${response.message}
                                        </div>
                                    </div>
                                `;

                            $('#your-alert-container').html(alert);

                            setTimeout(function() {
                                window.location.reload()
                            }, 1500);
                        },
                        error: function(error) {
                            // Tanggapi error
                            console.error(error.message);
                            // Lakukan tindakan lainnya jika diperlukan
                        }
                    });
                });
            });
        </script>
    @endpush

@endsection
