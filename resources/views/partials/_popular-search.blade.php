<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <div class="menu_a">
                    <a href="{{ route('forums.populars') }}" class="text-dark">Populer</a> |
                    <a href="{{ route('tags.index') }}" class="text-dark">Tags</a>
                </div>
            </div>
            <div class="col-md-8">
                <form action="{{ route('forums.index') }}">
                <div class="input-group mb-3">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari forum disini..."
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
