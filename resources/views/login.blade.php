@extends('layouts.app')

@section('tittle')
   Note Beer
@endsection

@section('cssFiles')
   <link rel="stylesheet" href="css/style.css"/>
   <link rel="stylesheet" href="libs/toastJS/jquery.toast.min.css"/>
   <link rel="stylesheet" href="css/toastJS.min.css"/>
@endsection

@section('content')
   <section class="main">
      <div class="main-img">
         <img src="img/model.svg"/>
      </div>

      <!-- Mensaje de Bienvenida -->
      <div class="text-btns">
         <p>Hola 🙌! seas bienvenido. El sistema <b>Note Bear</b> es un sitema de nota interactivo y con una interfaz clara y entendible.</p>

         <div class="btns">
            <a href="javascript: void(0)" class="login-btn">Login</a>
            <a href="javascript: void(0)" class="sign-up-btn">Sign Up</a>
         </div>
      </div>

      <!-- Form Login -->
      <div class="side-login">
         <a href="javascript: void(0)" class="login-cancel-btn">
            <i class="fas fa-times"></i>
         </a>

         <strong>Iniciar Sesión</strong>

         <form action="" method="POST">
            @csrf

            <label>Email<samp>*</samp></label>
            <div class="email">
               <i class="far fa-paper-plane"></i>
               <input type="email" name="email" required>
            </div>

            <label>Password<samp>*</samp></label>
            <div class="password">
               <i class="fas fa-lock"></i>
               <input type="password" name="password" required>
            </div>

            <input type="submit" name="login" class="login" value="Login">
         </form>

         <div class="relative-text">
            <span>Bienvenido a Note Beer</span>
            <p>
               Registrarse en este sitio le permite acceder al estado y al historial de sus notas. Solo te pediremos la información necesaria para que el proceso de inicio de sesión sea más rápido y sencillo.
            </p>

         </div>
      </div>

      <!-- Form Register -->
      <div class="side-sign-up">
         <a href="javascript: void(0)" class="sign-up-cancel-btn">
            <i class="fas fa-times"></i>
         </a>

         <strong>Registrarse</strong>

         <form action="{{ route('saveNewUser') }}" method="POST">
            @csrf

            <label>Usuario<samp>*</samp></label>
            <div class="name">
               <i class="far fa-copy"></i>
               <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <label>Email<samp>*</samp></label>
            <div class="email">
               <i class="far fa-paper-plane"></i>
               <input type="email" name="email" value="{{ old('email') }}" required>
            </div>

            <label>Password<samp>*</samp></label>
            <div class="password">
               <i class="fas fa-lock"></i>
               <input type="password" name="password" value="{{ old('password') }}" required>
            </div>

            <label>Confirm Password<samp>*</samp></label>
            <div class="password">
               <i class="fas fa-lock"></i>
               <input type="password" name="password_confirmation" value="{{ old('passwordConfR') }}" required>
            </div>

            <input type="submit" name="login" class="sign-up" value="Registrarse">
         </form>

         <div class="relative-text">
            <span>Registrarse en Note Beer</span>
            <p>
               Registrarse en este sitio le permite acceder al panel principal y poder crear, listar, actulizar y eliminar sus notas. Simplemente complete los campos a continuación y obtendremos una nueva cuenta configurada para usted en poco tiempo. Solo te pediremos la información necesaria para que el proceso de registro sea más rápido y sencillo.
            </p>
         </div>
      </div>
   </section>
@endsection

@section('jsFiles')
   <script type="text/javascript" src="js/jquery.js"></script>
   <script type="text/javascript" src="libs/toastJS/jquery.toast.min.js"></script>
   <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

   <script type="text/javascript">
      $(document).on('click','.login-btn,.sign-up-btn',function(){
         $('.main').addClass('main-active')
      });

      $(document).on('click','.login-btn',function(){
         $('.side-login').addClass('side-login-active')
      });

      $(document).on('click','.sign-up-btn',function(){
         $('.side-sign-up').addClass('side-sign-up-active')
      });

      $(document).on('click','.sign-up-cancel-btn,.login-cancel-btn',function(){
         $('.main').removeClass('main-active')
      });
      $(document).on('click','.login-cancel-btn',function(){
         $('.side-login').removeClass('side-login-active')
      });
      $(document).on('click','.sign-up-cancel-btn',function(){
         $('.side-sign-up').removeClass('side-sign-up-active')
      });
   </script>

   @if(session('success'))
      <script>
         $(document).ready(function() {
            $.toast({
               heading: 'Aviso',
               text: `{{ session('success') }}`,
               hideAfter: false,
               icon: 'success',
               position: 'top-right',
            })
         })
      </script>
   @endif

   @if(session('error'))
      <script>
         $(document).ready(function() {
            $.toast({
               heading: 'Aviso',
               text: `{{ session('error') }}`,
               hideAfter: false,
               icon: 'error',
               position: 'top-right',
            })
         })
      </script>
   @endif

   @error('name')
      <script>
         $(document).ready(function() {
            $.toast({
               heading: 'Aviso',
               text: `{{ $message }}`,
               hideAfter: false,
               icon: 'error',
               position: 'top-right',
            })
         })

         $('.main').addClass('main-active')
         $('.side-sign-up').addClass('side-sign-up-active')
      </script>
   @enderror

   @error('email')
      <script>
         $(document).ready(function() {
            $.toast({
               heading: 'Aviso',
               text: `{{ $message }}`,
               hideAfter: false,
               icon: 'error',
               position: 'top-right',
            })
         })

         $('.main').addClass('main-active')
         $('.side-sign-up').addClass('side-sign-up-active')
      </script>
   @enderror

   @error('password')
      <script>
         $(document).ready(function() {
            $.toast({
               heading: 'Aviso',
               text: `{{ $message }}`,
               hideAfter: false,
               icon: 'error',
               position: 'top-right',
            })
         })

         $('.main').addClass('main-active')
         $('.side-sign-up').addClass('side-sign-up-active')
      </script>
   @enderror
@endsection
