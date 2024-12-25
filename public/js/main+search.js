// COMMON SCRIPTS
// form validation
function validateForm(form) {
    const inputList = form.querySelectorAll('input:not([type="file"]), textarea');

    let isValid = validateInputList(inputList);

    const hiddenRequired = form.querySelector('input[type="hidden"][name="required"]');

    if (hiddenRequired) {
        const isValidHidden = validateHidden(hiddenRequired);

        isValid = isValid && isValidHidden;
    }

    return isValid;
}

function validateHidden(input) {
    let isValid = !!input.value;

    setValidateStatus(input, isValid);

    return isValid ;
}

function validateInputList(list) {
    let result = true;

    list.forEach(input => {
        const isValid = validateInput(input);
        result = result && isValid;
    });

    return result;
}

function validateInput(input) {
    const required = input.dataset.required;
    if (!required && !input.value) return true;

    const type = input.type;

    let isValid = false;

    switch (type) {
        case 'tel':
            isValid = validateTel(input.value);
            break;
        case 'email':
            isValid = validateEmail(input.value);
            break;
        case 'password':
            isValid = validatePassword(input.value);
            break;
        case 'url':
            isValid = validateLink(input.value);
            break;
        default:
            isValid = validateText(input.value);
            break;
    }

    setValidateStatus(input, isValid);
    return isValid;
}

function validateText(text) {
    return text && text.trim().length > 0;
}

function validateTel(tel) {
    let regExp = /^(\+7) (\()([0-9]{3})(\) )([0-9]{3}-)([0-9]{2}-)([0-9]{2})$/;
    return regExp.test(tel);
}

function validateEmail(email) {
    let regExp = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    return regExp.test(email);
}

function validatePassword(password) {
    let regExp = /^.{8,}$/;

    return regExp.test(password);
}

function validateLink(link) {
    let regExp = /^(http(s)?:\/\/)?(www.)?([a-zA-Z0-9])+([\-\.]{1}[a-zA-Z0-9]+)*\.[a-zA-Z]{2,5}(:[0-9]{1,5})?(\/[^\s]*)?$/;

    return regExp.test(link);
}

function setValidateStatus(input, status) {
    if (!status) {
        input.classList.add("is-invalid");
    } else {
        input.classList.add("is-valid");
    }
}

function clearValidateStatus(input) {
    input.classList.remove("is-invalid");
    input.classList.remove("is-valid");
}

function validateFileSize(file) {
    const size = file.size / 1024 / 1024;

    return size < 5;
}

function validateFileType(file) {
    const type = file.type;

    return type === "image/jpeg" || type == "image/png";
}
// form validation END

// password toggle
function togglePasswordView(item) {
  const target = item;
  const parent = item.closest('.input-group');
  if (!parent) return;
  const passwordInput = parent.querySelector('input');
  if (target.classList.contains('active')) {
    passwordInput.type = "password";
  } else {
    passwordInput.type = "text";
  }
  target.classList.toggle('active');
}

function initPasswordToggle() {
    const passwordToggleItems = document.querySelectorAll('.password-toggle');
    passwordToggleItems.forEach(item => item.addEventListener('click', () => togglePasswordView(item)))
}
// password toggle END

// textarea limit
function setTextAreaCounter(textarea) {
    if (!textarea) return;

    const limit = textarea.maxLength;
    const counter = textarea.closest('.form-group').querySelector('.textarea-counter span');

    if (!limit || !counter) return;

    textarea.addEventListener('input', (event) => {
        const value = event.target.value;
        counter.textContent = value.length;
    })
}
function initTextAreaLimit() {
    const textarea = document.querySelectorAll('textarea');
    textarea.forEach(area => setTextAreaCounter(area));
}
// textarea limit

// copy
function copyFallback(text) {
    let textarea = document.createElement(`textarea`);

    textarea.value = text;
    textarea.focus();
    textarea.select();

    document.body.appendChild(textarea).classList.add("copy-textarea");

    try {
        let successful = document.execCommand("copy");
        let msg = successful ? "successful" : "unsuccessful";
        console.log("Fallback: Copying text command was " + msg);
    } catch (err) {
        console.error("Fallback: Oops, unable to copy", err);
    }

    document.body.removeChild(textarea);
}

function copy(text) {
    if (!navigator.clipboard) {
        copyFallback(text);

        return;
    } else {
        navigator.clipboard.writeText(text);
    }
}
// copy END

// format age
function strYears(value, words) {
    value = Math.abs(value) % 100;
    var num = value % 10;
    if(value > 10 && value < 20) return words[2];
    if(num > 1 && num < 5) return words[1];
    if(num == 1) return words[0];
    return words[2];
}
// format age END

// scroll
function scrollToBlock(selector) {
    var block = $(selector);
    if (!block.length) return;

    const header = $('.header');
    const padding = window.matchMedia("(max-width: 1023px)").matches && header.length ? header.outerHeight() : 0;

    $("html,body")
        .stop()
        .animate({ scrollTop: $(block).offset().top - padding}, 500);
}
// scroll END

// preview photo
// simple
function addPreview(input, file, hidden) {
    if (!input || !file) return;

    const preview = input.closest('.form-block').querySelector('img');

    if (!preview) return;

    const fileReader = new FileReader();

    fileReader.onload = (event) => {
        preview.src = event.target.result;

        if (hidden) {
            hidden.value = 1;
        }
    };

    fileReader.onerror = (event) => {
        input.value = "";
    };

    fileReader.readAsDataURL(file);
}

// advanced
function addAdvancedPreview(input, file, type) {
    if (!input || !file) return;

    const upload = input.closest('.custom-upload');

    if (type == "multi") {
        const inputItems = upload.querySelectorAll('input');

        const inputItemsFiltered = Array.from(inputItems).filter(input => input.files[0] && input.files[0].name == file.name);

        if (inputItemsFiltered.length > 1)  {
            input.value = "";
            return;
        }
    }

    const previewContainer = upload.querySelector('.preview-container');

    if (!previewContainer) return;

    const previewItem = document.createElement("div");
    previewItem.className = "preview-item";
    previewItem.innerHTML = `
        <button type="button" class="preview-remove"></button>
    `
    const previewImage = document.createElement("div");
    previewImage.className = "preview-image";

    const preview = document.createElement("img");
    previewImage.appendChild(preview);
    previewItem.appendChild(previewImage);
    previewItem.dataset.name = file.name;

    const fileReader = new FileReader();

    fileReader.onload = (event) => {
        if (type == "single") {
            const parent = input.parentElement;
            if (parent) parent.style.display = "none";

            previewContainer.innerHTML = "";
        }

        preview.src = event.target.result;
        previewContainer.appendChild(previewItem);

        if (type == "multi") {
            //input.disabled = true;
            input.insertAdjacentHTML("beforebegin", '<input type="file" name="partner_logo[]" accept=".jpg, .jpeg, .png">');
        }
    };

    fileReader.onerror = (event) => {
        previewItem.remove();
        input.value = "";
    };

    fileReader.readAsDataURL(file);
}

// remove
function removePreview(button, type) {
    const preview = button.closest('.preview-item');
    const upload = button.closest('.custom-upload');

    if (type == "single") {
        const input = upload.querySelector('input');
        if (!input) return;

        input.value = "";

        const parent = input.parentElement;
        if (parent) parent.style.display = "inline-block";
    }

    if (type == "multi") {
        const id = button.dataset.id;
        const target = button.dataset.target;

        if (id && target) {
            const removedElements = document.querySelector('#removed-elements');

            removedItemsArray.push({'id' : id, 'target' : target});

		    removedElements.value = JSON.stringify(removedItemsArray);
        } else {
            const name = preview.dataset.name;
            const inputItems = upload.querySelectorAll('input');

            inputItems.forEach(input => {
                const file = input.files[0];

                if (file && file.name == name) {
                    input.remove();
                }
            })
        }
    }

    preview.remove();
}
// preview photo END

// fancybox
function openModal(selector, callback) {
    $.fancybox.open({
        touch : false,
        autoFocus: false,
        closeClick : false,
        afterClose: callback || $.noop,
        helpers: {
            overlay: {
                 locked: true
            }
        },
        src: selector,
        type: 'inline',
    });
}
// fancybox

// masks functions
function isValidDate(date) {
   const regExp = /^(((0[1-9]|[12][0-9]|3[01])([-.\/])(0[13578]|10|12)([-.\/])(\d{4}))|(([0][1-9]|[12][0-9]|30)([-.\/])(0[469]|11)([-.\/])(\d{4}))|((0[1-9]|1[0-9]|2[0-8])([-.\/])(02)([-.\/])(\d{4}))|((29)(\.|-|\/)(02)([-.\/])([02468][048]00))|((29)([-.\/])(02)([-.\/])([13579][26]00))|((29)([-.\/])(02)([-.\/])([0-9][0-9][0][48]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][2468][048]))|((29)([-.\/])(02)([-.\/])([0-9][0-9][13579][26])))$/;

   return regExp.test(date);
}

function initTelMask() {
    $('input[type="tel"]').mask('+7 (999) 999-99-99');
}

function initDateMask(selector) {
    $(selector).mask('00.00.0000', {
        placeholder: "00.00.0000",
        clearIfNotMatch: false,
        onComplete: function(cep, event, currentField) {
            if(!isValidDate(cep) ){
                currentField.val("");
            }
        }
    });
}

function initTimeMask(selector) {
    $(selector).mask("00:00", {
        translation: {
            2: {pattern: /[0-2]/},
            3: {pattern: /[0-3]/},
            5: {pattern: /[0-5]/},
            9: {pattern: /[0-9]/}
        },
        onKeyPress: function(cep, e, field, options) {
            var masks = ['23:59', '29:59'];
            var mask = (cep.charAt(0) !== '2') ? masks[1] : masks[0];
            field.mask(mask, options);
        }
    });
}
// masks functions END

document.addEventListener("DOMContentLoaded", event => {
    // masks
    initTelMask();
    initDateMask('#birthdate');
    initDateMask('.expiration-date');
    initTimeMask('.expiration-time');
    // masks END

    initPasswordToggle();

    const inputList = document.querySelectorAll('input, textarea');

    inputList.forEach(input => input.addEventListener('focus', function(event) {
        clearValidateStatus(input);
    }));

    initTextAreaLimit();

    window.tippy && tippy(
        `[data-tippy-content]`,
        {
            theme: "classic",
            placement: 'bottom',
            maxWidth: 190,
            popperOptions: {
                modifiers: [
                  {
                    name: 'flip',
                    options: {
                      flipVariations: false,
                      fallbackPlacements: ['bottom'],
                    }
                  },
                ]
              },
        });
});
// COMMON SCRIPTS END

// AUTH
function sendAuthForm(event, list, button) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
        return;
    }

    const loader = button.querySelector('.loader');
    toggleFormLoader(loader, true);
    button.setAttribute('disabled', true);
}

document.addEventListener("DOMContentLoaded", event => {
    const authForm = document.querySelector('.auth-form');

    if (authForm) {
        const inputList = authForm.querySelectorAll('input');
        const submitButton = authForm.querySelector('.submit-button');

        authForm.addEventListener("submit", function (event) {
            sendAuthForm(event, inputList, submitButton);
        })
    }
});
// AUTH END

// PROFILE USER
// timeline slider
function checkTimelineSliderLength(slider, items) {
    const lastTimelineItem = items[items.length - 1];
    const timelineActiveItems = slider.querySelectorAll('.tns-slide-active');
    const lastTimelineActiveItem = timelineActiveItems[timelineActiveItems.length - 1];
    const previousLastTimelineActiveItem = slider.querySelector('.timeline-item.last');
    previousLastTimelineActiveItem && previousLastTimelineActiveItem.classList.remove('last');
    if (items.length > timelineActiveItems.length && lastTimelineItem !== lastTimelineActiveItem) {
        lastTimelineActiveItem.classList.add('last');
    }
}

function checkStartIndex(slider, items, limit) {
    const currentTimelineItem = slider.querySelector('.timeline-item.current');
    const index = Array.from(items).indexOf(currentTimelineItem);
    if (index < 2) {
        return 0;
    } else {
        if (items.length - index < limit) {
            return (items.length - limit);
        } else {
            return (index - 1);
        }
    }
}
// timeline slider END

// profile forms
function toggleFormLoader(loader, status) {
    if (!loader) return;

    if (status) {
        loader.classList.add('active')
    } else {
        loader.classList.remove('active')
    }
}

function sendSettingsForm(event, form, button) {
    let send = true;

    send = validateForm(form);

    if (!send) {
        event.preventDefault();
        scrollToBlock('.is-invalid');
        return;
    }

    const loader = button.querySelector('.loader');
    toggleFormLoader(loader, true);
    button.setAttribute('disabled', true);
}

function sendPasswordForm(event, list, button) {
    let send = true;

    send = validateInputList(list);

    const array = Array.from(list);
    const password_new = array.find(item => item.name === "password_new");
    const password_repeat = array.find(item => item.name === "password_repeat");

    const match = password_new.value === password_repeat.value;

    if (!match) {
        setValidateStatus(password_new, false);
        setValidateStatus(password_repeat, false);
    }

    send = send && match;

    if (!send) {
        event.preventDefault();
        return;
    }

    const loader = button.querySelector('.loader');
    toggleFormLoader(loader, true);
    button.setAttribute('disabled', true);
}

function sendTeamApplyForm(event, list) {
    event.preventDefault();

    let send = validateInputList(list);

    if (send) {
        // отправка формы
        parent.$.fancybox.close()

        openModal('#team-apply-success');
    }
}

function sendAddUserForm(event, list) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
    }
}

function sendInfoForm(event, list) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
    }
}

function sendNotificationForm(event, list) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
    }
}
// profile forms END

// vote
function setVoteValue(button) {
    const value = button.dataset.value;
    const block = button.closest('.form-block');
    const input = block.querySelector('input');
    if (!input) return;

    input.value = value;
    changeActiveVoteButton(button, block);
}

function changeActiveVoteButton(button, block) {
    const previousActiveVoteButton = block.querySelector('.active');
    if (previousActiveVoteButton) {
        previousActiveVoteButton.classList.remove('active');
    }
    button.classList.add('active');
}

function setDefaultValue(form) {
    const formBlocks = form.querySelectorAll('.form-block');
    formBlocks.forEach(block => {
        const input = block.querySelector('input');
        const value = input.value;
        if (!input.value) return;

        const button = block.querySelector(`.votes-button[data-value="${value}"]`);
        if (!button) return;
        changeActiveVoteButton(button, block);
    })
}

function calculateAverageVote(form) {
    const inputList = form.querySelectorAll('input');
    const inputValues = Array.from(inputList).map(input => +input.value);
    const average = inputValues.reduce((a, b) => (a + b)) / inputValues.length;

    const averageValue = form.querySelector('.votes-total-value');
    averageValue.textContent = average.toFixed(1);
}
// vote END

// remove item
let removedItemsArray = [];

function removeFormItem(button) {
    const target = button.dataset.target;
    const removedItem = button.closest(target);

    const removedItemId = button.dataset.id;
	const removedElements = document.querySelector('#removed-elements');

    if (!removedItem) return;
    removedItem.remove();

    updateItemsNumbers(target);

	if (removedItemId){
		removedItemsArray.push({'id' : removedItemId, 'target' : target});

		removedElements.value = JSON.stringify(removedItemsArray);
	}
}

function updateItemsNumbers(selector) {
    const items = document.querySelectorAll(selector);
    items.forEach((item, index) => {
        if (item) {
            item && updateNumber(item, index);
            item && updateId(item, index);
            item && updateName(item, index);
        }
    });
}

function updateNumber(item, index) {
    const number = item.querySelector('.number');
    if (!number) return;

    number.textContent = index + 1;
}

function updateId(item, index) {
    const elementsWithId = item.querySelectorAll('[id]');
    if (!elementsWithId.length) return;

    elementsWithId.forEach(el => {
        let id = el.id;
        let regExp = /\d+/;
        if (regExp.test(id)) {
            id = id.replace(regExp, index + 1);
            el.id = id;
        }
    })
}

function updateName(item, index) {
    const elementsWithName = item.querySelectorAll('[name]');
    if (!elementsWithName.length) return;

    elementsWithName.forEach(el => {
        let name = el.name;
        let regExp = /\d+/;
        if (regExp.test(name)) {
            name = name.replace(regExp, index + 1);
            el.name = name;
        }
    })
}

// remove item END

// html
function getCriteriaItemHTML() {
    return `
        <div class="criteria-item">
            <div class="form-group form-group-row">
                <label class="body-text-large">Название критерия</label>
                <input type="text" name="criteria[]" class="form-control" placeholder="Название критерия" data-required="1">
                <button type="button" class="remove-button" data-target=".criteria-item"></button>
            </div>
        </div>
    `;
}

function getPartnerItemHTML() {
    return `
		<div class="form-group form-group-row partner-item">
			<span class="form-label body-text-large">Логотип</span>
			<div class="partner-container">
				<div class="custom-upload custom-upload-advanced">
					<div class="preview-container"></div>
					<label>
						<input
							type="file"
							name="partner_logo[]"
							accept=".jpg, .jpeg, .png"
						>
						<div class="add-button button button__large">
							Загрузить логотип
						</div>
					</label>
					<button type="button" class="remove-button float-right"
						data-target=".partner-item"></button>
				</div>
			</div>
		</div>
    `;
}

function getTaskItemHTML(length) {
    return `
        <div class="form-block task-item">
            <div class="form-block-header">
                <h6>Задача <span class="number">${length + 1}</span></h6>
                <button type="button" class="remove-button" data-target=".task-item"></button>
            </div>
            <div class="form-group form-group-row">
                <label class="body-text-large">Название задачи</label>
                <input type="text" name="task[]" class="form-control" placeholder="Название задачи"
                    data-required="1">
            </div>
            <div class="form-group form-group-row textarea-group">
                <label class="body-text-large">Описание задачи</label>
                <textarea type="text" name="task_description[]" class="form-control" placeholder="Описание задачи"
                    data-required="1"></textarea>
            </div>
        </div>
    `;
}

function getTimelineItemHTML(length) {
    return `
        <div class="form-block timeline-item">
            <div class="form-block-header">
                <h6><span class="number">${length + 1}</span> Этап</h6>
                <button type="button" class="remove-button"
                    data-target=".timeline-item"></button>
            </div>
            <div class="form-row-grid">
                <div class="form-group">
                    <label class="body-text-large">Название этапа</label>
                    <input type="text" name="stage[]" class="form-control" placeholder="Название этапа"
                        data-required="1">
                </div>
                <div class="form-group">
                    <label class="body-text-large">Сокращенное название этапа</label>
                    <input type="text" name="stage_short[]" class="form-control"
                        placeholder="Сокращенное название этапа" data-required="1">
                </div>
            </div>
        <div class="form-row-grid">
            <div class="column">
                <div class="form-group">
                    <label class="body-text-large">Описание этапа</label>
                    <textarea type="text" name="stage_description[]" class="form-control"
                        placeholder="Описание этапа" data-required="1"></textarea>
                </div>
            </div>
            <div class="column">
                <div class="form-group">
                    <label class="body-text-large">Сокращенное описание этапа</label>
                    <input type="text" name="stage_description_short[]" class="form-control"
                        placeholder="Сокращенное описание этапа" data-required="1">
                </div>
                <div class="form-row-grid">
                    <div class="form-group">
                        <label class="body-text-large">Дата окончания</label>
                        <input type="text" name="stage_date_end[]" class="form-control expiration-date" placeholder="дд.мм.гггг"
                        data-required="1">
                    </div>
                    <div class="form-group">
                        <label class="body-text-large">Время окончания</label>
                        <input type="text" name="stage_time_end[]" class="form-control expiration-time" placeholder="00:00"
                            data-required="1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    `
}
// html END

// date inputs
function initDateInput(input) {
    const dateInput = new tempusDominus.TempusDominus(input, {
        display: {
            theme: "light",
            keepOpen: false,
            components: {
                clock: false,
                hours: false,
                minutes: false,
              },
        },
        useCurrent: false,
        localization: {
            dayViewHeaderFormat: { month: 'long', year: 'numeric' },
            format: "L"
        }
    });

    dateInput.dates.parseInput = (value) => {
        if (new Date(moment(value, "DD-MM-YYYY")) == "Invalid Date") {
            dateInput.clear();
            return;
        };
        return new tempusDominus.DateTime(moment(value, "DD-MM-YYYY"));
    };

    const value = input.dataset.value;

    if (value) {
        var formatValue = moment(value, "DD-MM-YYYY").toDate();

        dateInput.dates.setValue(tempusDominus.DateTime.convert(formatValue));
    }
}

function initTimeInput(input) {
    const timeInput = new tempusDominus.TempusDominus(input, {
        display: {
            theme: "light",
            keepOpen: false,
            components: {
                calendar: false,
                date: false,
                month: false,
                year: false,
                decades: false,
                clock: true,
                hours: true,
                minutes: true,
              },
        },
        useCurrent: false,
    });

    timeInput.dates.parseInput = (value) => {
        return new tempusDominus.DateTime(moment(value, "HH-mm"))
    };

    const value = input.dataset.value;

    if (value) {
        var formatValue = moment(value, "HH-mm").toDate();

        timeInput.dates.setValue(tempusDominus.DateTime.convert(formatValue));
    }
}

function initExpirationDateInputs() {
    const expirationDateInputs = document.querySelectorAll('.expiration-date');
    expirationDateInputs.forEach(input => input && initDateInput(input));
}

function initExpirationTimeInputs() {
    const expirationTimeInputs = document.querySelectorAll('.expiration-time');
    expirationTimeInputs.forEach(input => input && initTimeInput(input));
}
// date inputs END

// mobile menu and header
function toggleMobileMenuVisibility(menu, html, status = false) {
    if (status) {
        menu.classList.add('active');
        html.classList.add('lock');
    } else {
        menu.classList.remove('active');
        html.classList.remove('lock');
    }
}

function makeHeaderScrolled(header) {
    if (!header) return;
    const scrollTop = window.scrollY;

    scrollTop > 0 ? header.classList.add("header-scrolled") : header.classList.remove("header-scrolled");
}

function setPaddingByHeader(header, content) {
    if (!header || !content) return;
    const height = $(header).outerHeight();
    const padding = window.matchMedia("(min-width: 1024px)").matches ? 64 : height;
    $(content).css('padding-top', `${padding}px`)
}
// mobile menu and header END

function setCustomTimelineNav(event) {
    const target = event.target;

    const timeLineItem = target.closest('.timeline-item');

    if (timeLineItem) {
        if (timeLineItem.classList.contains('active')) return;
        $('.timeline-item').removeClass('active');
        $(timeLineItem).addClass('active');
    }
}

function initTimelinePane(pane, items) {
    if (window.matchMedia("(max-width: 767px)").matches) {
        items.forEach(item => item.removeAttribute('data-toggle'));
        pane.addEventListener('click', setCustomTimelineNav);
    } else {
        items.forEach(item => item.setAttribute('data-toggle', 'tab'));
        pane.removeEventListener('click', setCustomTimelineNav);
    }
}

document.addEventListener("DOMContentLoaded", event => {
    // header scroll
    const header = document.querySelector("header");
    makeHeaderScrolled(header);

    window.addEventListener("scroll", function (event) {
        makeHeaderScrolled(header);
        setPaddingByHeader(header, content);
    });

    const content = document.querySelector(".content");
    setPaddingByHeader(header, content);

    window.addEventListener("resize", function (event) {
        setPaddingByHeader(header, content);
    });

    // mobile menu
    const html = document.querySelector('html');
    const mobileMenu = document.querySelector('.mobile-menu');
    const openMobileMenuButton = document.querySelector('.open-menu');
    const closeMobileMenuButton = document.querySelector('.close-menu');

    openMobileMenuButton && openMobileMenuButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (!mobileMenu) return;
        toggleMobileMenuVisibility(mobileMenu, html, true);
    });

    closeMobileMenuButton && closeMobileMenuButton.addEventListener('click', function(event) {
        event.preventDefault();
        if (!mobileMenu) return;
        toggleMobileMenuVisibility(mobileMenu, html, false);
    });

    mobileMenu && window.addEventListener("resize", function (event) {
        if (!(window.matchMedia("(min-width: 1024px)").matches && mobileMenu.classList.contains('active')))
            return;
        toggleMobileMenuVisibility(mobileMenu, html, false);
    });

    // timeline slider
    const timeline = document.querySelector('.timeline-slider');
    const timelineItems = document.querySelectorAll('.timeline-item');

    if (timeline) {
        const timeLineSlider = tns({
            container: '.timeline-slider',
            startIndex: checkStartIndex(timeline, timelineItems, 6),
            nav: false,
            controls: false,
            loop: false,
            mouseDrag: true,
            responsive: {
                "0": {
                    "items": 2,
                },
                "400": {
                    "items": 3,
                },
                "576": {
                  "items": 4,
                },
                "768": {
                  "items": 5,
                },
                "1280": {
                  "items": 6,
                }
              },
        });
        checkTimelineSliderLength(timeline, timelineItems);

        timeLineSlider.events.on('transitionEnd', () => checkTimelineSliderLength(timeline, timelineItems));
    }

    const birthdateInput = document.getElementById('birthdate');

    if (birthdateInput) {
        initDateInput(birthdateInput);
    }

    // timeline pane
    const timelinePane = document.querySelector('.timeline-pane');

    if (timelinePane) {
        const timelineNavItems = timelinePane.querySelectorAll('.timeline-item');
        initTimelinePane(timelinePane, timelineNavItems);

        window.addEventListener("resize", function (event) {
            initTimelinePane(timelinePane, timelineNavItems);
        });
    }
    // timeline pane END

    // copy buttons
    const copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach(button => {
        if(!button) return;
        const parent = button.parentElement;
        const link = parent.querySelector('a').getAttribute('href');
        button.addEventListener('click', (event) => {
            event.preventDefault();
            copy(link);
        })
    })
    // copy buttons END

    // custom photo upload
    document.addEventListener('input', (event) => {
        const target = event.target;

        const upload = target.closest('.custom-upload');

        if (!upload) return;

        const file = target.files[0];
        if (!file) return;

        const hiddenRequired = upload.querySelector('input[type="hidden"][name="required"]');

        if (hiddenRequired) {
            hiddenRequired.classList.remove('is-invalid');
        }

        const errorMessage = upload.querySelector('.error-message');

        const isValidSize = validateFileSize(file);
        const isValidType = validateFileType(file);

        if (errorMessage) {
            errorMessage.classList.remove('v');
            errorMessage.textContent = "";

            if (!isValidSize) {
                errorMessage.textContent = "Размер фото превышает 5 Мб. ";
            }

            if (!isValidType) {
                errorMessage.textContent += "Формат фото не соотвествует заданному";
            }

            if (!isValidSize || !isValidType) {
                errorMessage.classList.add('v');
            }
        }

        const isValid = isValidSize && isValidType;

        if (!isValid) {
            target.value = "";
            return;
        }

        if (target.closest('.custom-upload-simple')) {
            addPreview(target, file, hiddenRequired);
        } else if (target.closest('.custom-upload-advanced')) {
           let type;

           if (target.closest('.custom-upload-single')) {
            type = "single";
           }

           if (target.closest('.custom-upload-multi')) {
            type = "multi";
           }

           addAdvancedPreview(target, file, type);
        }
    });

    document.addEventListener('click', (event) => {
        const target = event.target;

        if (!target.closest('.preview-remove') || !target.closest('.custom-upload-advanced')) return;

        let type;

        if (target.closest('.custom-upload-single')) {
            type = "single";
        }

        if (target.closest('.custom-upload-multi')) {
            type = "multi";
        }

        event.preventDefault();
        removePreview(target, type);
    });
    // custom photo upload END


    // settings form
    const settingsForm = document.querySelector('.settings-form');

    if (settingsForm) {
        const submitButton = settingsForm .querySelector('.submit-button')

        settingsForm.addEventListener("submit", function (event) {
            sendSettingsForm(event, this, submitButton);
        })

        document.addEventListener('click', (event) => {
            const target = event.target;

            const additionalSectionButton = target.closest('.additional-section__button');

            if (additionalSectionButton) {
                const additionalSection = settingsForm.querySelector('.additional-section');
                additionalSection.classList.add('v');
                additionalSectionButton.remove();
            }
        })
    }

    // password form
    const passwordForm = document.querySelector('.password-form');

    if (passwordForm) {
        const inputList = passwordForm.querySelectorAll('input');
        const submitButton = passwordForm.querySelector('.submit-button')

        passwordForm.addEventListener("submit", function (event) {
            sendPasswordForm(event, inputList, submitButton);
        })
    }
    // password form END

    // team apply form
    const teamApplyForm = document.querySelector('.team-apply-form');

    if (teamApplyForm) {
        const inputList =  teamApplyForm.querySelectorAll('textarea');

        teamApplyForm.addEventListener("submit", function (event) {
            sendTeamApplyForm(event, inputList);
        })
    }
    // team apply form END

    // add user form
    const addUserForm = document.querySelector('.add-user-form');

    if (addUserForm) {
        const inputList =  addUserForm.querySelectorAll('input');

        addUserForm.addEventListener("submit", function (event) {
            sendAddUserForm(event, inputList);
        })
    }
    // add user form END

    // info form
    const infoForm = document.querySelector('.info-form');

    if (infoForm) {
        infoForm.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-button')) {
                event.preventDefault();
                const button = event.target;
                removeFormItem(button);
            }
        });

        var previewTemplate = `
            <div class="preview-item">
                <button type="button" class="preview-remove" data-dz-remove></button>
                <div class="preview-image">
                    <img src="data:," alt="" data-dz-thumbnail/>
                </div>
            </div>
        `;

        infoForm.addEventListener('submit', function (event) {
            const inputList = infoForm.querySelectorAll('input:not([type="file"]), textarea');
            sendInfoForm(event, inputList);
        });

        const criteriaContainer = infoForm.querySelector('.criteria-container');
        const addCriteriaButton = infoForm.querySelector('.add-criteria');

        if (criteriaContainer && addCriteriaButton) {
            addCriteriaButton.addEventListener('click', function(event) {
                event.preventDefault();
                const criteriaItemHTML = getCriteriaItemHTML();
                criteriaContainer.insertAdjacentHTML('beforeend', criteriaItemHTML);
            })
        }

        const tasksContainer = infoForm.querySelector('.tasks-container');
        const addTaskButton = infoForm.querySelector('.add-task');

        if (tasksContainer && addTaskButton) {
            addTaskButton.addEventListener('click', function(event) {
                event.preventDefault();
                const length = tasksContainer.querySelectorAll('.task-item').length;
                const taskItemHTML = getTaskItemHTML(length);
                tasksContainer.insertAdjacentHTML('beforeend', taskItemHTML);
            })
        }

        const partnerContainer = infoForm.querySelector('.partner-container');
        const addPartnerButton = infoForm.querySelector('.add-partner');

        if (partnerContainer && addPartnerButton) {
            addPartnerButton.addEventListener('click', function(event) {
                event.preventDefault();
                const partnerItemHTML = getPartnerItemHTML();
                partnerContainer.insertAdjacentHTML('beforeend', partnerItemHTML);
            })
        }

        const timelineContainer = infoForm.querySelector('.timeline-container');
        const addTimelineButton = infoForm.querySelector('.add-timeline');

        if (timelineContainer && addTimelineButton) {
            addTimelineButton.addEventListener('click', function(event) {
                event.preventDefault();
                const length = timelineContainer.querySelectorAll('.timeline-item').length;
                const timelineItemHTML = getTimelineItemHTML(length);
                timelineContainer.insertAdjacentHTML('beforeend', timelineItemHTML);

                const item = timelineContainer.querySelectorAll('.timeline-item')[length];
                const expirationDateInput = item.querySelector('.expiration-date');
                expirationDateInput && initDateInput(expirationDateInput);
                initDateMask('.expiration-date');

                const expirationTimeInput = item.querySelector('.expiration-time');
                expirationTimeInput && initTimeInput(expirationTimeInput);
                initTimeMask('.expiration-time');
            })
        }

        initExpirationDateInputs();
        initExpirationTimeInputs();
    }
    // info form END

    // notifications form
    const notificationForm = document.querySelector('.notifications-form');

    if (notificationForm) {
        const inputList = notificationForm.querySelectorAll('input, textarea');

        notificationForm.addEventListener("submit", function (event) {
            sendNotificationForm(event, inputList);
        })
    }
    // notifications form END
});

// object validation
function isEmptyObject(obj) {
    for (var i in obj) {
        if (obj.hasOwnProperty(i)) {
            return false;
        }
    }
    return true;
}
// object validation END

$(document).ready(function() {
    //selectize
    const select = $('.list-control');

    if (select.length) {
        select.selectize({
            create: false,
            dropdownParent: 'body',
        });
    }
    //selectize END

    // modals
    const userProfileLink = $('.user-profile-link');

    userProfileLink.click(function(){
        // filling user data
        let age = $(this).attr("data-age");
        if (age !== ''){
            age = ', ' + age + ' ' + strYears(age, ['год', 'года', 'лет']);
        }

        let phone = $(this).attr("data-phone");
        let phoneDigit = phone ? phone.replace(/[^0-9]/g, '') : "";
        let email = $(this).attr("data-email");
        let dataAvatar = $(this).attr("data-avatar");

        let avatar = (dataAvatar === '') ? '/images/user-default.png' : `/storage/images/avatars/${dataAvatar}`;

        $('#card-user-name').text( $(this).attr("data-name") + ' ' + $(this).attr("data-surname") + age );
        $('#card-user-school').text( $(this).attr("data-school") + ', ' + $(this).attr("data-class") );
        $('#card-user-phone').html( `<a href="tel:+${phoneDigit}">${phone}</a>` );
        $('#card-user-email').html( `<a href="${email}">${email}</a>` );
        $('#card-user-about').text( $(this).attr("data-info") );
        $('#card-user-avatar').html( `<img src="${avatar}">` );

        openModal('#user-profile');
    });

    const applyButton = $('.apply-button');

    applyButton.click(function(){
        openModal('#team-apply')
    });

    const addUserButton = $('.add-user');

    addUserButton.click(function(){
        $('#add-user #email').val('');
        openModal('#add-user');
    })

    const teamOutButton = $('.team-out');

    teamOutButton.click(function(){
        openModal('#team-out');
    })

    const acceptApplicationButton = $('.accept-application');

    acceptApplicationButton.click(function(){
        openModal('#accept-application');
    })

    const declineApplicationButton = $('.decline-application');

    declineApplicationButton.click(function(){
        openModal('#decline-application');
    })

    const acceptInvitationButton = $('.accept-invitation');

    acceptInvitationButton.click(function(){
        openModal('#accept-invitation');
    })

    const declineInvitationButton = $('.decline-invitation');

    declineInvitationButton.click(function(){
        openModal('#decline-invitation');
    })

    // create team form
    const createTeamForm = document.querySelector('.create-team-form');
    const teamCreateForm = document.querySelector('.team-create-form');
    const teamSaveForm = document.querySelector('.team-save-form');

    function createTeamFormInit(form, selector) {
        const idSelector = "#" + selector;
        const classSelector = "." + selector;

        const modalOpenButton = $(classSelector);

        const loader = form.querySelector('.loader');
        const submitButton = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            toggleFormLoader(loader, true);
            submitButton.setAttribute('disabled', true);

            $(createTeamForm).submit();
        })

        modalOpenButton.click(function(e) {
            e.preventDefault();

            const send = validateForm(createTeamForm);

            if (!send) {
                scrollToBlock('.is-invalid');
                return;
            }

            openModal(idSelector, function(event) {
                toggleFormLoader(loader, false);
                submitButton.removeAttribute('disabled');
            });
        })

    }

    if (createTeamForm) {
        const previewImage = createTeamForm.querySelector('.preview img');
        const previewText = createTeamForm.querySelector('.preview-text');

        createTeamForm.addEventListener("change", function (event) {
            const target = event.target;
            if (previewImage.getAttribute('src')) return;

            if (target.name && target.name == "team_name") {
               const value = target.value;

                if (!value) {
                    previewText.textContent = "К";
                } else {
                    const array = value.split(' ');
                    previewText.textContent = array.length > 1 ? `${array[0][0]}${array[1][0]}` : `${array[0][0]}`;
                }
            }
        })

        if (teamCreateForm) {
            createTeamFormInit(teamCreateForm, 'create-team');
        }

        if (teamSaveForm) {
            createTeamFormInit(teamSaveForm, 'save-team');
        }
    }
    // create team form END

    // solutions form
    const saveSolution = $('.save-solution');
    const solutionsForm = document.querySelector('.solutions-form');

    saveSolution.click(function(e) {
        e.preventDefault();

        const send = validateForm(solutionsForm);

        const solutionText = document.querySelector('#solution');
        const solutionTextStore = document.querySelector('#solution-store');
        solutionTextStore.value = solutionText.value

        if (!send) return;
        openModal('#save-solution');
    })

    const saveSolutionForm = document.querySelector('.save-solution-form');

    if (saveSolutionForm) {
        saveSolutionForm.addEventListener('submit', function (event) {
            event.preventDefault();
            $(solutionsForm).submit();
        })
    }
    // solutions form END

    // votes form
    const votesForm = document.querySelector('.votes-form');
    const saveVotes = $('.save-votes');
    const finalSolutionButton = $('.final-solution');

    finalSolutionButton.click(function(e) {
        e.preventDefault();

        scrollToBlock('#final-solution');
    })

    if (votesForm) {
        setDefaultValue(votesForm);
        calculateAverageVote(votesForm);
        const votesButtons = votesForm.querySelectorAll('.votes-button');

        votesButtons.forEach(button => {
            if (button) {
                button.addEventListener('click', () => {
                    if (!button.classList.contains('active')) {
                        setVoteValue(button);
                        calculateAverageVote(votesForm);
                    }
                })
            }
        })
    }

    saveVotes.click(function(e) {
        e.preventDefault();

        let send = true;

        const inputList = votesForm.querySelectorAll('input');
        inputList.forEach(input => {
            send = send && !!(input.value);
        })

        if (!send) return;

        openModal('#save-votes');
    })

    const saveVotesForm = document.querySelector('.save-votes-form');

    if (saveVotesForm) {
        saveVotesForm.addEventListener('submit', function (event) {
            event.preventDefault();
            $(votesForm).submit();
        })
    }
    // votes form END
    // modals END
	
	
	// search

    $('#search-team').val('');
    $('#search-team').keyup(function(event) {
        search( $('#search-team').val().trim() )
    });
	
});
// PROFILE USER END

// поиск
const target = document.querySelector('#search-product');
if (target !== null) {
    target.addEventListener('paste', (event) => {
        let paste = (event.clipboardData || window.clipboardData).getData('text');
        search(paste)
    });
}

function search(searhValue) {
    if (searhValue.length >= 3){
        let team;
        $('.teams-item').each(function(i,elem) {
            if ( $(this).attr("data-name") !== undefined){
                team = $(this).attr("data-name").toUpperCase();
                if (team.indexOf(searhValue.toUpperCase()) == -1){
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
        });
    } else {
        showAll();
    }
}

function showAll() {
    $('.teams-item').show();
}

