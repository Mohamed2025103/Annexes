@extends('layouts.app')

@section('content')
<div class="relative">
    <img src="{{ asset('/public/images/accueil.jpg') }}" alt="Accueil" class="w-full h-auto">
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center">
        <h1 class="text-4xl font-bold">Bienvenue sur notre site</h1>
        <p class="text-lg">Explorez les actualités royales et bien plus.</p>
    </div>
</div>
@endsection
