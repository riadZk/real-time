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


            // window.Echo.private('restaurant.' + restaurantId)
            //     .listen('RestaurantNotification', (event) => {
            //         console.log('New notification for restaurant: ', event.notification_data);
            //         alert(event.notification_data.message);
            //     });


        }, 200);
    </script>

    {{-- <script>
        // Pass authenticated user ID and restaurant ID from Laravel to JavaScript
        const userId = @json(auth()->id());
        const restaurantId = @json(optional(auth()->user()->restaurant)->id);

        setTimeout(() => {
            // Listen for notifications for the user (owner)
            if (userId) {
                window.Echo.private(`user.${userId}`)
                    .listen('OrderPlaced', (e) => {
                        console.log('User Notification:', e.message);
                    });
            }

            // Listen for notifications for the team (staff)
            if (restaurantId) {
                window.Echo.private(`team.${restaurantId}`)
                    .listen('OrderPlaced', (e) => {
                        console.log('Team Notification:', e.message);
                    });
            }
        }, 200);
    </script> --}}

</body>
</html>
