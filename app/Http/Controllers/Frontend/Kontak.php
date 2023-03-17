<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Frontend\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Kontak_email_model;
use Illuminate\Support\Facades\Mail;
use App\Mail\KontakEmail;

class Kontak extends Controller
{
    // kontak
    public function kontak()
    {
        $site_config = $this->getConfigSite();

        $data = [
            'title' => 'Menghubungi ' . $site_config->namaweb, 
            'deskripsi' => 'Kontak ' . $site_config->namaweb, 
            'keywords' => 'Kontak ' . $site_config->namaweb, 
            'content' => 'frontend/home/kontak'
        ];
        return view('frontend/layout/wrapper', $data);
    }

    public function send_email(Request $request)
    {
        $messages = [
            'inp_email.email' => 'The email must be a valid email address.',
            'inp_email.required' => 'Please enter the email.',
            'inp_full_name.required' => 'Please enter the full name.',
            'inp_contact.required' => 'Please enter the contact.',
            'inp_subject.required' => 'Please enter the subject.',
            'txt_content_email.required' => 'Please enter the content.',
        ];

        $validator = Validator::make(
            $request->all(),
            [
                'inp_email' => 'required|email|max:150',
                'inp_full_name' => 'required|max:150',
                'inp_contact' => 'required|numeric|digits_between:10,20',
                'inp_subject' => 'required|max:255',
                'txt_content_email' => 'required',
            ],
            $messages,
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'message' => $request->txt_content_email,
            'subject' => $request->inp_subject,
        ];

        Mail::to($request->inp_email)->send(new KontakEmail($data));

        if (Mail::failures()) {
            return redirect()
                ->back()
                ->with('errors', 'E-mail not sent!');
        }

        $model_kontak_email = new Kontak_email_model();  
        $model_kontak_email->insert([
            "email" => $request->inp_email,
            "full_name" => $request->inp_full_name,
            "contact" => $request->inp_contact,
            "subject" => $request->inp_subject, 
            "content" => $request->txt_content_email,
        ]);

        session()->flash('flash_sukses_kontak', 'Email telah berhasil dikirim');
        
        return redirect('kontak');
    }
}
