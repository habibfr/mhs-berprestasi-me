@extends('layouts/commonMaster' )

@extends('_partials.navbar')

@section('layoutContent')

<div class="container">
    <!-- Content -->
    @yield('content')
    <!--/ Content -->
</div>

@endsection
