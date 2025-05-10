{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h1>Détails du Post</h1>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <p>Publié le: {{ $post->created_at->format('d/m/Y') }}</p>
        
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Éditer</a>
        
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post?')">
                Supprimer
            </button>
        </form>
        @if ($post->comments->isNotEmpty())
            <h3>Commentaires</h3>
            <ul>
                @foreach ($post->comments as $comment)
                    <li>
                        <strong>{{ $comment->user->name }}</strong> ({{ $comment->created_at->format('d/m/Y') }}):
                        <p>{{ $comment->comment }}</p>
                        @if (auth()->user()->id === $comment->user_id)
                            <form action="{{ route('posts.comments.destroy', $comment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire?')">
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
        <h3>Ajouter un Commentaire</h3>
        <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <label for="comment">Contenu</label>
                <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>  
    </div>
{{-- @endsection --}}