@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
  <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
</div>

  <div id='calendar'></div>
@stop
@section('css')
<link href="{{ URL::asset('vendor/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('vendor/fullcalendar/fullcalendar.print.css') }}" rel='stylesheet' media='print' />
<style>

  html, body {
    margin: 0;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
  }

</style>
  @stop
  @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/pt-br.js"></script>

<script src="{{ URL::asset('vendor/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('vendor/fullcalendar/locales/pt-br.js') }}"></script>


  
<script>

  $(function() {

    $('#calendar').fullCalendar({
	  themeSystem: 'bootstrap4',
	  locale: 'pt-br',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listMonth'
      },
      locale: 'pt-br',
      weekNumbers: true,
      eventLimit: true, // allow "more" link when too many events
      events: 'https://fullcalendar.io/demo-events.json'
    });

  });

</script>
  @stop