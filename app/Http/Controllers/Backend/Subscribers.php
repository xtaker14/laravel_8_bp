<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Subscribers_model;
use App\Models\Subscribers_email_model;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterEmail;

class Subscribers extends Controller
{ 
    private function validator($request, $case='insert'){
        $messages = [
            'inp_email.required' => 'Please enter the email.',     
            'inp_email.unique' => 'The email has already been taken.',     
            'inp_name.required' => 'Please enter the name.',
        ];

        $validator = [];
        switch ($case) {
            case 'insert':
                $validator = Validator::make($request->all(), [
                    "inp_email" => "required|email|unique:statistik_data,title",
                    "inp_name" => "required",
                ], $messages);
                break;
            case 'update':
                $validator = Validator::make($request->all(), [
                    "inp_email" => ['required','email', \Illuminate\Validation\Rule::unique('statistik_data', 'title')->ignore($request->inp_id)],
                    "inp_name" => "required",
                ], $messages);
                break;
            case 'send_email':
                $validator = Validator::make($request->all(), [
                    "txt_content_email" => "required",
                ], $messages);
                break;
        }

        return $validator;
    }

    // Index
    public function index()
    {
        $model_subscribers = new Subscribers_model(); 
        $subscribers = $model_subscribers
            ->orderBy('id', 'DESC')
            ->get();

        $data = [
            "title" => "Subscribers",
            "subscribers" => $subscribers,
            "content" => "backend/subscribers/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // send_email
    public function send_email(Request $request)
    {
        $validator = $this->validator($request, 'send_email');
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = array(
            "message" => $request->txt_content_email
        );
        
        $model_subscribers = new Subscribers_model(); 
        $subscribers = $model_subscribers
            ->orderBy('id', 'DESC')
            ->get();

        foreach($subscribers as $val){
            // $pasdata = ['name' => "Virat Gandhi"];
            // Mail::send(['text' => 'mail'], $pasdata, function ($message)
            // {
            //     $message->to('abc@gmail.com', 'Lorem Ipsum')
            //         ->subject('Laravel Basic Testing Mail')
            //         ->from('xyz@gmail.com', $pasdata['name']);
            // });

            $to_email = $val->email;
            Mail::to($to_email)->send(new NewsletterEmail($data));

            if(Mail::failures()) {
                return redirect()->back()->with("errors", "E-mail not sent!");
            } 
        }

        $model_subscribers_email = new Subscribers_email_model();
        $model_subscribers_email->insert([
            "to_email" => 'all',
            "content" => $request->txt_content_email,
            "created_by" => $this->logged_in_user->id,
        ]);

        return redirect("admin/subscribers")->with([
            "sukses" => "Email telah dikirim",
        ]);
    }

    // tambah
    public function tambah(Request $request)
    {
        $validator = $this->validator($request, 'insert');
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model_subscribers = new Subscribers_model();
        $model_subscribers->insert([
            "email" => $request->inp_email,
            "name" => $request->inp_name,
            "hit" => 1,
            "created_by" => $this->logged_in_user->id,
        ]);

        return redirect("admin/subscribers")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit(Request $request)
    {
        $validator = $this->validator($request, 'update');
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model_subscribers = new Subscribers_model();
        $model_subscribers
            ->where("id", $request->inp_id)
            ->update([
                "email" => $request->inp_email,
                "name" => $request->inp_name,
                "updated_by" => $this->logged_in_user->id,
                "updated_date" => date("Y-m-d H:i:s"),
            ]);
        return redirect("admin/subscribers")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Delete
    public function delete($id)
    {
        $model_subscribers = new Subscribers_model();
        $model_subscribers
            ->where("id", $id)
            ->delete();

        return redirect("admin/subscribers")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
