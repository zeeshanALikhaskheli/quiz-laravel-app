@extends('layout.layout')





@section('content')
<div class="container">
    <h1>{{ $form->name }}</h1>
    <form action="{{ route('form-builder.submit', $form->id) }}" method="POST">
        <button type="button" class="btn btn-info" onclick="document.getElementById('linkToCopy').style.display='block'">Copy Link</button>
        <p id="linkToCopy" style="display: none">
            <a href="#">http://localhost:8000/survey/{{ $form->id }}</a>
        </p>

        @csrf



@foreach ($form->fields as $field)
    @if (isset($field['label'])) <br>
        <label>{{ $field['label'] }}</label>
    @endif

    @if (isset($field['type']) && $field['type'] === 'text')
        <input type="text" name="{{ $field['name'] ?? '' }}" class="w-100">
    @elseif (isset($field['type']) && $field['type'] === 'email')
        <input type="email" name="{{ $field['name'] ?? '' }}" class="w-100">
    @elseif (isset($field['type']) && $field['type'] === 'date')
        <input type="date" name="{{ $field['name'] ?? '' }}" class="w-100">
    @elseif (isset($field['type']) && $field['type'] === 'time')
        <input type="time" name="{{ $field['name'] ?? '' }}" class="w-100">
    @elseif (isset($field['type']) && $field['type'] === 'textarea')
    <textarea name="{{ $field['name'] ?? '' }}" cols="30" rows="10"></textarea>

    
       
    @elseif (isset($field['type']) && $field['type'] === 'radio')
        <div class="form-check">

           
            @foreach ($form->fields as $option)
                @if (isset($option['options'])) 
                    <input type="radio" name="{{$field['name'] ?? '' }}" value="{{ $option['options'][0] }}" class="form-check-input">
                 <label class="form-check-label">{{ $option['options'][0] }}</label> <br>
                @endif
            @endforeach
        </div>
        @elseif (isset($field['type']) && $field['type'] === 'select')
        <select name="{{ $field['name'] ?? '' }}" class="w-100">
        @foreach ($form->fields as $option)
            @if (isset($option['options'])) 
        
                    <option name="{{$field['name'] ?? '' }}" value="{{ $option['options'][0] }}"> {{ $option['options'][0] }}</option>
            @endif
        @endforeach
        </select>

    @endif
@endforeach





        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<script>

    
    function copyLink() {
        // Get the link or text to copy
        var linkText = document.getElementById("linkToCopy").textContent;
    
        // Use the Clipboard API to copy the text to the clipboard
        navigator.clipboard.writeText(linkText).then(function() {
            alert('Link copied to clipboard!');
        }).catch(function(error) {
            console.error('Error copying text: ', error);
        });
    }
</script>


@endsection
