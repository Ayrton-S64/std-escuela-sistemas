@extends('layouts.plantilla')
@section('contenido')
    <h1>Bienvenido</h1>
    <h1>{{auth()->user()->name}}</h1>
    <br>
    {{auth()->id()}}
    @if (session('status'))
       <br>
       {{session('status')}}
   @endif
@endsection
