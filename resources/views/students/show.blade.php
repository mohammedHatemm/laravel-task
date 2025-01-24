
<body>
<x-navbar title="My Navbar" />

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $student->name }}</h2>
                </div>
                <div class="card-body">
                    <img src="{{ asset('image/'.$student->image) }}" class="img-fluid mb-3" style="max-width: 200px">
                    <p><strong>Description:</strong></p>
                    <p><strong>name of student</strong>  : {{ $student->name }}</p>
                    <p><strong>gender of student</strong></strong>:  {{$student -> gender }} </p>
                    <p><strong>email of student</strong>:  {{$student -> email }}</p>
                    @if($student->track_id)
                    <p> <strong>track name</strong>:<a href="{{route ('tracks.index', $student->track_id) }}">  {{$student -> track ->name }}</a> </p>
@endif

                    <p><strong>track descrip</strong>  : {{$student -> track ->description }} </p>
                    <p><strong>track image</strong>  :{{$student -> track ->image }}</p>
                    @if($student->course_id)

                    <p><strong>course name</strong> : <a href="{{route ('courses.index' , $student -> course->id)}}" >{{$student -> course ->name }}</a> </p>
                    @endif
                    <a href="{{ route('students.index') }}" class="btn btn-primary">Back</a>

                </div>
            </div>
        </div>
    </div>
</div>
<x-button name=" Add Course" />

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
