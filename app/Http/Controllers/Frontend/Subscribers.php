<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use App\Models\Subscribers_model;

class Subscribers extends Controller
{ 
    public function process(Request $request)
    {
        // request()->validate([
        //     "inp_email" => "required|email|unique:subscribers",
        //     "inp_name" => "required",
        // ]);

        $messages = [
            'inp_email.email' => 'The email must be a valid email address.',     
            'inp_email.required' => 'Please enter Email.',     
            'inp_name.required' => 'Please enter Name.'
        ];

        $validator = Validator::make($request->all(), [
            "inp_email" => "required|email|unique:subscribers,email",
            "inp_name" => "required",
        ], $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $site_config = $this->getConfigSite();
        $model_subscribers = new Subscribers_model();
        $statistik_data = $model_subscribers
            ->where('email', $request->inp_email)
            ->first();
        
        $hit = 1;
        if($statistik_data){
            $hit += $statistik_data->hit;
        }
        $model_subscribers->insert([
            "email" => $request->inp_email,
            "name" => $request->inp_name,
            "hit" => $hit,
        ]);

        Session()->put('subs_email', $request->inp_email);
        Session()->put('subs_name', $request->inp_name);

        session()->flash('flash_sukses_subscribe', 'Subscribe berhasil');

        return redirect("/");
    }
}
