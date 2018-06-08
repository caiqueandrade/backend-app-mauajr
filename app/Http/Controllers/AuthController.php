<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
   /**
    * Create a new AuthController instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth:api', ['except' => ['login']]);
   }

   /**
    * @SWG\Post(
    *    path="/login",
    *    summary="Login do usuário",
    *    tags={"user"},
    *    operationId="loginUser",
    *    produces={"application/json"},
    *    @SWG\Parameter(
    *        name="body",
    *        in="body",
    *        required=true,
    *        @SWG\Schema(ref="#/definitions/User"),
    *    ),
    *    @SWG\Response(
    *       response="200", 
    *       description="Operação realizada com sucesso"
    *    ),
    *    @SWG\Response(
    *       response="400", 
    *       description="Operação inválida"
    *    )
    * )
    */
   public function login(Request $request)
   {
      $credentials = [
         'email' => $request->email,
         'password' => $request->password
      ];

      if (!$token = auth()->attempt($credentials))
      {
         return response()->json([
            'success' => 'false',
            'message' => 'Usuário ou senha inválidos'
         ], 401);
      }

      $user = auth()->user();

      return $this->respondWithToken($token);
   }

   /**
    * Get the authenticated User.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function me()
   {
      return response()->json(auth()->user());
   }

   /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function logout()
   {
      auth()->logout();

      return response()->json([
         'success' => 'true',
         'message' => 'Successfully logged out'
      ], 200);
   }

   /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function refresh()
   {
      return $this->respondWithToken(auth()->refresh());
   }

   /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
   protected function respondWithToken($token)
   {
      $user = User::where('id', auth()->user()->id)->first();

      return response()->json([
         'success' => 'true',
         'message' => [
            'token' => $token,
            'user'  => [
               'name' => $user->name,
               'email' => $user->email
            ]
         ]
      ], 200);
   }
}