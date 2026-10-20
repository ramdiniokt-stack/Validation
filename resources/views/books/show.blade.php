@extends('layouts.app')
@section('title', $book->title)

@section('content')
    <h2>{{ $book->title }}</h2>
    <p>Penulis: {{ $book->author }}</p>
    <p>Tahun: {{ $book->year }}</p>
    <p>Stok: {{ $book->stock }}</p>
    <a href="{{ route('books.index') }}">Kembali</a>
@endsection