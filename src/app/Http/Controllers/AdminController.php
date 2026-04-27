<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();
        return view('admin.index', compact('contacts', 'categories'));
    }
    public function search(Request $request)
    {
    $contacts = Contact::query()
        ->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->CategorySearch($request->category_id)
        ->DateSearch($request->date)
        ->paginate(7);

    $categories = Category::all();
    return view('admin.index', compact('contacts', 'categories'));
    }

    public function reset()
    {
        return redirect('/admin');
    }
    public function delete(Request $request)            
    {
        Contact::find($request->id)->delete();              
        return redirect('/admin');
    }
    public function export(Request $request)
    {
        $contacts = Contact::query()
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->date)
            ->get();

        $genders = [1 => '男性', 2 => '女性', 3 => 'その他'];
        
        $csv = "お名前,性別,メールアドレス,お問い合わせ内容\n";
        foreach ($contacts as $contact) {
            $csv .= $contact->last_name . ' ' . $contact->first_name . ',' . $genders[$contact->gender] . ',' . $contact->email . ',' . $contact->detail . "\n";
        }

         return response($csv, 200)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="contacts.csv"');
    }
}
