@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-6">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <h1>users</h1>
                <div class="table-responsive">
                    <table class="table table-primary">
                        {{-- <thead>
                            <tr>
                                <th scope="col">image </th>
                                <th scope="col">name</th>
                                <th scope="col">role</th>
                            </tr>
                        </thead> --}}
                        @foreach ($users as $user)
                            <tbody>
                                <tr style="height: 50px">
                                    <td><img style="border-radius: 50%;width: 50px;haight:50px"
                                            src="{{ asset('storage/' . $user->profile->image) }}" alt=""></td>
                                    <td>
                                        <p style="margin-top: 9px">{{ $user->name }}</p>
                                    </td>
                                    <td>
                                        <div style="height: 50px">
                                            @if ($user->role == 'writer')
                                                <form method="POST" action="{{ route('makeAdmin', $user->id) }}">
                                                    @csrf
                                                    <button style="height: 8px" class="btn btn-primre" type="submit">make
                                                        admin</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('removeAdmin', $user->id) }}">
                                                    @method('POST')
                                                    @csrf
                                                    <button style="height:30px;margin-top:9px" class="btn btn-danger"
                                                        type="submit">remove
                                                        admin</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
