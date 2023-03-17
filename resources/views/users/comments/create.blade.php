@extends('layouts.app')

@section('title', "Novo Comentário para o usuário {$user->name}")

@section('content')
<h1>Novo Comentário para o usuário {{ $user->name }}</h1>

@include('includes.validations-form')

<form action="{{ route('comments.store', $user->id) }}" method="post">
    @csrf
    @include('users.comments._partials.form')
</form>
@endsection
