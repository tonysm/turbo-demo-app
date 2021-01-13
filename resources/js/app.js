import {
    start as startTurbo
} from "@hotwired/turbo";
import('./bootstrap');
import('./elements/turbo-echo-stream-tag');
import('./elements/turbo-livewire-stream-tag');
import { Application } from "stimulus"
import { definitionsFromContext } from "@stimulus/webpack-helpers"
import 'alpinejs';
import 'trix';
import 'trix/dist/trix.css';

startTurbo();
const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))
