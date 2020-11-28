<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Display a list of categories
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $this->authorize( 'manage', Category::class );

        $categories = Category::orderBy( 'display_order' )->get();

        return view( 'admin.categories.index', [
            'categories' => $categories,
        ] );
    }

    /**
     * Create or update a category
     *
     * @param Request $request
     *
     * @return array
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function upsert( Request $request ) {
        $this->authorize( 'manage', Category::class );

        $categories = $request->post( 'categories' );
        foreach ( $categories as $category ) {
            if ( $category['id'] ) {
                Category::where( 'id', $category['id'] )->update( $category );
            } else {
                Category::create( $category );
            }
        }

        return [ 'success' => true, 'categories' => Category::all() ];
    }

    /**
     * Return only the menu items for a specific category
     * TODO move this inside the category model
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function items( Category $category ) {
        return $category->menuItems->map( function ( $item ) {
            return $item->only( [ 'id', 'name' ] );
        } );
    }

    /**
     * Delete a category
     *
     * @param \App\Models\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category ) {
        $this->authorize( 'delete', $category );
        $category->delete();

        return [ 'success' => true ];
    }
}
