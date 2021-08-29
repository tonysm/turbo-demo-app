import * as Turbo from '@hotwired/turbo';
import './bootstrap';
import './elements/turbo-echo-stream-tag';
import './elements/turbo-livewire-stream-tag';
import Alpine from 'alpinejs';
import { Application } from 'stimulus'
import { definitionsFromContext } from '@stimulus/webpack-helpers'
import Trix from './libs/trix';

window.Turbo = Turbo;
window.Alpine = Alpine;
window.Trix = Trix;

Alpine.start();

const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))

Turbo.start();

document.addEventListener('turbo:before-render', () => {
    let permanents = document.querySelectorAll('[data-turbo-permanent]')

    let undos = Array.from(permanents).map(el => {
        el._x_ignore = true

        return () => {
            delete el._x_ignore
        }
    })

    document.addEventListener('turbo:render', function handler() {
        while(undos.length) undos.shift()()

        document.removeEventListener('turbo:render', handler)
    })
})
