<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td style="width: 90%">{{ $tag->name }}</td>
                    <td><a href="{{ route('tags.edit', $tag) }}" class="btn btn-success btn-sm">Edit</a></td>
                    <td><a href="" onclick="event.preventDefault();
                                                     document.getElementById('delete-tag').submit();"
                            class="btn btn-danger btn-sm">Delete</a>
                        <form id="delete-tag" action="{{ route('tags.destroy', $tag) }}" method="POST" class="d-none">
                            @csrf
                            @method('delete')
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
