import * as Turbo from '@hotwired/turbo';

window.Turbo = Turbo;

Turbo.start();

// const registerTurboRequestInterceptorToAddCsrfToken = () => {
//     let token = document.head.querySelector('meta[name="csrf-token"]');

//     document.addEventListener('turbo:before-fetch-request', (e) => {
//         if (token) {
//             e.detail.fetchOptions.headers['X-CSRF-Token'] = token.content;
//         } else {
//             console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
//         }
//     });
// }

// registerTurboRequestInterceptorToAddCsrfToken();

export default Turbo;
