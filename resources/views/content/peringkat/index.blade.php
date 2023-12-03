@extends('layouts.blankLayout')

@section('title', 'Peringkat')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3"><button class="btn btn-sm btn-secondary">Start</button></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-3">
                        <button class="btn btn-sm btn-secondary">Export</button>
                        <button class="btn btn-sm btn-secondary">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection