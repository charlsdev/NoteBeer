<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Str;

class LoginController extends Controller
{
   public function renderLogin()
   {
      return view('login');
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required|min:8|unique:users',
         'email' => 'required|email|unique:users',
         'password' => 'required|min:8|confirmed',
      ]);

      $user = new User();
      $user -> name = $request -> name;
      $user -> email = $request -> email;
      $user -> password = $this -> encryptPass($request -> password);
      $result = $user -> save();

      if ($result) {
         // $uuid = Str::uuid()->toString();
         $uuid = $this -> generateCodeVer(8);

         $details = [
            'fromAddress' => env('MAIL_FROM_ADDRESS'),
            'fromName' => 'Note Beer',
            'nameUser' => $request -> name,
            'code' => $uuid
         ];

         Mail::to($request -> email)
            ->send(new \App\Mail\RegisterMailable($details));

         return \redirect()
            ->to('/')
            ->with('success', 'Usuario registrado con éxito');
      } else {
         return \redirect()
            ->to('/')
            ->with('error', 'Usuario no registrado');
      }
   }

   // Funcion para encriptar la password
   public function encryptPass($password)
   {
      return \bcrypt($password);
   }

   // Funtion para generar un código
   public function generateCodeVer($length) {
      $characters = '0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_-@$';
      $charactersLength = strlen($characters);
      $code = '';
      for ($i = 0; $i < $length; $i++) {
         $code .= $characters[rand(0, $charactersLength - 1)];
      }
      return $code;
   }

   public function renderWelcome()
   {
      return view('welcome');
   }

   public function renderEmail()
   {
      return view('email');
   }
}
