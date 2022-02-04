import BridgeController from 'controllers/bridge_controller'
import ConfirmsSubmissionController from 'controllers/confirms_submission_controller'
import EmojiController from 'controllers/emoji_controller'
import HelloController from 'controllers/hello_controller'
import HideActionsController from 'controllers/hide_actions_controller'
import LoadingButtonController from 'controllers/loading_button_controller'
import ModalController from 'controllers/modal_controller'
import NavigationController from 'controllers/navigation_controller'
import ReplaceClassController from 'controllers/replace_class_controller'
import RevealController from 'controllers/reveal_controller'
import TrixController from 'controllers/trix_controller'
import UserReactionController from 'controllers/user_reaction_controller'

export default (Stimulus) => {
    Stimulus.register("bridge", BridgeController)
    Stimulus.register("confirms-submission", ConfirmsSubmissionController)
    Stimulus.register("emoji", EmojiController)
    Stimulus.register("hello", HelloController)
    Stimulus.register("hide-actions", HideActionsController)
    Stimulus.register("loading-button", LoadingButtonController)
    Stimulus.register("modal", ModalController)
    Stimulus.register("navigation", NavigationController)
    Stimulus.register("replace-class", ReplaceClassController)
    Stimulus.register("reveal", RevealController)
    Stimulus.register("trix", TrixController)
    Stimulus.register("user-reaction", UserReactionController)
};
