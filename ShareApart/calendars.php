<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
          strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    require_once('./connection.php');
    $the_html = $_GET['action']();

    echo $the_html;
}
else {
  echo "don't be silly";
  die();
}

function get_times() {

    $date = new DateTime($_GET['date']);
    $day_after = new DateTime($_GET['date']);
    $day_after->add(new DateInterval('P1D'));
    $innerHTML = [];
    for($i=0;$i<24;$i++) {
        $innerHTML_arr[] = "<option value='$i'>$i:00</option>";
    }


    $client = getClient();
    $service = new Google_Service_Calendar($client);
    $calendarId = 'primary';
    $optParams = array(
      'timeMin' => date('c',$date->getTimestamp()),
      'timeMax' => date('c',$day_after->getTimestamp()),
    );
    $results = $service->events->listEvents($calendarId, $optParams);
    $the_html="";
    foreach ($results->getItems() as $event) {
        $s = new DateTime($event->start->dateTime);
        $start = date('G',$s->getTimestamp());
        $minutes = date('i', $s->getTimestamp());
        unset($innerHTML_arr[$start][$minutes]);
    }
    $the_html.=implode("",$innerHTML_arr);

    return $the_html;
}

function schedule_me() {
    createEvent();
    $the_html="
        Your event has been scheduled!
    ";
    return $the_html;
}

function createEvent() {
  $date_time = new DateTime($_GET['date']);
  $date_time->setTime($_GET['time'], 0);
  $end_date_time = new DateTime($_GET['date']);
  $end_date_time->setTime($_GET['time']+1, 0);
  //$time = $_GET['time'];

  $client = getClient();
  $service = new Google_Service_Calendar($client);
  $event = new Google_Service_Calendar_Event(array(
    'summary' => "Calendar Tutorial",
    'location' => "123 ABC Street",
    'description' => "Description of the event",
    'start' => array(
        'dateTime' => date('c', $date_time->getTimestamp()),
        'timeZone' => 'America/Chicago',
    ),
    'end' => array(
      'dateTime' => date('c', $end_date_time->getTimestamp()),
      'timeZone' => 'America/Chicago',
    ),

    'attendees' => array(
      array('email' => "abc123@gmail.com"),
    ),

    'guestsCanInviteOthers' => FALSE,
    'visibility' => "private",

    'reminders' => array(
      'useDefault' => FALSE,
      'overrides' => array(
        array('method' => 'email', 'minutes' => 24 * 60),
        array('method' => 'popup', 'minutes' => 10),
      ),
    ),
  ));

  $params = [ "sendNotifications" => "true" ];
  $calendarId = 'primary';
  $event = $service->events->insert($calendarId, $event, $params);
}
