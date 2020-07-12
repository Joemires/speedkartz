<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use Validator;

class SubcategoryController extends Controller
{
    //

    public function index()
    {
        # code...
        
        // $categories = DB::table('product_category')
        //                     ->select()
        //                     ->get()->all();
                            
        $subcategories = DB::table('product_subcategory')
                            ->select()
                            ->get()->all();

        // foreach ($categories as $index => $category) {
        //     # code...
        //     $categories[$index] -> subcategory = Array();
        //     // $categories[$index] -> subcategory[] = ["hello"];
            
        //     foreach ($subcategories as $subcategory) {
        //         # code...
        //         if($category -> pc_id == $subcategory -> pc_id) {
        //             $categories[$index] -> subcategory[]= $subcategory;
        //             // break;
        //         }
        //     }
        // }
        
        $stats = $subcategories;
        unset($categories, $category, $subcategories, $subcategory);

        return view('admin.category.index', ['stats' => $stats, 'type' => 'subcategory']);
    }

    public function add(Request $request)
    {
        
        if ($request->isMethod('get')) {
            return view('admin.category.add', ['active' => 'products', 'type' => 'subcategory']);
        } else if($request->isMethod('post')) {
            // $this -> add();
            $this -> store($request);
        }
    }

    public function store(Request $request)
    {
        # code...
        $data = $request->all();
        print_r($data);
        $request->validate([
            'category_id' => 'required|exists:product_category,pc_id',
            'subcategory_name' => 'required|max:255',
            // 'category_tag' => 'required|string',
            'subcategory_desc' => 'required|string|min:50',
            // 'subcategory_captions' => 'required|string',
            'subcategory_img' => 'required',
            'subcategory_img.*' => 'max:2000|mimes:jpg,png,gif,jpeg'
        ]);
            
        if($request->hasfile('subcategory_img'))
        {
            foreach($request->file('subcategory_img') as $file)
            {
                $name = str_slug($data['subcategory_name']).'_'.time().'.'.$file->extension();
                $file->move(public_path().'/uploads/subcategory/', $name);  
                $s_path[] = $name;
            }
        }
        
        // exit();
        
        
        DB::table('product_subcategory')->insert(
            [
                'ps_name' => $data['subcategory_name'],
                'pc_id' => $data['category_id'],
                'ps_description' => $data['subcategory_desc'],
                'ps_images' => json_encode($s_path ?? []),
                'created_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
