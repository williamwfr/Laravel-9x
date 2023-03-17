@extends('layouts.app')

@section('title', 'Listagem dos Usuarios')

@section('content')
<h1>
    Listagem dos Usuarios
    (<a href="{{ route('users.create') }}">+</a>)
</h1>

<form action="{{ route('users.index') }}" method="get">
    <input type="text" name="search" placeholder="Pesquisar">
    <button>Pesquisar</button>
</form>

<ul>
    @foreach ($users as $user)
    <li>
        @if ($user->image)
            <img src="{{ url("storage/{$user->image}") }}" alt="{{ $user->name }}">
        @else
            <img src="{{ url("storage/premoldado.jpg") }}" alt="{{ $user->name }}">
        @endif
        {{ $user->name }} -
        {{ $user->email }}
        | <a href="{{ route('users.edit', $user->id) }}">Editar</a>
        | <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
        | <a href="{{ route('comments.index', $user->id) }}">Anotações ({{ $user->comments->count() }})</a>
    </li>
    @endforeach
</ul>

<div>
    {{ $users->appends([
        'search' => request()->get('search', '')
    ])->links() }}
</div>

@endsection
