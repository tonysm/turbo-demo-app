import { Controller } from '@hotwired/stimulus'
import { enter, leave } from 'el-transition'

export default class extends Controller {
    static targets = ['backdrop', 'box'];

    static values = {
        showing: {
            type: Boolean,
            default: false,
        },
    };

    close() {
        this.showingValue = false;
    }

    closeBeforeCache() {
        this.close();

        // This has to be done here because the hooks on the showingValueChanged
        // are async, so they never really "hide" the modal before Turbo caches
        // the page HTML. That's why we need to manually add these classes.

        this.element.classList.add('hidden');
        this.boxTarget.classList.add('hidden');
        this.backdropTarget.classList.add('hidden');
    }

    showingValueChanged() {
        if (this.showingValue) {
            this._ensureVisible();
        } else {
            this._ensureHidden();
        }
    }

    handleKeydown(event) {
        if (! ['Escape', 'Tab'].includes(event.key)) {
            return;
        }

        if (event.key === 'Tab') {
            this._handleTab(event);
            return;
        }

        this._handleEscape();
        return;
    }

    _handleTab(event) {
        event.preventDefault();

        let focusable = event.shiftKey
            ? this._previousFocusable()
            : this._nextFocusable();

        focusable.focus();
    }

    _handleEscape() {
        this.showingValue = false;
    }

    _previousFocusable() {
        return this.focusables[this._previousFocusableIndex()] || this.focusables[0];
    }

    _nextFocusable() {
        return this.focusables[this._nextFocusableIndex()] || this.focusables[this.focusables.length - 1];
    }

    _previousFocusableIndex() {
        return Math.max(0, this.focusables.indexOf(document.activeElement)) - 1;
    }

    _nextFocusableIndex() {
        return (this.focusables.indexOf(document.activeElement) + 1) % (this.focusables.length + 1);
    }

    toggle() {
        this.showingValue = !this.showingValue;
    }

    _ensureVisible() {
        enter(this.element);
        enter(this.backdropTarget);
        enter(this.boxTarget);
    }

    _ensureHidden() {
        leave(this.boxTarget);
        leave(this.backdropTarget);
        leave(this.element);
    }

    get focusables() {
        let selector = 'a, button, input, textarea, trix-editor, select, details, [tabindex]:not([tabindex=\'-1\'])'

        return [...this.element.querySelectorAll(selector)]
            .filter((el) => ! el.hasAttribute('disabled'))
    }
}
