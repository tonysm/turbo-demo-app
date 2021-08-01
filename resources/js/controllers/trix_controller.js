import { Controller } from "stimulus";
import Tribute from 'tributejs';
import Trix from 'trix';

require('tributejs/tribute.css');

export default class extends Controller {
    connect() {
        this.initializeTribute();
    }

    disconnect() {
        this.tribute.detach(this.element);
    }

    initializeTribute() {
        this.tribute = new Tribute({
            allowSpaces: true,
            lookup: 'name',
            values: this.fetchUsers,
        })

        this.tribute.attach(this.element);
        this.tribute.range.pasteHtml = this._pasteHtml.bind(this);
    }

    prevent(e) {
        e.preventDefault();
    }

    stop(e) {
        e.stopPropagation();
    }

    preventStop(e) {
        this.prevent(e);
        this.stop(e);
    }

    tributeReplaced(e) {
        let mention = e.detail.item.original;
        let attachment = new Trix.Attachment({
            sgid: mention.sgid,
            content: mention.content,
        });

        this.editor.insertAttachment(attachment);
        this.editor.insertString(" ");
    }

    _pasteHtml(html, startPosition, endPosition) {
        let range = this.editor.getSelectedRange();
        let position = range[0];
        let length = endPosition - startPosition;

        this.editor.setSelectedRange([position - length, position])
        this.editor.deleteInDirection('backward');
    }

    fetchUsers(text, callback) {
        window.axios.get(`/mentions?search=${text}`)
            .then(resp => callback(resp.data))
            .catch(error => callback([]))
    }

    get editor() {
        return this.element.editor;
    }
}
