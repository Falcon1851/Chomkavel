@extends('layouts.app')
@section('title', 'Добавление преподавателя')

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

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div>
            <label for="last_name">Фамилия:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
        </div>
        <div>
            <label for="first_name">Имя:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="specialization">Специализация:</label>
            <input type="text" id="specialization" name="specialization" value="{{ old('specialization') }}" required>
        </div>

        <button type="submit">Сохранить</button>
    </form>
@endsection
