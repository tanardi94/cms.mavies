
  <a class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
    Action
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <li>
        <a class="btn btn-lg dropdown-item" href="{{ route('pages.event.edit', $event->uuid) }}">
            <i class="material-icons text-sm">edit</i> Edit
            </a>
    </li>
    <li>
        <a onclick="confirm('Apakah anda yakin untuk menghapus event ini ?')
                ? document.getElementById('destroy-event-form-{{ $event->uuid }}').submit() : null"
            class="btn btn-lg dropdown-item">
            <i class="material-icons text-sm">delete</i>
            Delete
        </a>
    </li>
  </ul>

<form id="destroy-event-form-{{ $event->uuid }}" action="{{ route('pages.event.destroy', ['event' => $event->uuid]) }}"
    method="POST" style="display: none;">
    @csrf
    @method('DELETE')

</form>
