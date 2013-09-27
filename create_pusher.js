//Function to start Pusher chat widget
$(function() {     
  var pusher = new Pusher('d803b9a0cf04e83082bc');
  var chatWidget = new PusherChatWidget(pusher, {
    chatEndPoint: 'pusher-realtime-chat-widget/php/chat.php'
  });
});