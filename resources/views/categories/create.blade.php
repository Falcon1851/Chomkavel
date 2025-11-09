@extends('layouts.app')
@section('title', 'Добавление категории')

@section('content')
    {{-- Уведомления об ошибке --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Название категории:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <button type="submit">Сохранить</button>
    </form>
@endsection
