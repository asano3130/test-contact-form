<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {

        $contact = [
        'name' => $request->last_name . ' ' . $request->first_name,
        'gender' => $request->gender,
        'email' => $request->email,
        'tel' => $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3,
        'tel1'       => $request->tel1,
        'tel2'       => $request->tel2,
        'tel3'       => $request->tel3,
        'address1' => $request->address1,
        'address2' => $request->address2,
        'category' => $request->category,
        'content' => $request->content,
        ];

        return view('confirm', ['contact' => $request->all() ]);
    }

    public function store(ContactRequest $request)
    {
        if ($request->has('back')) {
            return redirect()
                ->route('contact.index')
                ->withInput();
        }

        Contact::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'tel'        => $request->tel1.$request->tel2.$request->tel3,
            'address'    => $request->address1,
            'building'   => $request->address2,
            'category_id'=> $request->category,
            'detail'     => $request->content,
        ]);


        return redirect()->route('contact.thanks');
    }

        public function thanks()
    {
        return view('thanks');
    }

}
