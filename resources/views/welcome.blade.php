<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @vite('resources/js/app.js')

    <script>
        setTimeout(() => {
            window.Echo.channel('testChannel')
            .listen('TestEvent',(e) =>{
                console.log(e);

            });

            window.Echo.private('private-channel.' + @json(auth()->user()->id))
                .listen('DataArrayBroadcast', (event) => {
                    console.log('Received data: ', event.data);
                });


            window.Echo.private('restaurant.' + restaurantId)
                .listen('RestaurantNotification', (event) => {
                    console.log('New notification for restaurant: ', event.notification_data);
                    alert(event.notification_data.message);
                });

            
        }, 200);
    </script>
</body>
</html>
