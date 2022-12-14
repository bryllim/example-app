@extends('layout.layout')
@section('content')

@if (Session::has('success'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-5" role="alert">
    <div class="flex">
        <p class="text-sm text-center">{{ Session::get('success') }}</p>
    </div>
</div>
@endif

@if (Session::has('deleted'))
<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 mb-5" role="alert">
    <div class="flex">
        <p class="text-sm text-center">{{ Session::get('deleted') }}</p>
    </div>
</div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full text-sm divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                    <div class="flex items-center">
                        Name
                    </div>
                </th>
                <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                    <div class="flex items-center">
                        Email Address
                    </div>
                </th>
                <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                    <div class="flex items-center">
                        Total Grade
                    </div>
                </th>
                <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                    <div class="flex items-center">
                        Actions
                    </div>
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
            @foreach($students->reverse() as $student)
            <tr>
                <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $student->name }}
                </td>
                <td class="p-4 text-gray-700 whitespace-nowrap">{{ $student->email }}</td>
                <td class="p-4 text-gray-700 whitespace-nowrap">
                    @if( count($student->subjects) > 0 )
                    @if( $student->subjects->avg('grade') < 75) <strong
                        class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">
                        {{ $student->subjects->avg('grade') }}
                        </strong>
                        @else
                        <strong class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">
                            {{ $student->subjects->avg('grade') }}
                        </strong>
                        @endif
                        @endif
                </td>
                <td>
                    <form onsubmit="return confirm('Do you really want to delete this student?');"
                        action="{{ route('deletestudent') }}" method="post">
                        @csrf
                        <button type="button" studentid="{{ $student->id }}"
                            class="viewSubjects bg-blue-300 hover:bg-blue-400 text-xs text-blue-800 py-1 px-2 rounded mr-2 items-center">
                            View Subjects
                        </button>
                        <a href="{{ url('studentupdate/'.$student->id) }}"
                            class="bg-gray-300 hover:bg-gray-400 text-xs text-gray-800 py-1 px-2 rounded mr-2 items-center">
                            Update
                        </a>
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <button type="submit"
                            class="bg-red-300 hover:bg-red-400 text-xs text-red-800 py-1 px-2 rounded items-center">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr class="m-5">
    <div>
        <h2 class="text-center">Subjects</h2>
        <div class="mt-3 flex justify-center">
            <ul class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900" id="subjectarea">
            </ul>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
$('.viewSubjects').click(function(e) {
    e.preventDefault();
    $('#subjectarea').empty();
    $('#subjectarea').append('<h3>Fetching data...</h3>');
    let button = $(this);
    button.text('Fetching data...');
    const formData = {
        id: $(this).attr('studentid')
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: formData,
        url: "{{ url('getsubjects') }}",
        dataType: "json",
        success: function(data) {
             $('#subjectarea').empty();
            data.forEach(function(subject){
                $('#subjectarea').append('<li class="px-6 py-2 border-b border-gray-200 w-full">'+subject.name+'</li>')
            });
            button.text('View Subjects');
        },
        error: function(data) {
            alert("There's an error.")
        }
    });

})
</script>
@endsection