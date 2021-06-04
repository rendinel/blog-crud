@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 text-center">
    <div class="border-b py-15 border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>
{{-- Aggiungo if per controllare se utente é loggato e registrato altrimenti non puó aggiungere post --}}
@if(Auth::check())
<div class="pt-15 w-4/5 m-auto">
    <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
        Create post
    </a>
</div>
@endif

{{-- Creo ciclo che cicla variabile posts definita dentro postcontroller index e printa title {{ $post->title }}, userbane prendendolo dalla table user {{ $post->user->name }}
data di creazione definisco formato data e converto stringa in tempo {{ date('jS M Y', strtotime($post->updated_at)) }} e link lo rendo reattivo dandogli href con slug
href="/blog/{{ $post->slug }} --}}
@foreach ($posts as $post )
    
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img width="700px" src="https://cdn.pixabay.com/photo/2014/05/03/01/03/laptop-336704_960_720.jpg" alt="">
        </div>

        <div>
            <h2 class="text-gray-700 font-bols text-5xl pb-4">
                {{ $post->title }}
            </h2>
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">
                    {{ $post->user->name }}
                </span> Created pn {{ date('jS M Y', strtotime($post->updated_at)) }}
            </span>
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>
            <a class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" href="/blog/{{ $post->slug }}">
                Keep reading
            </a>
        </div>
    </div>
@endforeach
@endsection