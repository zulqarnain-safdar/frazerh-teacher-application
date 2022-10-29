<table class="table table-bordered">
    <thead>
        <tr>
            <th>Package Name</th>
            <th>Payment URL</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach (auth()->user()->packages as $package)
            <tr>
                <td>{{ $package->p_name }}</td>
                <td>{{ $package->payment_url }}</td>
                <td><a href="javascript:void(0)" class="delete-package" data-package_id="{{ $package->id }}"><i
                            class="fa fa-trash text-danger"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(".delete-package").click(function() {
        let p_id = $(this).attr("data-package_id")
        var removeItemEl = $(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('delete_package') }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'package_id': p_id
            },
            success: function(data) {
                if (data.success) {
                    removeItemEl.closest("tr").remove();
                }
            },
            error: function(e) {
                alert(e.error);
            }
        });
    })
</script>
