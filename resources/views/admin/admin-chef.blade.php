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

    </div>
   
    @include("admin.admin-script")

  </body>
</html>