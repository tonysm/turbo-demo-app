@props(['id'])

<div class="sticky bottom-0 z-50 px-0 pt-3 pb-0 bg-white border-t border-b border-gray-300 trix-toolbar" id="{{ $id }}">
    <div class="flex flex-wrap items-center justify-between" data-controller="reveal" data-reveal-hide-keys-value="escape,enter">
        <div class="flex flex-wrap items-center">
            <div class="flex items-center mb-3 mr-3 overflow-hidden bg-white border border-gray-300 rounded">
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="bold" data-trix-key="b" title="Bold" tabindex="-1">
                    <x-icon type="bold" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="italic" data-trix-key="i" title="Italic" tabindex="-1">
                    <x-icon type="italic" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="strike" title="Strike" tabindex="-1">
                    <x-icon type="strike" />
                </button>
                <button type="button" class="items-center justify-center hidden text-gray-700 sm:flex w-9 h-9"
                    data-trix-attribute="href" data-trix-action="link" data-action="click->reveal#toggle mousedown->reveal#toggle" data-trix-key="k"
                    title="Link" tabindex="-1">
                    <x-icon type="link" />
                </button>
            </div>
            <div class="flex items-center mb-3 mr-3 overflow-hidden bg-white border border-gray-300 rounded"
                data-trix-button-group="block-tools">
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="heading1" title="Heading 1" tabindex="-1">
                    <x-icon type="h1" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="heading2" title="Heading 2" tabindex="-1">
                    <x-icon type="h2" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="heading3" title="Heading 3" tabindex="-1">
                    <x-icon type="h3" />
                </button>
            </div>
            <div class="items-center hidden mb-3 mr-3 overflow-hidden bg-white border border-gray-300 rounded md:flex">
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="quote" title="Quotes" tabindex="-1">
                    <x-icon type="quotes" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="code" title="Code" tabindex="-1">
                    <x-icon type="code" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="bullet" title="Bullets" tabindex="-1">
                    <x-icon type="bullets" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-attribute="number" title="List" tabindex="-1">
                    <x-icon type="list" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-action="decreaseNestingLevel" title="Indent Left in a List" tabindex="-1">
                    <x-icon type="indent-left" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-action="increaseNestingLevel" title="Indent Right in a List" tabindex="-1">
                    <x-icon type="indent-right" />
                </button>
            </div>
            <div class="flex items-center mb-3 overflow-hidden bg-white border border-gray-300 rounded">
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-action="attachFiles" title="Attach Files" tabindex="-1">
                    <x-icon type="attachment" />
                </button>
            </div>
        </div>

        <div class="hidden md:block">
            <div class="flex items-center mb-3 overflow-hidden bg-white border border-gray-300 rounded" data-trix-button-group="history-tools">
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-action="undo" data-trix-key="z" title="Undo" tabindex="-1">
                    <x-icon type="undo" />
                </button>
                <button type="button" class="flex items-center justify-center text-gray-700 w-9 h-9"
                    data-trix-action="redo" data-trix-key="shift+z" title="Redo" tabindex="-1">
                    <x-icon type="redo" />
                </button>
            </div>
        </div>

        <div hidden data-reveal data-trix-dialogs>
            <div class="trix-dialog" data-trix-dialog="href" data-trix-dialog-attribute="href">
                <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-700 bg-opacity-25">
                    <div class="w-full max-w-lg overflow-hidden bg-white rounded-lg shadow-lg">
                        <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="w-full mt-3 text-center sm:mt-0 sm:text-left">
                                    <input type="text" name="href"
                                        class="block w-full form-input sm:text-sm sm:leading-5"
                                        placeholder="Enter a URL..."
                                        aria-label="Enter a URL" data-trix-input>
                                </div>
                            </div>
                        </div>

                        <div class="justify-between px-4 py-3 space-x-3 bg-gray-100 sm:px-6 sm:flex" data-action="keydown@enter->reveal#hide keydown@esc->reveal#hide">
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:shadow-outline-red sm:text-sm sm:leading-5"
                                    data-action="reveal#hide">
                                    Close
                                </button>
                            </div>
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out cursor-pointer focus:outline-none focus:shadow-outline-red sm:text-sm sm:leading-5"
                                    data-trix-method="removeAttribute" data-action="reveal#hide">
                                    Unlink
                                </button>

                                <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-base font-medium leading-6 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue sm:text-sm sm:leading-5"
                                    data-trix-method="setAttribute" data-action="reveal#hide">
                                    Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
