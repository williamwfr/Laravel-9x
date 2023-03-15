@extends('layouts.app')

@section('title', 'Listagem do Usuario')

@section('content')
<h1>Listagem do Usuario {{ $user->name }}</h1>

<ul>
    <li>{{ $user->name }}</li>
    <li>{{ $user->email }}</li>
</ul>
<form action="{{ route('users.destroy', $user->id) }}" method="post">
    @method('delete')
    @csrf
    <button type="submit">DELETAR</button>
</form>
@endsection
