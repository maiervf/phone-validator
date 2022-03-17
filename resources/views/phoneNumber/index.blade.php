<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <title>Phone Numbers</title>
    </head>
    <body>
        <div class="container">
            <h2>Phone Numbers</h2>
            <div class="table-container">
                {{ Form::open(['action' => 'App\Http\Controllers\PhoneNumbersController@index', 'method' => 'post', 'name' => 'filter_form', 'id' => 'filter_form']) }}
                    {!! Form::select('country', [], Request::get('country_filter'), ['class'=>'form-control']) !!}
                    {!! Form::select('valid', [1 => 'Valid numbers', 2 => 'Invalid Numbers'], Request::get('valid_filter'), ['class'=>'form-control']) !!}
                {!! Form::close() !!}
                <div class="col-xs-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Country</th>
                                <th>State</th>
                                <th>Country Code</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $phoneNumbers as $phoneNumber )
                            <tr>
                                <td>{{$phoneNumber->country}}</td>
                                <td>{{$phoneNumber->status}}</td>
                                <td>+{{$phoneNumber->countryCode}}</td>
                                <td>{{$phoneNumber->rawNumber}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $phoneNumbers->render() !!}
                </div>
            </div>
        </div>
    </body>
</html>
