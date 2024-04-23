<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public string $base;
    public string $storage;

    public function __construct()
    {
        $this->base = Config::get('app.api_url');
        $this->storage = Config::get('app.storage');
    }

    public function index(Request $request)
    {
        $response = Http::get($this->base . '/api/articles');
        $response2 = Http::get($this->base . '/api/categories');

        if (!$response->successful()) {
            return response()->json(['error' => 'Gagal mengambil data.'], $response->status());
        }

        $data = $this->formatArticles($response->json()['data']);
        $categories = $response2->json();

        $mainArticle = array_slice($data, 0, 1);
        $articles = array_slice($data, 1);
        $categories = $categories;
        $side = array_slice($data, 0, 6);
        $hero = array_slice($data, 0, 5);
        $storage = $this->storage;

        if ($request->ajax()) {
            $res = Http::get($this->base . '/api/articles', ['page' => $request->page]);
            $data = $this->formatArticles($res->json()['data']);

            $view = view('components.articles-data', compact('data', 'storage'))->render();

            // Menentukan apakah halaman berikutnya tersedia
            $nextPage = $res->json()['links']['next'];
            $hasNextPage = !is_null($nextPage);

            return response()->json(['html' => $view, 'hasNextPage' => $hasNextPage]);
        }

        return view('index', compact('mainArticle', 'articles', 'data', 'categories', 'side', 'hero', 'storage'))
            ->with('title', "DPW LDII MALUT - Beranda");
    }

    private function formatArticles($articles)
    {
        foreach ($articles as $index => $post) {
            $articles[$index]['created_at'] = Carbon::parse($post['created_at'])->format('d F Y');
        }

        return $articles;
    }
}
