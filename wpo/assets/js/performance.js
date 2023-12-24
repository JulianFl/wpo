import {onCLS, onFID, onLCP} from './web-vitals.attribution.js';

function generateUUID() { // Public Domain/MIT
  var d = new Date().getTime();//Timestamp
  var d2 = ((typeof performance !== 'undefined') && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16;//random number between 0 and 16
    if(d > 0){//Use timestamp until depleted
      r = (d + r)%16 | 0;
      d = Math.floor(d/16);
    } else {//Use microseconds since page-load if supported
      r = (d2 + r)%16 | 0;
      d2 = Math.floor(d2/16);
    }
    return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
  });
}

window.addEventListener('load', function () {


  let uuid = localStorage.getItem('uuid');
  if (uuid === null) {
    uuid = generateUUID();
    localStorage.setItem('uuid', uuid);
  }


  const jsonData = {
    uuid: uuid,
    pathName: window.location.pathname,
    date: new Date().toISOString(),
    entries: window.performance.getEntries().map(({connectEnd, connectStart, domainLookupEnd, domainLookupStart, duration, entryType, fetchStart, initiatorType, name, renderBlockingStatus, requestStart, responseEnd, responseStart, startTime}) => ({connectEnd, connectStart, domainLookupEnd, domainLookupStart, duration, entryType, fetchStart, initiatorType, name, renderBlockingStatus, requestStart, responseEnd, responseStart, startTime}))
  };
  fetch('/old-performance.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(jsonData),
  })
  .then(response => response)
  .then(data => {
     //console.log('Success:', data);
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
    fetch('old-cwv.php', {body, method: 'POST',    headers: {
        'Content-Type': 'application/json',
      }
    });
  }

})