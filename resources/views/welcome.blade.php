@extends('layout.layout')
@section('content')
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
            <tr>
                <td class="p-4 font-medium text-gray-900 whitespace-nowrap">
                    John Doe
                </td>
                <td class="p-4 text-gray-700 whitespace-nowrap">john.doe@email.com</td>
                <td class="p-4 text-gray-700 whitespace-nowrap">Math</td>
                <td class="p-4 text-gray-700 whitespace-nowrap">
                    <strong class="bg-red-100 text-red-700 px-3 py-1.5 rounded text-xs font-medium">
                        74
                    </strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection