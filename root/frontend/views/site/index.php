<?php
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
		
		
		
		
		
	<?php
	
	
	class Event1
	{
		public $id;
		public $title;
		public $start;
		public $end;
		public $textColor;
		public $allDay;
	}
	
	
$events = array();
  //Testing
  $Event = new Event1();
  $Event->id = 1;
  $Event->title = 'Событие 1';
  $Event->start = date('Y-m-d\TH:m:s\Z');
  $Event->end = date('Y-m-d\TH:m:s\Z',strtotime('Monday this week'));
  $Event->textColor='yellow';
  $Event->allDay=true;
  $events[] = $Event;
/*
  $Event = new Event1();
  $Event->id = 2;
  $Event->title = 'Testing';
  $Event->start = date('Y-m-d\TH:m:s\Z',strtotime('tomorrow 6am'));
  $events[] = $Event;*/
?>  
		
		
		
		<?= \talma\widgets\FullCalendar::widget([
	
    'googleCalendar' => false,  // If the plugin displays a Google Calendar. Default false
    'loading' => 'Загрузка...', // Text for loading alert. Default 'Loading...'
    'config' => [
	'events'=> $events,
        // put your options and callbacks here
        // see http://arshaw.com/fullcalendar/docs/
        'lang' => 'ru', // optional, if empty get app language
		'dayClick' => new \yii\web\JsExpression("function(date, jsEvent, view) {alert(date);}"),
     
    ],
]); ?>


		
		
		

		
		
		
		
		
		
		
		
		
          
            </div>
        </div>

    </div>
</div>
