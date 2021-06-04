@extends('layouts.app')

@section('content')
<div class="m-auto w-4/5 text-left">
    <div class=" py-15" >
        <h1 class="text-6xl">
            Create Posts
        </h1>
    </div>
</div>
{{-- form performa azione di tipo post in direzione blog con enctype="multipart/form-data" dico ad app che aggiungo dati etoken csrf importante per sicurezza --}}
<div class="w-4/5 m-auto pt-20">
    <form action="/blog"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    {{-- input type text con name title(deve corrispondere a colonna che voglio popolare) --}}
    <input type="text" 
    name="title" 
    placeholder="Title..." 
    class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none">
    {{-- textarea name corrisponde con colonna che voglio popolare --}}
    <textarea name="description" 
    placeholder="Description..." 
    class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>

    <div class="bg-grey-lighter pt-15">
        <label class="w-44 flex flex-col items-center 
                      px-2 py-3 bg-white-rounded-lg 
                      shadow-lg tracking-wide uppercase 
                      border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Select a file
                </span>
                {{-- input per caricare img tipo file e name nome colonna dove lo aggiungo --}}
                <input type="file"
                       name="image"
                       class="hidden">
        </label>
    </div>
    {{-- bottene per inviare deve essere type submit --}}
    <button
    type="submit"
    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
    Submmit Post
    </button>

    </form>
</div>

@endsection