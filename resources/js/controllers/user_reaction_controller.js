import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static targets = ['button'];
    static values = {
        users: String,
    };

    connect() {
        if (this.users.includes(this.currentUser)) {
            this.buttonTarget.classList.remove('bg-white');
            this.buttonTarget.classList.add('bg-indigo-50');
        }
    }

    get users() {
        return this.usersValue.split(',');
    }

    get currentUser () {
        return document.head.querySelector('meta[name="current-user-id"]')?.content;
    }
}
