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