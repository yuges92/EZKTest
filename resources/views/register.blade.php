@extends('layouts.app')

@section('content')

    <h1>New User Registration</h1>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName"
                               value="{{old('firstName')}}" required name="firstName">
                        <div id="firstName" class="invalid-feedback">
                            First name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control @error('lasNamet') is-invalid @enderror" id="lastName"
                               value="{{old('lastName')}}" required name="lastName">
                        <div id="lastName" class="invalid-feedback">
                            Last name is required.
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{old('email')}}" id="email" aria-describedby="emailFeedback" required
                               name="email">
                        <div id="emailFeedback" class="invalid-feedback">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="currency">Currency</label>
                        <select class="custom-select @error('currency') is-invalid @enderror" id="currency"
                                aria-describedby="validationServer04Feedback" required name="currency">
                            <option selected disabled value="">Choose currency</option>
                            <option>GBP</option>
                            <option>USD</option>
                            <option>EUR</option>
                        </select>
                        <div id="currencyFeedback" class="invalid-feedback">
                            Currency is required.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="hourlyRate">Hourly rate</label>
                        <input type="number" step="0.01" min=0
                               class="form-control @error('rate') is-invalid @enderror"
                               value="{{old('rate')}}" id="hourlyRate" aria-describedby="hourlyRateFeedback"
                               required name="rate">
                        <div id="hourlyRateFeedback" class="invalid-feedback">
                            Hourly rate is required
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </div>
    </div>
@endsection
