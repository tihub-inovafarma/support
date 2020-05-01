@extends('adminlte::page')

@section('title', 'TiHub-Suporte')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @foreach($proj ?? '' as $registro)
                {{ $registro->id_projetos }}
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop