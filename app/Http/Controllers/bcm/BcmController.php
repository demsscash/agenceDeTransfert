<?php

namespace App\Http\Controllers\bcm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class BcmController extends Controller
{
    
   public function index(){
       return view('bcm.bcm');
   }
}