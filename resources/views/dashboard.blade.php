<x-app-layout>
    {{--  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>  --}}

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <title>Document</title>
    </head>

    <body>
        <div class="container mt-2">
                

            @if(Auth::user()->permission == 1)


                <div class="card">
                    <div class="text-end p-2">
                        <a class="btn btn-primary" title="Add" href="{{ route('create') }}" type="button">
                            <span class="btn-inner--text">{{ __('Add New') }}</span>
                        </a>
                        
                    </div>
                    {{--  user table start  --}}
                    <div class="mt-2 p-3">
                        <table class="table table-striped table-responsive p-1 border" width="100%">
                            <thead class="border table-dark">
                                <th>#</th>
                                <th class="border">Name</th>
                                <th class="border">User Name</th>
                                <th class="border">Email</th>
                                <th class="border">Image</th>
                                <th class="border">Action</th>
                            </thead>
                            @foreach ($users as $usr)
                                <tbody class="border">
                                    <tr>
                                        <th scope="row">{{ $usr->id }}</th>
                                        <td class="border">{{ $usr->name }}</td>
                                        <td class="border">{{ $usr->user_name }}</td>
                                        <td class="border">{{ $usr->email }}</td>
                                        <td class="border">
                                            @if($usr->user_image)
                                                 <img src="{{ asset('images/'.$usr->user_image) }}" alt="User"  style="max-width: 25px;">
                                                 @else
                                                 No Image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('edit_user', $usr->id) }}" class="btn btn-primary">
                                                <i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="#" class="btn btn-danger delete-profile" data-profile-id="{{ $usr->id }}">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>                                   
                                         </td>
                                    </tr>
    
                                </tbody>
                            @endforeach
    
                        </table>
                    </div>
                    {{--  user table end  --}}
                </div>
              
            @endif
           
        </div>
    </body>

    </html>
</x-app-layout>

@include('scripts')