<x-app-layout>
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex justify-between mb-5">
                    <h1 class="text-3xl font-bold">Student Portal</h1>
                    <a href="{{ route('students.create') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded">
                        Add Student
                    </a>
                </div>
                @if(session('success'))
                    <div class="bg-green-100 p-3 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="w-full border">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="p-3">Student No.</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Course</th>
                            <th class="p-3">Year</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                    <tr class="border-b">
                        <td class="p-3">{{ $student->student_number }}</td>
                        <td class="p-3">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="p-3">{{ $student->course }}</td>
                        <td class="p-3">{{ $student->year_level }}</td>
                        <td class="p-3">{{ $student->email }}</td>
                        <td class="p-3 flex gap-2">
                            <a href="{{ route('students.edit', $student) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>