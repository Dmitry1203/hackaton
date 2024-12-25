// COMMON SCRIPTS
// form validation
function validateForm(form) {
    const inputList = form.querySelectorAll('input:not([type="file"]), textarea');

    const isValid = validateInputList(inputList);

    return isValid;
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

// scroll
function scrollToBlock(selector) {
    var block = $(selector);
    if (!block.length) return;
    $("html,body")
        .stop()
        .animate({ scrollTop: $(block).offset().top }, 500);
}
// scroll END

// preview photo
function addPreview(input, file) {
    if (!input || !file) return;

    const preview = input.closest('.form-block').querySelector('img');

    if (!preview) return;

    const fileReader = new FileReader();

    fileReader.onload = (event) => {
        preview.src = event.target.result;
    };

    fileReader.readAsDataURL(file);
}
// preview photo END

// fancybox
function openModal(selector) {
    $.fancybox.open({
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

document.addEventListener("DOMContentLoaded", event => {
    // masks
    $('input[type="tel"]').mask('+7 (999) 999-99-99');
    $('#birthdate').mask('00.00.0000');
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
function sendAuthForm(event, list) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
    }
}

document.addEventListener("DOMContentLoaded", event => {
    const authForm = document.querySelector('.auth-form');

    if (authForm) {
        const inputList = authForm.querySelectorAll('input');

        authForm.addEventListener("submit", function (event) {
            sendAuthForm(event, inputList);
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
function sendPasswordForm(event, list) {
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
    }
}

function sendCreateTeamForm(event, list) {
    let send = true;

    send = validateInputList(list);

    if (!send) {
        event.preventDefault();
    }
}

function sendTeamApplyForm(event, list) {
    event.preventDefault();

    let send = validateInputList(list);

    if (send) {
        // отправка формы

        const actionUrl = $(location).attr('origin') + '/personal/team/application/create';
        const message = $('#apply_message').val().trim();
        const teamId  = $('#team-id').val();
        const data = {
            message,
            teamId
        }

        fetch(actionUrl, {
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(response => {

            if (response['success'] === 'OK'){
                parent.$.fancybox.close()
                openModal('#team-apply-success');
                setTimeout(() => location.reload(), 1000);

            } else {
                parent.$.fancybox.close()
                openModal('#team-apply-fail');

            }

            //if (response['success'] === 'EXIST') {
            // это сейчас не используется
            // можно подавать не одну заявку
            //    parent.$.fancybox.close()
            //    openModal('#team-apply-exist');

        })

    }
}

function sendAddUserForm(event, list) {
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

document.addEventListener("DOMContentLoaded", event => {
    const timeline = document.querySelector('.timeline-slider');
    const timelineItems = document.querySelectorAll('.timeline-item');

    if (timeline) {
        const timeLineSlider = tns({
            container: '.timeline-slider',
            items: 6,
            startIndex: checkStartIndex(timeline, timelineItems, 6),
            nav: false,
            controls: false,
            loop: false,
            mouseDrag: true,
        });
        checkTimelineSliderLength(timeline, timelineItems);

        timeLineSlider.events.on('transitionEnd', () => checkTimelineSliderLength(timeline, timelineItems));
    }

    const birthdateInput = document.getElementById('birthdate');

    if (birthdateInput) {
        const birthdate = new tempusDominus.TempusDominus(birthdateInput, {
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

        birthdate.dates.parseInput = (value) => { return new tempusDominus.DateTime(moment(value, "DD-MM-YYYY")) };
    }

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
        if (!target.closest('.custom-upload')) return;

        const file = target.files[0];
        if (!file || file.type.indexOf("image") === -1) return;

        const isValid = validateFileSize(file);

        if (!isValid) {
            target.value = "";
            return;
        }

        addPreview(target, file);
    });
    // custom photo upload END

    // password form
    const passwordForm = document.querySelector('.password-form');

    if (passwordForm) {
        const inputList = passwordForm.querySelectorAll('input');

        passwordForm.addEventListener("submit", function (event) {
            sendPasswordForm(event, inputList);
        })
    }
    // password form END

    // create team form
    const createTeamForm = document.querySelector('.create-team-form');

    if (createTeamForm) {
        const inputList =  createTeamForm.querySelectorAll('input:not([type="file"]), textarea');

        createTeamForm.addEventListener("submit", function (event) {
            sendCreateTeamForm(event, inputList);
        })
    }
    // create team form END

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
});

// склонять возраст
function strYears(value, words){
    value = Math.abs(value) % 100;
    var num = value % 10;
    if(value > 10 && value < 20) return words[2];
    if(num > 1 && num < 5) return words[1];
    if(num == 1) return words[0];
    return words[2];
}

$(document).ready(function() {
    //selectize
    const select = $('.select-control');

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

        // заполнить карточку значениями атрибутов data

        let age = $(this).attr("data-age");
        if (age !== ''){
            age = ', ' + age + ' ' + strYears(age, ['год', 'года', 'лет']);
        }

        let phone = $(this).attr("data-phone");
        let phoneDigit = phone.replace(/[^0-9]/g, '');
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
        $('#team-id').val( $(this).attr("data-id") );
        $('#team-name').text( $(this).attr("data-team"));
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
        $('.accept-application-form #application-user-name').text( $(this).attr("data-name") );
        $('.accept-application-form #application-accept-id').val( $(this).attr("data-id") );
        openModal('#accept-application');
    })

    const declineApplicationButton = $('.decline-application');

    declineApplicationButton.click(function(){
        $('.decline-application-form #application-user-name').text( $(this).attr("data-name") );
        $('.decline-application-form #application-decline-id').val( $(this).attr("data-id") );
        openModal('#decline-application');
    })

    // settings form
    const saveAccountButton = $('.save-account');
    const settingsForm = document.querySelector('.settings-form');

    saveAccountButton.click(function(e) {
        e.preventDefault();

        const send = validateForm(settingsForm);

        if (!send) return;

        openModal('#save-account');
    })

    const saveAccountForm = document.querySelector('.save-account-form');

    if (saveAccountForm) {
        saveAccountForm.addEventListener('submit', function (event) {
            $(settingsForm).submit();
        })
    }
    // settings form END

    // solutions form
    const saveSolution = $('.save-solution');
    const solutionsForm = document.querySelector('.solutions-form');

    saveSolution.click(function(e) {
        e.preventDefault();

        const send = validateForm(solutionsForm);

        if (!send) return;

        openModal('#save-solution');
    })

    const saveSolutionForm = document.querySelector('.save-solution-form');

    if (saveSolutionForm) {
        saveSolutionForm.addEventListener('submit', function (event) {
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
            $(votesForm).submit();
        })
    }
    // votes form END
    // modals END
});
// PROFILE USER END
