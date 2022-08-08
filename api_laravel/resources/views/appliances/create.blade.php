@extends('layouts.defualt')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('appliance.store') }}">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create appliance') }}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" />

                                    @error('name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="voltage" class="col-sm-2 col-form-label">{{ __('Voltage') }}</label>
                                    <input type="text" class="form-control" id="voltage" name="voltage" />

                                    @error('voltage')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="brand_id" class="col-sm-2 col-form-label">{{ __('Brand') }}</label>
                                    <select id="brand_id" name="brand_id" class="form-control">
                                        <option>Selecione uma marca</option>
                                        @if (count($brands) > 0)
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                    @error('brand')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end mb-3">
                            <div class="col-auto me-3">
                                <button type="submit" class="btn btn-success" href="#">{{ __('Save') }}</button>
                                <a class="btn btn-outline-danger" href="{{ route('appliances') }}">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
