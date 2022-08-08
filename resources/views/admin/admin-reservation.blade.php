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

     <div style="position: relative; top: 70px; right: -150;">
        <table bgcolor="grey" border="3px">
            <tr>
                <th style="padding: 50px">Name</th>
                <th style="padding: 50px">Email</th>
                <th style="padding: 50px">Phone</th>
                <th style="padding: 50px">Guest</th>
                <th style="padding: 50px">Date</th>
                <th style="padding: 50px">Time</th>
                <th style="padding: 50px">Message</th>
            </tr>

            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->guest}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
            </tr>
            @endforeach
        </table>
     </div>
    </div>
   
    @include("admin.admin-script")

  </body>
</html>