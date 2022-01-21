<?php

namespace App\Http\Controllers;

use App\Models\ContactUsForm;
use Illuminate\Http\Request;

class ContactUsFormController extends Controller
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
        //
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
        // Form validation
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
         ]);

        //  Store data in database
        $contact = new ContactUsForm;
        $contact->full_name = $request->get('full_name');
        $contact->full_name = $request->get('email');
        $contact->full_name = $request->get('phone');
        $contact->full_name = $request->get('message');

        //Let's add a honeypot to reduce the amount of spam received from the form. We can trick the spam to think the form was submitted by adding the following.

        if ($request->faxonly) {
            return redirect()->back()
                ->withSuccess('Your form has been submitted');
                }
        if(preg_match('/http|https|www|sex|cialis/i',$request->full_name)) {
            return redirect()->back()
                ->withSuccess('Your form has been submitted');
          } 

        if(preg_match('/.ru|.xyz/i',$request->email)) {
            return redirect()->back()
                ->withSuccess('Your form has been submitted');
          }  

        if(preg_match('/sex|Cialis|cialis/i',$request->message)) {
            return redirect()->back()
                ->withSuccess('Your form has been submitted');
          } 

          if(filter_var($request->Email, FILTER_VALIDATE_EMAIL) == false)
            {
            return redirect()->back()
                ->withSuccess('Thank you! Your form has been submitted');
          } 

        else
        //else form results didn't land in the honeypot let's save the form data to the db
        $contact->save();

        // Now let's collect the data to send in an email.
        $contact = $contact;
        $contact = array(
        'full_name' => $request->get('full_name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'message' => $request->get('message'),
            'from' => 'guy-smiley@example.com',
            'from_name' => "Guy Smiley",
            'bcc' => array('guy-smiley@example.com')
            );

        //We can now send the results to the visitor's email and a copy to Guy Smiley...
    \Mail::send( 'emails.contactUsEmailReply', $contact, function( $message ) use ($contact)
    {
        $message->to( $contact['email'] )->bcc( $contact['bcc'] )->from( $contact['from'], $contact['from_name'] )->subject( $contact['full_name'] . ' ' . 'Thank You For Contacting Guy Smiley' )->getSwiftMessage()->getHeaders()->addTextHeader('Content-Type', 'text/xml');
    });

    //if the hidden field called faxonly was checked on the form. Give a fake success message without submitting the form. 
    if ($request->faxonly) { 
        return $this->formResponse(); 
    } 
    
    //otherwise submit the form and say thank you
    return $this->formResponse(); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUsForm  $contactUsForm
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUsForm $contactUsForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUsForm  $contactUsForm
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUsForm $contactUsForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUsForm  $contactUsForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUsForm $contactUsForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUsForm  $contactUsForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUsForm $contactUsForm)
    {
        //
    }
}
