class BridgeAdapter {
    turboNative = false;

    initTurboNative() {
        this.turboNative = true;
        document.dispatchEvent(new CustomEvent('init-turbo-native'));
    }

    inTurboNative() {
        return this.turboNative;
    }
}

const Bridge = window.Bridge = new BridgeAdapter();

if (window.NativeBridge !== undefined) {
    Bridge.initTurboNative();
}

export default Bridge;
