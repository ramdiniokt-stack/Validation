@extends('layouts.app')
@section('title', 'Edit Buku')

@section('content')
    <h2>Edit Buku</h2>

    <form action="{{ route('books.update', $book) }}" method="POST" novalidate>
        @csrf
        @method('PUT')

        <div>
            <label for="title">Judul Buku</label>
            <input type="text" id="title" name="title" value="{{ old('title', $book->title) }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}">
            @error('author')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Tahun Terbit</label>
            <input type="text" id="year" name="year" value="{{ old('year', $book->year) }}">
            @error('year')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock">Stok</label>
            <input type="text" id="stock" name="stock" value="{{ old('stock', $book->stock) }}">
            @error('stock')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <p>
            <button type="submit">Update</button>
            <a href="{{ route('books.index') }}">Batal</a>
        </p>
    </form>
@endsection