import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'pusher',
    key: document.head.querySelector('meta[name=echo-pusher-app-key]').content,
    forceTLS: document.head.querySelector('meta[name=echo-pusher-use-tls]').content === "1",
    // key: process.env.MIX_PUSHER_APP_KEY,
    // cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    // forceTLS: process.env.MIX_PUSHER_USE_SSL === "true",
    disableStats: true,
    wsHost: document.head.querySelector('meta[name=echo-pusher-host]')?.content || window.location.host,
    wsPort: document.head.querySelector('meta[name=echo-pusher-port]')?.content || null,
    // wsHost: process.env.MIX_PUSHER_HOST || window.location.host,
    // wsPort: process.env.MIX_PUSHER_PORT || null,
});

export default echo;
