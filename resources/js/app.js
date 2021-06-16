import * as Turbo from '@hotwired/turbo';
import('./bootstrap');
import('./elements/turbo-echo-stream-tag');
import('./elements/turbo-livewire-stream-tag');
import 'trix';
import 'trix/dist/trix.css';
import { Application } from 'stimulus'
import { definitionsFromContext } from '@stimulus/webpack-helpers'

import Alpine from 'alpinejs'
window.Alpine = Alpine

Alpine.start();

const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))

Turbo.start();

window.Turbo = Turbo;

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
