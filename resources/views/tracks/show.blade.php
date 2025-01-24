
<body>
<x-navbar title="My Navbar" />

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $track->name }}</h2>
                </div>
                <div class="card-body">
                    <img src="{{ asset('images/'.$track->img) }}" class="img-fluid mb-3" style="max-width: 200px">
                    <p><strong>Description:</strong></p>
                    <p>{{ $track->description }}</p>

@foreach($track -> students as $student)
<tr>
    <td>{{$student ->id}}</td>
    <td> {{$student ->name}}</td>
</tr>
@endforeach





                    <a href="{{ route('tracks.index') }}" class="btn btn-info btn-sm">back</a>


                </div>
            </div>
        </div>
    </div>
</div>
<x-button name=" Add Course" />

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
