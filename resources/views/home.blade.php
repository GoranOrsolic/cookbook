@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="font-italic">Preporuke</h3>
<div class=" d-flex justify-content-between">
    <div class="card mb-3" style="width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-7">
      <img src="{{ asset('storage/'.$random->slika) }}" class="card-img" height="250px" width="540px" alt="...">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">{{ $random->ime }}</h5>
        <p class="card-text">{{ $random->opis }}</p>
        <img class="rounded-circle mt-4" width="50" height="50"
                 src="{{ asset('storage/'.$random->user->avatar) }}">
                 <div class="d-flex justify-content-between">
                <p class="font-italic small">{{ $random->user->name }}</p>
        <p class="card-text float-right"><small class="text-muted">{{ $random->created_at->diffForHumans() }}</small></p>
        </div>
            <a href="show/{{ $random->id }}" class=" float-right btn btn-sm btn-outline-secondary">Pogledaj</a>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3" style="width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-7">
      <img src="{{ asset('storage/'.$random1->slika) }}" class="card-img" height="250px" width="540px" alt="...">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h5 class="card-title">{{ $random1->ime }}</h5>
        <p class="card-text">{{ $random1->opis }}</p>
        <img class="rounded-circle mt-4" width="50" height="50"
                 src="{{ asset('storage/'.$random1->user->avatar) }}">
                 <div class="d-flex justify-content-between">
                <p class="font-italic small">{{ $random1->user->name }}</p>
        <p class="card-text float-right"><small class="text-muted">{{ $random1->created_at->diffForHumans() }}</small></p>
        </div>
            <a href="show/{{ $random1->id }}" class=" float-right btn btn-sm btn-outline-secondary">Pogledaj</a>
      </div>
    </div>
  </div>
</div>
</div>
<div class="h-divider">
            <div class="shadow"></div>
            <div class="text2"><img src="{{ asset('storage/hiclipart.png') }}" /></div>
            </div>
            <h3 class="font-italic" style="margin-bottom: 15px">Novi recepti</h3>
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
                        @can('edit', $recept)
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
</div>
@endsection
