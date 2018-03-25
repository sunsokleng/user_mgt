<?php

namespace App\Http\Controllers;

use App\Models\LineMinistry;
use Illuminate\Http\Request;

class LineMinistryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * will list all Line Ministry data
     */

    public function index(){
        $lineministrys = LineMinistry::get();
        //map data that get from database with one key in array associative
        $output['lineministrys'] = $lineministrys;

        return view('lineministry.index')->with($output);
    }



    /**
     * return Line Ministry form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $lineministry = LineMinistry::find($id);
            $output = [
                'model'=>$lineministry,
                'lineministry'=>$lineministry
            ];
            return view('lineministry.form')->with($output);
        }
        return view('lineministry.form');
    }


    /**
     * return Line Ministry form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $lineministry = LineMinistry::find($request->id);
        } else {
            $lineministry = new LineMinistry();
        }
        $lineministry->fill($input);
        $lineministry->save();
        return redirect('/lineministry');
    }


    /**
     * delete Line Ministry by id
     * */
    public function delete($id){
        LineMinistry::where('id',$id)->delete();
        return redirect('/lineministry');
    }
}
