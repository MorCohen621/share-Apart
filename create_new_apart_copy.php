<!DOCTYPE html>
<html>
  <head>
    <title>Google Calendar API Quickstart</title>
    <meta charset="utf-8" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script src="script/script.js"></script>
      <script src="script/group.js"></script>
      <script src="script/newcalendar.js"></script>
  </head>
  <body>
    <p>Google Calendar API Quickstart</p>

    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize_button" style="display: none;">Authorize</button>
    <button id="signout_button" style="display: none;">Sign Out</button>

    <pre id="content" style="white-space: pre-wrap;"></pre>
      <input style='width:33%; font-size:16px;' type='text' placeholder='For example: the coolest Levys' id='apartmentname'>
       <button disabled id="inst" style = 'font-size:20px; border:3px solid #32bad4; border-radius:5px;'  onclick='newCalendar();'>
                          Create a APART and get instructions 
                         </button>


      <h2 style = 'font-size:27px; text-align:center; color:#f05768'>shareApart team wish you a pleasant family life ! <h2>
      <label style='text-align:center;margin:auto'> <input style='zoom: 1.5;' type='checkbox' id='finish-instructions'>I have finished the process</label><br><br>
       <button style='display:none; padding:10px' id='goto-hp'>GO TO HOMEPAGE <span class='dot'></span></button>         

    <script type="text/javascript">
      // Client ID and API key from the Developer Console
     var CLIENT_ID = '523673487903-j4ubr12ssbki5ma1b68qdgodhub52ngu.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyBh_KiZjSngiPQvapniDx_njbzqmElYGFM';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";

      var authorizeButton = document.getElementById('authorize_button');
      var signoutButton = document.getElementById('signout_button');

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
          signoutButton.onclick = handleSignoutClick;
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
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
         document.getElementById("inst").disabled = false;
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
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
      function listUpcomingEvents() {
        gapi.client.calendar.events.list({
          'calendarId': 'primary',
          'timeMin': (new Date()).toISOString(),
          'showDeleted': false,
          'singleEvents': true,
          'maxResults': 10,
          'orderBy': 'startTime'
        }).then(function(response) {
          var events = response.result.items;
          appendPre('Upcoming events:');

          if (events.length > 0) {
            for (i = 0; i < events.length; i++) {
              var event = events[i];
              var when = event.start.dateTime;
              if (!when) {
                when = event.start.date;
              }
              appendPre(event.summary + ' (' + when + ')')
            }
          } else {
            appendPre('No upcoming events found.');
          }
        });
      }
function newCalendar(){
        var apartname= document.getElementById('apartmentname').value;
    	
	if(apartname=="")
	{document.getElementById("apartmentname").style.border = '2px solid red';
    alert('Please choose a family nickname');}

    else{    
        var request = gapi.client.calendar.calendars.insert({
      "resource" :
            {"summary": apartname}
    });
   request.execute(function(calendar){
    	/*alert(calendar.id);*/ //
      var name = calendar.summary;
    	var calid = calendar.id;
    $.post('create_new_apartment_back.php', { calendarid:calid ,name: name},function(response){alert('Successfully created a new group! ');
        }
        );
       });
}
}
    </script>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
  </body>
</html>