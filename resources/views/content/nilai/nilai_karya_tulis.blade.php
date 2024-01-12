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

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Nilai</h4>
    <div id="your-alert-container"></div>

    {{-- Tabel Nilai --}}
    <div class="card">
        <div class="table-responsive text-nowrap m-4">
            <table id="tabelNilaiKaryaTulis" class="table table-striped dataTable" style="width: 100%;"
                aria-describedby="tabelNilaiKaryaTulis_info">
                <thead>
                    <tr class="table-primary">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelNilaiKaryaTulis"
                            aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 0px;">No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="NIM: activate to sort column ascending" style="width: 132px;">NIM</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Nama Mahasiswa: activate to sort column ascending" style="width: 132px;">Nama
                            Mahasiswa</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Kriteria: activate to sort column ascending" style="width: 132px;">Kriteria</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Periode: activate to sort column ascending" style="width: 132px;">Periode
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Klasifikasi: activate to sort column ascending" style="width: 132px;">Klasifikasi
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Jumlah: activate to sort column ascending" style="width: 132px;">Jumlah</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilaiKaryaTulis" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $nilais_kt)
                        {{-- @dd($data) --}}
                        {{-- {{ dd($nilais['mahasiswa_data']['nama']) }} --}}
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $nilais_kt->mahasiswa->nim ?? '' }}</td>
                            <td>{{ $nilais_kt->mahasiswa->nama ?? '' }}</td>
                            <td>{{ $nilais_kt->kriteria->kriteria ?? '' }}</td>
                            <td>{{ $nilais_kt->kriteria->periode ?? '' }}</td>
                            <td>{{ $nilais_kt->klasifikasi_karya_tulis->klasifikasi ?? '' }}</td>
                            <td>{{ $nilais_kt->jumlah ?? '' }}</td>

                            {{-- {{ dd($nilais['mahasiswa_id']) }} --}}
                            <td>
                                <div class="inline">
                                    <span data-id="{{ $nilais['mahasiswa_id'] ?? 0 }}" class="text-success btnEdit"
                                        data-bs-toggle="modal" data-bs-target="#modalEditNilai"><i
                                            class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
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
    {{-- End Tabel Kriteria --}}

    {{-- modal edit --}}
    <div class="modal fade" id="modalEditNilai" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditNilai">Edit Data Nilai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="id_nilai" class="form-label">ID</label>
                                <input type="text" id="id_nilai" class="form-control" placeholder="0"
                                    aria-label="First name" readonly disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="nim_nilai" class="form-label">NIM</label>
                                <input type="text" id="nim_nilai" class="form-control" placeholder="21410100050"
                                    aria-label="Last name" required disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_nilai" class="form-label">Name</label>
                                <input type="text" id="nama_nilai" class="form-control" placeholder="Enter Name"
                                    required disabled readonly>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="ipk_nilai" class="form-label">IPK</label>
                                <input type="number" id="ipk_nilai" class="form-control" placeholder="3.50">
                            </div>
                            <div class="col mb-3">
                                <label for="sskm_nilai" class="form-label">SSKM</label>
                                <input type="number" id="sskm_nilai" class="form-control" placeholder="200">
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="toefl_nilai" class="form-label">TOEFL</label>
                                <input type="number" id="toefl_nilai" class="form-control" placeholder="500">
                            </div>
                            <div class="col mb-3">
                                <label for="karya_tulis_nilai" class="form-label">Karya Tulis</label>
                                <input type="number" id="karya_tulis_nilai" class="form-control" placeholder="2">
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
                        <button type="button" class="btn btn-outline-secondary" id="btnModalClose"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btnModalEditNilai">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>


    @push('pricing-script')
        <script>
            $(document).ready(function() {
                $('#tabelNilaiKaryaTulis').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',
                });
            });
        </script>
    @endpush
@endsection
