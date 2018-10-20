<?php

namespace App\Http\Controllers;

use App\CategorieLang;
use Illuminate\Http\Request;

class CategoryLangController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  \Illuminate\Http\Request.
     * @return void.
     */
    protected function validateRequest(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:category_langs,category',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();

        return view('categories.backoffice.index',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.backoffice.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $Category = new Category();
        $Category->save(); 

        $CategoryLang = new CategoryLang();
        $CategoryLang->Category = $request->Category; 
        $CategoryLang->Category_id = $Category->id; 
        $CategoryLang->lang_id = Language::where('alpha_2_code',App::getLocale())->first()->id;
        $CategoryLang->save();
        
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show($Category)
    {
        
        $data['Category'] = Category::find($Category);
        return 1;
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit($Category)
    {

        $data['Category'] = Category::find($Category);
        return view('categories.backoffice.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Category)
    {
        return $request;
        $category = Category::find($Category);
        foreach($request->references as $key => $reference)
        {
            $categoryLang = $category->categoryLangs->where('lang_id',$request->languages_id[$key])->first();
            if(!isset($categoryLang))
            {
                $categoryLang = new CategoryLang();
                $categoryLang->category_id = $category->id;
                $categoryLang->lang_id = $request->languages_id[$key];
            }

            if($reference != '')
            {
                $categoryLang->reference = $reference;
                $categoryLang->description = $request->descriptions[$key];
                }
                else
                {
                $categoryLang->reference = '';
                $categoryLang->description = '';
    
                }
                $categoryLang->save();
            
            
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy($Category)
    {
        // récupérer photo
        $Category = Category::findOrFail($Category);
       $Category->delete();
       return redirect('categories');

    }
}
