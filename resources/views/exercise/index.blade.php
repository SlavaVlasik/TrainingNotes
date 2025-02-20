@extends('layouts.app')

@section('content')
 <div class="container">
    {{ html()->form('GET', route('exercises.index'))->open()}}
        {{html()->input('text', 'name',$exerciseSearch)}}
        {{html()->submit('Search')}}
    {{html()->form()->close()}}
   
    {{ html()->a(route('execise.create'), 'Создать упражнение')->class('btn btn-primary') }}


    <h1>Список упражнений</h1>
    @foreach ($exercises as $exercise)
        <a href="{{route('exercise.show', ['id' => $exercise->id])}}">{{$exercise->name}}</a>
        <h3>{{$exercise->counts}}</h3>
    @endforeach
    
    </div>
    
@endsection

