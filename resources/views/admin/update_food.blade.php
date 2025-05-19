<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
  </head>
  <body>
    
    @include('admin.header')
    @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="card shadow p-4" style="max-width: 600px; margin: 0 auto;">
              <h1 class="mb-4 text-center text-primary">Update Food Item</h1>
              <form action="{{ url('edit_food', $data->id) }}" method="post" enctype="multipart/form-data" class="div_deg">
                @if(session('message'))
                  <div class="alert alert-success">
                    {{ session('message') }}
                  </div>
                @endif
                @csrf
                <div class="form-group mb-3">
                  <label for="food_title">Food Title</label>
                  <input type="text" name="titile" value="{{ $data->titile }}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label for="food_detail">Food Details</label>
                  <textarea name="detail" rows="5" class="form-control" required>{{ $data->detail }}</textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="food_price">Food Price</label>
                  <input type="text" name="price" value="{{ $data->price }}" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Current Image</label><br>
                  <img src="/food_img/{{ $data->image }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                </div>
                <div class="form-group mb-4">
                  <label for="food_image">Change Image</label>
                  <input type="file" name="image" class="form-control-file" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary px-5">Update</button>
                </div>
              </form>
            </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>