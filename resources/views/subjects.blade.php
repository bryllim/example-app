@extends('layout.layout')
@section('content')
<form action="{{ route('addsubject') }}" method="POST">
@csrf
    <div class="block relative mb-5">
    <span class="text-xs font-medium text-gray-500">Select Student</span>
    <select id="student" required name="student_id" class="block appearance-none w-full bg-white border border-gray-200 px-4 py-2 pr-8 rounded-lg shadow leading-tight focus:outline-none focus:shadow-outline">
        @foreach($students as $student)
        <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
    </div>
    <label class="relative block p-3 border-2 border-gray-200 rounded-lg" for="name">
        <span class="text-xs font-medium text-gray-500" for="name">
            Subject Name
        </span>
        <input class="w-full p-0 text-sm border-none focus:ring-0" id="name" name="name" type="text" required />
    </label>
    <label class="relative block p-3 border-2 border-gray-200 rounded-lg mt-5" for="grade">
        <span class="text-xs font-medium text-gray-500" for="grade">
            Grade
        </span>
        <input class="w-full p-0 text-sm border-none focus:ring-0" id="grade" name="grade" type="number" required />
    </label>
    <button type="submit"
        class="mt-3 mx-auto flex items-center w-full px-6 py-3 mb-3 text-lg text-white bg-purple-500 rounded-md md:mb-0 hover:bg-purple-700 md:w-auto"
        data-rounded="rounded-md">
        Add Subject
    </button>
</form>
@endsection