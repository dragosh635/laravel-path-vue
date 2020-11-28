<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuItemPost;
use App\Models\MenuItem;

class MenuItemController extends Controller {
    /**
     * Store a new menu item
     *
     * @param MenuItemPost $request
     */
    public function store( MenuItemPost $request ) {
        MenuItem::create( $request->validated() );
    }

    /**
     * Update a menu item
     *
     * @param MenuItemPost $request
     * @param MenuItem $menuItem
     */
    public function update( MenuItemPost $request, MenuItem $menuItem ) {
        $menuItem->update( $request->validated() );
    }
}
