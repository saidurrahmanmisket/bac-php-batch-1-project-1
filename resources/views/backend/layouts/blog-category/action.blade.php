<div class="btn-group gap-3" role="group">
    <a href="" class="btn btn-warning btn-sm rounded-2">Edit</a>
    <form action="" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
    </form>
</div>
