



    <h2>Create</h2>
    <form method="POST" action="/createHotel">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>

        <div class="form-group">
            <label for="name">hotel name:</label>
            <input type="text" class="form-control" id="hotel_name" name="hotel_name">
        </div>

        <div class="form-group">
            <label for="rate">Rate:</label>
            <input type="text" class="form-control" id="rate" name="rate">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @if ($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
    </form>


