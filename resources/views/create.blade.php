@extends('layouts.app')

@section('content')
    <div>
        <form action="{{ route('livres.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre" required>

            <label for="pages">Pages:</label>
            <input type="number" name="pages" id="pages" required>

            <label for="">images:</label>
            <input type="file" name="image" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>

            <label for="categorie_id">Categorie:</label>
            <select name="categorie_id" id="categorie_id" required>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>

            <input type="submit" value="Ajouter">
        </form>
    </div>
@endsection
