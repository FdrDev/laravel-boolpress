<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function getCategotyByName($category_name){
      $category = Category::where('name', $category_name)->first();
      // dd($category->all());
      return view('page.category',compact('category'));
    }
}
