<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>
<script src="<?= base_url("script/fullcalendar.global.js"); ?>"></script>
<script src="<?= base_url("script/fullcalendar.global.min.js"); ?>"></script>
<script src="<?= base_url("script/custom/my_fullcalendar.js"); ?>"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    let yourDate = new Date();
    yourDate.toISOString().split('T')[0];

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: yourDate,
      editable: false,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true,
      events: function(fetchInfo, successCallback, failureCallback) {
        $.ajax({
          url: '<?= base_url(); ?>booking/get_active_booking',
          method: 'GET',
          success: function(data) {
            successCallback(parseEventData(data));
          },
          error: function() {
            failureCallback();
          }
        });
      },
      eventContent: function(arg) {
        var events = calendar.getEvents();
        var eventsWithSameTitle = events.filter(function(event) {
          return event.start && arg.event.start && event.start.toDateString() === arg.event.start.toDateString() && event.title === arg.event.title;
        });

        var eventClass = ' fc-text-warning ';
        if (eventsWithSameTitle.length >= 2 || arg.event.extendedProps.time === "FULLDATE") {
          eventClass = ' fc-text-danger ';
        }

        var eventHtml = '<div class="">';
        // eventHtml += '<div class="fc-event ' + eventClass + ' fc-pd-default">' + arg.event.title + '</div>';
        eventHtml += '<div class="fc-pd-default' + eventClass + '">' + arg.event.title + '</div>';
        eventHtml += '<div class="fc-event-time fc-pd-default">' + formatDate(arg.event.start, arg.event.extendedProps.time) + '</div>';
        eventHtml += '</div>';

        return {
          html: eventHtml
        };
      },
      eventClick: function(info) {
        // console.log('Event clicked:', info.event);
      }
    });

    calendar.render();
  });
</script>
<style>
  #calendar {
    max-height: 600px;
    margin: 0 auto;
  }

  a {
    text-decoration: none;
    color: black;
  }

  .fc-text-warning {
    background-color: #BBB600;
    color: white;
    border-radius: 5px !important;
  }

  .fc-text-danger {
    background-color: red;
    color: white;
    border-radius: 5px !important;
  }

  .fc-h-event {
    border: none !important;
    background-color: transparent !important;
  }
</style>
<div class="container">
  <h5 class="text-center my-5">ปฏิทิน</h5>
  <div id='calendar'></div>
</div>
<?= $this->endSection() ?>