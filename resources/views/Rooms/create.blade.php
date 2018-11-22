



    <h2>Create room</h2>
    <form method="POST" action="/createRoom">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="id">room code:</label>
            <input type="text" class="form-control" id="room_code" name="room_code">
        </div>

        <div class="form-group">
            <label for="name">hotel_id:</label>
            <input type="text" class="form-control" id="hotel_id" name="hotel_id">
        </div>

        <div class="form-group">
            <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
        </div>

        @if ($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
    </form>


