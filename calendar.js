$(document).ready(function(){
     
      // Client ID and API key from the Developer Console
     var CLIENT_ID = '523673487903-j4ubr12ssbki5ma1b68qdgodhub52ngu.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyBh_KiZjSngiPQvapniDx_njbzqmElYGFM';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";

      var authorizeButton = document.getElementById('authorize-button');
      

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (!isSignedIn) {
          authorizeButton.style.display = 'block';
        }
        else{
         authorizeButton.style.display = 'none'; 
        }
        
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
function insertEvent() {
    var user = document.getElementById("welcome-user").children[0].children[0].innerHTML;
    // var event;
    // if(document.getElementsByName('summary')[0].value != ""){
    //    event.summary = document.getElementsByName('summary')[0].value;
    // }
    // if(document.getElementsByName('location')[0].value != ""){
    //    event.location = document.getElementsByName('location')[0].value;
    // }
    // if(document.getElementsByName('description')[0].value != ""){
    //    event.description = document.getElementsByName('description')[0].value;
    // }
    // if(document.getElementsByName('summary')[0].value != ""){
    //    event.start = document.getElementsByName('summary')[0].value;
    // }
    // if(document.getElementsByName('summary')[0].value != ""){
    //    event.end = document.getElementsByName('summary')[0].value;
    // }
    // if(document.getElementsByName('summary')[0].value != ""){
    //    event.summary = document.getElementsByName('summary')[0].value;
    // }
    // if(document.getElementsByName('summary')[0].value != ""){
    //    event.summary = document.getElementsByName('summary')[0].value;
    // }
        $.post(
       'insertevent.php', //url
      {
        title: document.getElementsByName('summary')[0].value,
        start_date: document.getElementsByName('start_date')[0].value,
        start_time:document.getElementsByName('start_time')[0].value,
        location: document.getElementsByName('location')[0].value,
        description:document.getElementsByName('description')[0].value,
        end_date: document.getElementsByName('end_date')[0].value      
      },   //data
      function(response){//onsuccess function
       alert(response);
      }    
      );





            $.ajax({
            type: 'post',
            url: 'getcalid.php',
            data: { user:user },
              success: function (response) {
                //alert(response);//<--  'response' is the reference to the PHP echo

                    //Validetion:
              // var event = {};
              //    if(document.getElementsByName('summary')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 
              //    if(document.getElementsByName('summary')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 
              //    if(document.getElementsByName('summary')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 
              //    if(document.getElementsByName('location')[0].value != ""){
              //     event['location']=document.getElementsByName('location')[0].value;
              //    } 
              //    if(document.getElementsByName('start_date')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 
              //    if(document.getElementsByName('summary')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 
              //    if(document.getElementsByName('summary')[0].value != ""){
              //     event['summary']=document.getElementsByName('summary')[0].value;
              //    } 

                var event = 
        {
          'summary': document.getElementsByName('summary')[0].value,
          'location':  document.getElementsByName('location')[0].value,
          'description':  document.getElementsByName('description')[0].value,
          'start': {
            'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('start-time')[0].value + ":00",
            'timeZone': "Asia/Jerusalem"
          },
          'end': {
            'dateTime': document.getElementsByName('end_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value+ ":00",
            'timeZone': "Asia/Jerusalem"
          }
        };


        var request = gapi.client.calendar.events.insert({
          'calendarId': response,
          'resource': event
        });
      request.execute(function(event) {
        appendPre('Event created!');
       // alert('New event created on: \n'+ document.getElementsByName('start_date')[0].value +'\n'+ document.getElementsByName('start-time')[0].value)
      });
    document.getElementById('google-cal').src = document.getElementById('google-cal').src;

    }
  });
}
//   var event = 
//   {
//     'summary': document.getElementsByName('summary')[0].value,
//     'location':  document.getElementsByName('location')[0].value,
//     'description':  document.getElementsByName('description')[0].value,
//     'start': {
//       'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('start-time')[0].value + ":00",
//       'timeZone': "Asia/Jerusalem"
//     },
//     'end': {
//       'dateTime': document.getElementsByName('end_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value+ ":00",
//       'timeZone': "Asia/Jerusalem"
//     }
//   };


//   var request = gapi.client.calendar.events.insert({
//     'calendarId': 'ggjruj0qp00c93aceda7v2j72o@group.calendar.google.com',
//     'resource': event
//   });





});