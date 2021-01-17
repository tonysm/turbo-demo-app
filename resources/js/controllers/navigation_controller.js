import { Controller } from 'stimulus';

export default class extends Controller {
    activate(e) {
        if (e.target.tagName !== 'A') return;

        Array.from(this.element.querySelectorAll('a')).forEach((item) => {
            item.classList.remove('border-b-2');
            item.classList.remove('border-indigo-400');
        });

        e.target.classList.add('border-b-2');
        e.target.classList.add('border-indigo-400');
    }
}
