@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="text-center">
            <a href="{{ url()->previous() }}" class="button secondary">{{ __('messages.back') }}</a>
        </div>

        <hr>
        @if (count($errors))
            <div class="alert alert-danger">
                <strong>{{ __('messages.nameInputError') }}</strong>
                <br />
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header" class="text-center">
                        <b>{{ __('messages.supplementInformation') }}{!! $vitamin->name !!}</b>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($vitamin->image)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.image') }}</p>
                                </div>

                                <div class="col-9">
                                    <img src="{{ url('storage/uploads/images/' . $vitamin->image) }}"
                                        style="width:150px; height:150px;" class="card-img" alt="...">
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->generalDescription)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.generalDescription') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->generalDescription !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->found)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.found') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->found !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->antiAgingRole)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.antiAgingRole') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->antiAgingRole !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->deficiencySymptoms)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.deficiencySymptoms') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->deficiencySymptoms !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->therapeuticDoses)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.therapeuticDoses') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->therapeuticDoses !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->maximumSafeLevel)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.maximumSafeLevel') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->maximumSafeLevel !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->sideEffects)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.sideEffects') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->sideEffects !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->contraindications)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.contraindications') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->contraindications !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->interactions)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.interactions') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->interactions !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->highRiskGroups)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.highRiskGroups') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->highRiskGroups !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->compositionFormulas)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.compositionFormulas') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->compositionFormulas !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif

                        @if ($vitamin->otherRemarks)
                            <div class="row">
                                <div class="col-3">
                                    <p class="font-weight-bold">{{ __('messages.otherRemarks') }}</p>
                                </div>
                                <div class="col-9">
                                    <p class="font-weight-normal">{!! $vitamin->otherRemarks !!}</p>
                                    <hr>
                                </div>
                            </div>
                        @endif
                        @can('delete-users')
                            <div class="btn-group float-right" role="group">
                                <a type="button" class="btn btn-secondary" role="button"
                                    href="{{ url($vitamin->slug . '/edit') }}">{{ __('messages.editVitamin') }}</a>

                                <form action="{{ route('vitamins.destroy', $vitamin->id) }}" method="POST"
                                    class="float-right">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <!-- in blade -->
                                    <a type="button" href="" class="btn btn-danger" role="button" data-toggle="modal"
                                        style="margin-left: 5px" data-target="#vit{{ $vitamin->slug }}">
                                        {{ __('messages.deleteSupplement') }}
                                    </a>

                                    <div class="modal fade" id="vit{{ $vitamin->slug }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        {{ __('messages.ConfirmAction') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('messages.ConfirmActionContent') }}
                                                    {{ $vitamin->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ __('messages.cancelAction') }}
                                                    </button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ __('messages.deleteVitamin') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        @endcan
                    </div>
                </div>

            </div>
        </div>

    @endsection
