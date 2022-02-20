@extends('layouts.app')

@section('content')
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="text-center">
                <a href="{{ url()->previous() }}" class="button secondary">{{ __('messages.back') }}</a>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">403</span>
                    <div class="mb-4 lead">{{ __('messages.error403') }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection