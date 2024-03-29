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
    {{-- success upload --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- error filter --}}
    @if ($errors->has('jurusan'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            This is a danger {{ $errors->first('jurusan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    @if ($errors->has('angkatan'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            This is a danger {{ $errors->first('angkatan') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
    @endif

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Nilai</h4>

    <div id="your-alert-container"></div>

    {{-- Tabel Nilai --}}
    <div class="card">
        <div class="table-responsive text-nowrap m-4">
            <table id="tabelNilai" class="table table-striped dataTable" style="width: 100%;"
                aria-describedby="tabelNilai_info">
                <thead>
                    <tr class="table-primary">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelNilai" aria-sort="ascending"
                            aria-label="No: activate to sort column descending" style="width: 0px;">No
                        </th>

                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="Nama: activate to sort column ascending" style="width: 132px;">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="NIM: activate to sort column ascending" style="width: 132px;">NIM</th>

                        @foreach ($data[1]['nilai'] as $nilaiItem)
                            <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                                aria-label="{{ $nilaiItem['kriteria'] }}: activate to sort column ascending"
                                style="width: 55px;">
                                {{ $nilaiItem['kriteria'] }}</th>
                        @endforeach
                        {{-- 
                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="SSKM: activate to sort column ascending" style="width: 55px;">SSKM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="Karya Tulis: activate to sort column ascending" style="width: 55px;">Karya Tulis
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="TOEFL: activate to sort column ascending" style="width: 55px;">TOEFL</th> --}}
                        <th class="sorting" tabindex="0" aria-controls="tabelNilai" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $nilais)
                        {{-- {{ dd($nilais['mahasiswa_data']['nama']) }} --}}
                        <tr>
                            <td>{{ $key }}</td>

                            <td>{{ $nilais['mahasiswa_data']['nama'] ?? '' }}</td>
                            <td>{{ $nilais['mahasiswa_data']['nim'] ?? '' }}</td>

                            @foreach ($nilais['nilai'] as $nilaiItem)
                                <td>{{ $nilaiItem['nilai'] ?? 0 }}</td>
                            @endforeach

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
                                <label for="id_mhs" class="form-label">ID</label>
                                <input type="text" id="id_mhs" class="form-control" placeholder="0"
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
                                <input type="number" id="kriteria_id_ipk" class="form-control" hidden readonly>
                                <input type="number" id="ipk_nilai" class="form-control" placeholder="3.50" required>
                            </div>
                            <div class="col mb-3">
                                <label for="sskm_nilai" class="form-label">SSKM</label>
                                <input type="number" id="kriteria_id_sskm" class="form-control" hidden readonly>
                                <input type="number" id="sskm_nilai" class="form-control" placeholder="200" required>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="toefl_nilai" class="form-label">TOEFL</label>
                                <input type="number" id="kriteria_id_toefl" class="form-control" hidden readonly>
                                <input type="number" id="toefl_nilai" class="form-control" placeholder="500" required>
                            </div>
                            <div class="col mb-3">
                                <label for="karya_tulis_nilai" class="form-label">Karya Tulis</label>
                                <input type="number" id="kriteria_id_kt" class="form-control" hidden readonly>
                                <input type="number" id="karya_tulis_nilai" class="form-control" placeholder="2"
                                    required>
                            </div>
                        </div>

                        <div id="error-modal"></div>

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
                $('#tabelNilai').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',
                });

                // Ketika tombol edit diklik
                $('.btnEdit').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var mhsId = $(this).data('id');
                    // console.log(mhsId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $.ajax({
                        url: '/admin/nilai/get-nilai/' + mhsId,
                        method: 'GET',
                        dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                        success: function(data) {
                            console.log(data);


                            // console.log(mahasiswas)
                            nilai = [];
                            for (let i = 0; i < data.length; i++) {
                                // console.log(data[i].nilai)
                                nilai.push(data[i].nilai);
                            }

                            // console.log(nilai)
                            $('#id_mhs').val(data[0].mahasiswa_id);
                            $('#nim_nilai').val(data[0].nim);
                            $('#nama_nilai').val(data[0].nama);
                            $('#ipk_nilai').val(nilai[0]);
                            $('#sskm_nilai').val(nilai[1]);
                            $('#toefl_nilai').val(nilai[2]);
                            if (nilai[3] == null || nilai[3] == 0) {
                                $('#karya_tulis_nilai').val(0);
                            } else {
                                $('#karya_tulis_nilai').val(nilai[3]);
                            }


                            //kriteria id
                            $('#kriteria_id_ipk').val(data[0].kriteria_id);
                            $('#kriteria_id_sskm').val(data[1].kriteria_id);
                            $('#kriteria_id_toefl').val(data[2].kriteria_id);
                            $('#kriteria_id_kt').val(data[3].kriteria_id);



                            // Tampilkan modal
                            $('#modalEditNilai').modal('show');
                        },
                        error: function() {
                            console.log('Gagal mengambil data mahasiswa.');
                        }
                    });
                });


                $('#btnModalEditNilai').click(function() {
                    // JavaScript
                    $("#loading").css("display", "block");
                    $("#btnModalEditNilai").attr("disabled", true);
                    $("#btnModalEditNilai").hide();
                    $("#btnModalClose").hide();

                    const mahasiswa_id = $('#id_mhs').val();

                    $.ajax({
                        type: 'POST',
                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },
                        url: `/admin/nilai/update-nilai/${mahasiswa_id}`,
                        data: {
                            '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                            'mahasiswa_id': mahasiswa_id,
                            'nim': $('#nim_nilai').val(),
                            'nama': $('#nama_nilai').val(),
                            'nilai': [{
                                    'kriteria_id': $('#kriteria_id_ipk').val(),
                                    'nilai': $('#ipk_nilai').val(),
                                },
                                {
                                    'kriteria_id': $('#kriteria_id_sskm').val(),
                                    'nilai': $('#sskm_nilai').val(),
                                },
                                {
                                    'kriteria_id': $('#kriteria_id_toefl').val(),
                                    'nilai': $('#toefl_nilai').val(),
                                },
                                {
                                    'kriteria_id': $('#kriteria_id_kt').val(),
                                    'nilai': $('#karya_tulis_nilai').val(),
                                },
                            ]
                            // Tambahkan data lain sesuai kebutuhan
                        },
                        success: function(response) {
                            // Tanggapi success
                            // $("#loading").css("display", "none");
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
                            const msg = `<div class="alert alert-danger alert-dismissible" role="alert">
                                ${"Gagal update..."}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>`;

                            $('#error-modal').html(msg);

                            // ("#loading").css("display", none);
                            // $("#btnModalEditNilai").attr("disabled", true);
                            // $("#btnModalEditNilai").hide();
                            // $("#btnModalClose").hide();

                            // console.log(error);
                            // Lakukan tindakan lainnya jika diperlukan
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
