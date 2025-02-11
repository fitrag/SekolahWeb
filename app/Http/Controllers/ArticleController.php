<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($id)
    {
        // Mengambil artikel berdasarkan ID
        $article = Article::findOrFail($id);

        // Mengambil artikel terkait (misalnya berdasarkan kategori atau acak)
        $relatedArticles = Article::where('id', '!=', $article->id) // Tidak termasuk artikel saat ini
            ->where('is_published', true) // Hanya artikel yang dipublikasikan
            ->take(5) // Ambil 5 artikel terkait
            ->get();

        // Jika ingin berdasarkan kategori (opsional)
        // Pastikan model Article memiliki kolom `category_id` atau atribut serupa
        // $relatedArticles = Article::where('category_id', $article->category_id)
        //     ->where('id', '!=', $article->id)
        //     ->where('is_published', true)
        //     ->take(5)
        //     ->get();

        return view('articles.show', compact('article', 'relatedArticles'));
    }
}