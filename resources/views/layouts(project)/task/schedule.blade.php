@extends('welcome')
@extends('body.resource')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<center><h4>Schedule Task Bigs Integrasi Teknologi</h4></center>
<div class="row justify-content-md-center">
    <div class="col-md-9 ">
        <div id="calendar">
    
        </div>
    
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var data = @json($events);
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',    
                    right: 'month, agendaWeek',
                },
                events: data,
                selectable: true,
                selectHelper: true,
        
            });
            $('.fc').css('background-color', '#a8d2f8');
     
        });
    </script>
    


@endsection