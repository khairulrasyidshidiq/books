<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Exports\UserExport;
use App\Exports\BookExport;


class PageController extends Controller
{
    Function exportuser(){
        return Excel::download(new UserExport(), 'users.xlsx');
    }

    Function exportbook(){
        return Excel::download(new BookExport(), 'books.xlsx');
    }
    public function index()
    {
        return view('guest.dashboard');
    }

    public function login()
    {
        return view('guest.login');
    }

    public function register()
    {
        return view('guest.register');
    }

    public function adminlanding()
    {
        return view('admin.landing');
    }

    public function userlanding(Request $request)
    {
        $book = Book::all();
        $category = Category::all();

        if ($filter = $request->filter) {
            $book = Book::where('category_id', $filter)->get();
        } 

        return view('user.landing', compact('book', 'category'));
    }

    public function userdashboard()
    {
        $book = Book::orderBy('download', 'desc')->take(3)->get();
        return view('user.dashboard', compact('book'));
    }

    public function readbook($id)
    {
        $book = Book::where('id',$id)->first();
        return view('user.readbook', compact('book'));
    }

    public function datauser()
    {
        $user = User::all();
        return view('admin.datauser', compact('user'));
    }
    public function databook()
    {
        $category = Category::all();
        $book = Book::all();
        return view('admin.databook', compact('category', 'book'));
    }
    public function editbook($id)
    {
        $category = Category::all();
        $book = Book::where('id', $id)->first();
        return view('admin.editbook', compact('book', 'category'));
    }
    public function category()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }

    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'address' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles' => 'User'
        ]);

        return redirect('/login')->with('register', 'Register success!');
    }

    public function loginstore(Request $request)
    {
        $login = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($login)) {
            if(Auth::user()->roles == 'Admin'){
                $request->session()->regenerate();
                return redirect()->intended('admin')->with('admin', 'Login success!');
            }
            else{
                $request->session()->regenerate();
                return redirect()->intended('user');
            }
        }

        return redirect()->back()->with('salah', 'Login Failed!');
    }

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect('/');
    }

    public function userdelete($id)
    {

        User::where('id', $id)->delete();
        return back();
    }
}
