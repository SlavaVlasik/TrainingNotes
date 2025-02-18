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
    <style>
        .container{
           
            width:80vw;
            height:100px;
            margin-left:auto;
            margin-right:auto;
        }
       
        h1{
            color:white;
            font-size:32px;
        }
        h3,a{
            color:white;
            font-size:26px;
        }
        form{
            color:green;
        }
    </style>
@endsection

