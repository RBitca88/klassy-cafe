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

        <div class="container" style="width: 600px;">
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

    </div>
   
    @include("admin.admin-script")

  </body>
</html>