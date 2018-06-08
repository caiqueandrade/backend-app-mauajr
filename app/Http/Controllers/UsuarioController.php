<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{

  public function findAll()
  {
    return response(User::all()->toJson(), 200);
  }

  public function findByID($id)
    {
        return response(User::where('id', $id)->get()->toJson(), 200); // where or find?
    }

   public function create(Request $request)
   {
      try
      {
         $user = new User;
         
         $user->name       = $request->input('name');
         $user->email      = $request->input('email');
         $user->password   = bcrypt($request->input('password'));
         $user->save();

        //  $user->hash_id = \FeedbackHunterAPI\Helpers\ID::encode($user->id);
        //  $user->save();
      }
      catch (\Illuminate\Database\QueryException $exception)
      {
         if ($exception->errorInfo[1] === 1062)
         {
            return response()->json([
               'success' => 'false',
               'message' => 'Usuário em duplicidade'
            ], 400);
         }
         else
         {
            return response()->json([
               'success' => 'false',
               'message' => 'Usuário não pode ser cadastrado'
            ], 400);
         }
      }

      return response()->json([
         'success' => 'true',
         'message' => 'Usuário cadastrado com sucesso'
      ]);
   }
}
