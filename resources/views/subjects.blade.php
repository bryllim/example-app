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
                        Grade
                    </div>
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
            <tr>
                <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
                    Programming 1
                </td>
                <td class="p-4 text-gray-700 whitespace-nowrap">
                    <strong class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded text-xs font-medium">
                        90
                    </strong>
                </td>
            </tr>
            <tr>
                <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
                    Programming 1
                </td>
                <td class="p-4 text-gray-700 whitespace-nowrap">
                    <strong class="bg-gray-100 text-gray-700 px-3 py-1.5 rounded text-xs font-medium">
                        90
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection