<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>


    <div class="row">
        <div class="py-3 col-md-7 m-auto">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h4>F.MILON</h4>
                </div>
                <div class="">
                    <a href="{{route('user.create')}}" class="btn btn-dark btn-md">Add Users</a>
                </div>
            </div>

            <!-- table start here  -->
            <div class="container mt-3">
                <h2>Dashboard</h2>
                @if($alert=Session::get("success"))
                <p class="text-success">{{$alert}}</p>


                @endif
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->address}}</td>
                            <td><img src="images/{{$data->images}}" alt="" class="img fluid" width="60px"></td>
                            <td><a href="user/{{$data->id}}/edit" class="btn py-1 btn-dark">Edit</a> <a href="user/{{$data->id}}/delete" class="btn py-1 btn-outline-danger">Deleted</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>