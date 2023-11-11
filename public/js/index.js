function contactItemRow(opts) {
    const display = document.querySelector(opts.display),
        first = document.querySelector(opts.first),
        last = document.querySelector(opts.last),
        phone = document.querySelector(opts.phone),
        email = document.querySelector(opts.email);

    const add = () => {
        if (first.value.trim() && last.value.trim() && phone.value.trim()) {
            display.innerHTML += `
                <tr class="border-[#d1d1d1] border-t">
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${first.value.trim()}
                        <input type="hidden" name="contact_first_names[]" value="${first.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${last.value.trim()}
                        <input type="hidden" name="contact_last_names[]" value="${last.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${phone.value.trim()}
                        <input type="hidden" name="contact_phones[]" value="${phone.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${email.value.trim() || "__"}
                        <input type="hidden" name="contact_emails[]" value="${email.value.trim()}" />
                    </td>
                    <td class="p-2">
                        <button type="button" onclick="contactItemRow.remove(event)"
                            class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                            <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            `;

            first.value = "";
            last.value = "";
            phone.value = "";
            email.value = "";
        }
    };

    const remove = (e) => {
        display.parentElement.insertAdjacentHTML("afterend", `<input type="hidden" name="contacts_remove[]" value="${e.target.dataset.index}">`);
        contactItemRow.remove(e);
    };

    return [add, remove];
}

contactItemRow.remove = function(e) {
    e.target.closest("tr").remove();
};

function recordItemRow(opts) {
    const display = document.querySelector(opts.display),
        type = document.querySelector(opts.type),
        content = document.querySelector(opts.content);

    const add = () => {
        if (type.value.trim() && content.value.trim()) {
            display.innerHTML += `
                <tr class="border-[#d1d1d1] border-t">
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${type.value.trim()}
                        <input type="hidden" name="record_types[]" value="${type.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${content.value.trim()}
                        <input type="hidden" name="record_contents[]" value="${content.value.trim()}" />
                    </td>
                    <td class="p-2">
                        <button type="button" onclick="recordItemRow.remove(event)"
                            class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                            <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            `;

            type.clear();
            content.value = "";
        }
    };

    const remove = (e) => {
        display.parentElement.insertAdjacentHTML("afterend", `<input type="hidden" name="records_remove[]" value="${e.target.dataset.index}">`);
        recordItemRow.remove(e);
    };

    return [add, remove];
}

recordItemRow.remove = function(e) {
    e.target.closest("tr").remove();
};

function prescriptionItemRow(opts) {
    const display = document.querySelector(opts.display),
        type = document.querySelector(opts.type),
        content = document.querySelector(opts.content),
        note = document.querySelector(opts.note);

    const add = () => {
        if (type.value.trim() && content.value.trim()) {
            display.innerHTML += `
                <tr class="border-[#d1d1d1] border-t">
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${type.value.trim()}
                        <input type="hidden" name="items_type[]" value="${type.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${content.value.trim()}
                        <input type="hidden" name="items_content[]" value="${content.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${note.value.trim() || "_"}
                        <input type="hidden" name="items_note[]" value="${note.value.trim()}" />
                    </td>
                    <td class="p-2">
                        <button type="button" onclick="prescriptionItemRow.remove(event)"
                            class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                            <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            `;
            type.clear();
            content.value = "";
            note.value = "";
        }
    };

    const remove = (e) => {
        display.parentElement.insertAdjacentHTML("afterend", `<input type="hidden" name="items_remove[]" value="${e.target.dataset.index}">`);
        prescriptionItemRow.remove(e);
    };

    return [add, remove];
}

prescriptionItemRow.remove = function(e) {
    e.target.closest("tr").remove();
};

function invoiceItemRow(opts, currency) {
    const display = document.querySelector(opts.display),
        content = document.querySelector(opts.content),
        cost = document.querySelector(opts.cost),
        total = document.querySelector(opts.total);

    invoiceItemRow.sum = () => {
        const _sum = [...display.querySelectorAll('[name="items_cost[]"]')].reduce((sm, itm) => {
            return sm + +itm.value;
        }, 0);
        total.innerHTML = _sum;
    };

    const add = () => {
        if (cost.value.trim() && content.value.trim()) {
            display.innerHTML += `
                <tr class="border-[#d1d1d1] border-t">
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${content.value.trim()}
                        <input type="hidden" name="items_content[]" value="${content.value.trim()}" />
                    </td>
                    <td class="p-2 text-[#1d1d1d] text-base">
                        ${cost.value.trim()} ${currency}
                        <input type="hidden" name="items_cost[]" value="${cost.value.trim()}" />
                    </td>
                    <td class="p-2">
                        <button type="button" onclick="invoiceItemRow.remove(event)"
                            class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                            <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                                <path
                                    d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            `;
            content.value = "";
            cost.value = "";
            invoiceItemRow.sum();
        }
    };

    const remove = (e) => {
        display.parentElement.insertAdjacentHTML("afterend", `<input type="hidden" name="items_remove[]" value="${e.target.dataset.index}">`);
        invoiceItemRow.remove(e);
        invoiceItemRow.sum();
    };

    return [add, remove];
}

invoiceItemRow.remove = function(e) {
    e.target.closest("tr").remove();
    invoiceItemRow.sum();
};

function parseDateStr(dateStr) {
    var parsedDate = new Date(dateStr);

    var time,
        date = parsedDate.toISOString().split("T")[0];
    if (dateStr.includes("T")) time = parsedDate.toISOString().split("T")[1].slice(0, 8);

    return [date, time];
}

function toggleFields(selector, opts) {
    [...document.querySelectorAll(selector)].forEach((e) => {
        if (opts) {
            e.classList.remove("hidden");
            e.classList.add("flex");
        } else {
            e.classList.remove("flex");
            e.classList.add("hidden");
        }
    });
}

function Board(target) {
    const FiltersDefault = {
        Brightness: {
            def: 100,
            min: 000,
            max: 300,
            val: 100,
            uni: "%",
        },
        Grayscale: {
            def: 000,
            min: 000,
            max: 100,
            val: 000,
            uni: "%",
        },
        Saturate: {
            def: 100,
            min: 000,
            max: 300,
            val: 100,
            uni: "%",
        },
        Contrast: {
            def: 100,
            min: 000,
            max: 200,
            val: 100,
            uni: "%",
        },
        Sepia: {
            def: 000,
            min: 000,
            max: 200,
            val: 000,
            uni: "%",
        },
        Hue: {
            def: 000,
            min: 000,
            max: 360,
            val: 000,
            uni: "deg",
        },
    };
    const ToolsDefault = {
        Magnifier: {
            min: 2,
            val: 2,
            max: 10,
        },
    };

    this.$Restore = {
        Level: { Undo: [], Redo: [] },
        Filter: { Undo: [], Redo: [] },
        Draw: { Undo: [], Redo: [] },
    };
    this.$Image = new Image();

    this.$Parent = document.getElementById(target);
    this.$Parent.style.position = "relative";
    this.$Parent.style.touchAction = "none";
    this.$Parent.style.userSelect = "none";
    this.$Parent.innerHTML = `
        <div data-type="Magnifier" style="transform: translate(-50%, -50%); pointer-events: none; position: absolute; width: 10rem; height: 10rem; border-radius: 10rem; z-index: 2; background-repeat: no-repeat; display: none; background-color: #ffffff;"></div>
        <div contenteditable data-type="Text" style="transform: translateX(-50%); position: absolute; z-index: 10; padding: 4px 8px; font-size: 16px; font-family: sans-sarif; width: max-content; outline: unset; display: none; line-height: 1;"></div>
        <input data-type="Filter" type="range" max="100" min="0" style="position: absolute; z-index: 10; inset: 0; cursor: ew-resize; display: none; opacity: 0;" />
    `;

    this.$Magnify = this.$Parent.querySelector('[data-type="Magnifier"]');
    this.$Range = this.$Parent.querySelector('[data-type="Filter"]');
    this.$Field = this.$Parent.querySelector('[data-type="Text"]');
    this.$Range.oncontextmenu = () => {
        this.$Range.style.display = "none";
    };

    this.$Poster = new Board.V(this.$Parent, "poster", this.$Field);
    this.$Viewer = new Board.V(this.$Parent, "viewer", this.$Field);
    this.$Drawer = new Board.V(this.$Parent, "drawer", this.$Field);

    this.$Filters = Object.assign({}, FiltersDefault);
    this.$Tools = Object.assign({}, ToolsDefault);

    this.$Current = {
        Filter: null,
        Shape: null,
        Tool: null,
        Max: null,
        Min: null,
    };

    this.$Disable = (cur) => {
        [this.$Poster, this.$Viewer, this.$Drawer].forEach((e) => e.$Stage(false));
        cur.$Stage(true);
    };

    this.$Filter = (cur) => {
        return Object.keys(cur || this.$Filters)
            .reduce((a, e) => {
                return a + `${(e === "Hue" ? "Hue-Rotate" : e).toLowerCase()}(${this.$Filters[e].val}${this.$Filters[e].uni}) `;
            }, "")
            .trim();
    };

    this.$Apply = () => {
        this.$Poster.$Reset();
        this.$Viewer.$Reset();
        this.$Poster.$Context.filter = this.$Restore.Filter.Undo.length ?
            this.$Restore.Filter.Undo[this.$Restore.Filter.Undo.length - 1] :
            this.$Filter(FiltersDefault);
        const factor = Math.min(this.$Poster.$Canvas.width / this.$Image.width, this.$Poster.$Canvas.height / this.$Image.height);

        this.$Poster.$Context.drawImage(
            this.$Image,
            this.$Poster.$Canvas.width / 2 - (this.$Image.width * factor) / 2,
            this.$Poster.$Canvas.height / 2 - (this.$Image.height * factor) / 2,
            this.$Image.width * factor,
            this.$Image.height * factor
        );

        this.$Restore.Draw.Undo.forEach((image) => {
            this.$Viewer.$Context.drawImage(
                image,
                this.$Viewer.$Canvas.width / 2 - (image.width * factor) / 2,
                this.$Viewer.$Canvas.height / 2 - (image.height * factor) / 2,
                image.width * factor,
                image.height * factor
            );
        });
    };

    this.$Clear = function() {
        this.$Poster.$Canvas.onDOMMouseScroll = null;
        this.$Poster.$Canvas.onpointerdown = null;
        this.$Poster.$Canvas.onpointermove = null;
        this.$Poster.$Canvas.onmousewheel = null;
        this.$Poster.$Canvas.onpointerup = null;
        this.$Poster.$Canvas.ontouchmove = null;

        this.$Parent.onpointermove = null;
        this.$Parent.oncontextmenu = null;
        this.$Parent.onclick = null;

        this.$Magnify.onpointermove = null;

        this.$Range.onpointerdown = null;
        this.$Range.onpointerup = null;
        this.$Range.oninput = null;

        this.$Poster.$Canvas.style.cursor = "";
        this.$Field.style.innerHTML = "";

        this.$Magnify.style.display = "none";
        this.$Range.style.display = "none";
        this.$Field.style.display = "none";
    };

    this.$ExecFilter = function() {
        this.$Range.value = this.$Filters[this.$Current.Filter].val;
        this.$Range.max = this.$Filters[this.$Current.Filter].max;
        this.$Range.min = this.$Filters[this.$Current.Filter].min;

        this.$Range.onpointerdown = () => {
            this.$Restore.Filter.Undo.push(this.$Filter());
            this.$Restore.Level.Undo.push("Filter");
        };

        this.$Range.onpointerup = () => {
            this.$Restore.Filter.Undo.push(this.$Filter());
            this.$Restore.Level.Undo.push("Filter");
            this.$Apply();
        };

        this.$Range.oninput = (e) => {
            var val = +e.target.value;
            if (val < this.$Current.Min) val = this.$Current.Min;
            if (val > this.$Current.Max) val = this.$Current.Max;
            this.$Filters[this.$Current.Filter].val = val;
            this.$Range.value = val;
            this.$Poster.$Reset();
            this.$Poster.$Context.filter = this.$Filter();
            const factor = Math.min(this.$Poster.$Canvas.width / this.$Image.width, this.$Poster.$Canvas.height / this.$Image.height);
            this.$Poster.$Context.drawImage(
                this.$Image,
                this.$Poster.$Canvas.width / 2 - (this.$Image.width * factor) / 2,
                this.$Poster.$Canvas.height / 2 - (this.$Image.height * factor) / 2,
                this.$Image.width * factor,
                this.$Image.height * factor
            );
        };
    };

    this.$ExecTool = function() {
        if (this.$Current.Tool === "Magnifier") {
            this.$Magnify.style.display = "";

            const Load = () => {
                this.$Magnify.style.backgroundImage = `url("${this.$Viewer.$Canvas.toDataURL("image/png")}"), url("${this.$Poster.$Canvas.toDataURL(
					"image/png"
				)}")`;
                this.$Magnify.style.backgroundSize =
                    this.$Parent.clientWidth * this.$Tools.Magnifier.val + "px " + this.$Parent.clientHeight * this.$Tools.Magnifier.val + "px";
                this.$Magnify.style.backgroundPosition =
                    "-" +
                    (+/\d+/g.exec(this.$Magnify.style.left)[0] * this.$Tools.Magnifier.val - this.$Magnify.clientWidth / 2) +
                    "px -" +
                    (+/\d+/g.exec(this.$Magnify.style.top)[0] * this.$Tools.Magnifier.val - this.$Magnify.clientHeight / 2) +
                    "px";
            };

            this.$Parent.onpointermove = this.$Magnify.onpointermove = (e) => {
                const x = e.offsetX || e.pageX - this.$Parent.offsetLeft;
                const y = e.offsetY || e.pageY - this.$Parent.offsetTop;

                this.$Magnify.style.left = x + "px";
                this.$Magnify.style.top = y + "px";

                this.$Magnify.style.backgroundPosition =
                    "-" +
                    (x * this.$Tools.Magnifier.val - this.$Magnify.clientWidth / 2) +
                    "px -" +
                    (y * this.$Tools.Magnifier.val - this.$Magnify.clientHeight / 2) +
                    "px";
            };

            this.$Parent.onclick = (e) => {
                e.preventDefault();
                if (this.$Tools.Magnifier.val < this.$Tools.Magnifier.max) this.$Tools.Magnifier.val += 1;
                Load();
            };

            this.$Parent.oncontextmenu = (e) => {
                e.preventDefault();
                if (this.$Tools.Magnifier.val > this.$Tools.Magnifier.min) this.$Tools.Magnifier.val -= 1;
                Load();
            };

            this.$Magnify.style.left = "50%";
            this.$Magnify.style.top = "-50%";
            Load();
        }

        if (this.$Current.Tool === "ZoomAndPan") {
            const mouse = {
                x: this.$Parent.clientWidth / 2,
                y: this.$Parent.clientHeight / 2,
            };
            var start;

            this.$Poster.$Canvas.onpointerdown = (e) => {
                mouse.x = e.offsetX || e.pageX - this.$Parent.offsetLeft;
                mouse.y = e.offsetY || e.pageY - this.$Parent.offsetTop;
                start = this.$Poster.$Context.transformedPoint(mouse.x, mouse.y);
            };

            this.$Poster.$Canvas.onpointermove = (e) => {
                mouse.x = e.offsetX || e.pageX - this.$Parent.offsetLeft;
                mouse.y = e.offsetY || e.pageY - this.$Parent.offsetTop;
                if (start) {
                    var PTP = this.$Poster.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Poster.$Context.translate(PTP.x - start.x, PTP.y - start.y);

                    var PTV = this.$Viewer.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Viewer.$Context.translate(PTV.x - start.x, PTV.y - start.y);

                    var PTD = this.$Drawer.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Drawer.$Context.translate(PTD.x - start.x, PTD.y - start.y);

                    this.$Apply();
                }
            };

            this.$Poster.$Canvas.onpointerup = (e) => {
                start = null;
            };

            this.$Poster.$Canvas.onDOMMouseScroll = this.$Poster.$Canvas.onmousewheel = this.$Poster.$Canvas.ontouchmove = (e) => {
                var delta = e.wheelDelta ? e.wheelDelta / 40 : e.detail ? -e.detail : 0;
                if (delta) {
                    var factor = Math.pow(1.1, delta);

                    var PTP = this.$Poster.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Poster.$Context.translate(PTP.x, PTP.y);
                    this.$Poster.$Context.scale(factor, factor);
                    this.$Poster.$Context.translate(-PTP.x, -PTP.y);

                    var PTV = this.$Viewer.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Viewer.$Context.translate(PTV.x, PTV.y);
                    this.$Viewer.$Context.scale(factor, factor);
                    this.$Viewer.$Context.translate(-PTV.x, -PTV.y);

                    var PTD = this.$Drawer.$Context.transformedPoint(mouse.x, mouse.y);
                    this.$Drawer.$Context.translate(PTD.x, PTD.y);
                    this.$Drawer.$Context.scale(factor, factor);
                    this.$Drawer.$Context.translate(-PTD.x, -PTD.y);

                    this.$Apply();
                }
                e.preventDefault();
            };
        }
    };

    this.setTheme = ({ color, stroke }) => {
        this.$Theme = {
            color: color || (this.$Theme && this.$Theme.color),
            stroke: stroke || (this.$Theme && this.$Theme.stroke),
        };
        this.$Poster.$SetTheme(this.$Theme);
        this.$Viewer.$SetTheme(this.$Theme);
        this.$Drawer.$SetTheme(this.$Theme);
    };

    this.setFilter = function(filter) {
        this.$Disable(this.$Poster);
        this.$Clear();
        this.$Current = {
            Filter: filter,
            Shape: null,
            Tool: null,
            Max: this.$Filters[filter].max,
            Min: this.$Filters[filter].min,
        };

        this.$Range.style.display = "";
        this.$ExecFilter();
    };

    this.setTool = function(tool) {
        this.$Disable(this.$Poster);
        this.$Clear();
        this.$Current = {
            ...this.$Current,
            Shape: null,
            Filter: null,
            Tool: tool,
        };

        this.$ExecTool();
    };

    this.loadUrl = function(url) {
        this.$Image.src = url;
        this.$Image.onload = () => {
            this.$Parent.appendChild(this.$Poster.$Canvas);
            this.$Parent.appendChild(this.$Viewer.$Canvas);
            this.$Parent.appendChild(this.$Drawer.$Canvas);
            this.$Draw = new Board.D(this.$Drawer, this.$Viewer.$Context, this.$Restore, this.$Field);
            this.$Apply();
        };
    };

    this.drawShape = function(type) {
        this.$Clear();
        this.$Draw[`$${type}`] && this.$Draw[`$${type}`]();
        this.$Disable(this.$Drawer);
        this.$Current = {
            ...this.$Current,
            Shape: type,
            Filter: null,
            Tool: null,
        };
    };

    this.resetView = function() {
        this.$Restore = {
            Level: { Undo: [], Redo: [] },
            Filter: { Undo: [], Redo: [] },
            Draw: { Undo: [], Redo: [] },
        };

        for (filter in this.$Filters) {
            this.$Filters[filter].val = this.$Filters[filter].def;
        }

        [this.$Poster, this.$Viewer, this.$Drawer].forEach((e) => e.$Reset(true));
        this.$Draw = new Board.D(this.$Drawer, this.$Viewer.$Context, this.$Restore, this.$Field);

        this.$Current.Shape && this.drawShape(this.$Current.Shape);
        this.$Current.Filter && this.setFilter(this.$Current.Filter);
        this.$Current.Tool && this.setTool(this.$Current.Tool);
        this.$Theme && this.setTheme(this.$Theme);

        this.$Apply();
    };

    this.resizeView = function() {
        this.$Poster.$Resize();
        this.$Viewer.$Resize();
        this.$Drawer.$Resize();
        this.$Apply();

        if (this.$Current.Tool === "Magnifier") {
            this.$ExecTool();
        }
    };

    this.undo = function() {
        const level = this.$Restore.Level.Undo.pop();
        if (level) {
            if (level === "Draw") {
                this.$Restore.Draw.Undo.length && this.$Restore.Draw.Redo.push(this.$Restore.Draw.Undo.pop());
            } else {
                this.$Restore.Filter.Undo.length && this.$Restore.Filter.Redo.push(this.$Restore.Filter.Undo.pop());
            }
            this.$Restore.Level.Redo.push(level);
            this.$Apply();
        }
    };

    this.redo = function() {
        this.$Restore.Draw.Redo.length && this.$Restore.Draw.Undo.push(this.$Restore.Draw.Redo.pop());
        this.$Apply();
    };
}

Board.V = function(parent, type, $Field) {
    this.$Parent = parent;
    this.$Canvas = document.createElement("canvas");

    this.$Canvas.style.pointerEvents = "none";
    this.$Canvas.style.position = "absolute";
    this.$Canvas.style.direction = "ltr";
    this.$Canvas.style.margin = "auto";
    this.$Canvas.dataset.type = type;
    this.$Canvas.style.inset = "0";

    this.height = this.$Parent.clientHeight;
    this.width = this.$Parent.clientWidth;

    this.$Canvas.height = this.height;
    this.$Canvas.width = this.width;

    this.$Context = this.$Canvas.getContext("2d");

    Board.T(this.$Context);

    this.$Theme = {
        color: "black",
        stroke: 1,
    };

    this.$Context.strokeStyle = this.$Theme.color;
    this.$Context.lineWidth = this.$Theme.stroke;
    this.$Context.textAlign = "center";
    this.$Context.lineJoin = "round";
    this.$Context.lineCap = "round";

    this.$Context.font = 16 * this.$Theme.stroke + "px sans-sarif";

    this.$Stage = (boolean) => {
        this.$Canvas.style.pointerEvents = boolean ? "all" : "none";
    };

    this.$SetTheme = ({ color, stroke }) => {
        this.$Theme = {
            color: color || this.$Theme.color,
            stroke: stroke || this.$Theme.stroke,
        };

        this.$Context.strokeStyle = this.$Theme.color;
        this.$Context.lineWidth = this.$Theme.stroke;
        this.$Context.fillStyle = this.$Theme.color;
        this.$Context.font = 16 * this.$Theme.stroke + "px sans-sarif";

        if ($Field) {
            $Field.style.fontSize = 16 * this.$Theme.stroke + "px";
            $Field.style.color = this.$Theme.color;
        }
    };

    this.$Reset = (force) => {
        var p1 = this.$Context.transformedPoint(0, 0);
        var p2 = this.$Context.transformedPoint(this.$Canvas.width, this.$Canvas.height);
        this.$Context.clearRect(p1.x, p1.y, p2.x - p1.x, p2.y - p1.y);

        this.$Context.save();
        this.$Context.setTransform(1, 0, 0, 1, 0, 0);
        this.$Context.scale(1, 1);
        this.$Context.translate(0, 0);
        this.$Context.clearRect(0, 0, this.$Canvas.width, this.$Canvas.height);
        this.$Context.restore();

        if (force) {
            this.$Context.resetTransform();
            this.$Context.clearRect(0, 0, this.$Canvas.width, this.$Canvas.height);
        }
    };

    this.$Resize = () => {
        this.$Canvas.height = this.$Parent.clientHeight;
        this.$Canvas.width = this.$Parent.clientWidth;

        this.$Context = this.$Canvas.getContext("2d");
    };
};

Board.T = function($Context) {
    var $Svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    var $XForm = $Svg.createSVGMatrix();
    $Context.getTransform = function() {
        return $XForm;
    };

    var savedTransforms = [];
    var save = $Context.save;
    $Context.save = function() {
        savedTransforms.push($XForm.translate(0, 0));
        return save.call($Context);
    };

    var restore = $Context.restore;
    $Context.restore = function() {
        $XForm = savedTransforms.pop();
        return restore.call($Context);
    };

    var scale = $Context.scale;
    $Context.scale = function(sx, sy) {
        $XForm = $XForm.scaleNonUniform(sx, sy);
        return scale.call($Context, sx, sy);
    };

    var rotate = $Context.rotate;
    $Context.rotate = function(radians) {
        $XForm = $XForm.rotate((radians * 180) / Math.PI);
        return rotate.call($Context, radians);
    };

    var translate = $Context.translate;
    $Context.translate = function(dx, dy) {
        $XForm = $XForm.translate(dx, dy);
        return translate.call($Context, dx, dy);
    };

    var transform = $Context.transform;
    $Context.transform = function(a, b, c, d, e, f) {
        var m2 = $Svg.createSVGMatrix();
        m2.a = a;
        m2.b = b;
        m2.c = c;
        m2.d = d;
        m2.e = e;
        m2.f = f;
        $XForm = $XForm.multiply(m2);
        return transform.call($Context, a, b, c, d, e, f);
    };

    var setTransform = $Context.setTransform;
    $Context.setTransform = function(a, b, c, d, e, f) {
        $XForm.a = a;
        $XForm.b = b;
        $XForm.c = c;
        $XForm.d = d;
        $XForm.e = e;
        $XForm.f = f;
        return setTransform.call($Context, a, b, c, d, e, f);
    };

    var pt = $Svg.createSVGPoint();
    $Context.transformedPoint = function(x, y) {
        pt.x = x;
        pt.y = y;
        return pt.matrixTransform($XForm.inverse());
    };
};

Board.D = function($View, $Context, $Restore, $Field) {
    $View.$Canvas.style.cursor = "crosshair";

    this.$Position = (e, object) => {
        object.x = e.pageX - $View.$Parent.offsetLeft;
        object.y = e.pageY - $View.$Parent.offsetTop;
        return true;
    };

    this.Length = (P1, P2, x, y) => {
        const size = ((Math.hypot(P2.x - P1.x, P2.y - P1.y) / (window.devicePixelRatio * 96)) * 25.4).toFixed(2);

        $View.$Context.fillText(size + "mm", x, y);
    };

    this.$Save = () => {
        const image = new Image();
        image.src = $View.$Canvas.toDataURL("image/png");
        $Restore.Draw.Undo.push(image);
        $Restore.Level.Undo.push("Draw");
        $Context.drawImage($View.$Canvas, 0, 0);
        $View.$Reset();
        return true;
    };

    this.$Text = () => {
        const mouse = { x: 0, y: 0 };

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, mouse);
            $Field.style.display = "";
            $Field.style.left = mouse.x - $Field.clientWidth / 2 + "px";
            $Field.style.top = mouse.y - ($Field.clientHeight / 2 + ($View.$Theme.stroke * 16) / 2) + "px";
            setTimeout(() => {
                $Field.focus();
            }, 200);
        };

        $View.$Canvas.onresize = (e) => {
            this.$Position(e, mouse);
            $Field.style.left = mouse.x + "px";
            $Field.style.top = mouse.y + "px";
        };

        $View.$Canvas.oncontextmenu = (e) => {
            $Field.style.display = "none";
            $Field.innerHTML = "";
        };

        $Field.onkeydown = (e) => {
            if (e.keyCode === 13 && !e.shiftKey) {
                const text = $Field.innerHTML.split("<br>");
                text.forEach((t, i) => {
                    $View.$Context.fillText(t, mouse.x, mouse.y + $View.$Theme.stroke * 16 * i);
                });
                $Field.style.display = "none";
                $Field.innerHTML = "";
                this.$Save();
            }
        };
    };

    this.$Free = () => {
        const mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            $View.$Context.beginPath();
            $View.$Context.moveTo(mouse.x, mouse.y);
            this.$Position(e, mouse);
            $View.$Context.lineTo(mouse.x, mouse.y);
            $View.$Context.closePath();
            $View.$Context.stroke();
        };
    };

    this.$Ruler = () => {
        const new_mouse = { x: 0, y: 0 };
        const old_mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, old_mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            this.$Position(e, new_mouse);
            $View.$Reset();

            $View.$Context.beginPath();
            $View.$Context.moveTo(old_mouse.x, old_mouse.y);
            $View.$Context.lineTo(new_mouse.x, new_mouse.y);

            var px = old_mouse.y - new_mouse.y;
            var py = new_mouse.x - old_mouse.x;
            const len = ($View.$Theme.stroke * 2) / Math.hypot(px, py);
            px *= len;
            py *= len;

            $View.$Context.moveTo(old_mouse.x + px, old_mouse.y + py);
            $View.$Context.lineTo(old_mouse.x - px, old_mouse.y - py);
            $View.$Context.moveTo(new_mouse.x + px, new_mouse.y + py);
            $View.$Context.lineTo(new_mouse.x - px, new_mouse.y - py);

            $View.$Context.closePath();
            $View.$Context.stroke();

            this.Length(old_mouse, new_mouse, old_mouse.x + $View.$Theme.stroke * 6, old_mouse.y + $View.$Theme.stroke * 5);
        };
    };

    this.$Line = () => {
        const new_mouse = { x: 0, y: 0 };
        const old_mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, old_mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            this.$Position(e, new_mouse);
            $View.$Reset();

            $View.$Context.beginPath();
            $View.$Context.moveTo(old_mouse.x, old_mouse.y);
            $View.$Context.lineTo(new_mouse.x, new_mouse.y);

            $View.$Context.closePath();
            $View.$Context.stroke();
        };
    };

    this.$Arrow = () => {
        const new_mouse = { x: 0, y: 0 };
        const old_mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, old_mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            this.$Position(e, new_mouse);
            $View.$Reset();

            const head = Math.PI / 6;
            const size = $View.$Theme.stroke * 2;
            const angle = Math.atan2(new_mouse.y - old_mouse.y, new_mouse.x - old_mouse.x);

            $View.$Context.beginPath();
            $View.$Context.moveTo(old_mouse.x, old_mouse.y);
            $View.$Context.lineTo(new_mouse.x, new_mouse.y);
            $View.$Context.closePath();
            $View.$Context.stroke();

            $View.$Context.beginPath();
            $View.$Context.lineTo(new_mouse.x, new_mouse.y);
            $View.$Context.lineTo(new_mouse.x - size * Math.cos(angle - head), new_mouse.y - size * Math.sin(angle - head));
            $View.$Context.lineTo(new_mouse.x - size * Math.cos(angle + head), new_mouse.y - size * Math.sin(angle + head));
            $View.$Context.closePath();
            $View.$Context.stroke();
            $View.$Context.fill();
        };
    };

    this.$Rectangle = () => {
        const new_mouse = { x: 0, y: 0 };
        const old_mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, old_mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            this.$Position(e, new_mouse);
            $View.$Reset();
            $View.$Context.beginPath();

            var width = new_mouse.x - old_mouse.x;
            var height = new_mouse.y - old_mouse.y;

            $View.$Context.rect(old_mouse.x, old_mouse.y, width, height);
            $View.$Context.closePath();
            $View.$Context.stroke();

            this.Length(old_mouse, new_mouse, old_mouse.x + width / 2, old_mouse.y + height / 2 + $View.$Theme.stroke * 5);
        };
    };

    this.$Circle = () => {
        const new_mouse = { x: 0, y: 0 };
        const old_mouse = { x: 0, y: 0 };
        var action = 0;

        $View.$Canvas.onpointerdown = (e) => {
            this.$Position(e, old_mouse) && (action = 1);
        };

        $View.$Canvas.onpointerup = () => {
            this.$Save() && (action = 0);
        };

        $View.$Canvas.onpointermove = (e) => {
            if (!action) return;

            this.$Position(e, new_mouse);
            $View.$Reset();
            $View.$Context.beginPath();

            var width = new_mouse.x - old_mouse.x;

            $View.$Context.arc(old_mouse.x, old_mouse.y, Math.abs(width), 0, 2 * Math.PI);
            $View.$Context.closePath();
            $View.$Context.stroke();

            this.Length(old_mouse, new_mouse, old_mouse.x, old_mouse.y + $View.$Theme.stroke * 5);
        };
    };

    this.$Polygon = () => {
        const mouse = { x: 0, y: 0 };
        const points = [];

        const draw = () => {
            if (!points.length) return;
            $View.$Context.moveTo(points[0].x, points[0].y);
            for (var i = 1; i < points.length; i++) {
                $View.$Context.lineTo(points[i].x, points[i].y);
            }
        };

        $View.$Canvas.onpointerup = (e) => {
            points.push({
                x: e.offsetX,
                y: e.offsetY,
            });
        };

        $View.$Canvas.onpointermove = (e) => {
            this.$Position(e, mouse);
            $View.$Reset();

            $View.$Context.beginPath();
            draw();
            $View.$Context.lineTo(mouse.x, mouse.y);
            $View.$Context.closePath();
            $View.$Context.stroke();
        };

        $View.$Canvas.ondblclick = () => {
            this.$Save();
            points.length = 0;
        };
    };
};