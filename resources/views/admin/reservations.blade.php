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
          
            <div class="card shadow mt-4">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0 text-center">Reservations List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Phone</th>
                                <th>Number of Guests</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->guest }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->time }}</td>
                                <td><span class="badge badge-success">Confirmed</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>