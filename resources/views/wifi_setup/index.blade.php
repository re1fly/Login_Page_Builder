<!DOCTYPE html>
<html lang="en">
<head>
    <title> GlobalXtreme Wifi Setup</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="html.design">
    <!-- description -->
    <meta name="description" content="Wizard Form with Validation - Responsive">
    <link rel="shortcut icon" href="images/favicon.ico">
    <!-- Bootstrap CSS -->
{{--    <link rel="stylesheet" href="css/bootstrap.min.css">--}}
<!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d3ff108a08.js" crossorigin="anonymous"></script>
    <!-- Reset CSS -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive  CSS -->
    <link rel="stylesheet" href="css/responsive.css">

    {{-- Color Picker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css"
          rel="stylesheet">

    <!-- Font Picker -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset("fontpicker/jquery.fontselect.css")}}>

    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
@include('wifi_setup.header')
@include('wifi_setup.content')
@include('wifi_setup.footer')


<!-- jquery latest version -->
<script src="js/jquery.min.js"></script>

<!-- popper.min.js -->
<script src="js/popper.min.js"></script>

<!-- bootstrap js -->
<script src="js/bootstrap.min.js"></script>

<!-- jquery.steps js -->
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="js/jquery.steps.js"></script>

<!-- particles js -->
<script src="js/particles.js"></script>

<!-- Color Picker js -->
<script src="//cdn.rawgit.com/twbs/bootstrap/v4.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.js"></script>

<!-- Font Picker js -->
<script rel="stylesheet" src={{asset("fontpicker/jquery.fontselect.js")}}></script>


<script>
    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            // if (newIndex === 3 && Number($("#age").val()) < 18) {
            //     return false;
            // }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        // onStepChanged: function (event, currentIndex, priorIndex) {
        //     // Used to skip the "Warning" step if the user is old enough.
        //     if (currentIndex === 2 && Number($("#age").val()) >= 18) {
        //         form.steps("next");
        //     }
        //     // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
        //     if (currentIndex === 2 && priorIndex === 3) {
        //         form.steps("previous");
        //     }
        // },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
            //branding
            var companyName = $('#companyName').val();
            var logo = $('#logoSetup').val();
            var bgImage = $('#bgImageSetup').val();
            var PrimaryColour = $('#primaryColourSetup').css( "background-color" );
            var SecondaryColour = $('#secondaryColourSetup').css( "background-color" );
            var TextColour = $('#textColourSetup').css( "background-color" );
            var fontPicker = $('#fontPickerSetup').css('font-family');

            //login
            var titleLogin = $('#titleSetup').val();
            var descLogin = $('#descSetup').val();
            var facebookMethod = !$('#btnFacebook').is(":hidden");
            var twitterMethod = !$('#btnTwitter').is(":hidden");
            var googleMethod = !$('#btnGoogle').is(":hidden");
            var formMethod = !$('#formView').is(":hidden");
            var inputForm = $('#inputForm').val();

            //redirect
            var titleRedirect = $('#titleRedirectSetup').val();
            var descRedirect = $('#textRedirectSetup').val();
            var linkRedirect = $('#linkRedirectSetup').val();
            var buttonRedirect = $('#buttonRedirectSetup').val();
        }
    });
    //     .validate({
    //     errorPlacement: function errorPlacement(error, element) {
    //         element.before(error);
    //     },
    //     rules: {
    //         backgroundImage: {
    //             equalTo: "#logo"
    //         }
    //     }
    // });

</script>

<script>
    $(function () {
        // Basic instantiation:

        // Example using an event, to change the color of the .jumbotron background:
        $('#primaryColourSetup').colorpicker().on('changeColor', function () {
            event.preventDefault();
            $('.primary-colour').css('background-color', $(this).colorpicker('getValue', '#ffffff'));
            $('#primaryColourSetup').css('background-color', $(this).colorpicker('getValue', '#ffffff'));

            console.log($('#primaryColourSetup').css( "background-color" ));
        });

        $('#secondaryColourSetup').colorpicker().on('changeColor', function () {
            event.preventDefault();
            $('.secondary-colour').css('background-color', $(this).colorpicker('getValue', '#ffffff'));
            $('#secondaryColourSetup').css('background-color', $(this).colorpicker('getValue', '#ffffff'));
            $('.circle').css('color', $(this).colorpicker('getValue', '#ffffff'));
        });

        // Example using an event, to change the color of the .jumbotron background:
        $('#textColourSetup').colorpicker().on('changeColor', function () {
            $('#textColourSetup').css('background-color', $(this).colorpicker('getValue', '#ffffff'));
            $('.text-colour-title').css('color', $(this).colorpicker('getValue', '#ffffff'));
            $('.text-colour-desc').css('color', $(this).colorpicker('getValue', '#ffffff'));
            $('#redirectTitle').css('color', $(this).colorpicker('getValue', '#ffffff'));
            $('#redirectDesc').css('color', $(this).colorpicker('getValue', '#ffffff'));

        });

    });

    $(function () {
        $('#fontPickerSetup').fontselect().change(function () {

            // replace + signs with spaces for css
            var font = $(this).val().replace(/\+/g, ' ');

            // split font into family and weight
            font = font.split(':');

            // set family on paragraphs
            $('.text-colour-title').css('font-family', font[0]);
            $('.text-colour-desc').css('font-family', font[0]);
            $('#redirectTitle').css('font-family', font[0]);
            $('#redirectDesc').css('font-family', font[0]);

        });
    });


    $('#bgImageSetup').on('change', function (evt) {
        var file = evt.target.files[0];
        if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = (function (file) {
                return function (e) {
                    $('#bgImage').css({
                        'background-image': 'url(' + e.target.result + ')'
                    });
                }
            })(file);
        }

        reader.readAsDataURL(file);
    })

    $.event.special.inputchange = {
        setup: function () {
            var self = this, val;
            $.data(this, 'timer', window.setInterval(function () {
                val = self.value;
                if ($.data(self, 'cache') != val) {
                    $.data(self, 'cache', val);
                    $(self).trigger('inputchange');
                }
            }, 20));
        },
        teardown: function () {
            window.clearInterval($.data(this, 'timer'));
        },
        add: function () {
            $.data(this, 'cache', this.value);
        }
    };

    //input text onchange
    $('#titleSetup').on('inputchange', function () {
        $('#title').text(this.value);
    });

    $('#descSetup').on('inputchange', function () {
        $('#desc').text(this.value);
    });

    $('#titleRedirectSetup').on('inputchange', function () {
        $('#redirectTitle').text(this.value);
    });

    $('#textRedirectSetup').on('inputchange', function () {
        $('#redirectDesc').text(this.value);
    });
    $('#buttonRedirectSetup').on('inputchange', function () {
        $('#redirect-button').text(this.value);
    });


    $(document).ready(function () {
        //toggle content button
        $("#facebookMethod").click(function () {
            $("#btnFacebook").toggle();
        });
        $("#googleMethod").click(function () {
            $("#btnGoogle").toggle();
        });
        $("#twitterMethod").click(function () {
            $("#btnTwitter").toggle();
        });
        $("#formMethod").click(function () {
            $("#formView").toggle();
        });



        //setup url redirect
        $('#linkRedirectSetup').on('keypress', function () {
            setTimeout($.proxy(function () {
                $('#redirect-url').attr('href', this.value);
            }, this), 10)
        });
        $("#buttonRedirectSetup").keyup(function () {
            if ($(this).val() === "") {
                $("#redirect-button").hide();
            } else {
                $("#redirect-button").show();
            }
        });

    });

    //get value in localstorage
    document.getElementById("companyName").value = getSavedValue("companyName");
    document.getElementById("titleSetup").value = getSavedValue("titleSetup");
    document.getElementById("descSetup").value = getSavedValue("descSetup");
    document.getElementById("titleRedirectSetup").value = getSavedValue("titleRedirectSetup");
    document.getElementById("textRedirectSetup").value = getSavedValue("textRedirectSetup");
    document.getElementById("linkRedirectSetup").value = getSavedValue("linkRedirectSetup");
    document.getElementById("buttonRedirectSetup").value = getSavedValue("buttonRedirectSetup");

    //getValueImage
    var imageLogo = getLogo();
    document.getElementById('logo').src = getSavedValue('imageLogo');
    document.getElementById('logoSetup').readAsBinaryString = getSavedValue('imageLogo');




    //set value
    function saveValue(e) {
        var id = e.id;  // get the sender's id to save it .
        var val = e.value; // get the value.
        localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
    }

    function getSavedValue(valueInput) {
        if (!localStorage.getItem(valueInput)) {
            return "";// You can change this to your defualt value.
        }
        return localStorage.getItem(valueInput);
    }

    //imagebase64
    function saveLogo(e) {
        var file = e.files[0];
        var reader = new FileReader()
        reader.onload = function() {
            localStorage.setItem('imageLogo', reader.result);
        }
        reader.readAsDataURL(file);
    }
    function changeLogo(e){
        document.getElementById('logo').src = window.URL.createObjectURL(e.files[0])
        saveLogo(e);
    }

    function getLogo() {
        var base64 = localStorage.getItem('imageLogo');
        var base64Parts = base64.split(",");
        var fileFormat = base64Parts[0].split(";")[1];
        var fileContent = base64Parts[1];
        var file = new File([fileContent], "file name here", {type: fileFormat});
        return file;
    }

</script>

</body>
</html>
