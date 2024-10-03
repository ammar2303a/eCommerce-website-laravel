<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function viewCategory(){
        $fetchCategory =  DB::select('select * from categories');
        return view('pages.admin.category', compact('fetchCategory'));
    }
    public function addcCategory(Request $request){
        $cat_name = $request->category_name;
        $cat_desc = $request->category_desc;
        $id = uniqid();

        DB::select("INSERT INTO `categories`(`id`, `CategoryName`,  `Description`, `Status`)
         VALUES ('".$id."','".$cat_name."','".$cat_desc."','Active')");
         return redirect()->back();
    }
    public function editCategory($id){
       $data =  DB::select('select * from categories where id="'.$id.'" ');
        return $data;
    }

    public function updatecategory(Request $request){
        $cat_name = $request->edit_category_name;
        $cat_id = $request->edit_category_id;
        $cat_status = $request->category_status;
        $cat_desc = $request->edit_category_desc;

        DB::select("UPDATE `categories` SET `CategoryName`='".$cat_name."',
        `Description`= '".$cat_desc."', `Status`='".$cat_status."' WHERE `id`='".$cat_id."'");
        
        return redirect()->back();
    }

    public function viewproduct(){
        $category = DB::select('select * from categories where status = "Active"');
        $product = DB::select('SELECT products.id pid, title,price,quantity,image,categoryName, products.status
        FROM `products`
        JOIN categories
        ON products.category_id = categories.id');

        return view('pages.admin.product', compact('category','product'));
    }

    public function addproduct(Request $request){
        $p_id = uniqid();
        $title =$request->p_title;
        $price =$request->p_price;
        $quantity =$request->p_quantity;
        $category_id =$request->p_category;
        $imagename = time().'.'. $request->p_image->extension();
        $request->p_image->move(public_path('adminAssests.products'), $imagename);
        // return $imagename;

        // DB::select("INSERT INTO `products`(`id`, `title`, `price`, `quantity`, `category_id`, `status`) VALUES ('". $p_id."','". $title."','".$price."','". $quantity."','".$category_id ."','Active')");
        // return redirect()->back();
    }
}
