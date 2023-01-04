<?php

namespace Modules\Exports\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use App\Domains\Auth\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class UsersDataExport implements FromCollection
class UsersDataExport implements FromView, ShouldAutoSize
{

    use Exportable;

    private $users;

    public function __construct(){
        $this->users = User::all();
    }

    // public function view() : View {
    //     return view('backend.exports.excel', [
    //         'users' => $this->users,
    //     ]);
    // }

    public function view() : View {
        return view('exports::export_to_excel', [
            'users' => $this->users,
        ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    // }
}
