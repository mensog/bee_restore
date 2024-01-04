import is from '../../../node_modules/is_js/is'
import IMask from '../../../node_modules/imask/dist/imask.min'

let mask
const element = document.getElementById('phone');

/**
 * Mask phone input and unmask on submit
 * @param id
 */
const maskPhoneInput = (id) => {
    const form = document.getElementById(id)

    if (document.body.contains(form)) {
        const maskOptions = {
            mask: '+{7} (000) 000-00-00'
        };
        mask = IMask(element, maskOptions);

        let formObject = document.forms[id]
        let formElement = formObject.elements["phone"];

        form.onsubmit = () => {
            formElement.value = mask.unmaskedValue
        }
    }
}

maskPhoneInput('checkout')
maskPhoneInput('registration')
maskPhoneInput('profile')

let isValid = [];

jQuery($ => {

    $('#registration #email, #registration #phone, #registration #name, #registration #surname, #registration #password, #registration #password-confirm').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'registration')
    })

    $('#reset-password #email, #reset-password #password, #reset-password #password-confirm').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'reset-password')
    })

    $('#edit-data #name, #edit-data #surname').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'edit-data')
    })

    $('#change-email #email, #change-email #password').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'change-email', 'password')
    })

    $('#change-password #password, #change-password #newPassword').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'change-password', 'password')
    })

    $('#checkout #city, #checkout #email, #checkout #name-n-surname, #checkout #phone, #checkout #address').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'checkout')
    })

    $('#profile #city, #profile #email, #profile #name-n-surname, #profile #phone, #profile #address').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'profile')
    })

    $('#comment #advantages, #comment #disadvantages, #comment #commentText').on('keyup', function () {
        checkRegistrationForm(false, $(this), 'comment')
    })

    $('.show-password').on('click', function () {
        showPassword($(this));
    })

// $('.registration #personal-data-agreement').on('change', function () {
//     checkRegistrationForm(false, $(this), 'registration')
// })

    /**
     *  Validate inputs by page
     * @param load
     * @param $this
     * @param page
     * @param ignoreID
     */
    const checkRegistrationForm = (load, $this, page, ignoreID) => {
        if (load) {
            $(`#${page} input`).each(function () {
                switch ($(this).attr('type')) {
                    case 'text':
                        if ($(this).val().trim() !== '') {
                            $(this).removeClass('is-invalid')
                            $(this).addClass('is-valid')
                            if (!isValid.includes($(this).attr('id'))) {
                                isValid.push($(this).attr('id'))
                            }
                        } else {
                            $(this).removeClass('is-valid')
                            if (!load)
                                $(this).addClass('is-invalid')
                            let index = isValid.indexOf($(this).attr('id'));
                            if (index !== -1) isValid.splice(index, 1);
                        }
                        break
                    case 'email':
                        if (page === 'checkout' || page === 'profile') {
                            if (is.email($(this).val())) {
                                $(this).removeClass('is-invalid')
                                $(this).addClass('is-valid')
                                if (!isValid.includes($(this).attr('id'))) {
                                    isValid.push($(this).attr('id'))
                                }
                            } else {
                                $(this).removeClass('is-valid')
                                if (!load)
                                    $(this).addClass('is-invalid')
                                let index = isValid.indexOf($(this).attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        }

                        if (page === 'change-email') {
                            if (!$(this).hasClass('is-invalid')) {
                                if (is.email($(this).val())) {
                                    $(this).removeClass('is-invalid')
                                    $(this).addClass('is-valid')
                                    if (!isValid.includes($(this).attr('id'))) {
                                        isValid.push($(this).attr('id'))
                                    }
                                } else {
                                    $(this).removeClass('is-valid')
                                    if (!load)
                                        $(this).addClass('is-invalid')
                                    let index = isValid.indexOf($(this).attr('id'));
                                    if (index !== -1) isValid.splice(index, 1);
                                }
                            }
                        }
                        break
                    case 'phone':
                        if (mask.unmaskedValue.length === 11) {
                            $(this).removeClass('is-invalid')
                            $(this).addClass('is-valid')
                            if (!isValid.includes($(this).attr('id'))) {
                                isValid.push($(this).attr('id'))
                            }
                        } else {
                            $(this).removeClass('is-valid')
                            if (!load)
                                $(this).addClass('is-invalid')
                            let index = isValid.indexOf($(this).attr('id'));
                            if (index !== -1) isValid.splice(index, 1);
                        }
                        break
                    case 'password':
                        if ($(this).attr('id') === 'password-confirm') {
                            let password = $('#password').val().trim()
                            if ($(this).val() === password && $(this).val().length >= 8) {
                                $(this).removeClass('is-invalid')
                                $(this).addClass('is-valid')
                                if (!isValid.includes($(this).attr('id'))) {
                                    isValid.push($(this).attr('id'))
                                }
                            } else {
                                $(this).removeClass('is-valid')
                                if (!load)
                                    $(this).addClass('is-invalid')
                                let index = isValid.indexOf($(this).attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        } else {
                            if ($(this).val().length >= 8) {
                                $(this).removeClass('is-invalid')
                                $(this).addClass('is-valid')
                                if (!isValid.includes($(this).attr('id'))) {
                                    isValid.push($(this).attr('id'))
                                }
                            } else {
                                $(this).removeClass('is-valid')
                                if (!load)
                                    $(this).addClass('is-invalid')
                                let index = isValid.indexOf($(this).attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        }
                        break
                    case 'checkbox':
                        if ($(this).is(":checked")) {
                            if (!isValid.includes($(this).attr('id'))) {
                                isValid.push($(this).attr('id'))
                            } else {
                                let index = isValid.indexOf($(this).attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        }
                        break
                }
            })
        } else {
            switch ($this.attr('type')) {
                case 'text':
                    if ($this.val().trim() !== '') {
                        $this.removeClass('is-invalid')
                        $this.addClass('is-valid')
                        if (!isValid.includes($this.attr('id'))) {
                            isValid.push($this.attr('id'))
                        }
                    } else {
                        $this.removeClass('is-valid')
                        if (!load)
                            $this.addClass('is-invalid')
                        let index = isValid.indexOf($this.attr('id'));
                        if (index !== -1) isValid.splice(index, 1);
                    }
                    break
                case 'phone':
                    if (mask.unmaskedValue.length === 11) {
                        $this.removeClass('is-invalid')
                        $this.addClass('is-valid')
                        if (!isValid.includes($this.attr('id'))) {
                            isValid.push($this.attr('id'))
                        }
                    } else {
                        $this.removeClass('is-valid')
                        if (!load)
                            $this.addClass('is-invalid')
                        let index = isValid.indexOf($this.attr('id'));
                        if (index !== -1) isValid.splice(index, 1);
                    }
                    break
                case 'email':
                    $this.next('.invalid-feedback').remove()
                    if (is.email($this.val())) {
                        $this.removeClass('is-invalid')
                        $this.addClass('is-valid')
                        if (!isValid.includes($this.attr('id'))) {
                            isValid.push($this.attr('id'))
                        }
                    } else {
                        $this.removeClass('is-valid')
                        if (!load)
                            $this.addClass('is-invalid')
                        let index = isValid.indexOf($this.attr('id'));
                        if (index !== -1) isValid.splice(index, 1);
                    }
                    break
                case 'password':
                    if ($this.attr('id') !== ignoreID) {
                        let password = $('#password').val().trim()
                        if ($this.attr('id') === 'password-confirm' || $this.attr('id') === 'newPasswordConfirmation') {
                            if ($this.attr('id') === 'newPasswordConfirmation') {
                                password = $('#newPassword').val().trim()
                            }
                            if ($this.val().length >= 8 && $this.val() === password) {
                                $this.removeClass('is-invalid')
                                $this.addClass('is-valid')
                                if (!isValid.includes($this.attr('id'))) {
                                    isValid.push($this.attr('id'))
                                }
                            } else {
                                $this.removeClass('is-valid')
                                if (!load)
                                    $this.addClass('is-invalid')
                                let index = isValid.indexOf($this.attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        } else {
                            let passwordInput
                            if ($this.attr('id') === 'newPassword') {
                                passwordInput = $('#newPasswordConfirmation')
                            } else {
                                passwordInput = $('#password-confirm')
                            }

                            if (passwordInput.length) {
                                password = passwordInput.val().trim()
                                if ($this.val() !== password) {
                                    passwordInput.removeClass('is-valid')
                                    passwordInput.addClass('is-invalid')
                                    let index = isValid.indexOf(passwordInput.attr('id'));
                                    if (index !== -1) isValid.splice(index, 1);
                                } else {
                                    passwordInput.addClass('is-valid')
                                    passwordInput.removeClass('is-invalid')
                                    if (!isValid.includes(passwordInput.attr('id'))) {
                                        isValid.push(passwordInput.attr('id'))
                                    }
                                }
                                if (password === '') {
                                    passwordInput.removeClass('is-valid')
                                    passwordInput.removeClass('is-invalid')
                                    let index = isValid.indexOf(passwordInput.attr('id'));
                                    if (index !== -1) isValid.splice(index, 1);
                                }
                            }

                            if ($this.val().length >= 8) {
                                $this.removeClass('is-invalid')
                                $this.addClass('is-valid')
                                if (!isValid.includes($this.attr('id'))) {
                                    isValid.push($this.attr('id'))
                                }

                            } else {
                                $this.removeClass('is-valid')
                                if (!load)
                                    $this.addClass('is-invalid')
                                let index = isValid.indexOf($this.attr('id'));
                                if (index !== -1) isValid.splice(index, 1);
                            }
                        }
                    } else {
                        if ($this.val().trim() !== '') {
                            $this.removeClass('is-invalid')
                            if (!isValid.includes($this.attr('id'))) {
                                isValid.push($this.attr('id'))
                            }
                        } else {
                            let index = isValid.indexOf($this.attr('id'));
                            if (index !== -1) isValid.splice(index, 1);
                        }
                    }
                    break
                case 'checkbox':
                    if ($this.is(":checked")) {
                        if (!isValid.includes($this.attr('id'))) {
                            isValid.push($this.attr('id'))
                        } else {
                            let index = isValid.indexOf($this.attr('id'));
                            if (index !== -1) isValid.splice(index, 1);
                        }
                    }
                    break
            }
        }

        let num = $(`#${page} input:visible`).length;
        if (page === 'registration') {
            num = $(`#${page} input:not([type="hidden"])`).length;
        }

        if (page === 'checkout' || page === 'profile' || page === 'change-password') {
            num = $(`#${page} input:required`).length;
        }

        if (page === 'comment') {
            num = $(`#${page} textarea:required`).length;
        }

        // console.log(isValid)
        // console.log(num)

        if (isValid.length === num) {
            $(`#${page} button[type=submit]`).prop('disabled', false)
        } else {
            $(`#${page} button[type=submit]`).prop('disabled', true)
        }
    }

    /**
     * Toggle show password in password field
     *
     * @param $this
     */
    const showPassword = ($this) => {
        let input = $($this.parent('.form-control-container').find('input'));
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }

    checkRegistrationForm('start', false, 'registration')
    checkRegistrationForm('start', false, 'change-email')
    checkRegistrationForm('start', false, 'checkout')
    checkRegistrationForm('start', false, 'edit-data')
    checkRegistrationForm('start', false, 'profile')
})


