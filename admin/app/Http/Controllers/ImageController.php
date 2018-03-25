<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use \Validator;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $images=Image::all();

       return view('admin.image')->with('images',$images);
    }

    public function upload_image()
    {

        return view('admin.upload_image');
    }

     public function ImageEdit(Request $request,$id){
       

        $image= Image::where('image_id',$id)->first();
        return view('admin.editImage')->with('image',$image);
    }

     public function editImage(Request $request)
    {
        $imageName='';
         if ($request->isMethod('post')) {
               $validatedData = Validator::make($request->all(),[
                    'title'=> 'required',
                    'description'=> 'required',
                     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                if ($validatedData->fails()) {
                return redirect()->route('ImageEdit', ['id' => $request->post('Image_id')])
                            ->withErrors($validatedData)
                            ->withInput();
                }
               
               if($request->image){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images'), $imageName);
                unlink(public_path('images').'/'.$request->post('image_name'));
               }

                if($imageName!=''){
                $update_data=array(
                        'title'=>$request->post('title'),
                        'description'=>$request->post('description'),
                        'image'=>$imageName
                    );
                }else{
                     $update_data=array(
                        'title'=>$request->post('title'),
                        'description'=>$request->post('description')
                    );
                }

               Image::find($request->post('image_id'))->update($update_data);
               return redirect('image')->with('info', 'Image has been updated Successfully!');
            }
    }

     public function UploadImage(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
          if ($validatedData->fails()) {
            return redirect('upload_image')
                        ->withErrors($validatedData)
                        ->withInput();
          }

          $imageName = time().'.'.request()->image->getClientOriginalExtension();

          request()->image->move(public_path('images'), $imageName);
            
        $image = new Image;

        $image->title = $request->title;
        $image->description = $request->description;
        $image->image = $imageName;
       
        $image->save();
        return redirect('image')->with('info', 'Image has been uploaded Successfully!');
    }

    public function ImageDelete(request $request){
           // dd($request->all());
         if ($request->isMethod('post')) {
             Image::where('image_id',$request->post('image_id_modal'))->delete();
             unlink(public_path('images').'/'.$request->post('image_name'));
             return redirect('image')->with('info', 'Image has been deleted Successfully!');
         }
    }

  
}
