<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MenuUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    
        {
            $request->validated();
            $image = $request->file('image')->store('public/menus');
    
            $menu = Menu::create([
                'name'   => $request->input('name'),
                'description'  => $request->input('description'),
                'image' => $image,
                'price' => $request->input('price'),
                // 'category_id' => $request->input('category_id'),  
            ]);

            if ($request->has('categories')) {
                $menu->categories()->attach($request->categories);
            }
               
                Alert::success('Menus added successfully', 'Menus added successfully');
                return to_route('admin.menus.index');
        }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        $request->validated();

        $image = $menu->image;
        if ($request->hasFile('image')) {
            Storage::delete($menu->image);
            $image = $request->file('image')->store('public/menus');

        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'category_id' => $request->input('category_id'),  

        ]);

        Alert::success('Menu Updated successfully', 'Menu');
           return to_route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
         Storage::delete($menu->image);
         $menu->categories()->detach();
         $menu->delete();
         return to_route('admin.menus.index')->with('danger', 'Menus Deleted Succesfully');
    }
}
