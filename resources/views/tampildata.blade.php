@extends('layout.admin')

@section('content')

<body>
  <h1 class="text-center mb-4">Edit Data Meeting Room</h1>

  <div class="container">
      
      <div class="row justify-content-center">
        <div class="col-5">
        <div class="card">
          <div class="card-body">
            <form action="/updatedata/{{$data->id}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Meeting Room</label>
                <input type="text" name="meetingroom" class="form-control"
                    id="exampleFormControlInput1" value="{{$data->meetingroom}}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Customer</label>
                <input type="text" name="customer" class="form-control" id="exampleFormControlInput1"
                value="{{$data->customer}}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Request</label>
              <input type="text" name="request" class="form-control" id="exampleFormControlInput1"
              value="{{$data->request}}">
          </div>
          <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control"
                        id="exampleFormControlInput1" value="{{$data->date}}">
                </div>
                <div class="col">
                    <label for="exampleFormControlInput1" class="form-label">Time</label>
                    <input type="time" name="time" class="form-control"
                        id="exampleFormControlInput1" value="{{$data->time}}">
                </div>
                <div class="col-auto">
                  <label for="exampleFormControlInput1" class="form-label">B.E.O</label>
                  <input type="file" name="beo" class="form-control"
                    id="exampleFormControlInput1" value="{{$data->beo}}">
              </div>
            </div>
        </div>




        <button type="submit"class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
</div>
</div>
</div>
  

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>

@endsection