@extends('layouts.app')
@section('content')

<div class="container">

    <form enctype="multipart/form-data" action="add" method="post">
    @csrf
        <div class="row">
            <div class="col">
                <label>Naziv</label>
                    <input class="form-control" type="text" name="ime"id="ime">
                    <br>

                <label>Opis</label>
                    <input class="form-control" type="text" name="opis" id="opis">   
                    <br>

                <label>Slika</label>
                        <input class="p-2 w-full" type="file" name="slika" id="slika">  
                        <br>   
                        <br>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <div class="container1">
                    <button class="add_form_field btn btn-outline-dark">Dodaj sastojke &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                         <br>
                         <br>
                        <div><input class="form-control" type="text" name="sastojci[]"><br></div>
                </div>
                        <br>
                        <br>
            </div>

                <div class="col">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <input name="imageAndDescriptionCount" type="hidden" value="">
                    <div class="container2">
                    <button class="add_form_file btn btn-outline-dark">Dodaj korake pripreme &nbsp; 
                    <span style="font-size:16px; font-weight:bold;">+ </span>
                    </button>
                    <br>
                    <br>
                    <textarea class="form-control" type="text" rows="2" cols="30" name="koraci[]"></textarea><br>
                    <input class="p-2 w-full" type="file" name="kor_sli[]">
                    </div>
                </div>
                <div class="container text-center">
                    <button class="btn btn-outline-success btn-lg" type="submit">Objavi</button>
                </div>
                            
    </form>
</div>

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
            $(wrapper).append('<div><input class="form-control" type="text" name="sastojci[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
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
            $(wrapper).append('<div><textarea class="form-control" type="text" rows="2" cols="30" name="koraci[]"/></textarea> <input class="p-2 w-full" type="file" name="kor_sli[]"><a href="#" class="delete">Delete</a></div>'); //add input box
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
