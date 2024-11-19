@extends('layout.admin-layout')




@section('content')
<div class="container">
    {{-- <h1>Submissions for {{ $submissions->name }}</h1> --}}
    <table class="table">
        <thead>
            <tr>
                <th>Submission ID</th>
                <th>Submitted Data</th>
                <th>Date Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($submissions as $submission)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ json_encode($submission->data) }}</td>
                    <td>{{ $submission->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
