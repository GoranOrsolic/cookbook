@extends('layouts.app')
@section('content')

  @foreach($user as $info)
<div class="container">
    <form enctype="multipart/form-data" action="" method="post">
    @csrf
        <div class="row">
         
            <div class="col-4">
                
                <label>Ime</label>
                    <input class="form-control" value="{{$info->name}}" type="text" name="ime" id="ime">
                    <br>
                <label>E-mail</label>
                    <input class="form-control" value="{{$info->email}}" type="text" name="email" id="email">   
                    <br>

                <label>Avatar</label>
                <div class="flex">
                        <img class="rounded-circle" src="{{ asset('storage/'.$info->avatar) }}" height="100px" width="100px" value="" alt="" title=""></a>
                        <input class="p-2 w-full" type="file" name="avatar" id="avatar"> 
                        </div>  
                        <br>   
                        <br>

                <label>Lozinka</label>
                    <input class="form-control" value="" type="password" name="password" id="password">
                    <br>
                <label>Ponovi lozinku</label>
                    <input class="form-control" value="" type="password" name="passwordcof" id="passwordcof">   
                    <br>        

                <div class="container text-center">
                    <button class="btn btn-outline-success btn-lg" type="submit">Uredi</button>
                </div>
                
        </div>
                            
    </form>

</div>
@endforeach
@endsection
