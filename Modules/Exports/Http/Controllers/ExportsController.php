<?php

namespace Modules\Exports\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Domains\Auth\Models\User;
use Modules\Exports\Exports\UsersDataExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */  
    public function index()
    {
        return view('exports::index', [
            'users' => User::all(),
        ]);
    }
    
    public function exportExcel()
    {
        return Excel::download(new UsersDataExport, 'text_excel.xlsx');
    }
 
} 