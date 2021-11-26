import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static targets = ['button', 'emoji'];

    static values = {
        users: Array,
    };

    connect() {
        if (this.usersValue.filter(user => user.id == this.currentUser).length > 0) {
            this.buttonTarget.classList.remove('bg-white');
            this.buttonTarget.classList.add('bg-indigo-50');
        }
    }

    syncCurrentUser(event) {
        this.usersValue = this.usersValue.map(user => {
            return {
                ...user,
                preferred_skin_tone: user.id == this.currentUser
                    ? event.detail
                    : user.preferred_skin_tone,
            };
        });

        let skinTones = Array.from(new Set(this.usersValue
            .map(user => user.preferred_skin_tone))).join(',');

        this.emojiTarget.dataset.emojiSkinTonesValue = skinTones;
        this.emojiTarget.dispatchEvent(new CustomEvent('reload'));
    }

    get users() {
        return this.usersValue.split(',');
    }

    get currentUser () {
        return document.head.querySelector('meta[name="current-user-id"]')?.content;
    }
}
