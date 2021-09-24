import { Application } from '@hotwired/stimulus'
import { definitionsFromContext } from '@hotwired/stimulus-webpack-helpers'

const Stimulus = Application.start();
const context = require.context("../controllers", true, /\.js$/);
Stimulus.load(definitionsFromContext(context));

window.Stimulus = Stimulus;

export default Stimulus;
