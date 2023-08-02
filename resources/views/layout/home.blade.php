@extends('layout.main')

@section('judul')
DASHBOARD {{ $authuser->role }}
@endsection

@section('isi')
@if($authuser->role == "admin")
<div class="card">
  <div class="card-header">
    <h3 class="h1">Selamat Datang, {{ $authuser->name }}</h3>
    </div>
  </div>
@elseif ($authuser->role == "warehouse")
<div class="card">
  <div class="card-header">
    <h3 class="h1">Selamat Datang, {{ $authuser->name }}</h3>
    </div>
  </div>
  @elseif ($authuser->role == "direktur")
<div class="card">
  <div class="card-header">
    <h3 class="h1">Selamat Datang, {{ $authuser->name }}</h3>
    </div>
  </div>
  


@endif
@endsection