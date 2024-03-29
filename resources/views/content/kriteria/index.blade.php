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

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Kriteria</h4>

    <div id="your-alert-container"></div>

    <div class="row">
        {{-- <div class="col">
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
        </div> --}}

        <div class="col">
            <div class="float-end mb-3">
                <div class="input-group-append">
                    <button class="btn btn-primary square" type="submit" data-bs-toggle="modal"
                        data-bs-target="#modalTambahKriteria">Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive text-nowrap m-4">
            <table id="tabelKriteria" class="table table-striped dataTable" style="width: 100%;"
                aria-describedby="tabelKriteria_info">
                <thead>
                    <tr class="table-primary">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelKriteria" aria-sort="ascending"
                            aria-label="No: activate to sort column descending" style="width: 0px;">No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKriteria" colspan="1"
                            aria-label="Nama: activate to sort column ascending" style="width: 132px;">Kriteria</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKriteria" colspan="1"
                            aria-label="Atribut: activate to sort column ascending" style="width: 55px;">Atribut</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKriteria" colspan="1"
                            aria-label="Bobot: activate to sort column ascending" style="width: 55px;">Bobot</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKriteria" colspan="1"
                            aria-label="Periode: activate to sort column ascending" style="width: 55px;">Periode</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelKriteria" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $kriteria)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $kriteria->kriteria ?? '' }}</td>
                            <td>{{ $kriteria->atribut ?? '' }}</td>
                            <td>{{ $kriteria->bobot ?? 0 }}</td>
                            <td>{{ $kriteria->periode ?? 0 }}</td>
                            <td>
                                <div class="inline">
                                    <span data-id="{{ $kriteria->id }}" class="text-success btnEdit" data-bs-toggle="modal"
                                        data-bs-target="#modalEditKriteria"><i class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
                                    <span data-id="{{ $kriteria->id }}" class="text-danger btnHapus" data-bs-toggle="modal"
                                        data-bs-target="#modalHapusKriteria"><i class="bx bx-trash bx-sm me-2"></i>
                                        </a>
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

    {{-- modal Tambah --}}
    <div class="modal fade" id="modalTambahKriteria" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('kriterias.tambah') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelTambahKriteria">Tambah Data Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col mb-3">
                                <label for="kriteria_tambah_kriteria" class="form-label">Kriteria</label>
                                <input type="text" id="kriteria_tambah_kriteria" class="form-control"
                                    placeholder="IPK" required>
                            </div>
                        </div>

                        <div class="row g-2">

                            <div class="col mb-3">
                                <label for="atribut_tambah_kriteria" class="form-label">Atribut</label>
                                <select id="atribut_tambah_kriteria" class="form-select" name="atribut_tambah_kriteria"
                                    required>
                                    <option>Pilih Atribut</option>
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>

                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="bobot_tambah_kriteria" class="form-label">Bobot [1-10]</label>
                                <input type="number" id="bobot_tambah_kriteria" class="form-control" placeholder="3"
                                    min="1" max="10" required>
                            </div>

                            <div class="col mb-3">
                                <label for="periode_tambah_kriteria" class="form-label">Periode</label>
                                <input type="number" id="periode_tambah_kriteria" class="form-control"
                                    placeholder="2023" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="text-center" id="loading" style="display: none">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div>
                                <small>Sedang melakukan penambahan...</small>
                            </div>
                        </div>

                        <button type="button" id="btnModalClose" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="btnmodalTambahKriteria">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    {{-- modal edit --}}
    <div class="modal fade" id="modalEditKriteria" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditMhs">Edit Data Kriteria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="id_kriteria" class="form-label">ID</label>
                                <input type="number" id="id_kriteria" class="form-control" placeholder="0" readonly
                                    disabled>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="kriteria_kriteria" class="form-label">Kriteria</label>
                                <input type="text" id="kriteria_kriteria" class="form-control" placeholder="IPK"
                                    required disabled>
                            </div>
                        </div>

                        <div class="row g-2">

                            <div class="col mb-3">
                                <label for="atribut_kriteria" class="form-label">Atribut</label>
                                <select id="atribut_kriteria" class="form-select" name="atribut_kriteria" required>
                                    <option>Pilih Atribut</option>
                                    <option value="benefit">Benefit</option>
                                    <option value="cost">Cost</option>

                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="bobot_kriteria" class="form-label">Bobot [1-10]</label>
                                <input type="number" id="bobot_kriteria" class="form-control" placeholder="3"
                                    min="1" max="10">
                            </div>

                            <div class="col mb-3">
                                <label for="periode_kriteria" class="form-label">Periode</label>
                                <input type="number" id="periode_kriteria" class="form-control" placeholder="2023">
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
                        <button type="button" class="btn btn-success" id="btnModalEditKriteria">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- modal confirm delete --}}
    <div class="modal fade" id="modalHapusKriteria" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Hapus Kriteria</h5>
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
            $('#periode_kriteria').datepicker({
                minViewMode: 2,
                autoclose: true,
                startDate: "2015",
                endDate: "2023",
                format: 'yyyy'
            });

            // tambah modal
            $('#periode_tambah_kriteria').datepicker({
                minViewMode: 2,
                autoclose: true,
                startDate: "2015",
                endDate: "2023",
                format: 'yyyy'
            });

            $(document).ready(function() {
                $('#tabelKriteria').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',
                });


                // proses tambah
                $('#btnmodalTambahKriteria').click(function() {
                    $("#loading").css("display", "block");

                    $.ajax({
                        type: 'POST',
                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },
                        url: `/admin/kriteria/tambah-kriteria`,
                        data: {
                            '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                            'kriteria': $('#kriteria_tambah_kriteria').val(),
                            'atribut': $('#atribut_tambah_kriteria').val(),
                            'bobot': $('#bobot_tambah_kriteria').val(),
                            'periode': $('#periode_tambah_kriteria').val(),
                        },
                        success: function(response) {
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
                            }, 1000);
                        },
                        error: function(error) {
                            console.error(error.message);
                            // Lakukan tindakan lainnya jika diperlukan
                        }
                    });


                });




                // Ketika tombol edit diklik
                $('.btnEdit').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var kriteriaId = $(this).data('id');
                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $.ajax({
                        url: '/admin/kriteria/get-kriteria/' + kriteriaId,
                        method: 'GET',
                        dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                        success: function(data) {
                            // Update konten modal dengan data yang diterima


                            $('#id_kriteria').val(data.id);
                            $('#kriteria_kriteria').val(data.kriteria);
                            $('#atribut_kriteria').val(data.atribut);
                            $('#bobot_kriteria').val(data.bobot);
                            $('#periode_kriteria').val(data.periode);

                            $('#modalEditKriteria').modal('show');
                        },
                        error: function() {
                            console.log('Gagal mengambil data mahasiswa.');
                        }
                    });
                });


                // edit
                $('#btnModalEditKriteria').click(function() {
                    // JavaScript
                    $("#loading").css("display", "block");
                    $("#btnModalEditKriteria").remove();
                    $("#btnModalClose").remove();

                    kriteriaId = $('#id_kriteria').val();

                    $.ajax({
                        type: 'POST',
                        headers: {

                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                        },
                        url: `/admin/kriteria/update-kriteria/${kriteriaId}`,
                        data: {
                            '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                            'kriteria': $('#kriteria_kriteria').val(),
                            'atribut': $('#atribut_kriteria').val(),
                            'bobot': $('#bobot_kriteria').val(),
                            'periode': $('#periode_kriteria').val(),
                        },
                        success: function(response) {
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
                            }, 1000);
                        },
                        error: function(error) {
                            console.error(error.message);
                            // Lakukan tindakan lainnya jika diperlukan
                        }
                    });
                })


                $('.btnHapus').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var kriteriaId = $(this).data('id');
                    console.log(kriteriaId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $('#confirmHapus').click(function() {
                        $.ajax({
                            url: '/admin/kriteria/delete/' + kriteriaId,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: 'post',
                            dataType: 'json',
                            success: function(data) {

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
                                console.error('Error deleting kriteria:', error
                                    .responseJSON);
                            }
                        });
                    })
                });
            });
        </script>
    @endpush


@endsection
