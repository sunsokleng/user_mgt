<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class RoleController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * will list all Treasurys
     */

    public function index(){
        $roles = Role::get();
        //map data that get from database with one key in array associative
        $output['roles'] = $roles;

        return view('role.index')->with($output);
    }



    /**
     * return Treasury form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $role = Role::find($id);
            $output = [
                'model'=>$role,
                'role'=>$role
            ];
            return view('role.form')->with($output);
        }
        return view('role.form');
    }


    /**
     * return treasury form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $role = Role::find($request->id);
        } else {
            $role = new Role();
        }
        $role->fill($input);
        $role->save();
        return redirect('/role');
    }


    /**
     * delete Treasury by id
     * */
    public function delete($id){
        Role::where('id',$id)->delete();
        return redirect('/role');
    }
}
