<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

use App\Jobs\EmailJob;
use Mail;
use Storage;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Email::all();
        return response()->json($email);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $request->validate([
            'email_address'  =>  ['required', 'string', 'email'],
            // 'attachment' => ['mimes:pdf,docx,doc'],
        ]);

        $storage_path = '/public/files/';

        $email = new Email();

        $email->email_address =$request->input('email_address');
        $email->subject =$request->input('subject');
        $email->body = $request->input('body');
        $email->attachment = $request->attachment;

        $email->save();

        $subject = $email->subject;
        $body = $email->body;
        $attachment = $email->attachment;
        $email_address = $email->email_address;

        EmailJob::dispatch($email_address, $subject, $body, $attachment, '');

        return response()->json($email);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
