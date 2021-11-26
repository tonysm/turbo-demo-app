import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    static targets = ['image'];

    static values = {
        skinTones: String,
        forCurrentUser: {
            type: Boolean,
            default: false,
        },
    };

    connect() {
        this.showEmojisBasedOnSkinTones();
    }

    sync() {
        this.showEmojisBasedOnSkinTones();
    }

    reload(event) {
        event.stopPropagation();
        this.showEmojisBasedOnSkinTones();
    }

    showEmojisBasedOnSkinTones() {
        if (this.forCurrentUserValue) {
            this._showForCurrentUserSkinTone();
        } else {
            this._showGivenSkinTones();
        }
    }

    _showForCurrentUserSkinTone() {
        if (this.images.length === 1) {
            this.images[0].classList.remove('hidden');
            return;
        }

        this.images.forEach(img => {
            if (img.dataset.skinTone == this.currentUserSkinTone.content || (! this.currentUserSkinTone.content && ! img.dataset.skinTone)) {
                img.classList.remove('hidden');
            } else {
                img.classList.add('hidden');
            }
        });
    }

    _showGivenSkinTones() {
        this.images
            .forEach(img => {
                if (this.skinTones.includes(img.dataset.skinTone)
                    || (this.skinTones.includes("") && ! img.dataset.skinTone)
                    || this.images.length === 1
                ) {
                    img.classList.remove('hidden');
                } else {
                    img.classList.add('hidden');
                }
            });
    }

    get images() {
        return this.imageTargets;
    }

    get skinTones() {
        return this.skinTonesValue.split(',');
    }

    get currentUserSkinTone() {
        return document.head.querySelector('meta[name=current-user-skin-tone]');
    }
}
