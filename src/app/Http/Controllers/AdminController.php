<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->keyword}%")
                ->orWhere('last_name', 'like', "%{$request->keyword}%")
                ->orWhereRaw(
                    "CONCAT(last_name, first_name) LIKE ?",
                    ["%{$request->keyword}%"]
                )
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->has('gender') && $request->gender !== '') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('category') && $request->category !== '') {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7)->withQueryString();

        return view('admin.index', compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.index');
    }

    public function show(Contact $contact)
    {
        return view('admin.show', compact('contact'));
    }
}
