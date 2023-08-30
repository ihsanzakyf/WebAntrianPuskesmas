@extends('layouts.main-layouts')

@section('title', 'Panduan')

@section('content')

<div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <h2 class="text-3xl font-semibold mb-4">Tanyakan kepada kami</h2>
    <p class="text-lg mb-4">Informasi lebih lanjut:</p>
    <p class="text-lg mb-8">Silakan hubungi kami melalui WhatsApp:</p>
    <a href="https://wa.me/+6288220625662?text=Haloo%2C%20Ihsan%20Medical%2C%20kami%20ingin%20bertanya" class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
      <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp Icon" class="w-6 h-6 mr-2">
      Hubungi Kami
    </a>
  </div>
  

<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.4/tailwind.min.css" integrity="sha512-ifsLB5FigXH07aADF1bmVX8B66KrNLZGT6RY9HPN3hTn9eaP+t16azYMAuULHZJy

@endsection
