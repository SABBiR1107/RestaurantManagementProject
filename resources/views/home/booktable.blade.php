<!-- book a table Section  -->
    <div class="container-fluid has-bg-overlay text-center text-light has-height-lg middle-items" id="book-table">
        <div class="">
            <h2 class="section-title mb-5">BOOK A TABLE</h2>
            <form action="{{ url('book_table') }}" method="post">
            @csrf

            <div class="row mb-5">
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="text" name="phone" class="form-control form-control-lg custom-form-control" placeholder="Phone" required>
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="number" name="guest" class="form-control form-control-lg custom-form-control" placeholder="Number of guests" max="20" min="0">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="time" name="time" class="form-control form-control-lg custom-form-control" placeholder="Time">
                </div>
                <div class="col-sm-6 col-md-3 col-xs-12 my-2">
                    <input type="date" name="date" class="form-control form-control-lg custom-form-control" placeholder="Date">
                </div>
            </div>
            <input type="submit" class="btn btn-primary btn-lg" value="Book Table">
            </form>
        </div>
    </div>