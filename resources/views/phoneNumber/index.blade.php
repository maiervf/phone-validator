<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <title>Phone Numbers</title>

        <style type="text/css">
            .form-row {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Phone Numbers</h2>
            <div class="table-container">
                {{ Form::open(['action' => 'App\Http\Controllers\PhoneNumbersController@index', 'method' => 'get', 'name' => 'filter_form', 'id' => 'filter_form']) }}
                <div class="form-row">
                    <div class="col">
                        <select id="filter-country" class="form-control" name="country">
                            <option value="">Select country</option>
                            @foreach( $countries as $index => $country )
                                <option value="{{$index}}">{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select id="filter-valid" class="form-control" name="valid">
                            <option value="">Select valid or invalid numbers</option>
                            <option value="OK">Valid numbers</option>
                            <option value="NOK">Invalid Numbers</option>
                        </select>
                    </div>
                </div>
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

<script type="text/javascript">
    $(document).ready(function() {
        updateSelectsByParams();

        $('#filter_form select').on('change', function() {
            $('#filter_form').submit();
        });

        function updateSelectsByParams() {
            var urlParams = new URLSearchParams(window.location.search);
            var countryCode = urlParams.get('country');
            var validFilter = urlParams.get('valid');
            $('#filter-country').val(countryCode);
            $('#filter-valid').val(validFilter);
        }
    })
</script>