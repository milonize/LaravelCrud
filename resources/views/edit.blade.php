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
                    <h4>Members</h4>
                </div>
                <div class="">
                    <a href="{{route('user.index')}}" class="btn btn-dark">Go Members</a>
                </div>
            </div>

            <!-- table start here  -->
            <div class="container mt-3">
                <h2>User Edit Page</h2>
                <p class="text-muted">Just put the new updated data and "press save!</p>
                @if($alert=Session::get("success"))
                <p class="text-success">{{$alert}}</p>

                @endif
                <form action="/user/{{($edited_user->id)}}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Images</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" value="{{old('name',$edited_user->name)}}" name="name">
                                    @if($errors->has('name'))
                                    <p>{{$errors->first('name')}}</p>


                                    @endif
                                </td>
                                <td><input type="text" class="form-control" value="{{old('address',$edited_user->address)}}" name="address">
                                    @if($errors->has('address'))
                                    <p>{{$errors->first('address')}}</p>


                                    @endif
                                </td>
                                <td><input type="file" class="form-control" name="images">
                                    @if($errors->has('images'))
                                    <p>{{$errors->first('images')}}</p>


                                    @endif
                                </td>
                                <!-- <td><a href="" class="btn py-1 btn-dark">Edit</a> <a href="" class="btn py-1 btn-outline-danger">Deleted</a></td> -->
                            </tr>

                        </tbody>

                    </table>
                    <div class="text-center d-block"> <button type="submit" class="btn btn-outline-dark">Save Data</button></div>
                </form>
            </div>


        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>