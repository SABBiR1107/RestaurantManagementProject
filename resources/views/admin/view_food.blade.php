<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

            <div>
                <h2 class="text-center mb-4 text-primary">All Food</h2>
                <div class="card shadow p-4" style="max-width: 900px; margin: 0 auto;">
                  <table class="table table-bordered table-hover table-striped text-center align-middle">
                    <thead class="thead-dark">
                      <tr>
                        <th>Food Title</th>
                        <th>Food Details</th>
                        <th>Food Price</th>
                        <th>Food Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $data)
                      <tr>
                        <td>{{ $data->titile }}</td>
                        <td>{{ $data->detail }}</td>
                        <td>{{ $data->price }}</td>
                        <td><img src="/food_img/{{ $data->image }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;"></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('are you sure to Delete this')" href="{{ url('delete_food', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('update_food', $data->id) }}" class="btn btn-primary btn-sm">Update</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
           
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>