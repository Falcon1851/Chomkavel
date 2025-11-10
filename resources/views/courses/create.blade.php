@extends('layouts.app')
@section('title', 'Добавить новый курс')

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

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Название курса:</label>
            <input type="text" id="title" name="title" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="description">Описание:</label>
            <textarea id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="duration">Длительность (в часах):</label>
            <input type="number" id="duration" name="duration" value="{{ old('duration') }}" required>
        </div>
        <div>
            <label for="category_id">Категория:</label>
            <select id="category_id" name="category_id" required>
                <option value="">Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="teacher_id">Преподаватель:</label>
            <select id="teacher_id" name="teacher_id" required>
                <option value="">Выберите преподавателя</option>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                        {{ $teacher->last_name }} {{ $teacher->first_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Сохранить курс</button>
    </form>
@endsection
