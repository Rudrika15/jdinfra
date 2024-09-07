<?php

namespace App\Http\Controllers\visitor;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Topbar;
use App\Models\Contact;
use App\Models\Backgroundimage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function contact()
    {
        $topbars = Topbar::find(1);
        $images = Backgroundimage::all();
        return view('visitor.contact.contact', compact('topbars', 'images'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => ['required', 'regex:/^[0-9]{10}$/'],
            'message' => 'required',
        ]);
        $input = ([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
        ]);
        // Mail::to('parvezjindani003@gmail.com')->send(new SendMail($request));
        Contact::create($input);
        return redirect()->back()
            ->with('success', 'Message Sent successfully');
    }
    public function view()
    {
        $Contact = Contact::all();
        return \view('admin.clients.viewContact', \compact('Contact'));
    }
    public function trashdata()
    {
        $Contact = Contact::onlyTrashed()->get();
        return \view('admin.clients.trash', \compact('Contact'));
    }
    public function delete($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->back()->with('success', 'contact Deleted Successfully');
        }

        return redirect()->back()->with('error', 'contact not found');
    }
    public function restore($id)
    {
        $contact = Contact::withTrashed()->find($id);
        if ($contact) {
            $contact->restore();
            return redirect()->back()->with('success', 'contact restored Successfully');
        }

        return redirect()->back()->with('error', 'contact not found');
    }
    public function destroy($id)
    {
        $contact = Contact::withTrashed()->find($id);
        if ($contact) {
            $contact->forceDelete();
            return redirect()->back()->with('success', 'contact permanently  Deleted Successfully');
        }

        return redirect()->back()->with('error', 'contact not found');
    }
}
