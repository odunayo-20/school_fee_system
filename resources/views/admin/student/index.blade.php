@extends('Layouts.app')
@section('title', 'Student')
@section('content')
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 card">
                    <div class="pb-0 card-header">
                        <h6>Students table</h6>
                    </div>
                    <div class="px-0 pt-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Reg No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $value)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">{{ $value->reg_no ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">{{ $value->firstname ?? 'N/A' }}
                                                        {{ $value->lastname ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->email ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->phone ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->class->name }}</p>
                                                </div>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse


                                </tbody>
                            </table>

                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $students->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    @endsection
