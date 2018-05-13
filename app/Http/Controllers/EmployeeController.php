<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::get();
        //map data that get from database with one key in array associative
        $output['employees'] = $employees;

        return view('employee.index')->with($output);
    }


    /**
     * return user form
     * if don't have id will return blank form
     * if have id will return form with data
     * */

    public function form($id=null){
        $output['employees'] = Employee::all();
        $output['positions']= Position::all();
        if ($id!=null){
            $employee = Employee::find($id);

            $output['model']=$employee;
        }
        return view('employee.form')->with($output);
    }

    /**
     * return user form
     * if don't have id mean create new
     * if have id mean update
     * */
    public function save(Request $request)
    {
        $input = $request->input;
        if ($request->has('id')){
            $employee = Employee::find($request->id);
        } else {
            $employee = new Employee();
        }
        $employee->fill($input);
        $employee->save();
        return redirect('/employee');
    }


    /**
     * delete user by id
     * */
    public function delete($id){
        Employee::where('id',$id)->delete();
        return redirect('/employee');
    }
}
