<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Validator;

class CategoryController extends Controller
{
    //

    public function index()
    {
        # code...
        
        $categories = DB::table('product_category')
                            ->select()
                            ->get()->all();
                            
        $subcategories = DB::table('product_subcategory')
                            ->select()
                            ->get()->all();

        foreach ($categories as $index => $category) {
            # code...
            $categories[$index] -> subcategory = Array();
            // $categories[$index] -> subcategory[] = ["hello"];
            
            foreach ($subcategories as $subcategory) {
                # code...
                if($category -> pc_id == $subcategory -> pc_id) {
                    $categories[$index] -> subcategory[]= $subcategory;
                    // break;
                }
            }
        }
        $stats = $categories;
        unset($categories, $category, $subcategories, $subcategory);
        // print_r($stats);
        // exit();
        return view('admin.category.index', ['stats' => $stats, 'type' => 'category']);
    }

    public function add(Request $request)
    {
        # code...
        // echo "HEre";

        // echo $request->ip();
        // exit();
        
        if ($request->isMethod('get')) {
            return view('admin.category.add', ['active' => 'products', 'type' => 'category']);
        } else if($request->isMethod('post')) {
            // $this -> add();
            $this -> store($request);
        }
    }

    public function store(Request $request)
    {
        # code...
        $data = $request->all();
        // print_r($data);
        // exit();
        $request->validate([
            'category_name' => 'required|max:255',
            // 'category_tag' => 'required|string',
            'category_desc' => 'required|string|min:50',
            'category_captions' => 'required|string',
            'category_img' => 'required',
            'category_img.*' => 'max:2000|mimes:jpg,png,gif,jpeg'
        ]);

        if($request->hasfile('category_img'))
        {
            foreach($request->file('category_img') as $file)
            {
                // echo $file->getClientOriginalExtension();
                $name = str_slug($data['category_name']).'_'.time().'.'.$file->extension();
                $file->move(public_path().'/uploads/category/', $name);  
                $s_path[] = $name;
            }
            // print_r($s_path);
        }

        
        DB::table('product_category')->insert(
            [
                'pc_name' => $data['category_name'],
                'pc_captions' => json_encode(call_user_func('array_map', 'trim', explode(',', $data['category_captions']))),
                // 'pc_tags' => json_encode(call_user_func('array_map', 'trim', explode(',', $data['category_tag']))),
                'pc_description' => $data['category_desc'],
                'pc_images' => json_encode($s_path ?? []),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
