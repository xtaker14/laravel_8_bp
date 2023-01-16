<?php
namespace App\Domains\Auth\Http\Controllers;

use App\Domains\Auth\Http\Requests\Backend\AuthApi\StoreRequest;
use App\Domains\Auth\Http\Requests\Backend\AuthApi\DeleteRequest;
use App\Domains\Auth\Http\Requests\Backend\AuthApi\EditRequest;
use App\Domains\Auth\Http\Requests\Backend\AuthApi\UpdateRequest;
use App\Domains\Auth\Services\AuthApiService;
use App\Domains\Auth\Models\User; 
use App\Domains\Auth\Models\PersonalAccessToken as PAToken; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class AuthApiController 
{

    /**
     * @var AuthApiService
     */
    protected $authApiService;

    /**
     * AuthApiController constructor.
     *
     * @param  AuthApiService  $authApiService
     */
    public function __construct(AuthApiService $authApiService)
    {
        $this->authApiService = $authApiService;
    }

    public function index() {
        return view('backend.auth.api.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.auth.api.create', []);
    }

    /**
     * @param  StoreRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRequest $request)
    {
        $get_token = $this->authApiService->store($request->validated());

        return redirect()->route('admin.auth.api.index')->withFlashSuccess(__('The auth api was successfully created. ('.$get_token['token'].')'));
    }

    /**
     * @param  EditRequest  $request
     * @param  PAToken  $authapi
     * @return mixed
     */
    public function edit(EditRequest $request, PAToken $authapi)
    {
        return view('backend.auth.api.edit', [])->withAuthApi($authapi);
    }

    /**
     * @param  UpdateRequest  $request
     * @param  PAToken  $authapi
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRequest $request, PAToken $authapi)
    {
        $this->authApiService->update($authapi, $request->validated());

        return redirect()->route('admin.auth.api.index')->withFlashSuccess(__('The auth api was successfully updated.'));
    }

    /**
     * @param  DeleteRequest  $request
     * @param  PAToken  $authapi
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteRequest $request, PAToken $authapi)
    {
        $get_authapi = $authapi->findOrFail($request->route()->parameter('api'));
        $this->authApiService->destroy($get_authapi);

        return redirect()->route('admin.auth.api.index')->withFlashSuccess(__('The auth api was successfully deleted.'));
    } 

    // public function register(Request $request) {
    //     $fields = $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|string|unique:users,email',
    //         'password' => 'required|string|confirmed'
    //     ]);

    //     $user = User::create([
    //         'name' => $fields['name'],
    //         'email' => $fields['email'],
    //         'password' => bcrypt($fields['password'])
    //     ]);

    //     $token = $user->createToken('myapptoken')->plainTextToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];

    //     return response($response, 201);
    // }

    public function login(Request $request) {
        // $fields = $request->validate([
        //     'email' => 'required|string',
        //     'password' => 'required|string'
        // ]);

        // Check email
        $user = User::where('email', 'user@user.com')->first();
        $tes = PAToken::where([
            'tokenable_id'=>2,
            'name'=>'myapptoken',
        ])->get();

        dd($tes);

        // Check password
        // if(!$user || !Hash::check($fields['password'], $user->password)) {
        //     return response([
        //         'message' => 'Bad creds'
        //     ], 401);
        // }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    // public function destory(Request $request) {
    //     auth()->user()->tokens()->delete();

    //     return [
    //         'message' => 'The token has been successfully destroyed'
    //     ];
    // }
}
