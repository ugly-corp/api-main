<?php

namespace App\Http\Controllers\Mobile;

use App\Events\UserLogoutEvent;
use App\Events\UserRegisteredEvent;
use App\Events\UserSuccesfullyLoggedEvent;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Mobile\UserLoginRequest;
use App\Http\Requests\Mobile\UserRegisterRequest;
use App\Http\Resources\Mobile\LoginResource;
use App\Http\Resources\Mobile\UserSuccesfullyRegisteredResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Str;

class AuthController extends ApiController
{
    public function login (UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        event(new UserSuccesfullyLoggedEvent());
        $token = $user->createToken($request->device_name)->plainTextToken;
        return new LoginResource(['token' => $token, 'user' => $user]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        event(new UserLogoutEvent);
        return response()->json();
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $validatedData['remember_token'] = Str::random(10);
            $validatedData['password'] = Hash::make($validatedData['password']);
            $user = User::create($validatedData);
        } catch (\Exception $e) {
            return response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Не удалось создать пользователя',
                'errorMessage' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        event(new UserRegisteredEvent);

        $token = $user->createToken($request->device_name)->plainTextToken;
        return new UserSuccesfullyRegisteredResource(['token' => $token, 'user' => $user]);
    }
}
