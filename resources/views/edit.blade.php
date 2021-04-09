@extends('layouts.app')
@section('content')

<div class="container">

    <form enctype="multipart/form-data" action="{{ $recepti->id }}" method="post">
    @csrf
        <div class="row">
            <div class="col">
                <label>Naziv</label>
                    <input class="form-control" value="{{ $recepti->ime }}" type="text" name="ime"id="ime">
                    <br>

                <label>Opis</label>
                    <input class="form-control" value="{{ $recepti->opis }}" type="text" name="opis" id="opis">   
                    <br>

                <label>Slika</label>
                <div class="flex">
                    <img src="{{ asset('storage/'.$recepti->slika) }}" height="100px" width="200px" alt="" title=""></a>
                    <input class="p-2 w-full" type="file" name="slika" id="slika"> 
                </div>  
                    <br>   
                    <br>
                        @foreach($recepti->sast as $rep)
                        <div><input class="form-control" value="{{ $rep->naziv }}" type="text" name="sastojci[]"><br></div>
                        
                        @endforeach
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <div class="container1">
                    <button class="add_form_field btn btn-outline-dark">Dodaj sastojke &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                         <br>
                         <br>
                        <div><input class="form-control" type="text" name="sast[]"><br></div>
                </div>

                        <br>
                        <br>
            </div>
                    <!-- {{$i = 1}} -->
                <div class="col">
                    @foreach($recepti->korak as $kor)
                    <p style="color: red; font-size: 30px; display: inline-block;">{{$i++}}.</p><textarea class="form-control mt-2 mb-2" type="text" rows="2" cols="30" name="koraci[]">{{ $kor->korak }}</textarea>
                    
                    @if ($kor->slika > $i)
                      <input class="p-2 w-full" type="file" name="kor_sli[]"><img src="{{ asset('storage/'.$kor->slika) }}" height="320px" width="640px" alt="" title=""></a></input><br>
                      @endif
                    @endforeach
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <div class="container2">
                    <button class="add_form_file btn btn-outline-dark">Dodaj korake pripreme &nbsp; 
                    <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <br>
                    <br>
                    <textarea class="form-control" type="text" rows="2" cols="30" name="kor[]"></textarea>
                    <br>
                    </div>
                </div>
                <div class="container text-center">
                    <button class="btn btn-outline-success btn-lg" type="submit">Uredi</button>
    </form>

                </div>
                            

         <div class="container text-center mt-2">
        <form action="{{ route('add.destroy', $recepti->id) }}" method="post">
        @method('DELETE')
        @csrf
        <input class="btn btn-outline-danger btn-lg" type="submit" value="Izbriši" />
        </form>
         </div>

</div>
<br>
<br>

<script type="text/javascript">
    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container1");
    var add_button = $(".add_form_field");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><input class="form-control" type="text" name="sast[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
    var max_fields = 10;
    var wrapper = $(".container2");
    var add_button = $(".add_form_file");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div><textarea class="form-control" type="text" rows="2" cols="30" name="koraci[]"/></textarea><a href="#" class="delete">Delete</a></div>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>
@endsection
