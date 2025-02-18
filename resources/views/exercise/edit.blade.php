{{html()->modelForm($exercise, 'PATCH',route('exercise.update', $exercise))->open()}}
@include ('exercise.form')
{{ html()->submit('Обновить')->class('btn btn-primary') }}
{{html()->closeModelForm()}}