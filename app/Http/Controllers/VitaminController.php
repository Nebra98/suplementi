<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vitamin;
use DB;
use Gate;
use Illuminate\Support\Facades\Storage;

class VitaminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $lang = config('app.locale');

        $vitamins = DB::table('vitamins')->where('lang', $lang)->orderBy('name', 'asc')->get();

        return view('vitamins.index')->with('lang', $lang)->with('vitamins', $vitamins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = config('app.locale');
        return view('vitamins.create')->with('lang', $lang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => '|mimes:jpeg,png,jpg,svg,bmp|max:5048',

        ],[
            'name.required' => trans('messages.nameInputErrorHandle'),
            'image.mimes' => trans('messages.imageInputErrorHandle'),

        ]);

            $lang = config('app.locale');

            $vitamin = new Vitamin;
            $vitamin->name = $request->name;
            $vitamin->generalDescription = nl2br($request->generalDescription);
            $vitamin->found = nl2br($request->found);
            $vitamin->antiAgingRole = nl2br($request->antiAgingRole);
            $vitamin->deficiencySymptoms = nl2br($request->deficiencySymptoms);
            $vitamin->therapeuticDoses = nl2br($request->therapeuticDoses);
            $vitamin->maximumSafeLevel = nl2br($request->maximumSafeLevel);
            $vitamin->sideEffects = nl2br($request->sideEffects);
            $vitamin->contraindications = nl2br($request->contraindications);
            $vitamin->interactions = nl2br($request->interactions);
            $vitamin->highRiskGroups = nl2br($request->highRiskGroups);
            $vitamin->compositionFormulas = nl2br($request->compositionFormulas);
            $vitamin->otherRemarks = nl2br($request->otherRemarks);
            $vitamin->lang = $request->lang;
            // replace non letter or digits by -
            $slug = preg_replace('~[^\pL\d]+~u', '-', $vitamin->name);
            // transliterate
            $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
            // remove unwanted characters
            $slug = preg_replace('~[^-\w]+~', '', $slug);
            // trim
            $slug = trim($slug, '-');
            // remove duplicate -
            $slug = preg_replace('~-+~', '-', $slug);
            // lowercase
            $slug = $lang . '-' . strtolower($slug);

            if (empty($slug))
                return 'n-a';

            $vitamin->slug = $slug;  

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $filename = time() . '.'.$image->getClientOriginalExtension();
    
                Storage::disk('public')->putFileAs(
                    'uploads/images/',
                    $image,
                    $filename
                );
    
    
                $vitamin->image = $filename;
            }

            $vitamin->save();

            $request->session()->flash('success', trans('messages.supplementCreateSuccess').' '. $vitamin->name);
            return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if($vitamin = Vitamin::where('slug',$slug)->first())
            return view('vitamins.show')->with('vitamin', $vitamin);
        else{
            return view('errors.404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if($vitamin = Vitamin::where('slug',$slug)->first())
            return view('vitamins.edit')->with('vitamin', $vitamin);
        else{
            return view('errors.404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => '|mimes:jpeg,png,jpg,svg,bmp|max:5048',
        ],[
            'name.required' => trans('messages.nameInputErrorHandle'),
            'image.mimes' => trans('messages.imageInputErrorHandle'),

        ]);

        $vitamin = Vitamin::where('slug',$slug)->first();

        if(Gate::allows('delete-users')){
            $vitamin->name = $request->name;
            $vitamin->generalDescription = nl2br($request->generalDescription);
            $vitamin->found = nl2br($request->found);
            $vitamin->antiAgingRole = nl2br($request->antiAgingRole);
            $vitamin->deficiencySymptoms = nl2br($request->deficiencySymptoms);
            $vitamin->therapeuticDoses = nl2br($request->therapeuticDoses);
            $vitamin->maximumSafeLevel = nl2br($request->maximumSafeLevel);
            $vitamin->sideEffects = nl2br($request->sideEffects);
            $vitamin->contraindications = nl2br($request->contraindications);
            $vitamin->interactions = nl2br($request->interactions);
            $vitamin->highRiskGroups = nl2br($request->highRiskGroups);
            $vitamin->compositionFormulas = nl2br($request->compositionFormulas);
            $vitamin->otherRemarks = nl2br($request->otherRemarks);

            if ($request->hasFile('image')) {

                if($vitamin->image != ""){
                    $path = storage_path().'/app/public/uploads/images/'.$vitamin->image;
                    unlink($path);
                }

                $image = $request->file('image');
                $filename = time() . '.'.$image->getClientOriginalExtension();
    
                Storage::disk('public')->putFileAs(
                    'uploads/images/',
                    $image,
                    $filename
                );
     
                $vitamin->image = $filename;
            }

            if($vitamin->save()){
                $request->session()->flash('success', trans('messages.supplementEditSuccess') . $vitamin->name);
            }else{
                $request->session()->flash('error', trans('messages.supplementEditError'). $vitamin->name);
            }
        }

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vitamin $vitamin)
    {
        if($vitamin->delete()){

            if($vitamin->image != ""){
                $path = storage_path().'/app/public/uploads/images/'.$vitamin->image;
                unlink($path);
            }

            session()->flash('success', trans('messages.supplementDeleteSuccess') . $vitamin->name);

        }else{
            session()->flash('error', trans('messages.supplementDeleteError') . $vitamin->name);
        }

        return redirect('/');
    }

    public static function slugMaker(){
        $vitamins = Vitamin::select()->get();
        $lang = config('app.locale');

        foreach($vitamins as $vitamin)
        {
            // replace non letter or digits by -
            $slug = preg_replace('~[^\pL\d]+~u', '-', $vitamins->name);

            // transliterate
            $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);

            // remove unwanted characters
            $slug = preg_replace('~[^-\w]+~', '', $slug);

            // trim
            $slug = trim($slug, '-');

            // remove duplicate -
            $slug = preg_replace('~-+~', '-', $slug);

            // lang + lowercase
            $slug = $lang . '-' . strtolower($slug);

            if (empty($slug))
                return 'n-a';

            $vitamins->slug = $slug;    
            $vitamins->save();
        }
    }

}
