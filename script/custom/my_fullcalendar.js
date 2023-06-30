function parseEventData(data) {
  var parsedData = JSON.parse(data);

  var events = [];
  parsedData.forEach(function(event) {
    var formattedEvent = {
      title: event.R_NAME,
      start: new Date(event.B_DATE.replace(' ', 'T')).toISOString(),
      time: event.B_TIME
    };
    events.push(formattedEvent);
  });

  return events;
}

function formatDate(date, time) {
  var day = String(date.getDate()).padStart(2, '0');
  var formatTime = "N/A";

  switch (time) {
    case 'MORNING':
      formatTime = '9.00 - 12.00';
      break;
    case 'AFTERNOON':
      formatTime = '13.00 - 16.00';
      break;
    case 'FULLDATE':
      formatTime = 'ทั้งวัน';
      break;
  }

  return 'วันที่ ' + day + ' ช่วงเวลา ' + formatTime;
}