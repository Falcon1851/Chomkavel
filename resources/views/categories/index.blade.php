@extends('layouts.app')
@section('title', 'Категории')

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-create">Добавить категорию</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">Категорий пока нет</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
