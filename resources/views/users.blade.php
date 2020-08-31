@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <div class="card">
{{--        <div class="card-header ">--}}
{{--            <div class="col-md-3 float-right">--}}

{{--                <form method="get" action="">--}}
{{--                    <select class="custom-select" onchange="changeCurrency()">--}}
{{--                        <option>GBP</option>--}}
{{--                        <option>USD</option>--}}
{{--                        <option>EUR</option>--}}
{{--                    </select>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
        <div class="card-body">
            <table class="table">
                <caption>List of users</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Rate</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->currency}}</td>
                        <td>{{$user->rate}}</td>
                        <td><a href="{{route('users.show', $user->id)}}">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->withQueryString()->links() }}

        </div>
    </div>

    <script>
        function changeCurrency() {
            console.log('changed')
        }
    </script>

@endsection
