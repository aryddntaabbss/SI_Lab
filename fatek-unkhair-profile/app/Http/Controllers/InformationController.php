<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class InformationController extends Controller
{
    public string $base;
    public string $storage;

    public function __construct()
    {
        $this->base = Config::get('app.api_url');
        $this->storage = Config::get('app.storage');
    }

    public function getSejarah()
    {
        $response = Http::get($this->base . '/api/sejarah');
        $response2 = Http::get($this->base . '/api/articles');
        $response3 = Http::get($this->base . '/api/categories');

        if ($response->successful()) {
            $data = $response->json();
            $article = $response2->json()['data'];
            $categories = $response3->json();

            foreach ($article as $index => $post) {
                $article[$index]['created_at'] = Carbon::parse($post['created_at'])->format('d F Y');
            }

            return view('pages.sejarah', [
                'data' => $data,
                'categories' => $categories,
                'side' => array_slice($article, 0, 6),
                'title' => $data['title'],
                'storage' => $this->storage,
                'gambar' => $this->storage . $data['image_path'],
                'tanggal' => Carbon::parse($data['created_at'])->format('d F Y')
            ]);
        } else {
            return response()->json(['error' => 'Gagal mengambil data.'], $response->status());
        }
    }

    public function getVisiMisi()
    {
        $response = Http::get($this->base . '/api/visi-misi');
        $response2 = Http::get($this->base . '/api/articles');
        $response3 = Http::get($this->base . '/api/categories');

        if ($response->successful()) {
            $data = $response->json();
            $article = $response2->json()['data'];
            $categories = $response3->json();

            foreach ($article as $index => $post) {
                $article[$index]['created_at'] = Carbon::parse($post['created_at'])->format('d F Y');
            }

            return view('pages.visi-misi', [
                'data' => $data,
                'categories' => $categories,
                'side' => array_slice($article, 0, 6),
                'title' => $data['title'],
                'storage' => $this->storage,
                'gambar' => $this->storage . $data['image_path'],
                'tanggal' => Carbon::parse($data['created_at'])->format('d F Y')
            ]);
        } else {
            return response()->json(['error' => 'Gagal mengambil data.'], $response->status());
        }
    }

    public function getTentang()
    {
        $response = Http::get($this->base . '/api/tentang');
        $response2 = Http::get($this->base . '/api/articles');
        $response3 = Http::get($this->base . '/api/categories');

        if ($response->successful()) {
            $data = $response->json();
            $article = $response2->json()['data'];
            $categories = $response3->json();

            foreach ($article as $index => $post) {
                $article[$index]['created_at'] = Carbon::parse($post['created_at'])->format('d F Y');
            }

            return view('pages.tentang', [
                'data' => $data,
                'categories' => $categories,
                'side' => array_slice($article, 0, 6),
                'title' => $data['title'],
                'storage' => $this->storage,
                'gambar' => $this->storage . $data['image_path'],
                'tanggal' => Carbon::parse($data['created_at'])->format('d F Y')
            ]);
        } else {
            return response()->json(['error' => 'Gagal mengambil data.'], $response->status());
        }
    }

    public function getStruktur()
    {
        $response = Http::get($this->base . '/api/struktur');
        $response2 = Http::get($this->base . '/api/categories');

        if ($response->successful()) {
            $data = $response->json();
            $categories = $response2->json();

            return view('pages.struktur', [
                'data' => $data,
                'categories' => $categories,
                'title' => $data['title'],
                'storage' => $this->storage,
                'gambar' => $this->storage . $data['image_path']
            ]);
        } else {
            return response()->json(['error' => 'Gagal mengambil data.'], $response->status());
        }
    }
}
