<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<x-navbar title="My Navbar" />
<h1 class="text-success mx-5 my-3">Create New Student</h1>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h2>Create New Course</h2> -->
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>email</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-3">

                            <label>Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>


                        <div class="form-check">
      <label class="form-controller d-block" for="gender">
        Gender
      </label>
      <input class="form-check-input" type="radio" name="gender" id="gender1" value="male">
      <label class="form-check-label" for="gender1">
        male
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="gender2" value=female>
      <label class="form-check-label" for="gender2">
        female
      </label>
    </div>

    <select class="form-select mt-5" id="Track Student" aria-label="Default select example" name="track_id">
      <option selected disabled>Choose your track</option>
      @foreach ($tracks as $track)
      <option value="{{$track->id}}">{{$track->name}}</option>
      @endforeach
    </select>
    <select class="form-select mt-5" id="course Student" aria-label="Default select example" name="course_id">
      <option selected disabled>Choose your track</option>
      @foreach ($courses as $course)
      <option value="{{$course->id}}">{{$course->name}}</option>
      @endforeach
    </select>



</div>
<button type="submit" class="btn btn-primary">Create Student</button>
                        <a href="{{ route('students.index') }}" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<x-button name="My Button" />


</body>
</html>
