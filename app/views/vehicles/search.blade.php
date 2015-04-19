
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
    {{ Form::submit('Submit') }}
</div>


{{ Form::close() }}

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
    jQuery(document).ready(function($){
        $('#make').change(function(){
            $.get("{{ url('api/dropdown')}}",
                    { option: $(this).val() },
                    function(data) {
                        var model = $('#model');
                        model.empty();
                        console.log(data);

                        $.each(data, function(index, element) {
                            console.log(index);
                            model.append("<option value='"+ element +"'>" + index + "</option>");
                        });
                    });
        });
    });
</script>