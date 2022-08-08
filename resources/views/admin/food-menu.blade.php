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

        <div class="container" >
            <form action="{{url('/uploadfood')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Title</label>
                    <input class="form-control" style="color: white" type="text" name="title" placeholder="Write a title" required>
                </div>
                <div>
                    <label>Price</label>
                    <input class="form-control" style="color: white" type="number" name="price" placeholder="Price" required>
                </div>
                <div>
                    <label>Image</label>
                    <input class="form-control" type="file" name="image" required>
                </div>
                <div>
                    <label>Description</label>
                    <input class="form-control" style="color: white" type="text" name="description" placeholder="Description" required>
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>

            <div>
                <table bgcolor="black">
                    <tr>
                        <th style="padding: 50px">Food Name</th>
                        <th style="padding: 50px">Price</th>
                        <th style="padding: 50px">Description</th>
                        <th style="padding: 50px">Image</th>
                        <th style="padding: 50px">Action</th>
                        <th style="padding: 50px">Action2</th>
                    </tr>
                    @foreach($data as $data)
                    <tr align="center">
                        <td>{{$data->title}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->description}}</td>
                        <td><img height="50px" width="100px" src="/foodimage/{{$data->image}}" alt=""></td>
                        <td><a href="{{url('/deletemenu', $data->id)}}">Delete</a></td>
                        <td><a href="{{url('/updateview', $data->id)}}">Update</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>

        

    </div>
   
    @include("admin.admin-script")

  </body>
</html>