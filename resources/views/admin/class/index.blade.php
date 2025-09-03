@extends('Layouts.app')
@section('title', 'Class')
@section('content')
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 card">
                    <div class="pb-0 card-header">
                        <h6>Class table</h6>
                    </div>
                    <div class="px-0 pt-0 pb-2 card-body">
                        <div class="p-0 table-responsive">
                            <table class="table mb-0 align-items-center">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name</th>

                                        <th
                                            class="text- text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Slug</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($classes as $value)
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


                                        </tr>
                                    @empty
                                     <tr>
                                        <td>
                                       No Class
                                    </td>
                                     </tr>
                                    @endforelse


                                </tbody>
                            </table>
                            {{-- Pagination --}}
                            <div class="mt-3">
                                {{ $classes->links() }} 
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
