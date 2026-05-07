<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'Email atau Password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        $reports = Report::with('category')->latest()->get();
        $categories = Category::all();
        $articles = Article::with('category')->latest()->get();

        return view('admin', compact('reports', 'categories', 'articles'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Category::create($request->all());
        return back()->with('category_success', 'Kategori berhasil ditambahkan!');
    }

    public function storeArticle(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url'
        ]);

        Article::create($request->all());
        return back()->with('article_success', 'Artikel berhasil dipublikasikan!');
    }

    public function storeResponse(Request $request, $report_id)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $report = Report::findOrFail($report_id);
        
        Response::create([
            'report_id' => $report->id,
            'message' => $request->message
        ]);

        $report->update(['status' => 'Ditanggapi']);

        return back()->with('success', 'Tanggapan Terkirim!');
    }
}
