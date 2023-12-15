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
        <div class="col">
            <div class="mb-3">
                <div>
                    <small id="" class="">Filter by jurusan dan angkatan</small>
                </div>
                <form action="{{ route('mahasiswa.filter') }}" method="GET">
                    @csrf
                    <div class="btn-group">
                        <select id="defaultSelect" class="form-select btn-outline-primary" name="jurusan">
                            <option value="0">Pilih Jurusan</option>
                            <option value="1">Sistem Infromasi</option>
                            <option value="2">S1 Desain Komunikasi Visual</option>
                            <option value="3">S1 Teknik Komputer</option>
                        </select>


                        <input class="form-control mx-2 btn-outline-primary w-50" autocomplete="off" name="angkatan"
                            min="2015" max="2023" id="year-filter" placeholder="Pilih Tahun">


                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

            </div>

        </div>
        <div class="col">
            <div class="float-end">

                {{-- <div id="floatingInputHelp mb-2" class="form-text">Import excel</div>
                <button type="button" class="btn btn-danger">Import</button> --}}

                <form action="{{ route('mahasiswa.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <small class=" mx-2">{{ __('Please upload only Excel (.xlsx or .xls) files') }}</small>
                        <div class="input-group">
                            <input type="file" required class="form-control mx-2" name="uploaded_file"
                                id="uploaded_file">
                            @if ($errors->has('uploaded_file'))
                                <p class="text-right mb-0">
                                    <small class="danger text-muted"
                                        id="file-error">{{ $errors->first('uploaded_file') }}</small>
                                </p>
                            @endif
                            <div class="input-group-append" id="button-addon2">
                                <button class="btn btn-primary square" type="submit"><i class="ft-upload mr-1"></i>
                                    Upload</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    {{-- Tabel Mahasiswa --}}
    <div class="card">
        <div class="table-responsive text-nowrap m-4">
            <table id="tabelMahasiswa" class="table table-striped dataTable" style="width: 100%;"
                aria-describedby="tabelMahasiswa_info">
                <thead>
                    <tr class="table-primary">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelMahasiswa" aria-sort="ascending"
                            aria-label="No: activate to sort column descending" style="width: 0px;">No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="NIM: activate to sort column ascending" style="width: 66px;">NIM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Nama: activate to sort column ascending" style="width: 132px;">Nama</th>

                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Email: activate to sort column ascending" style="width: 132px;">Email</th>

                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Prodi: activate to sort column ascending" style="width: 132px;">Prodi</th>

                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Alamat: activate to sort column ascending" style="width: 132px;">Alamat</th>

                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="No Hp: activate to sort column ascending" style="width: 132px;">No HP</th>

                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Action: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $mahasiswa)
                        {{-- @dd($mahasiswa->nilai->IPK) --}}
                        {{-- {{ dd($data) }} --}}
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $mahasiswa->nim ?? '' }}</td>
                            <td>{{ $mahasiswa->nama ?? '' }}</td>
                            <td>{{ $mahasiswa->email ?? '' }}</td>
                            <td>{{ $mahasiswa->jurusan ?? '' }}</td>
                            <td>{{ $mahasiswa->alamat ?? '' }}</td>
                            <td>{{ $mahasiswa->no_hp ?? '' }}</td>
                            <td>
                                <div class="inline">
                                    <span data-id="{{ $mahasiswa->id }}" class="text-success btnEdit"
                                        data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                            class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
                                    <span data-id="{{ $mahasiswa->id }}" class="text-danger btnHapus"
                                        data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                            class="bx bx-trash bx-sm me-2"></i>
                                        </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>Maaf data masih kosong!</p>
                    @endforelse
                </tbody>
                {{-- <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">No</th>
                    <th colspan="1">NIM</th>
                    <th colspan="1">Nama</th>
                    <th colspan="1">IPK</th>
                    <th colspan="1">SSKM</th>
                    <th colspan="1">TOEFL</th>
                    <th colspan="1">Action</th>
                </tr>
            </tfoot> --}}
            </table>

        </div>
    </div>
    {{-- End Tabel Mahasiswa --}}

    {{-- modal edit --}}
    <div class="modal fade" id="modalEditMhs" data-bs-backdrop="static" tabindex="-1" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="labelEditMhs">Edit Data Mahasiswa</h5>
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
                                <label for="nim_mhs" class="form-label">NIM</label>
                                <input type="text" id="nim_mhs" class="form-control" placeholder="21410100050"
                                    aria-label="Last name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="nama_mhs" class="form-label">Name</label>
                                <input type="text" id="nama_mhs" class="form-control" placeholder="Enter Name"
                                    required>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="email_mhs" class="form-label">Email</label>
                                <input type="email" id="email_mhs" class="form-control" placeholder="xxxx@xxx.xx"
                                    required>
                            </div>
                            <div class="col mb-3">
                                <label for="jurusan_mhs" class="form-label">Jurusan</label>
                                <select id="jurusan_mhs" class="form-select" name="jurusan_mhs" required>
                                    <option>Pilih Jurusan</option>
                                    <option value="1">S1 Sistem Infromasi</option>
                                    <option value="2">S1 Desain Komunikasi Visual</option>
                                    <option value="3">S1 Teknik Komputer</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col mb-3">
                                <label for="alamat_mhs" class="form-label">Domisili</label>
                                <input type="text" id="alamat_mhs" class="form-control" placeholder="Surabaya"
                                    name="alamat_mhs">
                            </div>
                            <div class="col mb-3">
                                <label for="no_hp_mhs" class="form-label">No Hp</label>
                                <input type="text" id="no_hp_mhs" class="form-control" placeholder="+6281234123123"
                                    name="no_hp_mhs">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="btnModalEditMhs">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    {{-- modal confirm delete --}}
    <div class="modal fade" id="modalHapusMhs" data-bs-backdrop="static" tabindex="-1" style="display: none;"
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

                $('#year-filter').datepicker({
                    minViewMode: 2,
                    autoclose: true,
                    startDate: "2015",
                    endDate: "2022",
                    format: 'yyyy'
                });
                $('#tabelMahasiswa').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',

                });

                // $('.dataTables_length').addClass('bs-select');

                const dataJurusan = [
                    "S1 Sistem Informasi",
                    "S1 Desain Komunikasi Visual",
                    "S1 Teknik Komputer"
                ];

                // Ketika tombol edit diklik
                $('.btnEdit').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var mahasiswaId = $(this).data('id');
                    // console.log(mahasiswaId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $.ajax({
                        url: '/mahasiswa/get-mahasiswa/' + mahasiswaId,
                        method: 'GET',
                        dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                        success: function(data) {
                            // console.log(data);
                            // Update konten modal dengan data yang diterima
                            $('#id_mhs').val(data.id);
                            $('#nim_mhs').val(data.nim);
                            $('#nama_mhs').val(data.nama);
                            $('#jurusan_mhs').val(dataJurusan.indexOf(data.jurusan) + 1);
                            $('#email_mhs').val(data.email);
                            $('#alamat_mhs').val(data.alamat);
                            $('#no_hp_mhs').val(data.no_hp);
                            // Tampilkan modal
                            $('#modalEditMhs').modal('show');
                        },
                        error: function() {
                            console.log('Gagal mengambil data mahasiswa.');
                        }
                    });
                });


                $('#btnModalEditMhs').click(function() {
                    // JavaScript
                    $("btnModalEditMhs").attr("disabled", true);
                    mahasiswaId = $('#id_mhs').val();

                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: `/mahasiswa/update-mahasiswa/${mahasiswaId}`,
                        data: {
                            '_token': '{{ csrf_token() }}', // Pastikan mengirim token CSRF
                            'nim': $('#nim_mhs').val(),
                            'nama': $('#nama_mhs').val(),
                            'email': $('#email_mhs').val(),
                            'jurusan': dataJurusan[$('#jurusan_mhs').val() - 1],
                            'alamat': $('#alamat_mhs').val(),
                            'no_hp': $('#no_hp_mhs').val(),
                        },
                        success: function(response) {
                            // $('#modalEditMhs').modal('hide');
                            $("#btnModalEditMhs").hide();
           
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
                })


                $('.btnHapus').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var mahasiswaId = $(this).data('id');
                    // console.log(mahasiswaId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $('#confirmHapus').click(function() {
                        $.ajax({
                            url: '/mahasiswa/delete/' + mahasiswaId,
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
                                console.error('Error deleting mahasiswa:', error
                                    .responseJSON);
                            }
                        });
                    })
                });
            });
        </script>
    @endpush


@endsection
