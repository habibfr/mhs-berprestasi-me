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
                                    <span data-id="{{ $nilais_kt->id ?? 0 }}" class="text-success btnEdit"
                                        data-bs-toggle="modal" data-bs-target="#modalEditKaryaTulis"><i
                                            class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
                                    {{-- <span data-id="{{ $nilais_kt->id ?? 0 }}" class="text-danger btnHapus"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusKT"><i
                                            class="bx bx-trash bx-sm me-2"></i>
                                    </span> --}}
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
    <div class="modal fade" id="modalEditKaryaTulis" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditKaryaTulis">Edit Data Karya Tulis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="id_nilai_kt" class="form-label">ID</label>
                                <input type="number" id="id_nilai_kt" class="form-control" placeholder="1"
                                    aria-label="First name" readonly disabled>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_mhs_kt" class="form-label">Nama Mahasiswa</label>
                                <input type="text" id="nama_mhs_kt" class="form-control" placeholder="Budi" required
                                    readonly disabled>
                            </div>
                        </div>

                        <div class="col mb-3">
                            <label for="kriteria_nilai_kt" class="form-label">Kriteria</label>
                            <input type="text" id="kriteria_nilai_kt" class="form-control" placeholder="Karya Tulis"
                                aria-label="Last name" required disabled readonly>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="periode_nilai_kt" class="form-label">Periode</label>
                                <input type="number" id="periode_nilai_kt" class="form-control" placeholder="2023"
                                    aria-label="First name" readonly disabled>
                            </div>
                            <div class="col mb-3">
                                <label for="klasifikasi_nilai_kt" class="form-label">Klasifikasi</label>
                                <input type="text" id="klasifikasi_nilai_kt" class="form-control"
                                    placeholder="Tidak Punya" aria-label="Last name" required disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="jumlah_nilai_kt" class="form-label">Jumlah</label>
                                <input type="number" step="1" id="jumlah_nilai_kt" class="form-control"
                                    placeholder="1" required max="10" min="0">
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
                        <button type="button" class="btn btn-success" id="btnmodalEditKaryaTulis">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    {{-- modal confirm delete --}}
    <div class="modal fade" id="modalHapusKT" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Hapus Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure to delete this??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="confirmHapus" class="btn btn-danger">Iya</button>
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


            // Ketika tombol edit diklik
            $('.btnEdit').click(function() {
                // Ambil data-id dari tombol edit mahasiswa
                var karyaTulisId = $(this).data('id');
                // console.log(karyaTulisId);

                // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                $.ajax({
                    url: '/admin/nilai/get-nilai-karya-tulis/' + karyaTulisId,
                    method: 'GET',
                    dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                    success: function(data) {
                        // console.log(data[0].id);
                        // Update konten modal dengan data yang diterima

                        if (data[0].klasifikasi == "Tidak Punya") {
                            $('#jumlah_nilai_kt').attr('disabled', true);
                        } else {
                            $('#jumlah_nilai_kt').attr('disabled', false);
                        }

                        $('#id_nilai_kt').val(data[0].id);
                        $('#nama_mhs_kt').val(data[0].nama);
                        $('#kriteria_nilai_kt').val(data[0].kriteria);
                        $('#periode_nilai_kt').val(data[0].periode);
                        $('#klasifikasi_nilai_kt').val(data[0].klasifikasi);
                        $('#jumlah_nilai_kt').val(data[0].jumlah);
                    },
                    error: function() {
                        console.log('Gagal mengambil data mahasiswa.');
                    }
                });
            });


            $('#btnmodalEditKaryaTulis').click(function() {
                // JavaScript
                $("btnmodalEditKaryaTulis").attr("disabled", true);
                karyaTulisId = $('#id_nilai_kt').val();

                $.ajax({
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `/admin/nilai/update-nilai-karya-tulis/${karyaTulisId}`,
                    data: {
                        '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                        'jumlah': $('#jumlah_nilai_kt').val(),
                    },
                    success: function(response) {
                        // $('#modalEditMhs').modal('hide');
                        $("#btnmodalEditKaryaTulis").hide();

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

            $('.btnHapus').click(function() {
                // Ambil data-id dari tombol edit mahasiswa
                let ktId = $(this).data('id');
                console.log(ktId);

                // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                $('#confirmHapus').click(function() {
                    $.ajax({
                        url: '/admin/nilai/nilai-karya-tulis/delete/' + ktId,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: 'post',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data)
                            // Handle success, maybe update UI or show a message
                            // $('#modalHapus').modal('hide');

                            var alert = `
                                            <div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
                                                <div class="toast-header">
                                                    <i class="bx bx-bell me-2"></i>
                                                    <div class="me-auto fw-medium">Briliant</div>
                                                    <small>1 seconds ago</small>
                                                </div>
                                                <div class="toast-body">
                                                    ${data.message}
                                                </div>
                                            </div>
                                        `;

                            $('#your-alert-container').html(alert);
                            $("#confirmHapus").hide();
                            $("#confirmHapus").attr("disabled", true);

                            setTimeout(function() {
                                window.location.reload()
                            }, 1500);

                            // console.log(data.message);

                        },
                        error: function(error) {
                            console.log(error.message);
                            // Handle errors, maybe show an error message
                            console.error('Error deleting mahasiswa:', error
                                .responseJSON);
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
