<?php

namespace App\Http\Controllers;

use App\Models\NationalUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    public $output = [];

    public function index($id=0)
    {
//		$question = new ParseQuery('question');
        $this->output['nationalusers'] = NationalUser::count();
        //$this->output['sources'] = Source::count();
        //$this->output['questions'] = Question::count();

        return view('dashboard.index')->with($this->output);
    }
}
