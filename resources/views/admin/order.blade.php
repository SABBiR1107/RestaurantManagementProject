<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* Responsive tweaks for small screens */
        @media (max-width: 767px) {
            .table-responsive {
                font-size: 13px;
            }
            .table thead {
                display: none;
            }
            .table tbody td {
                display: block;
                width: 100%;
                text-align: right;
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #444;
            }
            .table tbody td:before {
                position: absolute;
                left: 10px;
                top: 10px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                text-align: left;
                content: attr(data-label);
            }
            .table tr {
                margin-bottom: 15px;
                display: block;
                border-bottom: 2px solid #333;
            }
        }
        /* Custom thead color */
        .table thead tr {
            background-color: #343a40 !important; /* dark gray */
        }
        .table thead th {
            color: #ffc107 !important; /* amber/yellow */
            border-color: #454d55 !important;
        }
    </style>
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="card shadow mt-4">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0 text-center">Orders List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Food Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Chnage Stauts </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td data-label="Customer Name">{{ $data->name }}</td>
                                <td data-label="Phone">{{ $data->phone }}</td>
                                <td data-label="Address">{{ $data->address }}</td>
                                <td data-label="Food Name">{{ $data->titile }}</td>
                                <td data-label="Quantity">{{ $data->quantity }}</td>
                                <td data-label="Price">{{ $data->price }}</td>
                                <td data-label="Image">
                                    <img src="food_img/{{ $data->food_image }}" alt="loadingImages" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                                </td>
                                <td data-label="Status">{{ $data->delivery_status }}</td>
                                <td data-label="Change Status">
                                    <a class="btn btn-info btn-sm mb-1" href="{{ url('on_the_way',$data->id) }}">On the way</a>
                                    <a class="btn btn-warning btn-sm mb-1" href="{{ url('delivered',$data->id) }}">Deliverd</a>
                                    <a class="btn btn-danger btn-sm" href="{{ url('canceled',$data->id) }}">Cancel</a>
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