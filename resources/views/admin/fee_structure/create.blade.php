@extends('Layouts.app')
@section('title', 'Fee Structure')
@section('content')

<div class="py-4 container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="mb-4 card">
                <div class="pb-0 card-header">
                    <h6>Authors table</h6>
                </div>


                <div class="px-0 pt-0 pb-2 card-body">

                    <form action="{{ route('admin.feeStructure.store') }}" method="POST">
                        @csrf

                        <div class="p-2 row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Session</label>
                                    <select name="session" class="form-select">
                                        <option value="">--Select Session--</option>
                                        @forelse ($sessions as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @empty
                                        <option value="">--No Record--</option>
                                        @endforelse
                                    </select>
                                    @error('session')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Class</label>
                                    <select name="class" class="form-select">
                                        <option value="">--Select Class--</option>
                                        @forelse ($classes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @empty
                                        <option value="">--No Record--</option>
                                        @endforelse
                                    </select>
                                    @error('class')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Term</label>
                                    <select name="term" class="form-select">
                                        <option value="">--Select Term--</option>
                                        @forelse ($terms as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @empty
                                        <option value="">--No Record--</option>
                                        @endforelse
                                    </select>
                                    @error('term')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fee Types</label>
                                    <select name="feeType" class="form-select">
                                        <option value="">--Select Fee Type--</option>
                                        @forelse ($feeTypes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>

                                        @empty
                                        <option value="">--No Record--</option>
                                        @endforelse
                                    </select>
                                    @error('feeType')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="" class="form-label">Amount</label>
                                    <input type="number" name="amount" class="form-control" placeholder="" />
                                    @error('amount')
                                    <span class="text-xs text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="p-2 row">

                                <div class="col-md-12">

                                    <div class="form-group">

                                        <div class="mb-3">
                                            <label for="" class="form-label">Description</label>
                                            <textarea class="form-control" name="description" rows="3"></textarea>
                                            @error('description')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="checkbox" wire:model="status">
                                <label for="">Status</label>
                            </div>
                        </div>
                        <div class="text-right card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

</div>

@endsection
