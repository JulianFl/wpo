import {onCLS, onFID, onLCP} from 'https://unpkg.com/web-vitals@3?module';

window.addEventListener('load', function () {


  let uuid = localStorage.getItem('uuid');
  if (uuid === null) {
    uuid = crypto.randomUUID();
    localStorage.setItem('uuid', uuid);
  }

  const jsonData = {
    uuid: uuid,
    pathName: window.location.pathname,
    date: new Date().toISOString(),
    entries: window.performance.getEntries().map(({connectEnd, connectStart, domainLookupEnd, domainLookupStart, duration, entryType, fetchStart, initiatorType, name, renderBlockingStatus, requestStart, responseEnd, responseStart, startTime}) => ({connectEnd, connectStart, domainLookupEnd, domainLookupStart, duration, entryType, fetchStart, initiatorType, name, renderBlockingStatus, requestStart, responseEnd, responseStart, startTime}))
  };

  fetch('/performance.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(jsonData),
  })
  .then(response => response)
  .then(data => {
    // console.log('Success:', data);
  })
  .catch(error => {
    // console.error('Error:', error);
  });
  onCLS(sendToAnalytics);
  onFID(sendToAnalytics);
  onLCP(sendToAnalytics);
  function sendToAnalytics(metric) {

    let uuid = localStorage.getItem('uuid');
    const body = JSON.stringify({uuid, ...metric});
    fetch('/cwv.php', {body, method: 'POST',    headers: {
        'Content-Type': 'application/json',
      }
    });
  }

})