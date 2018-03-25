<?php

namespace App\Http\Controllers;

use App\Models\National;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NationalController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    /**
     * will list all Nationals
     */

    public function index(){
    $nationals = National::get();
    //map data that get from database with one key in array associative
    $output['nationals'] = $nationals;

    return view('national.index')->with($output);
}



    /**
     * return National form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
    if ($id!=null){
        $national = National::find($id);
        $output = [
            'model'=>$national,
            'national'=>$national
        ];
        return view('national.form')->with($output);
    }
    return view('national.form');
}


    /**
     * return national form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
    $input = $request->input;
    if ($request->has('id')){
        $national = National::find($request->id);
    } else {
        $national = new National();
    }
    $national->fill($input);
    $national->save();
    return redirect('/national');
}


    /**
     * delete National by id
     * */
    public function delete($id){
    National::where('id',$id)->delete();
    return redirect('/national');
}
}
