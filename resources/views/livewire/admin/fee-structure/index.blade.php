 <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 card">
                    <div class="pb-0 card-header">
                        <h6>Fee Structure Details</h6>
                        <a href="{{ route('admin.feeStructure.create') }}"class="btn">Create</a>
                    </div>
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>

                    <div class="px-0 pt-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Fee type</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Amount</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Session </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Term</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fee_structures as $value)

                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">
                                                        {{ $value->classSection->class->name ?? 'N/A' }}{{ $value->classSection->section ?? '' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    {{-- @dd($value->feeType) --}}
                                                    <p class="mb-0 text-sm text-secondary">
                                                        {{ $value->feeType->name ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">
                                                        N{{ number_format($value->amount) }}</p>
                                                </div>
                                            </td>

                                            {{-- <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->session->name ?? 'N/A'}}</p>
                                        </div>
                                    </td> --}}
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary text-capitalize">
                                                        {{ $value->term->name ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">
                                                        {{ Str::limit($value->description, 15, '...') ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">
                                                        {{ $value->status == 0 ? 'Active' : 'Inactive' }}</p>
                                                </div>
                                            </td>

                                            <td>
                                                {{-- <a href="{{ route("admin.feeStructure.edit", $value->id) }}" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> --}}
                                                <a href="{{ route('admin.feeStructure.edit', $value->id) }}"
                                                    class="btn btn-xs btn-primary">Edit</a>
                                                <a href="#" wire:click='deleteFeeStructure({{ $value->id }})'
                                                    class="btn btn-xs btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">Del</a>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse


                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $fee_structures->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('livewire.admin.fee-structure.fee_structure_modal')

        @section('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endsection
    </div>
