<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Region!</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"></h1>
                                            </div>
                                            <form class="user" method="POST" id="createRegionForm"
                                                action="{{ route('regions.store') }}">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user"
                                                        id="region_name" placeholder="Enter Region" name="name"
                                                        required autofocus>
                                                </div>


                                            </form>


                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit"
                                            form="createRegionForm">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-10 col-lg-12 col-md-9">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex ">
                            <h4 class="m-0 font-weight-bold text-primary mr-auto">Regions</h4>

                            <a class="btn btn-primary btn-icon-split" href="#" data-toggle="modal"
                                data-target="#createModal">

                                <span class="text">Create Region</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($regions as $region)
                                            <tr>
                                                <td>{{ $region->name }}</td>
                                                <td>{{ $region->created_at }}</td>
                                                <td> <a class="btn btn-warning btn-icon-split" href="#"
                                                        data-toggle="modal" data-target="#editModal{{ $region->id }}">

                                                        <span class="text">Edit</span>

                                                    </a>

                                                    <a class="btn btn-danger btn-icon-split" href="#"
                                                        data-toggle="modal"
                                                        data-target="#deleteModal{{ $region->id }}">

                                                        <span class="text">Delete</span>
                                                    </a>
                                                </td>
                                                <td> @unless ($region->created_at->eq($region->updated_at))
                                                        <small class="text-sm text-gray-600"> &middot;
                                                            {{ __('edited') }}</small>
                                                    @endunless
                                                </td>

                                            </tr>




                                            {{-- edit region --}}

                                            <div class="modal fade" id="editModal{{ $region->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Region
                                                                {{ $region->id }}!</h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
                                                                    <h1 class="h4 text-gray-900 mb-4"></h1>
                                                                </div>
                                                                <form class="user" method="POST"
                                                                    action="{{ route('regions.update', $region) }}"
                                                                    id="updateRegionForm">
                                                                    @csrf
                                                                    @method('patch')
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control form-control-user"
                                                                            id="region_name"
                                                                            placeholder="Enter Region"
                                                                            value="{{ $region->name }}"
                                                                            name="name" required autofocus>
                                                                    </div>

                                                                </form>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-primary" type="submit"
                                                                form="updateRegionForm">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end of edit region --}}

                                            {{-- Delete region --}}

                                            <div class="modal fade" id="deleteModal{{ $region->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                Region {{ $region->name }}!</h5>
                                                            <button class="close" type="button"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
                                                                    <h1 class="h4 text-gray-900 mb-4"></h1>
                                                                </div>
                                                                <form class="user" method="POST"
                                                                    action="{{ route('regions.destroy', $region) }}"
                                                                    id="destroyRegionForm">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control form-control-user"
                                                                            id="region_name"
                                                                            placeholder="Enter Region" disabled
                                                                            value="{{ $region->name }}"
                                                                            name="name" required autofocus>
                                                                    </div>

                                                                </form>


                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button class="btn btn-danger" type="submit"
                                                                form="destroyRegionForm">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- end of delete region --}}
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
