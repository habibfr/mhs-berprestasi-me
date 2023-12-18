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

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Ranking</h4>

    <div id="your-alert-container"></div>

    <div class="text-center" id="loading" style="display: none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div>
            <small>Sedang melakukan proses hitung...</small>
        </div>
    </div>

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
                            aria-label="SSKM: activate to sort column ascending" style="width: 55px;">Skor
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="tabelMahasiswa" aria-sort="ascending"
                            aria-label="No: activate to sort column descending" style="width: 0px;">Ranking
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $key => $ranking)
                        {{-- @dd($mahasiswa->nilai->IPK) --}}
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $ranking->mahasiswa->nim ?? '' }}</td>
                            <td>{{ $ranking->mahasiswa->nama ?? '' }}</td>
                            <td>{{ $ranking->skor ?? 0 }}</td>
                            <td>{{ $key ?? 0 }}</td>
                        </tr>
                    @empty
                        <p>Maaf data masih kosong!</p>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
    {{-- End Tabel Mahasiswa --}}


    {{-- <div class="modal fade hide" id="backDropModal" data-bs-backdrop="static" tabindex="-1" style="display: block;"
        aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Name</label>
                            <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBackdrop" class="form-label">Email</label>
                            <input type="email" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx">
                        </div>
                        <div class="col mb-0">
                            <label for="dobBackdrop" class="form-label">DOB</label>
                            <input type="date" id="dobBackdrop" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div> --}}



    @push('pricing-script')
        <script>
            $(document).ready(function() {
                $('#tabelMahasiswa').DataTable({
                    pageLength: 5,
                    lengthMenu: [3, 5, 10, 20],
                    pagingType: 'full_numbers',
                });

            });

            $('#btnProsesHitung').click(function() {
                $("#loading").css("display", "block");
            })
        </script>
    @endpush


@endsection
