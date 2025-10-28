<table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Categories</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-cogs"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="" data-toggle="modal"
                                data-target="#modalEdit{{ $item->id }}">
                                <i class="fas fa-edit me-1"></i> Edit
                            </a>
                            <form action="{{ route('categories.destroy', encrypt($item->id)) }}"
                                method="POST" class="delete-form d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="dropdown-item btn-delete text-danger"
                                    data-id="{{ $item->id }}">
                                    <i class="fas fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>