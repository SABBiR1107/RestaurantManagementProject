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
            <div class="card shadow p-4" style="max-width: 600px; margin: 0 auto;">
              <h3 class="mb-4 text-center text-primary">Add New Food Item</h3>
              <form action="{{ url('upload_food') }}" class="div_deg" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                  <label for="food_name">Food Title</label>
                  <input type="text" name="titile" class="form-control" placeholder="Enter food title" required>
                </div>
                <div class="form-group mb-3">
                  <label for="food_details">Food Details</label>
                  <textarea name="detail" rows="5" class="form-control" placeholder="Enter food details" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="food_price">Food Price</label>
                  <input type="text" name="price" class="form-control" placeholder="Enter price" required>
                </div>
                <div class="form-group mb-4">
                  <label for="food_image">Food Images</label>
                  <input type="file" name="image" class="form-control-file" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary px-5">Add Food</button>
                </div>
              </form>
            </div>
        </div>
        </div>
    <!-- JavaScript files-->
   @include('admin.js')
  </body>
</html>