

<h2 class="text-center">Setup your Login Form</h2>
<select name="formTemplates" id="formTemplates" class="form-control">
    <option value="user">User Form</option>
    <option value="terms">Terms Agreement Form</option>
    <option value="issue">Submit Issue Form</option>
</select>

<div id="build-wrap"></div>

<div class="setDataWrap" style="text-align: center;margin-bottom: 10px;">
    <button id="getJSON" type="button">Get JSON Data</button>
    <button id="getJS" type="button">Get JS Data</button>
    <button id="appendField" class="addFieldBtn" data-label="Appended Field" type="button">Add Field</button>
    <button id="prependField" class="addFieldBtn" data-label="Prepended Field" data-index="0" type="button">Prepend
        Field
    </button>
    <button id="clear-all-fields" type="button">Clear Fields</button>
    <button id="close-editor" type="button">Close Editor</button>
    <button id="saveData" type="button">External Save Button</button>
    <button id="saveHtml" type="button">Export Form HTML</button>

</div>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"--}}
{{--        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"--}}
{{--        crossorigin="anonymous"></script>--}}
<script>
    jQuery(function ($) {
        var fbEditor = document.getElementById('build-wrap');
        var templateSelect = document.getElementById("formTemplates");
        var options = {
            controlPosition: 'left',
            // disabledActionButtons: ['data'],
            disabledSubtypes: {
                text: ['color', 'tel'],
            },
            disableFields: ['autocomplete', 'button', 'checkbox-group', 'file', 'header', 'hidden', 'paragraph', 'radio-group'],
            disabledAttrs: ["access", "value", "className", "rows", "step"],
            defaultFields: [{
                class: "form-control",
                label: "First Name",
                placeholder: "Enter your first name",
                name: "first-name",
                required: true,
                type: "text"
            }, {
                class: "form-control",
                label: "Select",
                name: "dropdown",
                type: "select",
                multiple: "true",
                values: [{
                    label: 'Custom Option 1',
                    value: 'test-value'
                }, {
                    label: 'Custom Option 2',
                    value: 'test-value-2'
                }]
            }, {
                label: "Radio",
                name: "nice-radio-group",
                type: "radio-group"
            }]
        };
        var formBuilder = $(fbEditor).formBuilder(options);


        //getJson
        document.getElementById('getJSON').addEventListener('click', function () {
            alert(formBuilder.actions.getData('json'));
        });

        //getJS
        document.getElementById('getJS').addEventListener('click', function () {
            alert('check console');
            console.log(formBuilder.actions.getData());
        });

        //addField
        var buttons = document.getElementsByClassName('addFieldBtn');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].onclick = function () {
                var field = {
                    type: 'text',
                    class: 'form-control',
                    label: this.dataset.label + ' added at: ' + new Date().getTime()
                };
                var index = this.dataset.index ? Number(this.dataset.index) : undefined;

                formBuilder.actions.addField(field, index);
            };
        }

        //clearField
        document.getElementById('clear-all-fields').onclick = function () {
            formBuilder.actions.clearFields();
        };

        //closeEditor
        document.getElementById('close-editor').onclick = function () {
            formBuilder.actions.closeAllFieldEdit()
        }

        //external save
        document.getElementById("saveData").addEventListener('click', function () {
            console.log(formBuilder.actions.save())
        });

        //template fprm
        const templates = {
            user: [
                {
                    type: "text",
                    label: "Name:",
                    subtype: "text",
                    className: "form-control",
                    name: "text-1475765723950"
                },
                {
                    type: "text",
                    subtype: "email",
                    label: "Email:",
                    className: "form-control",
                    name: "text-1475765724095"
                },
                {
                    type: "text",
                    subtype: "tel",
                    label: "Phone:",
                    className: "form-control",
                    name: "text-1475765724231"
                },
                {
                    type: "textarea",
                    label: "Short Bio:",
                    className: "form-control",
                    name: "textarea-1475765724583"
                }
            ],
            terms: [
                {
                    type: "header",
                    subtype: "h2",
                    label: "Terms &amp; Conditions",
                    className: "header"
                },
                {
                    type: "paragraph",
                    subtype: "p",
                    label:
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in libero quis nibh molestie dapibus. Integer pellentesque massa orci, quis posuere velit fermentum nec. Nullam arcu velit, ornare at urna non, viverra finibus lectus. Curabitur a dui non ipsum maximus faucibus. Quisque a justo purus. Donec volutpat sem vel bibendum pretium. Nulla neque ex, posuere semper urna in, molestie molestie tortor. Maecenas nec arcu sit amet nisl laoreet vestibulum. Cras placerat vulputate maximus. Phasellus ultricies, turpis et efficitur tristique, massa nibh sagittis libero, quis fringilla velit nisl eget augue. Praesent metus nibh, fermentum ut interdum at, lacinia sit amet mauris.",
                    className: "paragraph"
                },
                {
                    type: "checkbox",
                    label: "I agree to the terms",
                    className: "checkbox",
                    name: "checkbox-1475766391803"
                }
            ],
            issue: [
                {
                    type: "text",
                    label: "Issue:",
                    subtype: "text",
                    className: "form-control",
                    name: "text-1475766502491"
                },
                {
                    type: "text",
                    label: "Platform:",
                    subtype: "text",
                    className: "form-control",
                    name: "text-1475766502680"
                },
                {
                    type: "textarea",
                    label: "Steps to Reproduce:",
                    className: "form-control",
                    name: "textarea-1475766579522"
                },
                {
                    type: "file",
                    label: "Screenshot:",
                    className: "form-control",
                    name: "file-1475766594420"
                },
                {
                    type: "select",
                    label: "Assign Developer:",
                    className: "form-control",
                    name: "select-1475766623703",
                    multiple: true,
                    values: [
                        {
                            label: "Adam",
                            value: "option-1",
                            selected: true
                        },
                        {
                            label: "Adrian",
                            value: "option-2",
                            selected: false
                        },
                        {
                            label: "Alexa",
                            value: "option-3",
                            selected: false
                        },
                        {
                            label: "Amy",
                            value: "",
                            selected: false
                        }
                    ]
                }
            ]
        };

        templateSelect.addEventListener("change", function (e) {
            formBuilder.actions.setData(templates[e.target.value]);
        });

    });
</script>

