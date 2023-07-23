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
                <div class="card">
                    <div class="card-header" style="display: flex;align-content:center;justify-content: space-between">
                        <h1>users</h1>
                    </div>

                    <div class="card-body">

                        <div class="list-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>image</th>
                                        <th>name</th>
                                        <th>permesion</th>
                                    </tr>
                                </thead>
                                @foreach ($users as $user)
                                    <tbody>
                                        <tr>
                                            <td><img src="" alt="" style="border-radius: 50%"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if ($user->role == 'writer')
                                                    <small><a class="btn btn-primary "href="{{ route('user.show', $user) }}"
                                                            role="button">maker
                                                            admin</a></small>
                                                @else
                                                    <small><a class="btn btn-danger "href="{{ route('user.edit', $user) }}"
                                                            role="button">remove
                                                            admin</a></small>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
