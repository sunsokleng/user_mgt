<?php

namespace App\Http\Controllers;

use App\Models\OfficeName;
use Illuminate\Http\Request;

class OfficeNameController extends Controller
{
    public function index(){
        $officenames = OfficeName::get();
        //map data that get from database with one key in array associative
        $output['officenames'] = $officenames;

        return view('officename.index')->with($output);
    }



    /**
     * return Treasury form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $officename = OfficeName::find($id);
            $output = [
                'model'=>$officename,
                'officename'=>$officename
            ];
            return view('officename.form')->with($output);
        }
        return view('officename.form');
    }


    /**
     * return treasury form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $officename = OfficeName::find($request->id);
        } else {
            $officename = new OfficeName();
        }
        $officename->fill($input);
        $officename->save();
        return redirect('/officename');
    }


    /**
     * delete Treasury by id
     * */
    public function delete($id){
        OfficeName::where('id',$id)->delete();
        return redirect('/officename');
    }
}
