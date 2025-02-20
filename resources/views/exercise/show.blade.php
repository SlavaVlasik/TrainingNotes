@extends ('layouts.app')

@section('content')
<h1>{{$exercise->name}}</h1>
<h2>{{$exercise->counts}}</h2>
{{html()->a(route('exercise.edit', ['id' => $exercise->id]), 'Обновить упражнение')->class('btn')}}
<a href="{{route('exercise.destroy',['id' => $exercise->id])}}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a>

@endsection