import { Controller } from '@hotwired/stimulus'
import { enter, leave } from 'el-transition'

export default class extends Controller {
    static targets = ['backdrop', 'box'];

    connect() {
        this.show = false;
    }

    close() {
        this.show = false;
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
        this.show = false;
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
        this.show = !this.show;
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

    set show(show) {
        if (show) {
            this._ensureVisible();
        } else {
            this._ensureHidden();
        }
    }
}
