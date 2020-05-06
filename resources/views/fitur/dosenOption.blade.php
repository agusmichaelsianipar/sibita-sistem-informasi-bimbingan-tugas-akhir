@foreach ($dosens as $option)
    <option value='{{$option->email}}'>{{$option->name}}</option>
@endforeach