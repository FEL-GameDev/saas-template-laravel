<?php

use App\Http\Requests\api\Auth\ApiLoginRequest;
use App\Http\Requests\Users\PasswordUpdateRequest;
use App\Http\Requests\Users\ProfileUpdateRequest;
use App\Services\User\GetUser;
use App\Services\User\UserPasswordUpdate;
use App\Services\User\UserProfileUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/ping', function () {
    return "Pong";
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (ApiLoginRequest $request) {
    $user = GetUser::getByEmail($request->email);

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return ["token" => $user->createToken($request->device_name)->plainTextToken];
});

Route::middleware('auth:sanctum')->post("/user/profile/update", function (ProfileUpdateRequest $request) {
    UserProfileUpdate::update($request->user(), $request->validated());

    return $request->user();
});

Route::middleware('auth:sanctum')->post("/user/password/update", function (PasswordUpdateRequest $request) {
    UserPasswordUpdate::update($request->user(), $request->validated()['password']);

    return $request->user();
});
