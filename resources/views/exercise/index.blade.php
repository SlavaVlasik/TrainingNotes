@extends('layouts.app')

@section('content')
    {{ html()->form('GET', route('exercises.index'))->open()}}
        {{html()->input('text', 'name',$exerciseSearch)}}
        {{html()->submit('Search')}}
    {{html()->form()->close()}}
    <h1>Список упражнений</h1>
    @foreach ($exercises as $exercise)
        <a href="{{route('exercise.show', ['id' => $exercise->id])}}">{{$exercise->name}}</a>
        <h3>{{$exercise->count}}</h3>
    @endforeach
@endsection
