@extends('layouts/blankLayout')

@section('title', 'Mahasiswa')

@section('vendor-style')
    {{-- Page Css files --}}
    <link href="{{ url('https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('vendor-script')
    {{-- vendor files --}}
    <script src="{{ url('https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js') }}"></script>
@endsection

@section('content')

    {{-- success upload --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            This is a success dismissible alert — check it out!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <br>
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


    <div class="row">
        <div class="col">
            <div class="mb-3">
                <div>
                    <small id="" class="">Filter by jurusan dan angkatan</small>
                </div>
                <form action="{{ route('mahasiswa.filter') }}" method="GET">
                    @csrf
                    <div class="btn-group">
                        <select id="defaultSelect" class="form-select btn-outline-secondary" name="jurusan">
                            <option value="0">Pilih Jurusan</option>
                            <option value="1">Sistem Infromasi</option>
                            <option value="2">S1 Desain Komunikasi Visual</option>
                            <option value="3">S1 Teknik Komputer</option>
                        </select>


                        <input class="form-control mx-2 btn-outline-secondary" name="angkatan" type="number" min="2015"
                            max="2023" step="1" id="year-filter">


                    </div>
                    <button type="submit" class="btn btn-secondary ">Filter</button>
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
                                <button class="btn btn-secondary square" type="submit"><i class="ft-upload mr-1"></i>
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
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelMahasiswa" rowspan="1"
                            colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending"
                            style="width: 86px;">No
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Position: activate to sort column ascending" style="width: 132px;">NIM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Office: activate to sort column ascending" style="width: 66px;">Nama</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Age: activate to sort column ascending" style="width: 26px;">IPK</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Start date: activate to sort column ascending" style="width: 53px;">SSKM
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Salary: activate to sort column ascending" style="width: 55px;">TOEFL</th>
                        <th class="sorting" tabindex="0" aria-controls="tabelMahasiswa" colspan="1"
                            aria-label="Salary: activate to sort column ascending" style="width: 55px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $mahasiswa)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $mahasiswa->nim }}</td>
                            <td>{{ $mahasiswa->nama }}</td>
                            <td>{{ $mahasiswa['nilai']->IPK }}</td>
                            <td>{{ $mahasiswa['nilai']->SSKM }}</td>
                            <td>{{ $mahasiswa['nilai']->TOEFL }}</td>
                            <td>
                                <div class="inline">
                                    <span data-id="{{ $mahasiswa->id }}" class="text-success btnEdit"
                                        data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                            class="bx bx-edit-alt bx-sm me-2"></i>
                                    </span>
                                    <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Name</label>
                            <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBasic" class="form-label">Email</label>
                            <input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
                        </div>
                        <div class="col mb-0">
                            <label for="dobBasic" class="form-label">DOB</label>
                            <input type="date" id="dobBasic" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Save changes</button>
                </div>
            </div>
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
                    <button type="button" class="btn btn-danger">Iya</button>
                </div>
            </form>
        </div>
    </div>

    @push('pricing-script')
        <script>
            $(document).ready(function() {
                $('#tabelMahasiswa').DataTable();

                // Ketika tombol edit diklik
                $('.btnEdit').click(function() {
                    // Ambil data-id dari tombol edit mahasiswa
                    var mahasiswaId = $(this).data('id');
                    console.log(mahasiswaId);

                    // Lakukan permintaan Ajax untuk mendapatkan data mahasiswa berdasarkan ID
                    $.ajax({
                        url: '/mahasiswa/get-mahasiswa/' + mahasiswaId,
                        method: 'GET',
                        dataType: 'json', // Tentukan bahwa kita mengharapkan respons JSON
                        success: function(data) {

                            console.log(data);
                            // Update konten modal dengan data yang diterima
                            $('#nameBasic').val(data
                                .nama); // Misalnya, sesuaikan dengan properti yang sesuai
                            $('#emailBasic').val(data.email);
                            // Tambahkan pengaturan nilai untuk properti lainnya

                            // Tampilkan modal
                            $('#modalEditMhs').modal('show');
                        },
                        error: function() {
                            console.log('Gagal mengambil data mahasiswa.');
                        }
                    });
                });
            });
        </script>
    @endpush


@endsection
