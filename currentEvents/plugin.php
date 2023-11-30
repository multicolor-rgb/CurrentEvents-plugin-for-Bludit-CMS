<?php
class currentEvents extends Plugin
{

    public function init()
    {
        $this->dbFields = array(
            "locale" => "",
            "initialView" => "",
            "firstday" => "",
            "textColor" => "",
            "backgroundColor" => "",
            "backgroundColor" => "",
            "headershow" => ""

        );
    }

    public function form()
    {
        include($this->phpPath() . 'PHP/view/settings.view.php');
    }


    public function adminController()
    {
        include($this->phpPath() . 'PHP/class/currentevent.class.php');

        if (isset($_POST['create-event'])) {
            $createEvent = new CurrentEvent();
            $createEvent->getInfo($_POST['title-current-event'], $_POST['description-current-event'], $_POST['start-date'], $_POST['end-date'], $_POST['color-current-event'], $_POST['color-current-text'], $_POST['url-current-event'],  $_POST['longevent']);
            $createEvent->createFile();
        }


        if (isset($_GET['delete'])) {
            unlink(PATH_CONTENT . 'current-events/' . $_GET['delete'] . '.json');
            echo ("<meta http-equiv='refresh' content='0;url=" . DOMAIN_ADMIN . "plugin/currentevents'>");
        };
    }




    public function adminView()
    {
        // Token for send forms in Bludit
        global $security;
        $tokenCSRF = $security->getTokenCSRF();


        if (isset($_GET['addevent'])) {
            include($this->phpPath() . 'PHP/view/newevent.view.php');
        } elseif (isset($_GET['settings'])) {
            include($this->phpPath() . 'PHP/view/settings.view.php');
        } elseif (isset($_GET['howto'])) {
            include($this->phpPath() . 'PHP/view/howuse.view.php');
        } else {
            include($this->phpPath() . 'PHP/view/list.view.php');
        }
    }

    public function adminSidebar()
    {
        $pluginName = Text::lowercase(__CLASS__);
        $url = HTML_PATH_ADMIN_ROOT . 'plugin/' . $pluginName;
        $html = '<a id="CurrentEvents" class="nav-link" href="' . $url . '">CurrentEvents List 📅</a>';
        return $html;
    }


    public function siteHead()
    {

        echo "
	<style>
		button.fc-today-button.fc-button.fc-button-primary{
			margin-right:5px;
		}
		.datepicker{
			display:grid;
			grid-template-columns:1fr 150px;
			gap:5px;
			box-sizing:border-box;
			margin-top:10px;
		}
		.datepicker input{
			padding:10px;
			border-radius: 0.25em;
			border:solid 1px #ddd;
			box-sizing:border-box;
			width:100%;
		}
		.datepicker button{
			padding:10px;
			box-sizing:border-box;
			background-color: var(--fc-button-bg-color);
			border-color: var(--fc-button-border-color);
			color: var(--fc-button-text-color);
			border-radius: 0.25em;
			border:none;
			width20%;
			cursor:pointer;
		}
		.fc .fc-bg-event{
			padding-top:25px !important;
		}
		:root{
			--fc-bg-event-opacity:0.7 !important;
		}
		.fc-daygrid-event {
			white-space: normal !important;
			align-items: normal !important;
			padding:10px;
			box-sizing:border-box;
		}
		@media(min-width:996px){
			.fc-scroller.fc-scroller-liquid-absolute{
				overflow:hidden !important
			}
		};
	</style>
	
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
	
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, 
			";



        if ($this->getValue('headershow') == 'yes') {
            echo "{
					allDay:true,
					eventBackgroundColor:'blue',
					initialView: '" . $this->getValue('initialView') . "',
 					locale:'" . $this->getValue('locale') . "',
					firstDay:" . $this->getValue('firstday') . ",
				";

            if ($this->getValue('headershow') == 'yes') {
                echo "  headerToolbar:{
						start: 'title',
						center: '',
						end: 'today,next'
					}";
            } else {
                echo "  headerToolbar:{
						start: 'title',
						center: '',
						end: ''
					}";
            };
        } else {
            echo "{
					allDay:true,
					initialView: 'dayGridMonth',
					locale:'en',
					headerToolbar:{
						start: 'title',
						center: '',
						end: 'next'
					}";
        };

        echo ", events: [
		";

        if (!empty(glob(PATH_CONTENT . 'current-events/*.json'))) {
            foreach (glob(PATH_CONTENT . 'current-events/*.json') as $key => $file) {
                $data = file_get_contents($file);
                echo $data;

                if ($key !== count(glob(PATH_CONTENT . 'current-events/*.json'))) {
                    echo ',';
                };
            };
        };

        echo "
			],

			eventContent: function( info ) {
			  return {html: info.event.title};
			}
		
		});
		calendar.render();

		var calendarEl = document.getElementById('calendar');
		var dateInput = document.getElementById('dateInput');
		var goToDateButton = document.getElementById('goToDateButton');

		goToDateButton.addEventListener('click', function() {
		   var inputDate = dateInput.value;
		   if (inputDate) {
			var targetDate = new Date(inputDate);
            calendar.gotoDate(targetDate);

			} else {
				alert('Enter Date!');
			}
		});
	});
	</script>";
    }


    public function showCalendar($ce = '')
    {
        return '
        <div id="calendar"></div>
    
        <div class="datepicker">
            <input type="date" id="dateInput">
            <button id="goToDateButton">Check Date</button>
        </div>';
    }



    public function pageBegin()
    {

        global $page;

        $newcontent = preg_replace_callback(
            '/\\[% ce %\\]/i',
            [$this, 'showCalendar'],
            $page->content()
        );


        global $page;
        $page->setField('content', $newcontent);
    }
}


function showEventCalendar()
{
    $cal = new currentEvents();
    echo $cal->showCalendar();
}
