<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">Kalender</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Setup Application Button -->
                <div class="mb-4">
                    <button type="button" class="btn btn-primary" style="background-color: #7C3AED; border: none;"
                        data-bs-toggle="modal" data-bs-target="#setupApp">
                        <i class="bi bi-gear-fill me-2"></i>Setup Aplikasi
                    </button>
                </div>

                <!-- Setup Info Alert -->
                <div class="mb-4" id="setupInfo">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div id="setupText">
                            Belum ada ketentuan pengajuan cuti yang diatur
                        </div>
                    </div>
                </div>

                <!-- Calendar Card -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Setup Modal -->
    <div class="modal fade" id="setupApp" tabindex="-1" aria-labelledby="setupAppLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setupAppLabel">Setup Aplikasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="setupAppForm">
                        @csrf
                        <div class="mb-3">
                            <label for="cuti" class="form-label">Minimal Hari Pengajuan Cuti</label>
                            <input type="number" class="form-control" id="cuti" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Pilih Hari Kerja:</label>
                            <div class="list-group">
                                @foreach ([['value' => 1, 'label' => 'Senin'], ['value' => 2, 'label' => 'Selasa'], ['value' => 3, 'label' => 'Rabu'], ['value' => 4, 'label' => 'Kamis'], ['value' => 5, 'label' => 'Jumat'], ['value' => 6, 'label' => 'Sabtu'], ['value' => 0, 'label' => 'Minggu']] as $day)
                                    <label class="list-group-item">
                                        <input class="form-check-input me-1" type="checkbox" name="days[]"
                                            value="{{ $day['value'] }}">
                                        {{ $day['label'] }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            style="background-color: #7C3AED; border: none;">
                            Simpan Pengaturan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        @csrf
                        <input type="hidden" id="eventId">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="start" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="start" required>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="end">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1"
                                style="background-color: #7C3AED; border: none;">
                                Simpan
                            </button>
                            <button type="button" class="btn btn-danger" id="deleteEvent">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('head')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/main.min.css' rel='stylesheet' />
        <style>
            .fc-button-primary {
                background-color: #7C3AED !important;
                border-color: #7C3AED !important;
            }

            .fc-button-primary:hover {
                background-color: #6D28D9 !important;
                border-color: #6D28D9 !important;
            }

            .fc-button-primary:disabled {
                background-color: #7C3AED !important;
                border-color: #7C3AED !important;
                opacity: 0.65;
            }

            .fc-daygrid-day.fc-day-today {
                background-color: #F3E8FF !important;
            }

            .form-control:focus,
            .form-check-input:focus {
                border-color: #7C3AED;
                box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
            }

            .list-group-item:hover {
                background-color: #F3E8FF;
            }
        </style>
    @endpush

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.15/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.15/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth'
                    },
                    events: '/calendar/events',
                    selectable: true,
                    selectMirror: true,
                    dayMaxEvents: true,
                    locale: 'id',
                    buttonText: {
                        today: 'Hari Ini'
                    },
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
                        $('#description').val(info.event.extendedProps.description);
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
                        end: $('#end').val(),
                        description: $('#description').val()
                    };

                    fetch(url, {
                            method: method,
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(eventData)
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                alert('Event saved successfully!');
                                $('#eventModal').modal('hide');
                                calendar.refetchEvents();
                            } else {
                                alert('Failed to save event.');
                            }
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                            alert('Failed to save event.');
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
                            }).then(response => {
                                if (!response.ok) {
                                    throw new Error('Network response was not ok');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    alert('Event deleted successfully!');
                                    $('#eventModal').modal('hide');
                                    calendar.refetchEvents();
                                } else {
                                    alert('Failed to delete event.');
                                }
                            })
                            .catch(error => {
                                console.error('There was a problem with the fetch operation:', error);
                                alert('Failed to delete event.');
                            });
                    }
                });

                $('#setupAppForm').on('submit', function(e) {
                    e.preventDefault();
                    let cuti = $('#cuti').val();
                    let izin = $('#izin').val();
                    let selectedDays = Array.from(document.querySelectorAll("input[name='days[]']:checked"))
                        .map(el => parseInt(el.value));

                    fetch('/setup-app', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                cuti: cuti,
                                izin: 0,
                                days: selectedDays
                            })
                        }).then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                alert('Pengaturan disimpan!');
                                $('#setupApp').modal('hide');
                                updateSetupInfo(cuti, selectedDays);
                            } else {
                                alert('Gagal menyimpan pengaturan.');
                            }
                        })
                        .catch(error => {
                            console.error('There was a problem with the fetch operation:', error);
                            alert('Gagal menyimpan pengaturan.');
                        });
                });

                // Load pengaturan dari server
                fetch('/setup-app')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            $('#cuti').val(data.cuti);
                            $('#izin').val(data.izin);
                            let selectedDays = data.days;
                            selectedDays.forEach(day => {
                                document.querySelector(`input[name='days[]'][value='${day}']`).checked =
                                    true;
                            });
                            updateSetupInfo(data.cuti, selectedDays);
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                        alert('Gagal memuat pengaturan.');
                    });

                function updateSetupInfo(cuti, selectedDays) {
                    let daysText = selectedDays.map(day => {
                        switch (day) {
                            case 0:
                                return 'Minggu';
                            case 1:
                                return 'Senin';
                            case 2:
                                return 'Selasa';
                            case 3:
                                return 'Rabu';
                            case 4:
                                return 'Kamis';
                            case 5:
                                return 'Jumat';
                            case 6:
                                return 'Sabtu';
                        }
                    }).join(', ');

                    document.getElementById('setupText').innerText =
                        `Pengajuan cuti dapat dilakukan minimal ${cuti} hari sebelum pengajuan cuti. Hari kerja yang berlaku: ${daysText}.`;
                }
            });
        </script>
    @endpush
</x-app-layout>
