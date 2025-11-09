@extends('layouts.app')
@section('title', 'Курсы')

@section('content')
    <a href="{{ route('courses.create') }}" class="btn btn-create">Добавить курс</a>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Категория</th>
                <th>Преподаватель</th>
                <th>Длительность (ч)</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->category->name }}</td>
                    <td>{{ $course->teacher->last_name }} {{ $course->teacher->first_name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td class="actions">
                        <a href="{{ route('courses.edit', $course) }}" class="btn btn-edit" style="margin-bottom: 5px">Изменить</a>

                        <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Вы уверены, что хотите удалить этот курс?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Курсов пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
