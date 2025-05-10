{{-- @extends('layouts.app')

@section('content') --}}
    <div class="container">
        <h1>Éditer le Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" 
                       class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea name="content" id="content" 
                          class="form-control @error('content') is-invalid @enderror" 
                          rows="5" required>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
{{-- @endsection --}}