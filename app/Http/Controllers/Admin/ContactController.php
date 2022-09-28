<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_contact = Contact::orderBy('id','DESC')->get();
        return view('admin.contact.create')->with(compact('list_contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'location' => 'required',
                'phone' => 'required',
                'google_map' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'location.required' => 'Địa chỉ không được bỏ trống',
                'phone.required' => 'Điện thoại không được bỏ trống',
                'google_map.required' => 'Địa chỉ trên google map không được bỏ trống',

            ]
        );

        $data = $request->all();
        $contact = new Contact();
        $contact->email = $data['email'];
        $contact->location = $data['location'];
        $contact->phone = $data['phone'];
        $contact->google_map = $data['google_map'];

        $contact->save();

        return redirect()->back()->with('message', "Thêm liên hệ thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact_edit = Contact::find($id);
        $list_contact = Contact::orderBy('id','DESC')->get();
        return view('admin.contact.create')->with(compact('list_contact','contact_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'email' => 'required',
                'location' => 'required',
                'phone' => 'required',
                'google_map' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống',
                'location.required' => 'Địa chỉ không được bỏ trống',
                'phone.required' => 'Điện thoại không được bỏ trống',
                'google_map.required' => 'Địa chỉ trên google map không được bỏ trống',

            ]
        );
        $data = $request->all();
        $contact = Contact::find($id);
        $contact->email = $data['email'];
        $contact->location = $data['location'];
        $contact->phone = $data['phone'];
        $contact->google_map = $data['google_map'];

        $contact->save();
        return redirect()->route('contact.create')->with('message',"Cập nhật liên hệ thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();
        return redirect()->back()->with('message',"Xóa liên hệ thành công");
    }
}
