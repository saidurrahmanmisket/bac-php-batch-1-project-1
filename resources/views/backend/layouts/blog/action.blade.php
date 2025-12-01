<div class="btn-group gap-3" role="group">
    <a href="{{ route('dashboard.blog.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-sm rounded-2">Edit</a>
    <form action="{{ route('dashboard.blog.delete', ['id' => $row->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </form>
</div>
