@extends('layouts.app')

@section('tittle')
   Welcome - Note Beer
@endsection

@section('cssFiles')
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')
   <div class="alert alert-secondary" role="alert">
      A simple secondary alert—check it out!
   </div>
   <img src="img/fav-icon.png" class="rounded mx-auto d-block" alt="Page welcome Note Beer">
@endsection

@section('jsFiles')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
