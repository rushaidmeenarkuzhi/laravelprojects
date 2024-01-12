<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>ADD</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('update_store', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row p-2">
                            <div class="col-md-12">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-12">
                                <label for="user_name">User Name</label>
                                <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $user->user_name }}">
                            </div>
                        </div>
                        <div class="row mt-2 p-2">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                            </div>
                        </div>
                       
                        <div class="row mt-2 p-2">
                            <div class="col-md-12">
                                <label for="user_image">Upload Image</label>
                                <input type="file" class="form-control" name="user_image" id="user_image" value="">
                                <img src="{{ asset('images/'.$user->user_image) }}" alt="Current Image" style="max-width: 20px;">
                            </div>
                        </div>
                        <div class="row mt-2 p-2">
                            <div class="col-md-12">
                               <label for="permission">Permission</label>
                               <select class="form-select" name="permission" id="permission">
                                <option value=""></option>
                                  <option  {{ $user->permission==1 ? 'selected' : '' }}  value="1">Admin</option>
                                  <option {{ $user->permission==2 ? 'selected' : '' }} value="2">User</option>
                               </select>
                            </div>
                        </div>
                        
                        <div class="p-2 text-end">
                            <button type="submit" class="btn btn-primary" id="saveButton">Update&Save</button>
                        </div>

                    </form>
                   
                </div>
            </div>
        </div>


    </div>


</body>

</html>

@include('scripts')
