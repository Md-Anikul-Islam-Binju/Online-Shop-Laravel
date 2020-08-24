<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\SubCategory;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    public function subcategories()
    {
       $category=DB::table('categories')->get();
       $subcat=DB::table('subcategories')
                       ->join('categories','subcategories.category_id','categories.id')
                       ->select('subcategories.*','categories.category_name')
                       ->get();
       return view('admin.category.subcategory',compact('category','subcat'));
    }



    public function storesubcategory(Request $request)
    {
    	$validatedData = $request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required|unique:subcategories|max:50',
        ]);


         $data=array();
         $data['category_id']=$request->category_id;
         $data['subcategory_name']=$request->subcategory_name;
         DB::table('subcategories')->insert($data);

   



        $notification=array(
                        'messege'=>'Sub Category Inser Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);
       
    }


    public function DeleteSubCategory($id)
    {
    	DB::table('subcategories')->where('id',$id)->delete();

    	$notification=array(
                        'messege'=>'Sub Category Delete Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->back()->with($notification);

    }

    public function EditSubCategory($id)
    {
    	$subcat = DB::table('subcategories')->where('id',$id)->first();
    	$category=DB::table('categories')->get();
    	return view('admin.category.edit_subcategory',compact('subcat','category'));

    }



    public function UpdateSubCategory(Request $request,$id)
    {
        $validatedData = $request->validate([
        'category_id' => 'required',
        'subcategory_name' => 'required|unique:subcategories|max:50',
        ]);


         $data=array();
         $data['category_id']=$request->category_id;
         $data['subcategory_name']=$request->subcategory_name;
         $update = DB::table('subcategories')->where('id',$id)->update($data);

         if ($update) {
            $notification=array(
                        'messege'=>'Sub Category Update Success',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('sub.categories')->with($notification);
        }
        else
        {

            $notification=array(
                        'messege'=>'Sub Category Do Not Update',
                        'alert-type'=>'success'
                         );
        return Redirect()->route('sub.categories')->with($notification);

        }
       
    }


}
