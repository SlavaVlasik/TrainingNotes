@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    {{html()->label('Имя', 'name')}}
    {{html()->text('name')}}
    {{html()->label('Количество', 'counts')}}
    {{html()->number('counts')}}
   

