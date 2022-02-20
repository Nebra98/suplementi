@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header"><b>{{ __('messages.supplementsList') }}</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <input class="form-control" type="text" id="myInput" onkeyup="myFunction()"
                            placeholder="{{ __('messages.searchBar') }}" title="Type in a name">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>

                                <tr>
                                    <th scope="col">{{ __('messages.image') }}</th>
                                    <th scope="col">{{ __('messages.vitaminName') }}</th>
                                    <th scope="col">{{ __('messages.vitaminDescription') }}</th>
                                    @can('delete-users')
                                        <th scope="col">{{ __('messages.action') }}</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vitamins as $vitamin)
                                    <tr>
                                        <td>
                                            @if ($vitamin->image)
                                                <a href="{{ url('/' . $vitamin->slug) }}" class="text-decoration-none">
                                                    <img src="{{ url('storage/uploads/images/' . $vitamin->image) }}"
                                                        style="width:50px; height:50px;" class="card-img" alt="...">
                                                </a>
                                            @endif

                                        </td>
                                        <td><a href="{{ url('/' . $vitamin->slug) }}"
                                                class="text-decoration-none">{{ $vitamin->name }}</a></td>
                                        <td><a href="{{ url('/' . $vitamin->slug) }}"
                                                class="text-decoration-none">{{ $vitamin->generalDescription }}</a></td>
                                        @can('delete-users')
                                            <td>

                                                <form action="{{ route('vitamins.destroy', $vitamin->id) }}" method="POST"
                                                    class="float-right">
                                                    @csrf
                                                    {{ method_field('DELETE') }}

                                                    <div class="btn-group float-right">
                                                        <a class="btn btn-Secondary" type="button"
                                                            href="{{ url($vitamin->slug . '/edit') }}">{{ __('messages.editVitamin') }}</a>
                                                        <!-- in blade -->

                                                        <a class="btn btn-danger" href="" type="button" data-toggle="modal"
                                                            style="margin-left: 5px" data-target="#vit{{ $vitamin->slug }}">
                                                            {{ __('messages.deleteSupplement') }}
                                                        </a>
                                                    </div>
                                                    <div class="modal fade" id="vit{{ $vitamin->slug }}" tabindex="-1"
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

                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";

                }
            }
        }
    }
</script>
