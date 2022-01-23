import { Controller } from "@hotwired/stimulus";
import Bridge from "libs/bridge";

export default class extends Controller {
    connect () {
        if (this.differentTargetOnNative && Bridge.inTurboNative()) {
            this.changeFrameTargetOnNative();
        }
    }

    changeFrameTargetOnNative() {
        this.element.setAttribute("target", this.nativeTarget);
    }

    get nativeTarget() {
        return this.element.dataset['target-on-native'] || '_top';
    }

    get differentTargetOnNative() {
        return Boolean(this.nativeTarget || false);
    }
}
