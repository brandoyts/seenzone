

@extends('layouts.admin.index')
@section('admin_content')
	<section class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-9">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </section>

   <!-- Vendor -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="vendor/popper/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="vendor/common/common.js"></script>
    <script src="vendor/nanoscroller/nanoscroller.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Specific Page Vendor -->
    <script src="vendor/jquery-ui/jquery-ui.js"></script>
    <script src="vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="vendor/moment/moment.js"></script>
    <script src="vendor/fullcalendar/fullcalendar.js"></script>


    <!--(remove-empty-lines-end)-->
    
    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="js/custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

    
    {{-- calendar js --}}
    <script>
        (function($) {
            "use strict";

            var initCalendarDragNDrop = function() {
                $("#external-events div.external-event").each(function() {
                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    };

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data("eventObject", eventObject);

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0 //  original position after the drag
                    });
                });
            };

            var initCalendar = function() {
                var $calendar = $("#calendar");
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                var appointments = {!! json_encode($data) !!};
                var schedules = appointments.map(sched => {
                    return {
                        title: sched.email,
                        start: new Date(sched.scheduled_at)
                    };
                    
                });
                
                console.log(schedules);

                $calendar.fullCalendar({
                    header: {
                        left: "title",
                        right: "prev,today,next,basicDay,basicWeek,month"
                    },

                    timeFormat: "h:mm",

                    themeButtonIcons: {
                        prev: "fas fa-caret-left",
                        next: "fas fa-caret-right"
                    },

                    editable: false,
                    droppable: false, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) {
                        // this function is called when something is dropped
                        var $externalEvent = $(this);
                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $externalEvent.data("eventObject");

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.className = $externalEvent.attr(
                            "data-event-class"
                        );

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $("#calendar").fullCalendar(
                            "renderEvent",
                            copiedEventObject,
                            true
                        );

                        // is the "remove after drop" checkbox checked?
                        if ($("#RemoveAfterDrop").is(":checked")) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }
                    },


                    events: [
                        ...schedules

                        // {
                        //     title: "All Day Event",
                        //     start: new Date(y, m, 1)
                        // },
                        // {
                        //     title: "Long Event",
                        //     start: new Date(y, m, d - 5),
                        //     end: new Date(y, m, d - 2)
                        // },
                        // {
                        //     id: 999,
                        //     title: "Repeating Event",
                        //     start: new Date(y, m, d - 3, 16, 0),
                        //     allDay: false
                        // },
                        // {
                        //     id: 999,
                        //     title: "Repeating Event",
                        //     start: new Date(y, m, d + 4, 16, 0),
                        //     allDay: false
                        // },
                        // {
                        //     title: "Meeting",
                        //     start: new Date(y, m, d, 10, 30),
                        //     allDay: false
                        // },
                        // {
                        //     title: "Lunch",
                        //     start: new Date(y, m, d, 12, 0),
                        //     end: new Date(y, m, d, 14, 0),
                        //     allDay: false,
                        //     className: "fc-event-danger"
                        // },
                        // {
                        //     title: "Birthday Party",
                        //     start: new Date(y, m, d + 1, 19, 0),
                        //     end: new Date(y, m, d + 1, 22, 30),
                        //     allDay: false
                        // },
                        // {
                        //     title: "Click for Google",
                        //     start: new Date(y, m, 28),
                        //     end: new Date(y, m, 29),
                        //     url: "http://google.com/"
                        // }
                    ]
                });

                // FIX INPUTS TO BOOTSTRAP VERSIONS
                var $calendarButtons = $calendar.find(".fc-header-right > span");
                $calendarButtons
                    .filter(".fc-button-prev, .fc-button-today, .fc-button-next")
                    .wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
                    .parent()
                    .after('<br class="hidden"/>');

                $calendarButtons
                    .not(".fc-button-prev, .fc-button-today, .fc-button-next")
                    .wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

                $calendarButtons.attr({ class: "btn btn-sm btn-default" });
            };

            $(function() {
                initCalendar();
                initCalendarDragNDrop();
            });
        }.apply(this, [jQuery]));

    </script>

@endsection