<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                {{-- setup aplication untuk cuti --}}
                <div class="card mb-3">
                    <button>Setup Aplication</button>
                    {{-- modal --}}
                    <div class="modal fade" id="setupApp" tabindex="-1" aria-labelledby="setupAppLabel" aria-hidden="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="setupAppLabel">Setup Aplication</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <form action="">
                                        <div class="mb-3">
                                            <label for="cuti" class="form-label">Cuti</label>
                                            <input type="number" class="form-control" id="cuti" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="izin" class="form-label">Izin</label>
                                            <input type="number" class="form-control" id="izin" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                              <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with checkbox">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <input type="hidden" id="eventId">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="start" class="form-label">Start</label>
                            <input type="date" class="form-control" id="start" required>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">End</label>
                            <input type="date" class="form-control" id="end">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" id="deleteEvent">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.15/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '/calendar/events', // Menambahkan endpoint untuk mendapatkan event
                selectable: true,
                select: function(info) {
                    $('#eventModal').modal('show');
                    $('#eventForm')[0].reset();
                    $('#eventId').val('');
                    $('#start').val(info.startStr);
                    $('#end').val(info.endStr);
                },
                eventClick: function(info) {
                    $('#eventModal').modal('show');
                    $('#eventId').val(info.event.id);
                    $('#title').val(info.event.title);
                    $('#start').val(info.event.startStr);
                    $('#end').val(info.event.endStr);
                }
            });
            calendar.render();

            $('#eventForm').on('submit', function(e) {
                e.preventDefault();
                var id = $('#eventId').val();
                var url = id ? '/calendar/update/' + id : '/calendar/store';
                var method = id ? 'PUT' : 'POST';
                var eventData = {
                    title: $('#title').val(),
                    start: $('#start').val(),
                    end: $('#end').val()
                };

                fetch(url, {
                        method: method,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(eventData)
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Event saved successfully!');
                            $('#eventModal').modal('hide');
                            calendar.refetchEvents();
                        } else {
                            alert('Failed to save event.');
                        }
                    });
            });

            $('#deleteEvent').on('click', function() {
                var id = $('#eventId').val();
                if (id) {
                    fetch('/calendar/destroy/' + id, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Event deleted successfully!');
                                $('#eventModal').modal('hide');
                                calendar.refetchEvents();
                            } else {
                                alert('Failed to delete event.');
                            }
                        });
                }
            });
        });
    </script>
</x-app-layout>
