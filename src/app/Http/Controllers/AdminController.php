<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function admin()
    {
        $contacts = Contact::paginate(5); 
        $categories = Category::all();
    
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->categorySearch($request->category_id)
            ->keywordSearch($request->keyword)
            ->genderSearch($request->gender)
            ->paginate(5) ->appends($request->all());
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

        public function reset()
    {
        return redirect('/admin');
    }


    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('/admin');
    }




}
