<div>
    @include('livewire.admin.fee-types.fee_type_modal')


    <div class="row">


        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <div class="w-100">
                        <h6 style="float: left; width:50%; display:inline;">Fee Type Details</h6>
                        <h4 style="float: right; width:50%; display:inline; text-align: right">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createModal">Create</a>
                        </h4>
                    </div>
                </div>
                <div class="px-0 pt-0 pb-2 card-body">

                      <div class="col-md-12">
                                @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            </div>

                    <div class="p-0 table-responsive">
                        <table class="table mb-0 align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Slug</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fee_types as $value)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">

                                                <p class="mb-0 text-sm text-secondary">{{ $value->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">

                                                <p class="mb-0 text-sm text-secondary">{{ $value->slug }}</p>
                                            </div>
                                        </td>
                                        <td>{{ $value->status == '1' ? 'hidden' : 'visible' }}</td>
                                        <td>
                                            <a href="#" wire:click='editFeeType({{ $value->id }})'
                                                class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#editModal">Edit</a>
                                            <a href="#" wire:click='deleteFeeType({{ $value->id }})'
                                                class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal">Del</a>
                                        </td>

                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#createModal').modal('hide');
                $('#editModal').modal('hide');
                $('#deleteModal').modal('hide');
            });
        </script>
    @endsection

</div>
