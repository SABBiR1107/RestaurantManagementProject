<div id="blog" class="container-fluid bg-dark text-light py-5 text-center wow fadeIn">
    <h2 class="section-title py-5">Our All Foods</h2>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="foods" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row align-items-stretch">
                @foreach ($data as $data)
                    <div class="col-12 col-sm-6 col-md-4 d-flex">
                        <div class="card bg-transparent border my-3 my-md-0 h-100 w-100">
                            <img src="food_img/{{$data->image}}" alt="photoLoading" class="rounded-0 card-img img-fluid">
                            <div class="card-body">
                                <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{ $data->price }}</a></h1>
                                <h4 class="pt20 pb20">{{ $data->title }}</h4>
                                <p class="text-white">{{ $data->detail }}</p>
                            </div>
                            <form action="{{url('add_cart', $data->id)}}" method="post">
                                @csrf
                                <input name="qty" value="1" type="number" min="1" required class="form-control mb-2">
                                <input type="submit" value="Add to Cart" class="btn btn-info w-100">
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<br>
<br>
<style>
.card-img {
  width: 100%;
  aspect-ratio: 1 / 1;
  object-fit: cover;
  display: block;
  height: auto;
}
.card {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 100%;
}
</style>