
@extends('layouts.app')

@section('content')
    {{-- Orden: hero principal, sección café/video y carrusel de servicios --}}
    @include('sections.hero')
    @include('sections.hero2')
    @include('sections.products')
@endsection
