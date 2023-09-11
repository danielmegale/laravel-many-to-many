@if (session('alert-message'))
    <div class="alert alert-{{ session('alert-type') ?? info }}">
        {{ session('alert-message') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
