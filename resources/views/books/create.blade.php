@extends('layouts.app')
@section('title', 'Tambah Buku')

@section('content')
    <h2>Tambah Buku</h2>

    <form action="{{ route('books.store') }}" method="POST" novalidate>
        @csrf

        <div>
            <label for="title">Judul Buku</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="year">Tahun Terbit</label>
            <input type="text" id="year" name="year" value="{{ old('year') }}">
            @error('year')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock">Stok</label>
            <input type="text" id="stock" name="stock" value="{{ old('stock') }}">
            @error('stock')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <p>
            <button type="submit">Simpan</button>
            <a href="{{ route('books.index') }}">Batal</a>
        </p>
    </form>
@endsection