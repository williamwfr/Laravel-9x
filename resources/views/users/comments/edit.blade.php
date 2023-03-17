@extends('layouts.app')

@section('title', "Editar o Comentário do Usuario {$user->name}")

@section('content')
<h1>Editar o Comentário do Usuario {{ $user->name }}</h1>

@include('includes.validations-form')

<form action="{{ route('comments.update', $comment->id) }}" method="post">
    @method('PUT')
    @csrf
    @include('users.comments._partials.form')
</form>
@endsection
