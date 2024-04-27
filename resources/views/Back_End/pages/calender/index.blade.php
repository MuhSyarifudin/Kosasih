@extends('Back_End.app')

@section('title', 'Calendar')
@section('page', 'Calendar')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Calendar</h4>

                {{-- Include the generated calendar HTML --}}
                <?php
                function build_calendar($month, $year, $events) {
                    $daysOfWeek = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

                    // Get the first day of the month
                    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

                    // Get the number of days in the month
                    $numberDays = date('t', $firstDayOfMonth);

                    // Get information about the first day of the month
                    $dateComponents = getdate($firstDayOfMonth);

                    // Get the name of the month
                    $monthName = $dateComponents['month'];

                    // Get the index of the first day of the month
                    $dayOfWeek = $dateComponents['wday'];

                    // Create a table for the calendar
                    $calendar = "<table class='calendar'>";
                    $calendar .= "<caption>$monthName $year</caption>";
                    $calendar .= "<thead><tr>";

                    // Create table headers
                    foreach ($daysOfWeek as $day) {
                        $calendar .= "<th class='header'>$day</th>";
                    }

                    $calendar .= "</tr></thead><tbody><tr>";

                    // Create blank cells for the days before the first day of the month
                    for ($i = 0; $i < $dayOfWeek; $i++) {
                        $calendar .= "<td class='empty'></td>";
                    }

                    $currentDay = 1;

                    // Create cells for each day of the month
                    while ($currentDay <= $numberDays) {
                        if ($dayOfWeek == 7) {
                            $dayOfWeek = 0;
                            $calendar .= "</tr><tr>";
                        }

                        $date = "$year-$month-$currentDay";
                        $eventClass = isset($events[$date]) ? 'event' : '';

                        $calendar .= "<td class='day $eventClass'>";
                        $calendar .= "<span class='day-number'>$currentDay</span>";
                        $calendar .= "<div class='events'>";

                        if (isset($events[$date])) {
                            foreach ($events[$date] as $event) {
                                $calendar .= "<div class='event-item'>$event</div>";
                            }
                        }

                        $calendar .= "</div>";
                        $calendar .= "</td>";

                        $currentDay++;
                        $dayOfWeek++;
                    }

                    // Complete the table
                    $calendar .= "</tr></tbody></table>";

                    return $calendar;
                }

                $month = date('n'); // Current month
                $year = date('Y');  // Current year

                // Example events data
                $events = [
                    '2023-01-01' => ['New Year\'s Day'],
                    '2023-01-15' => ['Event 1', 'Event 2'],
                    '2023-01-25' => ['Event A', 'Event B'],
                ];

                echo build_calendar($month, $year, $events);
                ?>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
{{-- Link the CSS file --}}
<link rel="stylesheet" href="{{ asset('path/to/style.css') }}">
<style>
/* Add any additional styles here */
.calendar {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.calendar caption {
    font-size: 1.5em;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    font-weight: bold;
}

.calendar th {
    background-color: #3498db;
    color: #fff;
    font-weight: bold;
    text-align: center;
    padding: 10px;
}

.calendar td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
}

.calendar .empty {
    background-color: #f2f2f2;
}

.calendar .day {
    position: relative;
}

.calendar .day-number {
    font-weight: bold;
    font-size: 1.2em;
}

.calendar .events {
    margin-top: 5px;
}

.calendar .event-item {
    background-color: #27ae60;
    color: #fff;
    padding: 5px;
    margin-bottom: 5px;
    border-radius: 3px;
}

/* Add any additional styles here */
</style>

{{-- Link FullCalendar CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css"
    integrity="sha512-rLUbwoyJ8OjJ8RRz5yHzbRd6S1/TtjFA+eNhShd/RoOFtPk7AiaSAdnf5IjSUEF5BmATiG1DDsA6QZRZKMswdQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />



{{-- Link jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Link FullCalendar JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-hIh85eLWMMtES+5Gv+owXvlffIzUv3CBhuDqXHbJ1S9zQc1jVWN6ESJz7sMIOxs+PXsHY51BpqTk67BA9e8oMg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"
    integrity="sha512-9Sz8CfNh8YIRZKnlK1WVZfc5JZcOhNVI3pT4Z8FuP8XznWp5/Mh5B2jOWTptYMU5koG3Z2YnjAKYWmIdTKMPNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- Add FullCalendar initialization --}}
<script>

</script>
@endsection