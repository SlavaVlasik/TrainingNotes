
{{html()->modelForm($exercise, 'POST', route('exercise.store'))->open()}}
    @include('exercise.form')
    {{html()->submit('Создать')}}
{{html()->closeModelForm()}}

