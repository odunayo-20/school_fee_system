<div>
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    {{-- <h6>Authors table</h6>
                    <a href="{{ route("admin.feeStructure.create") }}"class="btn">Create</a> --}}

                    <div class="w-100">
                        <h6 style="float: left; width:50%; display:inline;">Fee Payment Details</h6>
                        <h4 style="float: right; width:50%; display:inline; text-align: right" >
                            <a href="{{ route("admin.feePayment.create") }}" class="btn btn-primary">Create</a>
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
                                        Student Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Class</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fee type</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Amount</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Academic Year </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Term</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Payment Method</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feePayments as $value)
                                <tr>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->student->firstname ?? 'N/A'}} {{ $value->student->lastname  ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->class->name ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->feeStructure->feeType->name ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">N{{ number_format($value->amount_paid) }}</p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->academicYear->year ?? 'N/A'}} {{ $value->academicYear->term->name ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->term->name ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->payment_method ?? 'N/A'}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->status ?? 'N/A'}}</p>
                                        </div>
                                    </td>


                                    <td>
                                        <a href="#" wire:click='editFeePaymentStatus({{ $value->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                        <a href="#"  wire:click='deleteFeePayment({{ $value->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Del</a>

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

    @include('livewire.admin.fee-payment.fee-payment-modal')
    @section('scripts')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
                $('#editModal').modal('hide');
            });
        </script>
    @endsection
</div>
