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

        $response = [];
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
    public function update(PAToken $authapi, array $data = [])
    {
        DB::beginTransaction(); 

        $response = [];
        try {
            // $user = User::where('id', $data['user'])->first();
            // if(!$user) {
            //     DB::rollBack(); 
            //     throw new GeneralException(__('There was a problem updating the Auth API. (User data not found)'));
            // } 
            $user = $authapi->user();
            if ($user->count() == 0) {
                DB::rollBack(); 
                throw new GeneralException(__('There was a problem updating the Auth API. (User data not found)'));
            } 
            
            $data_update = [
                'name' => $data['name'], 
                'abilities' => [$data['abilities']], 
            ]; 
            
            $authapi->update($data_update);

            $response = [
                'user' => $user,
                'token_id' => $authapi->id,
                'token' => $authapi->token_non_hash,
            ]; 
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the Auth API. (' . $e->getMessage() . ')'));
        } 

        DB::commit();

        return $response;
    }

    /**
     * @param  PAToken  $authapi
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PAToken $authapi): bool
    {
        // if ($authapi->user()->count()) {
        //     throw new GeneralException(__('You can not delete a Auth API with associated users.'));
        // } 

        // auth()->user()->tokens()->delete();
        $get_user = $authapi->user();
        if ($get_user->count() > 0) {
            $get_user->first()->tokens()->where('id', $authapi->id)->delete();
            return true;
        } 


        throw new GeneralException(__('There was a problem deleting the Auth API.'));
    }
    
}
