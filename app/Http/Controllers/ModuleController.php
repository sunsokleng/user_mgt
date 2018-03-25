<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ModuleController extends Controller
{


    /**
     * will list all Modules
     */

    public function index(){
        $modules = Module::get();
        //map data that get from database with one key in array associative
        $output['modules'] = $modules;

        return view('module.index')->with($output);
    }



    /**
     * return Module form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $module = Module::find($id);
            $output = [
                'model'=>$module,
                'module'=>$module
            ];
            return view('module.form')->with($output);
        }
        return view('module.form');
    }


    /**
     * return module form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $module = Module::find($request->id);
        } else {
            $module = new Module();
        }
        $module->fill($input);
        $module->save();
        return redirect('/module');
    }


    /**
     * delete Module by id
     * */
    public function delete($id){
        Module::where('id',$id)->delete();
        return redirect('/module');
    }
}
