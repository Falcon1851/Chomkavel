@extends('layouts.app')
@section('title', 'Преподаватели')

@section('content')
    <a href="{{ route('teachers.create') }}" class="btn btn-create">Добавить преподавателя</a>

    <table>
        <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Специализация</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->first_name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->specialization }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Преподавателей пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
