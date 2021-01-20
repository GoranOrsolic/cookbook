@extends('layouts.app')

@section('content')

  <div class="container">

<h3 class="font-italic">Recepti</h3>
    <div class="row">
    @forelse($recepti as $recept)
    <div class="col-md-4">
        <div class="card mb-4 box-shadow">
            <img class="card-img-top"
                 src="{{ asset('storage/'.$recept->slika) }}" height="200px" alt="" title=""
                 data-holder-rendered="true">
            <div class="card-body">
                <div class="d-flex float-right">
                <img class="rounded-circle" width="50" height="50"
                 src="{{ asset('storage/'.$recept->user->avatar) }}">
                <p class="font-italic small mt-4 ml-2">{{ $recept->user->name }}</p>
                </div>
                <p class="card-text">{{ $recept->ime }}</p>
                <p class="card-text">{{ $recept->opis }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="show/{{ $recept->id }}" class="btn btn-sm btn-outline-secondary">Pogledaj</a>
                        @can('edit', User::class)
                        <a href="edit/{{ $recept->id }}" class="btn btn-sm btn-outline-secondary">Uredi</a>
                        @endcan
                    </div>
                    <small class="text-muted">{{ $recept->created_at->diffForHumans() }}</small>
                </div>
            </div>
        </div>
    </div>
    @empty
        <p>No Posts Currently</p>
    @endforelse
</div>
@endsection
