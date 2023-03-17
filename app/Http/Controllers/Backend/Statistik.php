<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Statistik_data_model;

class Statistik extends Controller
{ 
    private function validator($request, $is_update=false){
        $messages = [
            'inp_title.required' => 'Please enter the title.',     
            'inp_title.unique' => 'The title has already been taken.',     
            'inp_subtitle.required' => 'Please enter the subtitle.',
            'inp_value.required' => 'Please enter the value.',
            'inp_value.numeric' => 'The value must be a number.',
            'inp_urutan.required' => 'Please enter the urutan.',
        ];

        $validator = [];
        if(!$is_update){
            $validator = Validator::make($request->all(), [
                "inp_title" => "required|unique:statistik_data,title",
                "inp_subtitle" => "required",
                // "inp_value" => "required|integer",
                "inp_value" => "required|numeric",
                "inp_urutan" => "required",
            ], $messages);
        }else{
            $validator = Validator::make($request->all(), [
                // "inp_title" => "required|unique:statistik_data,title",
                "inp_title" => ['required', \Illuminate\Validation\Rule::unique('statistik_data', 'title')->ignore($request->inp_id)],
                "inp_subtitle" => "required",
                "inp_value" => "required|numeric",
                "inp_urutan" => "required",
            ], $messages);
        }

        return $validator;
    }

    // Index
    public function index()
    {
        $model_statistik_data = new Statistik_data_model(); 
        $statistik_data = $model_statistik_data
            ->orderBy('urutan', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();

        $data = [
            "title" => "Statistik Data",
            "statistik_data" => $statistik_data,
            "content" => "backend/statistik/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    // tambah
    public function tambah(Request $request)
    {
        // request()->validate([
        //     "inp_title" => "required|unique:statistik_data,title",
        //     "inp_subtitle" => "required",
        //     // "inp_value" => "required|integer",
        //     "inp_value" => "required|numeric",
        //     "inp_urutan" => "required",
        // ]);

        $validator = $this->validator($request, false);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model_statistik_data = new Statistik_data_model();
        $model_statistik_data->insert([
            "title" => $request->inp_title,
            "subtitle" => $request->inp_subtitle,
            "value" => $request->inp_value,
            "urutan" => $request->inp_urutan,
            "created_by" => $this->logged_in_user->id,
        ]);

        return redirect("admin/statistik")->with([
            "sukses" => "Data telah ditambah",
        ]);
    }

    // edit
    public function edit(Request $request)
    {
        // request()->validate([
        //     // "inp_title" => "required|unique:statistik_data,title",
        //     "inp_title" => ['required', \Illuminate\Validation\Rule::unique('statistik_data')->ignore($request->inp_id)],
        //     "inp_subtitle" => "required", 
        //     "inp_value" => "required|numeric",
        //     "inp_urutan" => "required",
        // ]);

        $validator = $this->validator($request, true);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model_statistik_data = new Statistik_data_model();
        $model_statistik_data
            ->where("id", $request->inp_id)
            ->update([
                "title" => $request->inp_title,
                "subtitle" => $request->inp_subtitle,
                "value" => $request->inp_value,
                "urutan" => $request->inp_urutan,
                "updated_by" => $this->logged_in_user->id,
                "updated_date" => date("Y-m-d H:i:s"),
            ]);
        return redirect("admin/statistik")->with([
            "sukses" => "Data telah diupdate",
        ]);
    }

    // Delete
    public function delete($id)
    {
        $model_statistik_data = new Statistik_data_model();
        $model_statistik_data
            ->where("id", $id)
            ->delete();

        return redirect("admin/statistik")->with([
            "sukses" => "Data telah dihapus",
        ]);
    }
}
