@extends('layout')

@section('content')
<div class="content">
		<div class="container-fluid">
			<div class="text-center"style="margin-top:30px;">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10">
                        <div class="card border-0"style="margin-top: 5px;">
                            <div class="card-img-top align-items-center" style="margin-left:20px;margin-bottom: 10px;"> 
                            <div class="col">    
                                <img class="list-img" src="{{ URL::asset('storage/foto_resep/'.$recipes->image) }}" 
                                style="margin: auto;
                                    position: relative; display:inline-block;width: 90%;height: 500px;">
                            </div>
                                <div class="col-8" style="margin-right:5%;">
                                    <p class="text-left" style="margin-left: 5%;">
                                        <h4 class="text-left"style="margin-top: 0%;margin-left: 8%;"><strong> {{$recipes->name}}</strong></h4>
                                        <br>
                                        <p class="text-left" style="margin-left: 8%;">{{$recipes->description}}</p> 
                                        <p class="text-left" style="margin-left: 8%;"><strong>Bahan - bahan : <br></strong>
                                        @foreach($recipes->ingredients as $daftar_bahan)  
                                        <p class="text-left" style="margin-left: 8%;">
                                                {{$daftar_bahan->list_ingredient}}.
                                        </p>
                                        @endforeach       
                                        </p>
                                        <p class="text-left" style="margin-left: 8%;"><strong>Langkah Pembuatan : <br></strong>
                                        @foreach($recipes->steps as $daftar_langkah)  
                                        <p class="text-left" style="margin-left: 8%;">
                                                {{$daftar_langkah->list_step}}.
                                        </p>
                                        @endforeach       
                                        </p>                                
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<hr>
			</div>
		</div>
	</div>
@endsection