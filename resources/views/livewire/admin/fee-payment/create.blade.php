<div>
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>Fee Payment Form</h6>
                </div>

                <div class="px-0 pt-0 pb-2 card-body">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <form wire:submit.prevent="submit">
                        <div class="p-2 row">
                            <div class="col-md-4">
                                <label>Session</label>
                                <select wire:model.live="selectedSession" class="form-select">
                                    <option value="">--Select Academic Year + Term --</option>
                                    @forelse ($sessions as $value)
                                        <option value="{{ $value->id }}">{{ $value->year }} {{ $value->term->name }}
                                        </option>
                                    @empty
                                        <option>--No Record--</option>
                                    @endforelse
                                </select>
                                @error('selectedSession')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Term</label>
                                <select wire:model.live="selectedTerm" class="form-select">
                                    <option value="">--Select Term--</option>
                                    @forelse ($terms as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @empty
                                        <option>--No Record--</option>
                                    @endforelse
                                </select>
                                @error('selectedTerm')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label>Class</label>
                                <select wire:model.live="selectedClass" class="form-select">
                                    <option value="">--Select Class--</option>
                                    @forelse ($classes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @empty
                                        <option>--No Record--</option>
                                    @endforelse
                                </select>
                                @error('selectedClass')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3 col-md-4">
                                <label>Student</label>
                                <select wire:model.live="selectedStudent" class="form-select">
                                    <option value="">--Select Student--</option>
                                    @forelse ($students as $value)
                                        <option value="{{ $value->id }}">{{ $value->firstname }}
                                            {{ $value->lastname }}</option>
                                    @empty
                                        <option>--No Record--</option>
                                    @endforelse
                                </select>
                                @error('selectedStudent')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{--
                            @if ($fee_structures)
                                <div class="mt-3 col-md-4">
                                    <label>Fee Structure</label>
                                    <select wire:model.live="selectedFee_structure" class="form-select">
                                        <option value="">--Select Fee Structure--</option>
                                        @foreach ($fee_structures as $value)
                                            <option value="{{ $value->id }}">{{ $value->feeType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('fee_structure')
                                        <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif --}}

                            <!-- In Blade -->
                            <div class="col-md-4">
                                @if ($fee_structures)

                                    <div class="form-group">
                                        <label>Fee Structure</label>
                                        <select wire:model.live="fee_structure" class="form-select">
                                            <option value="">--Select Fee Structure--</option>

                                            @forelse ($fee_structures as $value)
                                                <option value="{{ $value->id }}">{{ $value->feeType->name }}
                                                </option>
                                            @empty
                                                <option value="">--No Record--</option>
                                            @endforelse
                                        </select>
                                    </div>
                                @endif


                            </div>
                            <div class="col-md-4">

                                @if ($fee_structure)
                                    <div class="mt-1 text-muted small">
                                        Fee Amount:
                                        <div class="form-control">

                                            ₦{{ number_format(optional($fee_structures->firstWhere('id', $fee_structure))->amount, 2) }}
                                        </div>
                                    </div>
                                @endif
                            </div>


                            <div class="mt-3 col-md-4">
                                <label>Amount</label>
                                <input type="number" wire:model="amount_paid" class="form-control" />
                                @error('amount_paid')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($fee_structure)
                                <div class="mt-2">
                                    <small class="text-muted">
                                        Remaining Balance: ₦{{ number_format($remainingBalance, 2) }}
                                    </small>
                                </div>
                            @endif

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select wire:model="payment_method" class="form-select">
                                        <option value="">-- Select Payment Method --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Pos">Pos</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                                @error('payment_method')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-3 col-md-4">
                                <label>Payment Reference</label>
                                <input type="text" wire:model="payment_reference" class="form-control" />
                                @error('payment_reference')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="text-end card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}

                            <div class="text-end card-footer">
                                <button type="submit" class="btn btn-primary"
                                    @if ($isFullyCleared) disabled @endif>
                                    Submit
                                </button>
                            </div>

                            @if ($isFullyCleared)
                                <div class="mt-2 alert alert-info">
                                    This student has already fully cleared this fee. No further payments can be made.
                                </div>
                            @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
