<?php

namespace App\Http\Controllers;

use App\Models\Treasury;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class TreasuryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * will list all Treasurys
     */

    public function index(){
        $treasurys = Treasury::get();
        //map data that get from database with one key in array associative
        $output['treasurys'] = $treasurys;

        return view('treasury.index')->with($output);
    }



    /**
     * return Treasury form
     * if don't have id will return blank form
     * if have id will return form with data
     * */
    public function form($id=null){
        if ($id!=null){
            $treasury = Treasury::find($id);
            $output = [
                'model'=>$treasury,
                'treasury'=>$treasury
            ];
            return view('treasury.form')->with($output);
        }
        return view('treasury.form');
    }


    /**
     * return treasury form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request){
        $input = $request->input;
        if ($request->has('id')){
            $treasury = Treasury::find($request->id);
        } else {
            $treasury = new Treasury();
        }
        $treasury->fill($input);
        $treasury->save();
        return redirect('/treasury');
    }


    /**
     * delete Treasury by id
     * */
    public function delete($id){
        Treasury::where('id',$id)->delete();
        return redirect('/treasury');
    }
}
