<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Menampilkan daftar blog
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index', compact('blogs'));
    }

    // Menampilkan form untuk membuat blog
    public function create()
    {
        return view('blog.create');
    }

    // Menyimpan blog baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Tetapkan nilai default untuk user_id
        $validatedData['user_id'] = Auth::id() ?? null;

        // Simpan data ke database
        Blog::create($validatedData);

        return redirect('/blogs')->with('success', 'Blog created successfully!');
    }

    // Menampilkan blog berdasarkan ID
    public function show($id)
    {
        $blog = DB::table('blogs')->where('id',$id)->first();
        return view('blog.show', ['blog'=> $blog]);
    }

    // Menampilkan form untuk mengedit blog
    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    // Mengupdate blog berdasarkan ID
    public function update(Request $request, Blog $blog)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Tetapkan nilai default untuk user_id
        $validatedData['user_id'] = Auth::id() ?? null;

        // Simpan data ke database
        Blog::create($validatedData);

        return redirect('/blogs')->with('success', 'Blog created successfully!');
    }

    // Menghapus blog berdasarkan ID
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}
