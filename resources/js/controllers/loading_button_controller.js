import { Controller } from '@hotwired/stimulus'

export default class extends Controller {
    connect() {
        this.element.addEventListener('click', (e) => {
            if (this.loading === true) {
                e.preventDefault()
                e.stopPropagation()
                return;
            }

            this.loading = true;
            this.element.classList.remove('opacity-0')
            this.element.classList.add('opacity-75')
            this.element.classList.add('animate-pulse')
        })

        this.element.addEventListener('turbo:submit-end', () => {
            this.loading = false;

            if (! this.element) return

            this.element.classList.remove('animate-pulse')
            this.element.classList.remove('opacity-75')
            this.element.classList.add('opacity-0')
        })
    }
}
