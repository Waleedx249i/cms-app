@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive-md">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">user</th>
                        <th scope="col">posts</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="">
                            <td scope="row">{{ $user->name }}</td>
                            <td>{{ $user->post->count() }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>



    </div>
@endsection
