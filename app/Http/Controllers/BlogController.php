<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    // Menampilkan daftar blog
    public function index(Request $request)
    {
        $search = $request->search;

        if ($search) {
            $blogs = DB::table('blogs')->where('title', 'like', "%{$search}%")->paginate(3);
        } else {
            $blogs = DB::table('blogs')->paginate(3);
        }
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

        if (!$blog) {
            abort(404, 'Blog not found');
        }

        return view('blog.show', ['blog'=> $blog]);
    }

    // Menampilkan form untuk mengedit blog
    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();

        if (!$blog) {
            abort(404, 'Blog not found');
        }

        return view('blog.edit', compact('blog'));
    }

    // Mengupdate blog berdasarkan ID
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Blog::find($id);

        if (!$blog) {
            abort(404, 'Blog not found');
        }

        $blog->update($validatedData);

        return redirect("/blogs/{$id}")->with('success', 'Blog updated successfully!');
    }

    // Menghapus blog berdasarkan ID
    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            abort(404, 'Blog not found');
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
    }
}
