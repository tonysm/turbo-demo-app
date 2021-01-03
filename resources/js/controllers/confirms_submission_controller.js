import { Controller } from 'stimulus'

export default class extends Controller {
    connect() {
        this.element.addEventListener('submit', (event) => {
            this.showConfirmation(event);
        });
    }

    showConfirmation(event) {
        if (! confirm('Are you sure you want to do this?')) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    }
}
