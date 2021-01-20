<form method="POST" action="{{ route('edit.destroy', [$rep->id]) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <button type="submit">Delete</button>
</form>