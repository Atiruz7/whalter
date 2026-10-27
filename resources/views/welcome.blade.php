@extends('layouts.app')

@section('content')
    {{-- 2. Hero principal con WALTHER, el nombre del creador y los cinco pilares --}}
    @include('sections.hero')

    {{-- 3. Identidad de la marca --}}
    @include('sections.identidad')

    {{-- 4. Misión, visión y propósito --}}
    @include('sections.mision-vision')

    {{-- 5. Valores de WALTHER --}}
    @include('sections.valores')

    {{-- 6. Los cinco pilares de contenido --}}
    @include('sections.pilares')

    {{-- 7 & 8. Público objetivo y propuesta de valor --}}
    @include('sections.propuesta')

    {{-- 9. Objetivos de la marca --}}
    @include('sections.objetivos')

    {{-- 10 & 11. Frase central y mensaje de marca --}}
    @include('sections.mensaje')

    {{-- 12. Presentación personal del creador --}}
    @include('sections.sobre-mi')

    {{-- 13. Compromiso con la audiencia e invitación --}}
    @include('sections.compromiso')

    {{-- 14. Hero 2: “Conversemos y tomemos un café” con video y WhatsApp --}}
    @include('sections.hero2')

    {{-- 15. Carrusel de productos y servicios (visible solo si hay productos activos) --}}
    @include('sections.products')
@endsection
