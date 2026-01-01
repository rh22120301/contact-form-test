<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1','tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        $contact['gender_label'] = [ 1 => '男性', 2 => '女性', 3 => 'その他' ][$request->gender];
        
        $category = Category::find($request->category_id);
        $contact['category_content'] = $category->content;

        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);
        return redirect('/contacts/thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

}
