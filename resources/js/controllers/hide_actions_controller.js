import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static values = { ownerId: String }

    connect() {
        const currentUserId = document.head.querySelector('meta[name="current-user-id"]')?.content;

        if (currentUserId !== this.ownerIdValue) {
            this.element.hidden = "true";
        }
    }
}
