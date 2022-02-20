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
                    <div class="card-header" class="text-center"><b>{{ __('messages.newSupplement') }}</b></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('vitamins.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="staticName"
                                    class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.vitaminName') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" id="staticName" name="name"
                                        placeholder="{{ __('messages.vitaminName') }}" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $error }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticGeneralDescription"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.generalDescription') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticGeneralDescription"
                                            name="generalDescription" rows="3"
                                            placeholder="{{ __('messages.generalDescription') }}">{{ old('generalDescription') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticFound"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.found') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticFound" name="found" rows="3"
                                            placeholder="{{ __('messages.found') }}">{{ old('found') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticAntiAgingRole"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.antiAgingRole') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticAntiAgingRole" name="antiAgingRole"
                                            rows="3"
                                            placeholder="{{ __('messages.antiAgingRole') }}">{{ old('antiAgingRole') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticDeficiencySymptoms"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.deficiencySymptoms') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticDeficiencySymptoms"
                                            name="deficiencySymptoms" rows="3"
                                            placeholder="{{ __('messages.deficiencySymptoms') }}">{{ old('deficiencySymptoms') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticTherapeuticDoses"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.therapeuticDoses') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticTherapeuticDoses" name="therapeuticDoses"
                                            rows="3"
                                            placeholder="{{ __('messages.therapeuticDoses') }}">{{ old('therapeuticDoses') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticMaximumSafeLevel"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.maximumSafeLevel') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticMaximumSafeLevel" name="maximumSafeLevel"
                                            rows="3"
                                            placeholder="{{ __('messages.maximumSafeLevel') }}">{{ old('maximumSafeLevel') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticSideEffects"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.sideEffects') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticSideEffects" name="sideEffects" rows="3"
                                            placeholder="{{ __('messages.sideEffects') }}">{{ old('sideEffects') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticContraindications"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.contraindications') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticContraindications"
                                            name="contraindications" rows="3"
                                            placeholder="{{ __('messages.contraindications') }}">{{ old('contraindications') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticInteractions"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.interactions') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticInteractions" name="interactions"
                                            rows="3"
                                            placeholder="{{ __('messages.interactions') }}">{{ old('interactions') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticHighRiskGroups"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.highRiskGroups') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticHighRiskGroups" name="highRiskGroups"
                                            rows="3"
                                            placeholder="{{ __('messages.highRiskGroups') }}">{{ old('highRiskGroups') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticCompositionFormulas"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.compositionFormulas') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticCompositionFormulas"
                                            name="compositionFormulas" rows="3"
                                            placeholder="{{ __('messages.compositionFormulas') }}">{{ old('compositionFormulas') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticOtherRemarks"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.otherRemarks') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="staticOtherRemarks" name="otherRemarks"
                                            rows="3"
                                            placeholder="{{ __('messages.otherRemarks') }}">{{ old('otherRemarks') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-horizontal">
                                <div class="form-group row">
                                    <label for="staticImageUpload"
                                        class="col-sm-3 col-form-label font-weight-bold">{{ __('messages.image') }}</label>
                                    <div class="col-sm-9">
                                        <input id="staticImageUpload" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $error }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticLang" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="staticLang" name="lang"
                                        value="{{ $lang }}" hidden>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block">{{ __('messages.save') }}</button>
                            </div>

                    </div>

                </div>
            </div>
        </div>


    @endsection
