<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate($this->rules(), $this->messages());

    Book::create($validated);

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
{
    $validated = $request->validate($this->rules($book), $this->messages());

    $book->update($validated);

    return redirect()
        ->route('books.index')
        ->with('success', 'Data buku berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function rules(?Book $book = null): array
{
    return [
        'title' => [
            'required', 'string', 'min:3', 'max:255',
            Rule::unique('books', 'title')->ignore($book?->id),
        ],
        'author' => [
            'required', 'string', 'max:255',
            'regex:/^[\pL\s.\'-]+$/u',
        ],
        'year' => [
            'required', 'integer', 'digits:4',
            'between:1900,' . date('Y'),
        ],
        'stock' => ['required', 'integer', 'min:0', 'max:1000'],
    ];
}

private function messages(): array
{
    return [
        'title.required' => 'Judul buku wajib diisi.',
        'title.min'      => 'Judul buku minimal :min karakter.',
        'title.max'      => 'Judul buku maksimal :max karakter.',
        'title.unique'   => 'Judul buku sudah terdaftar.',

        'author.required' => 'Nama penulis wajib diisi.',
        'author.regex'    => 'Nama penulis hanya boleh berisi huruf, spasi, titik, apostrof, dan tanda hubung.',

        'year.required' => 'Tahun terbit wajib diisi.',
        'year.integer'  => 'Tahun terbit harus berupa angka bulat.',
        'year.digits'   => 'Tahun terbit harus terdiri dari 4 digit.',
        'year.between'  => 'Tahun terbit harus antara :min sampai :max.',

        'stock.required' => 'Stok wajib diisi.',
        'stock.integer'  => 'Stok harus berupa angka bulat.',
        'stock.min'      => 'Stok tidak boleh kurang dari :min.',
        'stock.max'      => 'Stok tidak boleh lebih dari :max.',
    ];
}
}
