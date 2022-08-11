<x-app-layout>
   
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include("admin.admin-css")
  </head>
  <body>
    
    <div class="container-scroller">

        @include("admin.nav-bar")

        <div style="padding-right: 200px" class="container">
            <form action="{{url('/updatefoodchef', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label>
                    <input class="form-control" style="color: white" type="text" name="name" value="{{$data->name}}" required>
                </div>
                <div>
                    <label>Speciality</label>
                    <input class="form-control" style="color: white" type="text" name="speciality" value="{{$data->speciality}}" required>
                </div>
                <div>
                    <label>Old Image</label>
                    <img height="100px" width="150px" src="/chefimage/{{$data->image}}" alt="">
                </div>
                <div>
                    <label>New Image</label>
                    <input class="form-control" type="file" name="image">
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>

    </div>
   
    @include("admin.admin-script")

  </body>
</html>