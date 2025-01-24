

<body>

<x-navbar title="My Navbar" />

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>students</h2>
            <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New students</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>image</th>
                        <th>gender</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender }}</td>
                        <td><img src="{{ asset('images/'.$student->image) }}" width="50"></td>
                        <td>{{ Str::limit($student->description, 100) }}</td>

                        <td>
                            <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<x-button name="index" />
</body>
</html>
