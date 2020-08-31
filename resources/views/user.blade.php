@extends('layouts.app')

@section('content')
    <h1>Users</h1>
    <div class="container bootstrap-snippet header-container">
        <div class="card">
            <div class="card-body">
                <div class="media col-md-10 col-lg-8 col-xl-7 p-0 my-4 mx-auto">
                    <div class="media-body ml-5">
                        <h4 class="font-weight-bold mb-4">{{$user->firstName }} {{$user->lastName }}</h4>
                        <strong>Email</strong>: {{$user->email}}
                        <div class="pt-3">
                            <h5>Hourly Rate</h5>
                            <ul class="list-group">
                                <li class="list-group-item"> <strong>GBP: </strong>£{{$user->convert('GBP')}}</li>
                                <li class="list-group-item"> <strong>USD: </strong>${{$user->convert('USD')}} </li>
                                <li class="list-group-item"> <strong>EUR: </strong>€{{$user->convert('EUR')}} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function changeCurrency() {
            console.log('changed')
        }
    </script>

@endsection
