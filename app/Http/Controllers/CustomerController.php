<?php
namespace App\Http\Controllers;

use App\Models\Origin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class CustomerController extends Controller
{
    public function login()
    {
        return view('Trees.login');
    }

    public function loginProcess(Request $request)
    {
        $ua = Customer::where('CustomerID', '=', $request->username)->first();
        if($ua){
            if(Hash::check($request -> password, $ua -> CustomerPass)){
                $request ->session() ->put('loginID', $ua->CustomerID);

                    $cate = Category::get();
                    $data = Product::get();
                    return view ('Trees.home', compact ('data','cate'));
                
                
            }else{
                return back() -> with('fail', 'Password do not match');
            }
        }else{
            return back() -> with('fail', 'This Email is not register');
        }
    }

    public function register()
    {
        return view('Trees.register');
    }

    public function registerProcess(Request $request)
    {
        $ua = new Customer();
        $ua-> CustomerID = $request ->username;
        $ua-> CustomerPass = Hash::make($request->password);
        $ua-> CustomerFullName = $request ->fullname;
        $ua-> CustomerAddress = $request ->address;
        $ua-> CustomerEmail = $request ->email;
        $ua-> CustomerPhone = $request ->phone;
        $res = $ua->save();
        if($res){
            return back() -> with('success', 'You have registed Successfully');
        }else{
            return back() -> with('fail', 'Oh no! something wrong!');
        }

    }

    public function logout()
    {
        if(Session::has('loginID')) {
            Session::pull('loginID');
            return redirect('products');
        }
    }

    public function logout_list()
    {
        if(Session::has('loginID')) {
            Session::pull('loginID');
            return redirect('list');
        }
    }

    public function index()
    {
        $data = Customer::get();
        return view('list_customer', compact('data'));
    }

    public function delete($username){
        Customer::where('CustomerID','=', $username)->delete();
        return redirect()->back()->with('success', 'Detail Deleted Successfully!');
    
    }

    public function information($username)
    {
        $data = Customer::Where('customerID', '=' , $username)->first();
        return view('trees.information', compact('data'));
    }

    public function saveinformation(Request $request)
    {
        $username = $request->username;
        Customer::where('CustomerID','=', $username)->update([
            'CustomerFullname'=>$request->fullname,
            'CustomerAddress'=>$request->address,
            'CustomerEmail'=>$request->email,
            'CustomerPhone'=>$request->phone
            
        ]);
        return redirect()->back()->with('success', 'Product Updated Successfully!');
    }
}

?>