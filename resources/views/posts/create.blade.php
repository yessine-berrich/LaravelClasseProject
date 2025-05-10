{{-- @extends('layouts.app')

@section('content') --}}
<div class="container">
    <h1>Créer un nouveau Post</h1>
    
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
{{-- @endsection --}}