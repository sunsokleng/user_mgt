<?php

namespace App\Http\Controllers;

use App\Models\LineDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LineDepartmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * will list all Line Ministry data
     */

    public function index(){
        $linedepartments = LineDepartment::get();
        //map data that get from database with one key in array associative
        $output['linedepartments'] = $linedepartments;

        return view('linedepartment.index')->with($output);
    }



    /**
     * return Line Ministry form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $linedepartment = LineDepartment::find($id);
            $output = [
                'model'=>$linedepartment,
                'linedepartment'=>$linedepartment
            ];
            return view('linedepartment.form')->with($output);
        }
        return view('linedepartment.form');
    }


    /**
     * return Line Ministry form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $linedepartment = LineDepartment::find($request->id);
        } else {
            $linedepartment = new LineDepartment();
        }
        $linedepartment->fill($input);
        $linedepartment->save();
        return redirect('/linedepartment');
    }


    /**
     * delete Line Ministry by id
     * */
    public function delete($id){
        LineDepartment::where('id',$id)->delete();
        return redirect('/linedepartment');
    }
}
