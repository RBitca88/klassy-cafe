<x-app-layout>
   
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admin-css")
  </head>
  <body>
    
    <div class="container-scroller">
        @include("admin.nav-bar")
        <form action="{{url('/uploadchef')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Name</label>
                <input class="form-control" style="color: white" type="text" name="name" placeholder="Enter name" required>
            </div>
            <div>
                <label>Speciality</label>
                <input class="form-control" style="color: white" type="text" name="speciality" placeholder="Enter speciality" required>
            </div>
            <div>
                <input type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </form>

       <div>
        <table bgcolor="black">
            <tr>
                <th style="padding: 50px">Name</th>
                <th style="padding: 50px">Speciality</th>
                <th style="padding: 50px">Image</th>
                <th style="padding: 50px">Action</th>
                <th style="padding: 50px">Action2</th>
            </tr>
            @foreach ($data as $data)
                <tr align="center">
                    <td>{{$data -> name}}</td>
                    <td>{{$data -> speciality}}</td>
                    <td><img height="100" width="100" src="/chefimage/{{$data -> image}}"></td>
                    <td><a href="{{url('/updatechef', $data -> id)}}">Update</a></td>
                    <td><a href="{{url('/deletechef', $data -> id)}}">Delete</a></td>
                </tr>
            @endforeach
        </table>
       </div>
    </div>
    @include("admin.admin-script")
  </body>
</html>