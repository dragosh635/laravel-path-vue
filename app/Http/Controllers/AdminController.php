<?php

namespace App\Http\Controllers;

use App\Models\Category;

class AdminController extends Controller
{
    /**
     * Show all categories
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function menu()
    {
        $categories = Category::orderBy('display_order')->get();

        return view('admin.menu-editor', [
            'categories' => $categories
        ]);
    }
}
