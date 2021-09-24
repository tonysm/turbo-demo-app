import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    activate(e) {
        if (e.target.tagName !== 'A') return;

        Array.from(this.element.querySelectorAll('a')).forEach((item) => {
            item.classList.remove('border-b-2');
            item.classList.remove('border-indigo-400');
            item.classList.remove('text-gray-900');
            item.classList.add('text-gray-500');
        });

        e.target.classList.remove('text-gray-500');
        e.target.classList.add('border-b-2');
        e.target.classList.add('border-indigo-400');
        e.target.classList.add('text-gray-900');
    }
}
