<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PositionController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * will list all Positions
     */

    public function index(){
        $positions = Position::get();
        //map data that get from database with one key in array associative
        $output['positions'] = $positions;

        return view('position.index')->with($output);
    }



    /**
     * return Treasury form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $position = Position::find($id);
            $output = [
                'model'=>$position,
                'position'=>$position
            ];
            return view('position.form')->with($output);
        }
        return view('position.form');
    }


    /**
     * return treasury form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $position = Position::find($request->id);
        } else {
            $position = new Position();
        }
        $position->fill($input);
        $position->save();
        return redirect('/position');
    }


    /**
     * delete Position by id
     * */
    public function delete($id){
        Position::where('id',$id)->delete();
        return redirect('/position');
    }
}
