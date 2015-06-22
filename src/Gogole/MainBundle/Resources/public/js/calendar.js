$(document).ready(function() {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		lang: 'fr',
		businessHours: true,
		editable: true,
		events: "http://gogole/events.php"/*"http://jsbin.com/hodode/1.js"*/,
		selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
		 	var title = prompt('Evenement :');
		 	if (title) {
			 	start = $.fullCalendar.moment(start).format("yyyy-MM-dd HH:mm:ss");
			 	end = $.fullCalendar.moment(end).format("yyyy-MM-dd HH:mm:ss");
			 	$.ajax({
			 		url: "http://gogole/add_events.php",
			 		data: 'title='+ title+'&start='+ start +'&end='+ end ,
					type: "POST",
		 			success: function(json) {
		 				location.reload();
		 			}
		 		});
		 		calendar.fullCalendar('renderEvent', 
			 		{
					 	title: title,
					 	start: start,
					 	end: end,
					 	allDay: allDay
			 		},
			 		true 
		 		);
		 	}
			calendar.fullCalendar('unselect');
		},
		
		eventDrop: function(event, delta) {
		 	start = $.fullCalendar.moment(event.start).format("yyyy-MM-dd HH:mm:ss");
		 	end = $.fullCalendar.moment(event.end).format("yyyy-MM-dd HH:mm:ss");
		 	$.ajax({
		 		url: "http://gogole/update_events.php",
		 		data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 		type: "POST",
		 		success: function(json) {
		 			location.reload();
		 		}
		 	});
		},

		eventResize: function(event) {
		 	start = $.fullCalendar.moment(event.start).format("yyyy-MM-dd HH:mm:ss");
		 	end = $.fullCalendar.moment(event.end).format("yyyy-MM-dd HH:mm:ss");
		 	$.ajax({
		 		url: "http://gogole/update_events.php",
		 		data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
		 		type: "POST",
		 		success: function(json) {
		 			location.reload();
		 		}
		 	});
		}

		/*eventClick: function(event) {
			if (confirm('Voulez-vous vraiment supprimer cette évenement ? ')) {
				$.ajax({
					url: 'http://gogole/delete_event.php',
					data: 'id=' + event.id,
					type: 'POST',
					success: function(json) {
						alert('ok');
					}
				});
			}
		}*/

	});	
});

