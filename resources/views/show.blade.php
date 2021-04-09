@extends('layouts.app')

@section('content')

    <div class="container">
                    
            <h1>{{ $recepti->ime }}</h1>
            <img src="{{ asset('storage/'.$recepti->slika) }}" height="320px" width="640px" alt="" title=""></a>
            <br> 
            <br> 
            <h4 style=" font-style: italic;" >{{ $recepti->opis }}</h4>
            <img class="rounded-circle" width="50" height="50"
                 src="{{ asset('storage/'.$recepti->user->avatar) }}">
            <p class="font-italic small">{{ $recepti->user->name }}</p>      

            <div class="h-divider">
            <div class="shadow"></div>
            <div class="text2"><img src="{{ asset('storage/hiclipart.png') }}" /></div>
            </div>
            <div class="row">
                <div class="col">
                    <h2>Sastojci:</h2>
                        @foreach($recepti->sast as $rep)
                        <h5 class="mt-3">{{$rep->naziv}}</h5>
                        @endforeach
                </div>

                <div class="col">
                    <h2>Priprema:</h2>
                    <!-- {{$i = 1}} -->
                   @forelse($recepti->korak as $kor)
                      <h5><p style="color: red; font-size: 30px; display: inline-block;">{{$i++}}.</p> {{ $kor->korak }}</h5>
                      @if ($kor->slika > $i)
                      <img src="{{ asset('storage/'.$kor->slika) }}" class="mb-3" height="320px" width="640px" alt="" title=""></a>
                      @endif
                      @empty
                     @endforelse
                </div>
                </div>
                <hr>
                <div class="mt-4">
         <form method="POST" action="">
        @csrf

        <div class="form-group col-6 pl-0">
            <textarea id="comment" rows="1" class="form-control border border-blue-400 rounded-lg" placeholder="Komentiraj..." name="comment" required></textarea>
        </div>

        <div class="form-group mb-4" style="">
            <button class="btn btn-sm btn-outline-secondary" type="submit"> Komentiraj</button>
        </div>
        
    </form>


       @if (count($recepti->comments)>0)

       <hr class="mt-10">
        <div class="mt-5 mb-2">Komentari</div>
        <div class=" border border-blue-400 rounded-lg px-2 py-2 mb-2">
        @foreach ($recepti->comments as $comment)
              <div class="flex mb-1">

                <a class="flex" href="">
              <img class="rounded-circle"
                width="40"
                height="40" src="{{ asset('storage/'.$comment->user->avatar) }}">
              {{ $comment->user->name }}
            </a>
              </div>
              <div class="mb-2">
              {{ $comment->comment }}
              </div>

        @endforeach

             </div>

    @else
    <p>Nema komentara.</p>             

@endif
           
            
    </div>
@endsection
