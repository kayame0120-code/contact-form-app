<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;


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
    $search = $request->all();
    return view('admin.index', compact('contacts', 'categories', 'search'));
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

        $csvHeader = [
            'id', 'category_id', 'first_name', 'last_name',
            'gender', 'email', 'tel', 'address',
            'building', 'detail', 'created_at', 'updated_at',
        ];

        $response = new StreamedResponse(function () use ($csvHeader, $contacts) {
            $createCsvFile = fopen('php://output', 'w');

            mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);
            fputcsv($createCsvFile, $csvHeader);

            foreach ($contacts as $contact) {
                $row = $contact->toArray();

                $row['created_at'] = \Carbon\Carbon::parse($row['created_at'])
                    ->setTimezone('Asia/Tokyo')
                    ->format('Y/m/d H:i:s');

                $row['updated_at'] = \Carbon\Carbon::parse($row['updated_at'])
                    ->setTimezone('Asia/Tokyo')
                    ->format('Y/m/d H:i:s');

                mb_convert_variables('SJIS-win', 'UTF-8', $row);
                fputcsv($createCsvFile, $row);
            }

            fclose($createCsvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}
