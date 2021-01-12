import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsHost: process.env.MIX_PUSHER_HOST,
    wsPort: process.env.MIX_PUSHER_PORT,
    forceTLS: process.env.MIX_PUSHER_USE_SSL === "true",
    disableStats: true,
});

export default echo;
