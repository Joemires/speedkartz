<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    //

    public function index(Request $request)
    {
        # code...

        if ($request->isMethod('get')) {
            $categories = DB::table('product_category')
                            ->select('pc_id', 'pc_name')
                            ->get()->all();
                            
            $subcategories = DB::table('product_subcategory')
                                ->select('ps_id', 'pc_id', 'ps_name')
                                ->get()->all();
            
            $data[] = [];
            settype($data[], 'object');
            $data = array_filter($data);
            foreach ($categories as $index => $category) {
                # code...
                $data[$category -> pc_id] = $category;
                $data[$category -> pc_id] -> subcategory = Array();
                // $categories[$index] -> subcategory[] = ["hello"];
                
                foreach ($subcategories as $subcategory) {
                    # code...
                    // print_r($subcategory);
                    if($category -> pc_id == $subcategory -> pc_id) {
                        $data[$category -> pc_id] -> subcategory[]= $subcategory;
                        // break;
                    }
                }
            }
            $categories = $data;
            unset($data, $category, $subcategories, $subcategory);
            // exit();
            return view('admin.products.add', ['categories' => $categories]);
        } else if($request->isMethod('post')) {
            // $this -> add();
        }
    }


    public function save(Request $request)
    {
        # code...

        $request->validate([
            'category_id' => 'required|exists:product_category,pc_id',
            'subcategory_name' => 'required|max:255',
            // 'category_tag' => 'required|string',
            'subcategory_desc' => 'required|string|min:50',
            // 'subcategory_captions' => 'required|string',
            // 'subcategory_img' => 'required',
            // 'subcategory_img.*' => 'max:2000|mimes:jpg,png,gif,jpeg'
        ]);
    }

}
