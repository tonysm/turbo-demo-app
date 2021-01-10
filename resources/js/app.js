import {
    start as startTurbo
} from "@hotwired/turbo";
import('./bootstrap');
import('./turbo-echo-stream-tag');
import('./turbo-livewire-stream-tag');
import { Application } from "stimulus"
import { definitionsFromContext } from "@stimulus/webpack-helpers"
import 'alpinejs';

startTurbo();
const application = Application.start()
const context = require.context("./controllers", true, /\.js$/)
application.load(definitionsFromContext(context))
