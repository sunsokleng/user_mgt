<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\National;
use App\Models\NationalUser;
use App\Models\NationalUserModuleRoles;
use App\Models\OfficeName;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;
use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;

class NationalUserController extends Controller
{


//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * will list all Users
     */
    public function index(){
        $nationalusers = NationalUser::get();
        //map data that get from database with one key in array associative
        $output['nationalusers'] = $nationalusers;

        return view('nationaluser.index')->with($output);
    }


    /**
     * return user form
     * if don't have id will return blank form
     * if have id will return form with data
     * */

    public function form($id=null){
        $output['nationals'] = National::all();
        $output['modules']= Module::all();
        $output['roles']= Role::all();
        $output['positions']= Position::all();
        $output['officenames']= OfficeName::all();
        if ($id!=null){
            $nationaluser = NationalUser::find($id);

            $output['model']=$nationaluser;
        }
        return view('nationaluser.form')->with($output);
    }

    /**
     * return user form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request)
    {
        $input = $request->input;
        //dd($input);
        $input['active']= (isset($input['active']))?1:0;
        if ($request->has('id')) {
            $nationaluser = NationalUser::find($request->id);
        } else {
            $nationaluser = new NationalUser();
        }

        if ($request->hasFile('image')) {

            $input['image'] = Storage::disk('public')->putFile('images', $request->image);

//            if ($model->image != null) Storage::disk('public')->delete($model->image);
//            $image = Storage::disk('public')->putFileAs('image', $bookCover, $filename . '.' . $ext);
//            $input['image'] = $image;
        }

        $nationaluser->fill($input);
        $nationaluser->save();

        if($nationaluser->id!=0&&!empty($request->module)){
            $nationaluser->userModuleRoles()->delete();
            foreach ($request->module as $key => $value){
                $data = array(  'nationaluser_id' =>$nationaluser->id,
                                'module_id' => $request->module[$key],
                                'role_id' => $request->role[$key],
                );
                $nationalUserModuleRoles = new NationalUserModuleRoles();
                $nationalUserModuleRoles->fill($data);
                $nationalUserModuleRoles->save();
            }
        }
        return redirect('/nationaluser');
    }


    /**
     * delete user by id
     * */
    public function delete($id){
        NationalUser::where('id',$id)->delete();
        NationalUserModuleRoles::where('id',$id)->delete();
        return redirect('/nationaluser');
    }
}
