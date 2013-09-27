session.addEventListener("sessionConnected", sessionConnectedHandler);
session.addEventListener("streamCreated", streamCreatedHandler);
session.connect(apiKey, token);


//Recieve facebook information from other clients
session.addEventListener("signal", signalHandler);
function signalHandler(event) {
	//If the list of participants do not already include client
	if($('#participants:contains("'+event.data[0]+'")').length == 0){
		localStorage.setItem(event.from.id, event.data);
		var target = $("#participants");
		target.html(target.html() + "<br/><a href='"+event.data[1]+"' target='_blank'>" + event.data[0] + "</a>");
	}
}

function sessionConnectedHandler (event) {
	subscribeToStreams(event.streams);
	var publisher = TB.initPublisher(apiKey,
                                 "myPublisher",
                                 {width:300, height:200, name:localStorage.getItem('name')})
	session.publish(publisher);
}

function subscribeToStreams(streams) {
	console.log("SUBSCRIBE");
	console.log(streams);
	for (var i = 0; i < streams.length; i++) {
		var stream = streams[i];
		if (stream.connection.connectionId != session.connection.connectionId) {
			session.subscribe(stream, "mySubscriber", {width:500, height:300, name: localStorage.getItem(stream.connection.connectionId)});
		}
	}

	//Send your facebook information to other clients
	session.signal({
		data: [localStorage.getItem('name'), localStorage.getItem('link')],
		success: function() {
			console.log("signal sent");
		},
		error: function(error) {
			console.log("signal error: " + error.reason);
		}
	});
}

function streamCreatedHandler(event) {
	subscribeToStreams(event.streams);
}