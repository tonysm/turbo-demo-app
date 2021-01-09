import { Controller } from 'stimulus'

export default class extends Controller {
    static values = {
        removeClass: String,
        addClass: String,
    }

    connect() {
        setTimeout(() => {
            this.element.classList.remove(this.removeClassValue)
            this.element.classList.add(this.addClassValue)
        }, 100)
    }
}
