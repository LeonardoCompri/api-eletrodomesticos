@extends('layouts.defualt')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('warning'))
            <div class="alert alert-warning">
                {{ Session::get('warning') }}
            </div>
        @endif

        <div class="row mb-5">
            <div class="col-auto">
                <a class="btn btn-success" href="{{ route('appliance.create') }}">Add Appliance</a>
            </div>
            <div class="col-auto ms-auto">
                <form method="GET">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <input type="text" class="form-control" id="filter" name="filter"
                                placeholder="appliances name..." value="{{$filter}}">
                        </div>
                        @if ($filter != '')
                            <div class="col-auto">
                                <a class="btn btn-link" href="{{ route('appliances') }}">Clear</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="row row-cols-4 mb-5">
            @if (!$appliances->count() > 0)
            @else
                @foreach ($appliances as $appliance)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header">{{ $appliance->name }}</div>

                            <div class="card-body">
                                {{-- {{ $appliance->name }} <br> --}}
                                Marca: {{ $appliance->brand->name }} <br>
                                Voltage: {{ $appliance->voltage }} <br>
                                <br>
                                {{ $appliance->description }}
                            </div>

                            <div class="card-footer">
                                <div class="row justify-content-end">
                                    <div class="col-auto px-1">
                                        <a class="btn btn-primary" href="{{ route('appliance.edit', $appliance->id) }}">
                                            <i class="bi-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="col-auto px-1">
                                        <a class="btn btn-danger" href="{{ route('appliance.delete', $appliance->id) }}">
                                            <i class="bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <div>
            {{ $appliances->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
