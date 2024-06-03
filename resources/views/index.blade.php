@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('livres.create') }}"> ajouter  </a>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>pages</th>
                    <th>descrition</th>
                    <th> categorie </th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($livres as $livre)
                    <tr>
                        <td>{{ $livre->id }}</td>
                        <td>{{ $livre->titre }}</td>
                        <td>{{ $livre->pages }}</td>
                        <td>{{ $livre->description }}</td>
                        <td>{{ $livre->categorie->nom }}</td>
                        <td> <img src="{{ asset('storage/'.$livre->image) }}" alt="error"> </td>
                        <td>
                            <a href="{{ route('livres.edit',['livre' => $livre->id]) }}"> modifier </a>
                            <form action="{{ route('livres.destroy',['livre'=> $livre->id]) }}" method="POST">
                            @method('DELETE')
                            <input type="submit" value="supprimer">
                            @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection