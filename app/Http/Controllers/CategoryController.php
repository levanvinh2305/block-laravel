<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index_add(){
        $categories = category::all();
        return view('category.category_list', compact('categories'));
    }

    public function store_add(Request $rq ){
        $cat = new category();
        $cat->name = $rq->post('name');
        $cat->birth_year = $rq->post('birth_year');
        $cat->birthplace = $rq->post('birthplace');
        $cat->save();
        return redirect()->route('category_list');
   }
      // sua
    public function show(Request $rq,$id){
        $cat = category::find($id);
        return view('category.category_edit',compact('cat'));
    }
    public function edit_list(Request $rq, $id){
        // dd($id); die;
        $cat = category::find($id);
        $cat->name = $rq->post('name');
        $cat->birth_year = $rq->post('birth_year');
        $cat->birthplace = $rq->post('birthplace');
        $cat->save();
        return redirect()->route('category_list');
   }
    //xoa
    public function Xoa(Request $rq, $id){
        $cat = category::where('id', $id);
        $cat->delete();
        return redirect()->route('category_list');
    }
    //uploadfile

}
