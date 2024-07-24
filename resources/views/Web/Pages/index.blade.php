@extends('Web.Layouts.main')
@section('title', 'Home')
@section('styles')

@endsection
@section('content')
<x-pre-loader />


@include('Web.Sections.navbar')
@include('Web.Sections.header')
@include('Web.Sections.content-card')
@include('Web.Sections.product-list-area')
@include('Web.Sections.recent-product')
@include('Web.Sections.feature')
@include('Web.Sections.client-logo')
@include('Web.Sections.subscribe')
@include('Web.Sections.footer')

    @endsection
    @section('scripts')


@endsection


<body>











</body>

</html>
