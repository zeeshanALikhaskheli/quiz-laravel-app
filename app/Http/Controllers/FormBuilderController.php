<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\FormSubmission;


class FormBuilderController extends Controller
{
    //
    public function index()
{
    // Get all forms with submission counts
    $forms = Form::withCount('submissions')->get();

    return view('form-builder.index', compact('forms'));
}
    

    public function store(Request $request)
    {
        $form = new Form();
        $form->name = $request->input('name');
        $form->fields = json_encode($request->input('fields')); // Store form fields as JSON
        $form->save();

        return redirect()->route('form-builder.show', $form->id);
    }

    // public function show(Request $request)
    // {
         
    // $form->fields = json_decode($form->fields, true); // true makes it an associative array


    // return view('form-builder.show', compact('form'));
    // }
    public function show(Request $request, $id)
{
    // Fetch the form from the database using the provided ID
    $form = Form::findOrFail($id); // Adjust according to your model and method

    // Decode the JSON fields into an associative array
    $form->fields = json_decode($form->fields, true); // true makes it an associative array
    // Pass the form to the view
    // return $form;
    return view('form-builder.show', compact('form'));
}

    public function submitForm(Request $request, $id)
    {
        
        $form = Form::findOrFail($id);

        $formData = $request->except('_token', 'submit');

        FormSubmission::create([
            'form_id' => $form->id, 
            'data' => $formData, 
        ]);

    
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function showSubmissions($id)
{
    $submissions = FormSubmission::where('form_id', $id)->get();

    return view('form-builder.submissions', compact('submissions'));
}
}
