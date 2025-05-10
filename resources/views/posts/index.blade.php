{{-- @extends('layouts.app')

@section('content') --}}
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> --}}
<div class="container">
    <h1>Liste des Posts</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ Str::limit($post->content, 50) }}</td> <!-- Limiter le contenu affiché -->
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Éditer</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Êtes-vous sûr ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }} <!-- Pagination -->
    
    <a href="{{ route('posts.create') }}" class="btn btn-success">Nouveau Post</a>
</div>
{{-- @endsection --}}
{{-- </div>
</div>
</div>
</div>
</x-app-layout> --}}