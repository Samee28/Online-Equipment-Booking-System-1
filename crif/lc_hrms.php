<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LC-HRMS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('../img2.jpg');
        }

        .navbar-custom {
            background: linear-gradient(to right, #6a8daf, #89a9c7);
            background: repeating-linear-gradient(45deg, #6a8daf, #6a8daf 2px, #89a9c7 10px, #89a9c7 20px);
            color: white;
        }

        .container {
            margin-top: 20px;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            border-radius: 5px;
        }

        .section-title {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .section-content {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .tariff-table th,
        .tariff-table td {
            text-align: center;
        }

        .back-btn {
            margin-top: 20px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: gray;
            text-align: center;
            padding: 10px;
        }

        .footer p {
            margin: 0;
            color: white;
        }

        .left-side,
        .right-side {
            padding: 15px;
        }

        .right-side {
            background-color: white;
            border-radius: 5px;
        }

        .slot-list {
            margin-top: 10px;
        }

        .card {
            margin-bottom: 15px;
        }

        .contact-box {
            background-color: #e9ecef;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">
            <img src="../nit.jpeg" width="30" height="30" class="d-inline-block align-top" alt=""
                style="border-radius:10px;">
            NITW - Online Equipment Booking System
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="crif.php" class="btn btn-outline-success text-dark mr-2">Back</a>
                </li>
                <li class="nav-item">
                    <a href="../welcome.php" class="btn btn-outline-success text-dark mr-2">Back to Home</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="btn btn-outline-danger">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-7 left-side">
                <div class="header text-center">
                    <h1>Liquid Chromatography-High Resolution Mass Spectrometry (LC-HRMS)</h1>
                </div>

                <div class="section-title">
                    <h2>Make: Agilent Technologies</h2>
                </div>
                <div class="section-content">
                    <p><strong>Model: QTOF 6530</strong></p>
                    <img src="img/image.png" class="img-fluid" alt="LC-HRMS Image" style="border-radius:4px;">
                </div>

                <div class="section-title">
                    <h2>Applications</h2>
                </div>
                <div class="section-content">
                    <p>The molecular structure of petroleum components, industrial products, pharmaceuticals and
                        biomolecules
                        can be judged. The purity of the finished chemical industrial products is established.</p>
                </div>

                <div class="section-title">
                    <h2>Specifications</h2>
                </div>
                <div class="section-content">
                    <h3>MASS Spectrometer</h3>
                    <ul>
                        <li>Mass Range: m/z 100-20000 High mass range, m/z 50-3200 High-resolution mode</li>
                        <li>Sensitivity: (1 pg. Reserpine signal noise ratio >180:1)</li>
                        <li>Mass Accuracy: < 2ppm</li>
                        <li>Resolution: (FWHM) 20000</li>
                        <li>Ionization Method: ESI & APCI</li>
                        <li>1) ESI positive & negative 2) APCI positive & negative</li>
                    </ul>
                    <h3>LC SYSTEM</h3>
                    <ul>
                        <li>Pump: 1290 infinity quaternary pump with 1200 bar maximum pressure</li>
                        <li>Detector: 1260 infinity Diode array detector(DAD)190-950nm</li>
                        <li>Flow rate: 0.001-5ml/min.</li>
                    </ul>
                </div>

                <div class="section-title">
                    <h2>Tariff</h2>
                </div>
                <div class="section-content">
                    <table class="table table-bordered tariff-table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Tariff for NITW Students</th>
                                <th>External Academic (18% GST Extra)</th>
                                <th>Industry (18% GST Extra)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Per Sample</td>
                                <td>₹ 100</td>
                                <td>₹ 500</td>
                                <td>₹ 1500</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center back-btn">
                    <a href="crif.php" class="btn btn-outline-success">Back to Equipment List</a>
                </div><br>
            </div><br>
            <br>
            <hr>
            <br>

            <div class="col-md-5 right-side">
                <div id="calendar"></div>
                <div class="slot-list">
                    <h4>Available Slots:</h4>
                    <ul id="slot-list" class="list-group">
                        <!-- Slots will be dynamically added here -->
                    </ul>
                </div>

                <div class="section-title">
                    <h2>Contact Information</h2>
                </div>
                <div class="section-content">
                    <div class="contact-box">
                        <p><strong>HOD:</strong> Dr. A. Kumar</p>
                        <p><strong>Email:</strong> a.kumar@example.com</p>
                        <p><strong>Contact:</strong> +91-9876543210</p>
                    </div>

                    <div class="contact-box">
                        <p><strong>Faculty In-charge:</strong> Dr. B. Sharma</p>
                        <p><strong>Email:</strong> b.sharma@example.com</p>
                        <p><strong>Contact:</strong> +91-8765432109</p>
                    </div>

                    <div class="contact-box">
                        <p><strong>Technician:</strong> Mr. C. Verma</p>
                        <p><strong>Email:</strong> c.verma@example.com</p>
                        <p><strong>Contact:</strong> +91-7654321098</p>
                    </div>
                </div>

                <!-- Booking Modal -->
                <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog"
                    aria-labelledby="bookingModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="bookingModalLabel">Confirm Booking</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="bookingForm">
                                    <div class="form-group">
                                        <label for="name">Your Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Your Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <p id="selected-slot"></p>
                                    <p id="selected-date"></p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="confirm-booking">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Booking Confirmed</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Booking confirmed successfully!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy;
            <script>document.write(new Date().getFullYear());</script> Shanker. All rights reserved.
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function () {


            const bookedSlots = JSON.parse(localStorage.getItem('bookedSlots')) || [];

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end) {
                    var slotList = $('#slot-list');
                    slotList.empty();

                    var maxDate = moment().add(2, 'months');
                    if (start.isAfter(maxDate)) {
                        alert('Booking is only available up to two months from today.');
                        $('#calendar').fullCalendar('unselect');
                        return;
                    }

                    var slotTimes = generateTimeSlots(start);
                    slotTimes.forEach(function (slot) {
                        const isBooked = bookedSlots.some(booked => booked.time === slot.time && booked.date === slot.date);
                        var slotItem = $('<li class="list-group-item d-flex justify-content-between align-items-center"></li>');
                        slotItem.text(slot.time);

                        if (isBooked) {
                            slotItem.addClass('list-group-item-danger');
                            slotItem.append('<span class="badge badge-danger">Booked</span>');
                        } else {
                            var bookButton = $('<button class="btn btn-primary btn-sm book-slot" data-time="' + slot.time + '" data-date="' + slot.date + '">Book</button>');
                            slotItem.append(bookButton);
                        }

                        slotList.append(slotItem);
                    });

                    $('.book-slot').click(function () {
                        var time = $(this).data('time');
                        var date = $(this).data('date');
                        $('#selected-slot').text('Time: ' + time);
                        $('#selected-date').text('Date: ' + date);
                        $('#bookingModal').modal('show');

                        $('#confirm-booking').off('click').on('click', function () {
                            var name = $('#name').val();
                            var email = $('#email').val();
                            if (name && email) {
                                bookedSlots.push({ time, date });
                                localStorage.setItem('bookedSlots', JSON.stringify(bookedSlots));
                                $('#bookingModal').modal('hide');
                                $('#calendar').fullCalendar('select', start, end); // Refresh slots

                                // Send booking details via AJAX
                                $.ajax({
                                    url: 'lc_hrms1.php',
                                    type: 'POST',
                                    data: { time: time, date: date, name: name, email: email },
                                    success: function (response) {
                                        $('#confirmationModal').modal('show');
                                        console.log(response);
                                    },
                                    error: function (xhr, status, error) {
                                        alert('An error occurred while sending email: ' + error);
                                    }
                                });
                            } else {
                                alert('Please fill in your name and email.');
                            }
                        });
                    });
                },
                validRange: {
                    start: moment().format('YYYY-MM-DD'),
                    end: moment().add(2, 'months').format('YYYY-MM-DD')
                }
            });

            function generateTimeSlots(start) {
                var slots = [];
                var times = [
                    '9:00 AM - 11:00 AM',
                    '11:00 AM - 1:00 PM',
                    '1:00 PM - 3:00 PM',
                    '3:00 PM - 5:00 PM'
                ];

                times.forEach(function (time) {
                    slots.push({
                        time: time,
                        date: start.format('YYYY-MM-DD')
                    });
                });

                return slots;
            }
        });
    </script>

</body>

</html>