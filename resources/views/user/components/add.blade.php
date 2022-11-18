@extends('layout')

@section('content')

@php
    $formTitle = !empty($recipe) ? 'Edit' : 'Tulis'
@endphp

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h2 class="text-info">{{ $formTitle }} Resepmu...</h2>
                </div>
                <div class="card-body">
                @include('user.partials.flash', ['$errors' => $errors])
                    @if (!empty($recipe))
                        {!! Form::model($recipe, ['url' => ['/home', $recipe->id], 'method' => 'PUT', 'files' =>'true', 'enctype' => 'multipart/form-data']) !!}
                        {!! Form::open(array('url' => '/home', 'files' =>'true', 'enctype' => 'multipart/form-data')) !!}
                        {!! Form::hidden('id') !!}
                    @else
                    {!! Form::model($recipe, ['url' => ['/home'],'method' => 'POST', 'files' =>'true', 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::open(array('url' => '/home', 'files' =>true, 'enctype' => 'multipart/form-data')) !!}
                    @endif
                        <div class="mb-3">
                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Deskripsi') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                        </div>
                        <div class="input-group-mb3 text-info">
                            {!! Form::label('bahan', 'Bahan - bahan') !!}
                            {!! Form::text('bahan[0]', null, ['name'=>'bahan[0]', 'class' => 'form-control', 'placeholder' => '']) !!}
                            <div id="list_baru" style="margin-top: 15px;"></div>
                            <button class="btn btn-outline-muted list_bahan" id="tambah1"type="button">+ Item Bahan</button>
                            <button class="btn btn-outline-muted list_bahan" id="hapus1" type="button">- Item Bahan</button>
                        </div>
                        <br>
                        <div class="input-group-mb3 text-info">
                            {!! Form::label('langkah', 'Langkah Pembuatan') !!}
                            {!! Form::text('langkah[0]', null, ['name'=>'langkah[0]','class' => 'form-control', 'placeholder' => '']) !!}
                            <div id="list_langkah"style="margin-top: 15px;"></div>
                            <button class="btn btn-outline-muted list_langkah" type="button" id="tambah2">+ Item Langkah</button>
                            <button class="btn btn-outline-muted list_langkah" id="hapus2" type="button">- Item Langkah</button>
                        </div>
                        <br>
                        <div class="mb-3">
                        {!! Form::label('image','Upload Foto Masakan') !!}
                        <!-- untuk create -->
                        <img class="img-preview img-fluid mb-3 col-sm-5" style="display: block;" id="pic">
                        {!! Form::file('image', ['id'=>'image', 'class' => 'form-control', 'files' =>'true', 'enctype' => 'multipart/form-data',
                                                'oninput'=>'pic.src=window.URL.createObjectURL(this.files[0])', 'placeholder' => '']) !!}
                        </div>
                        </div>
                        </div>
                        <div class="form-footer pt-2">
                            <button type="submit" class="btn btn-primary btn-default"style="display: block;width:580px;background-color:#547794;margin-left:18px;">Terbitkan recipe</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    $(document).ready(function(){
        var id = 0;
        $('#tambah1').click(function(){
            id++;
            $('#list_baru').append(`<div class="input-group mb-3" 
            id="bahan`+id+`">
                    <input type="text" id="input" class="form-control"
                    name="bahan[`+id+`]"
                    placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>` )
        })
        $('#hapus1').click(function(){
            $('#bahan' +id ).remove();
            id--;
        })
    })
    $(document).ready(function(){
        var idd = 0;
        $('#tambah2').click(function(){
            idd++;
            $('#list_langkah').append(`<div class="input-group mb-3" 
            id="langkah`+idd+`">
                    <input type="text" id="input2" class="form-control"
                    name="langkah[`+idd+`]"
                    placeholder="" aria-label="" aria-describedby="basic-addon2">
                    </div>` )
        })
        $('#hapus2').click(function(){
            $('#langkah' +idd ).remove();
            id--;
        })
    })



    // let counter = 1
    // let counter2 = 1

    // function listBahan() {
    //     counter++
    //     let newList=`<div class="input-group mb-3" id="newlist">
    //                 <input type="text" id="input" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
    //                 </div>`  
    //     console.log(counter);     
    //     $('#list_baru').append(newList)
    // }

    // function hapuslistBahan() {
    //     var element = document.getElementById("newlist");
    //     console.log(counter);
    //     element.remove(counter); 
    //     counter--
    // }

    // function listLangkah() {
    //     counter2++
    //     let newListLangkah=`<div class="input-group mb-3" id="newlist">
    //                 <input type="text" id="input" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
    //                 </div>`  
    //     console.log(counter2);     
    //     $('#list_langkah').append(newListLangkah)
    // }

    // function hapusLangkah() {
    //     var element = document.getElementById("newlistlangkah");
    //     console.log(counter2);
    //     element.remove(counter2); 
    //     counter2--
    // }
</script>