<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function index(){
        $title = 'All Contact';
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('title', 'contacts'));
    }

    public function pending(){
        $title = 'All pending';
        $pending = Contact::pending()->latest()->get();
        return view('admin.contact.pending', compact('title', 'pending'));
    }

    public function closed(){
        $title = 'All Closed';
        $closed = Contact::closed()->latest()->get();
        return view('admin.contact.close', compact('title', 'closed'));
    }

    public function edit($id){
        $title = 'Update';
        $contact = Contact::findOrFail($id);
        return view('admin.contact.update',compact('title', 'contact'));
    }

    public function update(Request $request, $id){
        Contact::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.contact')->with('success', 'Contact Updated successfully');
    }

    public function delete($id){
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.contact')->with('success', 'Contact Updated successfully');
    }
}
