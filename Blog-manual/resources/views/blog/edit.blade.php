@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 text-left">
    <div class=" py-15" >
        <h1 class="text-6xl">
            Update Posts
        </h1>
    </div>
</div>

{{-- se ci sono degli errori gli printa mostrando cosa é accaduto --}}
@if ($errors->any())
<div class="m-auto w-4/5">
    <ul>
        @foreach ($errors->all() as $error )
            <li class=" text-center w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                {{ $error }}
            </li>
        @endforeach
    </ul>
</div>
@endif

{{-- form performa azione di tipo post in direzione blog/{{ $post->slug }} con enctype="multipart/form-data" dico ad app che aggiungo dati 
e token csrf importante per sicurezza, aggiungo method put perché é il metodo di cui ho bisogno per editare --}}
<div class="w-4/5 m-auto pt-20">
    <form action="/blog/{{ $post->slug }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- input type text con name title(deve corrispondere a colonna che voglio popolare, value deve corrispondere a colonna da editare --}}
    <input type="text" 
    name="title" 
    value="{{ $post->title }}"
    class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
    {{-- textarea name corrisponde con colonna che voglio popolare, textarea non puó avere value quindi uso --}}
    <textarea name="description" 
    placeholder="Description..." 
    class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea>

    {{-- <div class="bg-grey-lighter pt-15">
        <label class="w-44 flex flex-col items-center 
                      px-2 py-3 bg-white-rounded-lg 
                      shadow-lg tracking-wide uppercase 
                      border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                input per caricare img tipo file e name nome colonna dove lo aggiungo
                <input type="file"
                       name="image"
                       class="hidden">
        </label>
    </div> --}}
    {{-- btn per inviare deve essere type submit --}}
    <button
    type="submit"
    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
    Submmit Post
    </button>

    </form>
</div>

@endsection