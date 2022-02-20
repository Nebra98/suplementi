@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header"><b>{{ __('messages.usersList') }}</b></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('messages.userName') }}</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">{{ __('messages.userRoles') }}</th>
                                        <th scope="col">{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                            <td class="btn-group">
                                                @can('edit-users')
                                                <a class="btn btn-secondary" type="button"
                                                href="{{ route('admin.users.edit', $user->id) }}">{{ __('messages.editVitamin') }}</a>
                                                @endcan

                                              
                                                @can('delete-users')
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                                    class="float-right">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <div class="btn-group float-left">
                                                       
                                                        <!-- in blade -->

                                                        <a class="btn btn-danger" href="" type="button" data-toggle="modal"
                                                            style="margin-left: 5px" data-target="#vit{{ $user->id }}">
                                                            {{ __('messages.deleteSupplement') }}
                                                        </a>
                                                    </div>
                                                    <div class="modal fade" id="vit{{ $user->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        {{ __('messages.ConfirmAction') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    {{ __('messages.ConfirmActionContentUsers') }}
                                                                    {{ $user->name }}?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ __('messages.cancelAction') }}
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">{{ __('messages.userDelete') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                                @endcan

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
