@extends('layout.layout')
@section('content')

@if (Session::has('success'))
<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 mb-5" role="alert">
  <div class="flex">
      <p class="text-sm text-center">{{ Session::get('success') }}</p>
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
                        Subjects
                    </div>
                </th>
                <th class="p-4 font-medium text-left text-gray-900 whitespace-nowrap">
                    <div class="flex items-center">
                        Total Grade
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
                            @foreach($student->subjects as $subject)
                            <span class="ml-1 bg-blue-100 text-blue-700 py-1 px-3 rounded text-xs font-medium">
                                {{ $subject->name }}
                            </span>
                            @endforeach
                    @else
                    <span class="text-xs text-gray-700">None</span>
                    @endif
                </td>
                <td class="p-4 text-gray-700 whitespace-nowrap">
                    @if( count($student->subjects) > 0 )
                        @if( $student->subjects->avg('grade') < 75)
                        <strong class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">
                            {{ $student->subjects->avg('grade') }}
                        </strong>
                        @else
                        <strong class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-medium">
                            {{ $student->subjects->avg('grade') }}
                        </strong>
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection