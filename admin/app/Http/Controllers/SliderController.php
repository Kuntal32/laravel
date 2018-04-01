<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use \Validator;

class SliderController extends Controller
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

       $images=Slider::all();

       return view('admin.sliderimage')->with('images',$images);
    }

    public function slider_upload()
    {

        return view('admin.slider_upload_image');
    }

     public function SliderImageEdit(Request $request,$id){
       

        $image= Slider::where('slider_id',$id)->first();
        return view('admin.slidereditImage')->with('image',$image);
    }

     public function slidereditImage(Request $request)
    {
        $imageName='';
         if ($request->isMethod('post')) {
               $validatedData = Validator::make($request->all(),[
                    'title'=> 'required',
                    'description'=> 'required',
                     'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                if ($validatedData->fails()) {
                return redirect()->route('SliderImageEdit', ['id' => $request->post('slider_id')])
                            ->withErrors($validatedData)
                            ->withInput();
                }
               
               if($request->image){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('slider'), $imageName);
                unlink(public_path('slider').'/'.$request->post('image_name'));
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

               Slider::find($request->post('slider_id'))->update($update_data);
               return redirect('slider')->with('info', 'Image has been updated Successfully!');
            }
    }

     public function SliderUploadImage(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             ]);
          if ($validatedData->fails()) {
            return redirect('slider_upload')
                        ->withErrors($validatedData)
                        ->withInput();
          }

          $imageName = time().'.'.request()->image->getClientOriginalExtension();

          request()->image->move(public_path('slider'), $imageName);
            
        $image = new Slider;

        $image->title = $request->title;
        $image->description = $request->description;
        $image->image = $imageName;
       
        $image->save();
        return redirect('slider')->with('info', 'Image has been uploaded Successfully!');
    }

    public function sliderImageDelete(request $request){
         
         if ($request->isMethod('post')) {
             Slider::where('slider_id',$request->post('slider_id_modal'))->delete();
             unlink(public_path('slider').'/'.$request->post('slider_image_name'));
             return redirect('slider')->with('info', 'Image has been deleted Successfully!');
         }
    }

  
}
