import { connectStreamSource, disconnectStreamSource } from "@hotwired/turbo"

class TurboLivewireStreamSourceElement extends HTMLElement {
    async connectedCallback() {
        connectStreamSource(this)
        window.addEventListener('turboStreamFromLivewire', this.dispatchMessageEvent.bind(this));
    }

    disconnectedCallback() {
        disconnectStreamSource(this)
        window.removeEventListener('turboStreamFromLivewire', this.dispatchMessageEvent.bind(this));
    }

    dispatchMessageEvent(data) {
        const event = new MessageEvent("message", { data: data.detail.message })
        return this.dispatchEvent(event)
    }
}

customElements.define("turbo-livewire-stream-source", TurboLivewireStreamSourceElement)
