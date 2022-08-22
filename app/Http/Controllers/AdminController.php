<?php
namespace App\Http\Controllers;

use App\Models\Origin;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Show View Page Login Admin
    public function login_admin()
    {
        return view('login_admin');
    }

    // 
    public function loginProcess_admin(Request $request)
    {
        $ua = Admin::where('AdminID', '=', $request->username_admin)->first();
        if($ua){
            if(Hash::check($request -> password_admin, $ua -> AdminPassword)){
                $request ->session() ->put('loginID_admin', $ua->AdminID);

                    $category = Category::get();
                    $data = Product::get();
                    $origin = Origin::get();
                    return view ('list', compact ('data','category','origin'));
                
                
            }else{
                return back() -> with('fail', 'Password do not match');
            }
        }else{
            return back() -> with('fail', 'This Email is not register');
        }
    }

    public function register_admin()
    {
        return view('register_admin');
    }

    public function registerProcess_admin(Request $request)  
    {
        $ua = new Admin();
        $ua-> AdminID = $request ->username_admin;
        $ua-> AdminPassword = Hash::make($request->password_admin);
        $ua-> AdminFullName = $request ->fullname_admin;
        $ua-> AdminAddress = $request ->address_admin;
        $ua-> AdminEmail = $request ->email_admin;
        $ua-> AdminPhone = $request ->phone_admin;
        $res = $ua->save();
        if($res){
            return back() -> with('success', 'You have registed Successfully');
        }else{
            return back() -> with('fail', 'Oh no! something wrong!');
        }

    }


    public function logout_list()
    {
        if(Session::has('loginID_admin')) {
            Session::pull('loginID_admin');
            return redirect('list');
        }
    }
}

