@extends('layout.layout')
@section('content')
<form action="{{ route('updatestudent') }}" method="POST">
@csrf
    <label class="relative block p-3 border-2 border-gray-200 rounded-lg" for="name">
        <span class="text-xs font-medium text-gray-500" for="name">
            Name
        </span>
        <input type="hidden" value="{{ $student->id }}" name="student_id" />
        <input value="{{ $student->name }}" class="w-full p-0 text-sm border-none focus:ring-0" id="name" name="name" type="text" required />
    </label>
    <label class="mt-3 relative block p-3 border-2 border-gray-200 rounded-lg" for="email">
        <span class="text-xs font-medium text-gray-500" for="email">
            Email Address
        </span>
        <input value="{{ $student->email }}" class="w-full p-0 text-sm border-none focus:ring-0" id="email" name="email" type="email" required />
    </label>
    <button type="submit"
        class="mt-3 mx-auto flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-purple-500 rounded-md md:mb-0 hover:bg-purple-700 md:w-auto"
        data-rounded="rounded-md">
        Update Student
    </button>
</form>
@endsection