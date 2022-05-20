import { Controller } from '@hotwired/stimulus'
import { leave, enter } from 'el-transition'

export default class extends Controller {
    static values = {
        open: { type: Boolean, default: false, },
    };

    static targets = ['content'];

    stop(event) {
        event.stopPropagation();
    }

    close() {
        this.openValue = false;
    }

    open() {
        this.openValue = true;
    }

    toggle() {
        this.openValue = !this.openValue;
    }

    openValueChanged() {
        if (this.open) {
            enter(this.contentTarget);
        } else {
            leave(this.contentTarget);
        }
    }

    get open() {
        return this.openValue;
    }
}
