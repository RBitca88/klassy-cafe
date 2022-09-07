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

         <div style="position: relative; top: 60px; right: -200px">
            <table bgcolor="black"; border="3px">
                <tr>
                    <th style="padding: 80px">Name</th>
                    <th style="padding: 80px">Email</th>
                    <th style="padding: 80px">Action</th>
                </tr>

                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data -> name}}</td>
                    <td>{{$data -> email}}</td>

                    @if($data -> usert_type == "0")
                    <td><a href="{{url('/deleteuser', $data -> id)}}">Delete</a></td>
                    @else
                    <td><a>Not allowed</a></td>
                    @endif
                </tr>
                @endforeach
                
            </table>
         </div>

    </div>     
   
    @include("admin.admin-script")

  </body>
</html>