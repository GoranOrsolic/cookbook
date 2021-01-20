@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($user as $info)
        <div class="d-flex float-right">
            <img class="rounded-circle" width="150" height="150"
            src="{{ asset('storage/'.$info->avatar) }}">
            <div class="border-left ml-2" style="border-left: 3px solid #000!important">
            <p class="font-italic mt-2 ml-4">Ime: {{$info->name}}</p>
            <p class="font-italic ml-4">Email: {{$info->email}}</p>
            <p class="font-italic ml-4">Član od: {{ date('d.m.Y', strtotime ($info->created_at)) }}</p>
            <p class="font-italic ml-4">Objavljenih recepata: {{$broj}}</p>
            <a href="{{ route('profil') }}" class="btn btn-sm btn-outline-secondary ml-4">Uredi profil</a>
        </div>
    </div>
        @endforeach
    <div class="h-divider">
        <div class="shadow"></div>
        <div class="text2"><img src="{{ asset('storage/hiclipart.png') }}" /></div>
    </div>
    <h3 class="font-italic">Objavljeni recepti</h3>
    <div class="row mt-4">
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
                        <a href="edit/{{ $recept->id }}" class="btn btn-sm btn-outline-secondary">Uredi</a>
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
