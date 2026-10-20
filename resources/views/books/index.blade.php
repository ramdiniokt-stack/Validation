@extends('layouts.app')
@section('title', 'Daftar Buku')

@section('content')
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <p><a href="{{ route('books.create') }}">+ Tambah Buku</a></p>

    <table>
        <tr>
            <th>No</th><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Stok</th><th>Aksi</th>
        </tr>
        @forelse ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('books.show', $book) }}">Detail</a>
                    <a href="{{ route('books.edit', $book) }}">Edit</a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST"
                          style="display:inline"
                          onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Belum ada data buku.</td></tr>
        @endforelse
    </table>
@endsection