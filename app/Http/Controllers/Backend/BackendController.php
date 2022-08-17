<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public  function dashboard(){
//
//        $data = [] ;
//
//        $data['categories'] = Category::parent()->select('id','slug')->with(['children' => function($q){
//            $q->select('id','parent_id','slug');
//            $q->with(['children' => function ($qu){
//                $qu->select('id','parent_id','slug');
//            }])->get();
//        }]);



        return view('backend.index');


    }

    public  function login(){
        return view('backend.login');
    }

    public  function register(){
        return view('backend.register');
    }


    public  function forgot(){
        return view('backend.forgot-password');
    }



}
