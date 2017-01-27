$(function(){
		
	var start = +new Date();  // log start timestamp

	function cloneObj(obj){
		return JSON.parse(JSON.stringify(obj));
	}

	function getUser(userID, callback){
		$.get(elgg.get_site_url() + '/extractStats/user?id=' + userID, function(data){
			var user = JSON.parse(data);
			callback(user);
		});
	}
	
	function getLog(offset, count, user, callback){
		$.get(elgg.get_site_url() + '/extractStats/daily?offset=' + offset + '&count=' + count + '&user=' + user, function(data){
			var log;
			try{
				log = JSON.parse(data);
			}catch(e){
				log = { logs: [] };
			}
			if (typeof log !== "undefined")
				callback(log);
		});
	}
	
	var events = [];
	var userID = $('#user_guid').text();
	var loading = $('#loading');
	var count = 150; 

	var types = ['achieved', 'likes', 'corrected', 'purchased', 'correction_asked', 'wire_thread', 'user_task', 'blog', 'comment', 'generic_comment', 'question', 'answer', 'login', 'friend'];
	var titles = ['Logros', 'Likes', 'Corregidas', 'Compras', 'Corrección solicitada', 'Tweets', 'Tareas', 'Blogs', 'Comentarios', 'Comentarios2', 'Preguntas', 'Respuestas', 'Logins', 'Amigos'];
	var colors = ['#ff2527', '#ff9c10', '#777', '#4bc32f', '#bbc84e', '#2d91ab', '#0062ac', '#958c12', '#a31bb0', '#a31bb0', '#c5b47f', '#EAA228', "#579575", '#839557'];
	var minDate = Number.MAX_VALUE;
	var maxDate = 0;
	var totalMaxValue = 0;
	
	function getLogStep(init, callback){
		getLog(init, count, userID, function(logs){
			if (logs.logs.length > 0){
				$.each(logs.logs, function(i, log){
					if ((types.indexOf(log.object_subtype) != -1) || (log.event == 'login')){
						if (log.event == 'login') 
							log.object_subtype = 'login';
						if (log.object_subtype == 'generic_comment') log.object_subtype = 'comment';
						if (!events[log.object_subtype]){
							events[log.object_subtype] = [];
						}
						var date = new Date(Number(log.time_created) * 1000);
						minDate = Math.min(minDate, date);
						maxDate = Math.max(maxDate, date);
						log.date = date.getFullYear() + '-' + (date.getMonth()<9?'0':'') + (date.getMonth() + 1) + '-' + (date.getUTCDate()<10?'0':'') + date.getUTCDate();
						events[log.object_subtype].push(log);
					}
				});
				loading.show().find('span').html(init + count);
				getLogStep(init + count, callback);
			}
			else
				callback();
		});
	}

	function calculateAcc(line, accLines){
		var acc = 0;
		var events_acc = [];
		$.each(line, function(i, elem){
			acc += elem[1];
			events_acc.push( [elem[0], acc] );
			totalMaxValue = Math.max(totalMaxValue, acc);
		});
		return events_acc;
	}

	
	getLogStep(0, function(){
		loading.fadeOut();
		var end =  +new Date();  // log end timestamp
		var diff = end - start;

		var chartsDiv = $('#charts');
		var accLines = [];
		var accNames = [];
		var accColors = [];

		for (evt in events){
		
			var dates = new Object();
			$.each(events[evt], function(i, log_event){
				if (!dates[log_event.date])
					dates[log_event.date] = 1;
				else
					dates[log_event.date] ++;
			});
			
			var events_line = [];
			
			var minValue = Number.MAX_VALUE;
			var maxValue = 0;

			for (date in dates){
				dateValue = dates[date];
				var datetime = new Date(Number(date.substring(0,4)), (Number(date.substring(5,7)) - 1), Number(date.substring(8,10)));
				minValue = Math.min(minValue, dateValue);
				maxValue = Math.max(maxValue, dateValue);
				events_line.push( [datetime , dateValue] );
			}
			
			if (events_line.length > 0){
				var title = titles[types.indexOf(evt)];
				var color = colors[types.indexOf(evt)];
				chartsDiv.append('<h2>' + title + '</h2><div id="' + evt + '" class="chart"></div>');
				
				events_line.reverse();
				var events_acc = calculateAcc(events_line);
				accLines.push(events_acc);
				accNames.push(title);
				accColors.push(color);

				var options =  {
						axes:{ 
							xaxis :{ pad:0, renderer:$.jqplot.DateAxisRenderer, min:minDate, max:maxDate },
							yaxis :{ pad:1.5, min:0, label:'Diaria', labelRenderer:$.jqplot.CanvasAxisLabelRenderer },
							y2axis:{ pad:0, autoscale:true, label:'Acumulada', labelRenderer:$.jqplot.CanvasAxisLabelRenderer, tickOptions:{showGridline:false} }
						},
						series:[
							{ 
								markerOptions:{style:'square'},
								renderer: $.jqplot.BarRenderer,
								rendererOptions: { barWidth:9},
								color: color
							},
							{
								lineWidth:5,
								rendererOptions: {smooth: true },
								color: '#444',
								lineWidth:3,
								yaxis: 'y2axis'
							}
						],
						highlighter: {show: true, tooltipAxes: 'y'}
				}
				if ((events_line.length == 1) || (maxValue == minValue)){
					options.axes.yaxis.min = 0;
					options.axes.yaxis.max = 6;
				}				
				$.jqplot(evt, [events_line, events_acc], options);
			}
		}
		
		var options = {
				seriesDefaults: { rendererOptions:{smooth:true } },
				axes:{ 
					xaxis :{ pad:0, renderer:$.jqplot.DateAxisRenderer, min:minDate, max:maxDate },
					yaxis :{ pad:1.1, min:0 },
					y2axis:{ autoscale:true, min:0 }
				},
				series: [],
				legend: { show: true, location: 'nw', xoffset: 12, yoffset: 12, fontSize: "13px"}
			}

		var options1 = { markerOptions:{style:'filledSquare'}, yaxis:'yaxis', lineWidth:5 };
		var options2 = { markerOptions:{style:'filledCircle'}, yaxis:'y2axis', lineWidth:3 };
		var count = accLines.length;
		for (var i=0; i<count; i++){
			var accLine = accLines[i];
			//Al ser una función acumulada, el último valor es el más alto
			var lastValue = accLine[accLine.length - 1][1];
			var option = lastValue >= (totalMaxValue/2) ? cloneObj(options1) : cloneObj(options2);
			option.label = accNames[i];
			option.color = accColors[i];
			options.series.push( option );
		}

		chartsDiv.append('<h2>Global</h2><div id="total" style="height:450px;" class="chart"></div>');
		$.jqplot('total', accLines, options);
		
	});
	
});
