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
        
        <div class="container">
            <h1>Costumer Orders</h1>
        <form action="{{url('/search')}}" method="get">
            <input type="text" name="search" placeholder="Name" style="color: blue">
            <input type="submit" value="Search" style="padding: 8px; color: white; background-color: green">
        </form>

        <div style="position: relative; top: 70px; right: -150;">
            <table bgcolor="black" border="3px">
                <tr>
                    <th style="padding: 50px">Name</th>
                    <th style="padding: 50px">Phone</th>
                    <th style="padding: 50px">Address</th>
                    <th style="padding: 50px">Food Name</th>
                    <th style="padding: 50px">Price</th>
                    <th style="padding: 50px">Quantity</th>
                    <th style="padding: 50px">Total Price</th>
                </tr>
    
                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->name}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->foodname}}</td>
                    <td>{{$data->price}}$</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->price * $data->quantity}}$</td>
                </tr>
                @endforeach
            </table>
        </div>
         </div>

    </div>
   
    @include("admin.admin-script")

  </body>
</html>