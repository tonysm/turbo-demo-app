import { Application } from '@hotwired/stimulus'
import { definitionsFromContext } from '@hotwired/stimulus-webpack-helpers'

const App = Application.start();
const context = require.context("../controllers", true, /\.js$/);
App.load(definitionsFromContext(context));

window.Stimulus = App;

export default App;
