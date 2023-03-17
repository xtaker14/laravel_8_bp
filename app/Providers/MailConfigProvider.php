<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
// use Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class MailConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if(\Schema::hasTable('konfigurasi')) {

            $db_config = DB::table('konfigurasi')->first();

            if(!is_null($db_config)) {

                $config = array(
                    'driver' => $db_config->smtp_protocol,
                    'host' => $db_config->smtp_host,
                    'port' => $db_config->smtp_port,
                    'username' => $db_config->smtp_user,
                    'password' => $db_config->smtp_pass,
                    'encryption' => $db_config->smtp_encryption,
                    'from' => [
                        'address' => $db_config->smtp_sender_email,
                        'name' => $db_config->smtp_sender_name,
                    ],
                    'timeout' => $db_config->smtp_timeout,
                    // 'auth_mode' => null,
                );

                Config::set('mail', $config);
                // config(['mail' => $config]);
                // dd(config());
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer(['backend'], function ($view) {
            // $config = array(
            //     // 'default' => $db_config->smtp_protocol,
            //     'mailers' => [
            //         'smtp' => [
            //             'transport' => $db_config->smtp_protocol,
            //             'host' => $db_config->smtp_host,
            //             'port' => $db_config->smtp_port,
            //             'username' => $db_config->smtp_user,
            //             'password' => $db_config->smtp_pass,
            //             'encryption' => $db_config->smtp_encryption,
            //             'timeout' => $db_config->smtp_timeout,
            //             // 'auth_mode' => null,
            //         ],
            //         // 'sendmail' => [
            //         //     'transport' => 'sendmail',
            //         //     'path' => '/usr/sbin/sendmail -bs',
            //         // ],
            //     ], 
            //     'from' => [
            //         'address' => $db_config->smtp_sender_email,
            //         'name' => $db_config->smtp_sender_name,
            //     ],
            // );
        // });
    }
}
