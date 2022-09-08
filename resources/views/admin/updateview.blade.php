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
        <form action="{{url('/update', $data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label>Title</label>
                <input class="form-control" style="color: white" type="text" name="title" value="{{$data->title}}" required>
            </div>
            <div>
                <label>Price</label>
                <input class="form-control" style="color: white" type="number" name="price" value="{{$data->price}}" required>
            </div>
            <label for="">Currency</label>
            <div style="background-color: #2a3038">
                {{-- <label>Currency:</label> --}}
                <select name="currency" id="" style="background-color: #2a3038; border: none; width: 100%">
                    <option value="€">€</option>
                    <option value="$">$</option>
                    <option value="MDL">MDL</option>
                </select>
            </div>
            <div>
                <label>Description</label>
                <input class="form-control" style="color: white" type="text" name="description" value="{{$data->description}}" required>
            </div>
            <div>
                <label>Old Image</label>
                <img height="100px" width="150px" src="/foodimage/{{$data->image}}" alt="">
            </div>
            <div>
                <label>New Image</label>
                <input class="form-control" style="color: white" type="file" name="image" required>
            </div>
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </form>
    </div>
</div>
   
    @include("admin.admin-script")

  </body>
</html>