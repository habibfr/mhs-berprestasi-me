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

    <div class="row">
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
    </div>

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

                        <div class="row">
                            <div class="col mb-3">
                                <label for="klasifikasi_kt_klasifikasi_kt" class="form-label">klasifikasi_kt</label>
                                <input type="text" id="klasifikasi_kt_klasifikasi_kt" class="form-control"
                                    placeholder="IPK" required disabled>
                            </div>
                        </div>

                        <div class="row g-2">

                            <div class="col mb-3">
                                <label for="atribut_klasifikasi_kt" class="form-label">Atribut</label>
                                <select id="atribut_klasifikasi_kt" class="form-select" name="atribut_klasifikasi_kt"
                                    required>
                                    <option>Pilih Atribut</option>
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>

                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="bobot_klasifikasi_kt" class="form-label">Bobot [1-10]</label>
                                <input type="number" id="bobot_klasifikasi_kt" class="form-control" placeholder="3"
                                    min="1" max="10">
                            </div>

                            <div class="col mb-3">
                                <label for="periode_klasifikasi_kt" class="form-label">Periode</label>
                                <input type="number" id="periode_klasifikasi_kt" class="form-control"
                                    placeholder="2023">
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
                        <button type="button" class="btn btn-success" id="btnModalEditklasifikasi_kt">Save
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
            });
        </script>
    @endpush

@endsection
