<!DOCTYPE html>
<html>

<head>
    <title>Realtime Test</title>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}"
        });

        var channel = pusher.subscribe('test-channel');

        channel.bind('test-event', function(data) {
            alert(data.message);
        });
    </script>
</head>

<body>
    <h1>Realtime Test Page</h1>
    <p>Open this page, then hit /fire-test-event</p>
</body>

</html>