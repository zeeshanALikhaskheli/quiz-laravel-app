@extends('layout.admin-layout')

@section('content')
<div class="container">



    
    <h1>Create Survey Form</h1>
    <form action="{{ route('form-builder.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Form Name</label>
            <input type="text" class="w-100"  name="name" required>
        </div>
        

        <div id="form-fields">
            <!-- Fields will be dynamically added here -->
        </div>



        <button type="button" id="add-field" class="btn btn-secondary">Add Field</button>
        <button type="submit" class="btn btn-primary">Save Form</button>
    </form>

    <br><br>
</div>

<div class="container mt-2">
    <h1>All  Surveys Forms</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Form Name</th>
                <th>Total Submissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->submissions_count }}</td>
                    <td>
                        <!-- Link to view submissions or share the form -->

                        <a href="{{ route('form-builder.show', $form->id) }}" class="btn btn-info">View Form</a>
                        <a href="{{ route('form-builder.submissions', $form->id) }}" class="btn btn-primary">View Submissions</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    document.getElementById('add-field').addEventListener('click', function() {
        const formFieldsDiv = document.getElementById('form-fields');
        const fieldHTML = `
            <div class="form-group">
                <label>Field Label</label>
                <input type="text" name="fields[][label]" class="w-100" required>

                <label>Field Type</label>
                <select name="fields[][type]" class="w-100" onchange="handleFieldTypeChange(this)">
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="date">Date</option>
                    <option value="time">Time</option>
                    <option value="textarea">Textarea</option>
                    <option value="select">Select</option>
                    <option value="radio">Radio</option>
                    <option value="checkbox">Checkbox</option>
                </select>

                <label>Field Name</label>
                <input type="text" name="fields[][name]" class="w-100" required>

                <!-- Additional options for select, radio, or checkbox -->
                <div class="additional-options" style="display:none;">
                    <label>Options</label>
                    <div class="option-container"></div>
                    <button type="button" class="add-option" onclick="addOption(this)">Add Option</button>
                </div>
            </div>
        `;
        formFieldsDiv.insertAdjacentHTML('beforeend', fieldHTML);
    });

    function handleFieldTypeChange(selectElement) {
        const formGroup = selectElement.closest('.form-group');
        const additionalOptions = formGroup.querySelector('.additional-options');

        // Show/Hide options based on field type
        if (['select', 'radio', 'checkbox'].includes(selectElement.value)) {
            additionalOptions.style.display = 'block';
        } else {
            additionalOptions.style.display = 'none';
        }
    }

    function addOption(button) {
        const optionContainer = button.previousElementSibling;
        const optionIndex = optionContainer.children.length; // Get current number of options
        optionContainer.insertAdjacentHTML('beforeend', `
            <div>
                <input type="text" name="fields[][options][]" placeholder="Option ${optionIndex + 1}" required>
                <button type="button" onclick="removeOption(this)">Remove</button>
            </div>
        `);
    }

    function removeOption(button) {
        const optionDiv = button.parentElement;
        optionDiv.remove(); // Remove the option input
    }
</script>
@endsection
