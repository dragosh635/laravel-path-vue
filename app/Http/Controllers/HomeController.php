<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $categories = Category::orderBy( 'display_order' )->get();

        return view( 'home', [
            'categories' => $categories,
        ] );
    }

    /**
     * Show the menu
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function menu() {
        $categories = Category::with( 'menuItems' )
                              ->orderBy( 'display_order' )
                              ->get();

        return view( 'menu', [
            'categories' => $categories,
        ] );
    }
}
