<?php

namespace App\Domains\Auth\Services;

use App\Domains\Auth\Models\PersonalAccessToken as PAToken;  
use App\Domains\Auth\Models\User; 
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AuthApiService.
 */
class AuthApiService extends BaseService
{
    /**
     * AuthApiService constructor.
     *
     * @param  PAToken  $authapi
     */
    public function __construct(PAToken $authapi)
    {
        $this->model = $authapi;
    }

    /**
     * @param  array  $data
     * @return array $response
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Array
    {
        DB::beginTransaction(); 

        try {
            $user = User::where('id', $data['user'])->first();
            if(!$user) {
                DB::rollBack(); 
                throw new GeneralException(__('There was a problem creating the Auth API. (User data not found)'));
            }

            // $check_pat = PAToken::where([
            //     'tokenable_id'=>$data['user'],
            //     'name'=>$data['name'],
            // ])->get();

            // dd($check_pat);

            $get_token = $user->createToken($data['name'], [$data['abilities']]);
            
            $data_update = [
                'token_non_hash' => $get_token->plainTextToken,  
            ]; 
            
            PAToken::where([
                'id'=>$get_token->accessToken->id,
            ])->update($data_update);

            $response = [
                'user' => $user,
                'token_id' => $get_token->accessToken->id,
                'token' => $get_token->plainTextToken,
            ]; 
        } catch (Exception $e) {
            DB::rollBack(); 

            throw new GeneralException(__('There was a problem creating the Auth API. (' . $e->getMessage() . ')'));
        } 

        DB::commit();

        return $response;
    }

    /**
     * @param  PAToken  $authapi
     * @param  array  $data
     * @return PAToken
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(PAToken $authapi, array $data = []): PAToken
    {
        DB::beginTransaction();

        $exp_controller_method = [];
        $controller_name = null;
        $method_name = null;
        if($data['is_parent_menu'] == 'no'){
            if($data['is_module'] == 'yes'){
                $exp_controller_method = explode('@', $data['m_controller_name']);
            }else if($data['is_module'] == 'no'){
                $exp_controller_method = explode('@', $data['non_m_controller_name']);
            }

            if(empty($exp_controller_method) || count($exp_controller_method) == 1){
                DB::rollBack(); 
                throw new GeneralException(__('There was a problem creating the Auth API. (Controller not found)'));
            }
            $controller_name = $exp_controller_method[0];
            $method_name = $exp_controller_method[1];
        }

        try {
            $data_update = [
                'type' => $data['type'], 
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'],
                'sort' => $data['sort'],
                'is_active' => $data['is_active'],
                'is_editable' => 'yes',
                'is_menu' => $data['is_menu'],
                'is_module' => $data['is_module'],
                'module_name' => $data['module_name'],
                'controller_name' => $controller_name,
                'method_name' => $method_name,
                'menu_url' => $data['menu_url'],
                'menu_route' => $data['menu_route'],
            ];

            if($data['is_parent_menu'] == 'yes'){
                $data_update['is_module'] = 'no';
                $data_update['module_name'] = null;
            }
            
            $categories->update($data_update);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Auth API. (' . $e->getMessage() . ')'));
        } 

        DB::commit();

        return $categories;
    }

    /**
     * @param  PAToken  $authapi
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PAToken $authapi): bool
    {
        // if ($authapi->users()->count()) {
        //     throw new GeneralException(__('You can not delete a Auth API with associated users.'));
        // } 

        foreach($authapi->user()->first()->get() as $k => $v){
            dump($k, $v);
        }
        exit;

        dd($authapi, $authapi->user()->first());
        // auth()->user()->tokens()->delete();

        throw new GeneralException(__('There was a problem deleting the Auth API.'));
    }
    
}
