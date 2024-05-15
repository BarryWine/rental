@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('GameZone Rentals') }}</div>

                <div class="card-body">
                    @livewire('utama')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
