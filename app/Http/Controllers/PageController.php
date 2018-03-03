<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;
use \Validator;

class PageController extends Controller
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
   
    public function page()
    {

       $pages = Page::all();

       return view('admin.page')->with('pages',$pages);
    }

    public function page_create()
    {
       return view('admin.page_create');

    }



    public function PageEdit(Request $request,$id){
       

        $page= Page::where('page_id',$id)->first();
        return view('admin.editPage')->with('page',$page);
    }

    public function editPage(Request $request)
    {
         if ($request->isMethod('post')) {
               $validatedData = Validator::make($request->all(),[
                    'title'=> 'required',
                    'name'=> 'required',
                    'metaTitle' => 'required',
                    'metaDescription' => 'required',
                    'content' => 'required',
                ]);

                if ($validatedData->fails()) {
                return redirect()->route('PageEdit', ['id' => $request->post('page_id')])
                            ->withErrors($validatedData)
                            ->withInput();
                }
               Page::find($request->post('page_id'))->update($request->all());
               return redirect('page')->with('info', 'Page has been updated Successfully!');
            }
    }

    public function CreatePage(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
                'title' => 'required',
                'name' => 'required',
                'metaTitle' => 'required',
                'metaDescription' => 'required',
                'content' => 'required',
             ]);
          if ($validatedData->fails()) {
            return redirect('page_create')
                        ->withErrors($validatedData)
                        ->withInput();
          }
            
        $page = new Page;

        $page->title = $request->title;
        $page->name = $request->name;
        $page->metaTitle = $request->metaTitle;
        $page->metaDescription = $request->metaDescription;
        $page->content = $request->content;
        $page->save();
        return redirect('page')->with('info', 'Page has been created Successfully!');;
    }
}
