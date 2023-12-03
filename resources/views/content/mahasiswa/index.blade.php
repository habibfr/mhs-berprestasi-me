@extends('layouts/blankLayout')

@section('title', 'Mahasiswa')

@section('content')
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <div id="floatingInputHelp mb-2" class="form-text">Filter by jurusan dan angkatan</div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-danger dropdown-toggle px-3" data-bs-toggle="dropdown"
                        aria-expanded="false">S1 Sistem Informasi</button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">D3 Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Teknik Komputer</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Desain Komunikasi Visual</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Manajemen</a></li>
                    </ul>

                    <input class="form-control mx-2 btn-outline-danger" type="number" min="2015" max="2023"
                        step="1" value="2021" id="year-filter">
                </div>
                <button type="button" class="btn btn-danger ">Filter</button>
            </div>

        </div>
        <div class="col">
            <div class="float-end">

                <div id="floatingInputHelp mb-2" class="form-text">Import excel</div>
                <button type="button" class="btn btn-danger">Import</button>
            </div>
        </div>
    </div>

    {{-- <button class="btn btn-secondary mb-4">Import</button> --}}

    {{-- <div class="row">
        <div class="col">
            <div class="mb-3">
                <div id="floatingInputHelp mb-2" class="form-text">Filter by jurusan dan angkatan</div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-info dropdown-toggle px-3" data-bs-toggle="dropdown"
                        aria-expanded="false">S1 Sistem Informasi</button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">D3 Sistem Informasi</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Teknik Komputer</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Desain Komunikasi Visual</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0);">S1 Manajemen</a></li>
                    </ul>

                    <input class="form-control mx-2 btn-outline-info" type="number" min="2015" max="2023"
                        step="1" value="2021" id="year-filter">
                </div>
                <button type="button" class="btn btn-info ">Filter</button>
            </div>

        </div>
        <div class="col">
            <div class="float-end">

                <div id="floatingInputHelp mb-2" class="form-text">Import excel</div>
                <button type="button" class="btn btn-info">Import</button>
            </div>
        </div>
    </div> --}}



    <!-- Basic Bootstrap Table -->
    <div class="card">

        <div class="row">
            <div class="col">
                <h5 class="card-header">Table Mahasiswa</h5>
            </div>
            <div class="col">
                <div class="float-end">
                    <div class="navbar-nav align-items-center card-header">
                        <div class="nav-item d-flex align-items-center">
                            <i class="bx bx-search fs-4 lh-0"></i>
                            <input type="text" class="form-control border-0  shadow-none ps-1 ps-sm-2"
                                placeholder="Search..." aria-label="Search...">
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>IPK</th>
                        <th>SSKM</th>
                        <th>TOEFL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>21410100099</td>
                        <td>Albert Cooking</td>
                        <td> 3.98 </td>
                        <td>250</td>
                        <td>500</td>
                        <td>
                            <div class="inline">
                                <span class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                        class="bx bx-edit-alt bx-sm me-2"></i>
                                </span>
                                <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                        class="bx bx-trash bx-sm me-2"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>21410100098</td>
                        <td>Albert Cooking</td>
                        <td> 3.98 </td>
                        <td>250</td>
                        <td>500</td>
                        <td>
                            <div class="inline">
                                <span class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                        class="bx bx-edit-alt bx-sm me-2"></i>
                                </span>
                                <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                        class="bx bx-trash bx-sm me-2"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>21410100099</td>
                        <td>Albert Cooking</td>
                        <td> 3.98 </td>
                        <td>250</td>
                        <td>500</td>
                        <td>
                            <div class="inline">
                                <span class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                        class="bx bx-edit-alt bx-sm me-2"></i>
                                </span>
                                <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                        class="bx bx-trash bx-sm me-2"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>21410100099</td>
                        <td>Albert Cooking</td>
                        <td> 3.98 </td>
                        <td>250</td>
                        <td>500</td>
                        <td>
                            <div class="inline">
                                <span class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                        class="bx bx-edit-alt bx-sm me-2"></i>
                                </span>
                                <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                        class="bx bx-trash bx-sm me-2"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>21410100099</td>
                        <td>Albert Cooking Rotixyzyzyzyz</td>
                        <td> 3.98 </td>
                        <td>250</td>
                        <td>500</td>
                        <td>
                            <div class="inline">
                                <span class="text-success" data-bs-toggle="modal" data-bs-target="#modalEditMhs"><i
                                        class="bx bx-edit-alt bx-sm me-2"></i>
                                </span>
                                <span class="text-danger" data-bs-toggle="modal" data-bs-target="#modalHapusMhs"><i
                                        class="bx bx-trash bx-sm me-2"></i>
                                    </a>
                            </div>
                        </td>
                    </tr>

                    {{-- <tr>
                        <td><i class="bx bxl-bootstrap bx-sm text-primary me-3"></i> <span class="fw-medium">Bootstrap
                                Project</span></td>
                        <td>Jerry Milton</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                    <img src="{{ asset('assets/img/avatars/5.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                                    <img src="{{ asset('assets/img/avatars/6.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="Christina Parker">
                                    <img src="{{ asset('assets/img/avatars/7.png') }}" alt="Avatar"
                                        class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-warning me-1">Pending</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>


            {{-- modal edit --}}
            <div class="modal fade" id="modalEditMhs" data-bs-backdrop="static" tabindex="-1" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Edit Mahasiswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                    <input type="email" id="emailBasic" class="form-control"
                                        placeholder="xxxx@xxx.xx">
                                </div>
                                <div class="col mb-0">
                                    <label for="dobBasic" class="form-label">DOB</label>
                                    <input type="date" id="dobBasic" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete this??</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Iya</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/ Basic Bootstrap Table -->



@endsection
