<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //INDEX
    public function index()
    {
        $admins = Admin::latest()->paginate(10);
        return view('admin.index', compact('admins'));

    }
   

    //SHOW

    //CREATE


    //STORE
    


    //EDIT


    //UPDATE


    //DESTROY
}
