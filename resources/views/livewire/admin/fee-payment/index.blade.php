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
                                        Session </th>
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

                                            <p class="mb-0 text-sm text-secondary">{{ $value->student->first_name }} {{ $value->student->last_name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->class->name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->feeStructure->feeType->name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">N{{ number_format($value->amount) }}</p>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->session->name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->term->name }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->payment_method }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary text-capitalize">{{ $value->status }}</p>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->description }}</p>
                                        </div>
                                    </td> --}}
                                    {{-- <td>
                                        <div class="d-flex flex-column justify-content-center">

                                            <p class="mb-0 text-sm text-secondary">{{ $value->status == 0 ? 'Active' : 'Inactive'  }}</p>
                                        </div>
                                    </td> --}}

                                    <td>
                                        <a href="#" wire:click='editFeeType({{ $value->id }})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                        <a href="#"  wire:click='deleteFeeType({{ $value->id }})' class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Del</a>
                                    </td>

                                </tr>
                                @empty
                                @endforelse
                                {{-- <td>
                                    <div class="px-2 py-1 d-flex">
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                alt="user1">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">John Michael</h6>
                                            <p class="mb-0 text-xs text-secondary">john@creative-tim.com</p>
                                        </div>
                                    </div>
                                </td> --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
