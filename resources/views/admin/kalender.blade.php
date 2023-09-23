@extends('admin.admin_template')

@section('main')
    <div id="content_layout">
        @include('partials.breadcrumb')
        <div class=" space-y-5">
            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">{{ $title }}
                    </h4>
                </header>
                <div class="card-body px-6 pb-6">
                    @include('partials.alert')

                    <div id="calendar-new"></div>


                </div>
            </div>
        </div>

    </div>
@endsection


@push('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar-new');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
                },
                // initialView: "dayGridMonth",
                // slotMinTime: '8:00:00',
                // slotMaxTime: '19:00:00',
                // events: @json($events),
                initialView: "dayGridMonth",
                events: @json($events),
                editable: false,
                selectable: false,
                selectMirror: true,
                // dayMaxEvents: 2,
                weekends: true,
                eventClick: (info) => {
                    const url = {{ Js::from(route('admin.kalender.show', ':path')) }};
                    const newUrl = url.replaceAll(":path", info.event.id);
                    window.open(
                        newUrl, "_blank");
                },
            });
            calendar.render();
        });
        console.log('Log')
        console.log(calendarEl);
        console.log(calendar);
    </script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById("calendar-new");

        //         var calendar = new FullCalendar.Calendar(calendarEl, {
        //             headerToolbar: {
        //                 left: "prev,next today",
        //                 center: "title",
        //                 right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
        //             },
        //             initialView: "dayGridMonth",
        //             events: @json($events),
        //             editable: false,
        //             selectable: false,
        //             selectMirror: true,
        //             // dayMaxEvents: 2,
        //             weekends: true,
        //             eventClick: (info) => {
        //                 const url = {{ Js::from(route('admin.user.show', ':path')) }};
        //                 const newUrl = url.replaceAll(":path", info.event.id);
        //                 window.open(
        //                     newUrl, "_blank");
        //             },
        //             eventClassNames: handleClassName,
        //         });
        //         calendar.render();
        // });
        // const date = new Date();
        // const prevDay = new Date().getDate() - 1;
        // const nextDay = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);

        // // prettier-ignore
        // const nextMonth = date.getMonth() === 11 ? new Date(date.getFullYear() + 1, 0, 1) : new Date(date.getFullYear(),
        //     date.getMonth() + 1, 1)
        // // prettier-ignore
        // const prevMonth = date.getMonth() === 11 ? new Date(date.getFullYear() - 1, 0, 1) : new Date(date.getFullYear(),
        //     date.getMonth() - 1, 1)

        // const handleClassName = (arg) => {
        //     if (arg.event.extendedProps.calendar === "holiday") {
        //         return "danger";
        //     } else if (arg.event.extendedProps.calendar === "business") {
        //         return "primary";
        //     } else if (arg.event.extendedProps.calendar === "personal") {
        //         return "success";
        //     } else if (arg.event.extendedProps.calendar === "family") {
        //         return "info";
        //     } else if (arg.event.extendedProps.calendar === "etc") {
        //         return "info";
        //     } else if (arg.event.extendedProps.calendar === "meeting") {
        //         return "warning";
        //     } else {
        //         return "success";
        //     }
        // };
    </script>
@endpush
