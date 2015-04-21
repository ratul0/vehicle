@extends('layouts.default')

@section('content')

    {{ Form::open(['route' => 'vehicle.doSearch']) }}

    <div>
        {{Form::label('make','Make')}}
        {{ Form::select('make', $make, '', ['id' => 'make']) }}
    </div>

    <div>
        <label for="model">Model :</label>
        <select id="model" name="model">
            <option>Please choose car make first</option>
        </select>
    </div>

    <div>
        {{Form::label('year','Year')}}
        {{ Form::text('year', null) }}
    </div>

    <div>
        {{Form::label('zip','Zip Code')}}
        {{ Form::text('zip', null) }}
    </div>

    <div>
        {{ Form::submit('Submit') }}
    </div>


    {{ Form::close() }}
<div>
    @if(count($vehicles))
        <table border="1">
            <thead>
            <tr>

                <th>Make</th>
                <th>Model</th>
                <th>Year</th>

            </tr>
            </thead>
            <tbody>
            @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->make}}</td>
                    <td>{{ $vehicle->model}}</td>
                    <td>{{ $vehicle->year}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        No Data Found
    @endif
</div>
@stop


@section('script')

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#make').change(function(){

                var id = $(this).val();
                var data = 'id='+ id;
                $.ajax({
                    type:"GET",
                    data:data,
                    url:"{{URL::to('api/dropdown')}}",
                    success:function(data){
                        var model = $('#model');
                        model.empty();
                        console.log(data);

                        $.each(data, function(index, element) {
                            console.log(element);
                            model.append("<option value='"+ element +"'>" + index + "</option>");
                        });
                    }

                });


            });
        });
    </script>



@stop