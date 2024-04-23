<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class MainLayout extends Component
{
    public string $title;
    public array $categories;

    /**
     * Create a new component instance.
     *
     * @param string $title
     */
    public function __construct($title = 'DPW LDII MALUT')
    {
        $this->title = $title;
        $this->categories = $this->getCategories();
    }

    /**
     * Get categories from API (you may need to adjust the actual API endpoint)
     *
     * @return array
     */
    private function getCategories(): array
    {
        $base = Config::get('app.api_url');
        $response = Http::get($base . '/api/categories');

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd($this->categories);   
        return view('layouts.main-layout')->with('categories', $this->categories);
    }
}
