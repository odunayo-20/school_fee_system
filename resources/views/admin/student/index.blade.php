@extends('Layouts.app')
@section('title', 'Student')
@section('content')
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 card">
                    <div class="pb-0 card-header">
                        <h6>Authors table</h6>
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Email</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Phone</th>
                                        <th
                                            class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Class</th>
                                        <th
                                            class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Session</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $value)
                                        <tr>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">{{ $value->reg_no ?? 'N/A'}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">

                                                    <p class="mb-0 text-sm text-secondary">{{ $value->firstname ?? 'N/A'}} {{ $value->lastname  ?? 'N/A' }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->email  ?? 'N/A'}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->phone  ?? 'N/A'}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->class->name }}</p>
                                                </div>
                                            </td>
                                            {{-- <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <p class="mb-0 text-sm text-secondary">{{ $value->session->name }}</p>
                                                </div>
                                            </td> --}}
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
