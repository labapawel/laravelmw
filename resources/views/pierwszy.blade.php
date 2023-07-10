@extends('mojewidoki.app')

@section('menu')
    <a href="{{route('p.create')}}">Dodaj nowy element</a>
@endsection    

@section('content')
<div>
    {!!$html!!}
    {{$now}}   {{$imie}}  {{$nazwisko}}
    @if($imie == 'Paweł')
    Witaj
    @else
    Nie witaj
    @endif
</div>
<a href="{{route('p.create')}}">Dodaj nowy element dodaj</a>
@endsection    
