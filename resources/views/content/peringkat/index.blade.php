@extends('layouts.blankLayout')

@section('title', 'Peringkat')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h6>Peringkatan</h6>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-sm btn-secondary">Start</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12">
                                <h6>Sorting</h6>
                            </div>
                            <div class="col-12">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      10
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">10</a></li>
                                        <li><a class="dropdown-item" href="#">20</a></li>
                                        <li><a class="dropdown-item" href="#">30</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 offset-7 align-self-end">
                <button class="btn btn-sm btn-secondary align-self-end">Export</button>
                <button class="btn btn-sm btn-secondary align-self-end">Post</button>
            </div>
        </div>

        {{-- Table Peringkat --}}
        <!-- Basic Bootstrap Table -->
        <div class="card">
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
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                <tr>
                    <td>1</td>
                    <td>XXXXXXXXXXX</td>
                    <td>Muhammad Haris</td>
                    <td>4.0</td>
                    <td>200</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>XXXXXXXXXXX</td>
                    <td>Muhammad Maulana</td>
                    <td>3.9</td>
                    <td>200</td>
                    <td>510</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>XXXXXXXXXXX</td>
                    <td>Muhammad Kholiq</td>
                    <td>3.87</td>
                    <td>220</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>XXXXXXXXXXX</td>
                    <td>Muhammad Abi</td>
                    <td>3.85</td>
                    <td>200</td>
                    <td>500</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>XXXXXXXXXXX</td>
                    <td>Muhammad Ansyah</td>
                    <td>3.8</td>
                    <td>200</td>
                    <td>505</td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    <!--/ Basic Bootstrap Table -->
    </div>
@endsection