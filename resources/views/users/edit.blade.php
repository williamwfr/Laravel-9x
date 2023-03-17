@extends('layouts.app')

@section('title', "Editar o Usuario {$user->name}")

@section('content')
<h1>Editar o Usuario {{ $user->name }}</h1>

@include('includes.validations-form')

<form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    @include('users._partials.form')
</form>
@endsection
