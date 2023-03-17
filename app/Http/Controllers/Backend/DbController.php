<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Controller;
use App\Models\Konfigurasi_model;
use Illuminate\Support\Facades\File;

/**
 * Class DashboardController.
 */
class DbController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // return view('backend.dashboard');

        $mysite = new Konfigurasi_model();
        $site = $mysite->listing();

        $data = [
            "title" => $site->namaweb . " - Database",
            "content" => "backend/db/index",
        ];
        return view("backend/layout/wrapper", $data);
    }

    private function backup_update_sql(){
        // ENTER THE RELEVANT INFO BELOW
        $mysqlHostName = env('DB_HOST');
        $mysqlUserName = env('DB_USERNAME');
        $mysqlPassword = env('DB_PASSWORD');
        $DbName = env('DB_DATABASE');
        $tables = array(
            // here your tables...
            'agenda',
            'berita',
            'download',
            'galeri',
            'heading',
            'kategori',
            'kategori_agenda',
            'kategori_download',
            'kategori_galeri',
            'kategori_staff',
            'konfigurasi',
            'rekening',
            'staff',
            'video',

            // new
            'kontak_email',
            'statistik_data',
            'subscribers',
            'subscribers_email',
        );

        $connect = new \PDO("mysql:host=$mysqlHostName;dbname=$DbName;charset=utf8", "$mysqlUserName", "$mysqlPassword", array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $get_all_table_query = "SHOW TABLES";
        $statement = $connect->prepare($get_all_table_query);
        $statement->execute();
        // $result = $statement->fetchAll();

        $output = '';
        foreach ($tables as $table) {
            $show_table_query = "SHOW CREATE TABLE " . $table . "";
            $statement = $connect->prepare($show_table_query);
            $statement->execute();
            $show_table_result = $statement->fetchAll();

            foreach ($show_table_result as $show_table_row) {
                $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
            }
            $select_query = "SELECT * FROM " . $table . "";
            $statement = $connect->prepare($select_query);
            $statement->execute();
            $total_row = $statement->rowCount();

            for ($count = 0; $count < $total_row; $count++) {
                $single_result = $statement->fetch(\PDO::FETCH_ASSOC);
                $table_column_array = array_keys($single_result);
                $table_value_array = array_values($single_result);
                $output .= "\nINSERT INTO $table (";
                $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
                $output .= "'" . implode("','", $table_value_array) . "');\n";
            }
        }

        return $output;
    }

    public function backup_db()
    { 
        $output = $this->backup_update_sql();

        $file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
        $file_handle = fopen($file_name, 'w+');
        fwrite($file_handle, $output);
        fclose($file_handle);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_name));
        ob_clean();
        flush();
        readfile($file_name);
        unlink($file_name);

        return redirect()->back();
    }

    public function update_impot_sql()
    {
        $output = $this->backup_update_sql();
        // // Write the contents of a file
        // File::put('path', 'contents');
        // // Append to a file
        // File::append('path', 'data');
        // // Delete the file at a given path
        // File::delete('path'); 

        $file_import_name = database_path() . '\import\import.sql';
        if (File::exists($file_import_name)) {
            File::delete($file_import_name);
        }
        $res_create_sql = File::put($file_import_name, $output);

        session()->flash('flash_update_impot_sql', 'Update file Import.sql berhasil');
        return redirect()->back();
    }
}