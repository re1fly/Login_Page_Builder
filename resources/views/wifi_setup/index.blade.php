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

    {{--    Color Picker--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.css"
          rel="stylesheet">

    <!-- Font Picker -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset("fontpicker/jquery.fontselect.css")}}>

    {{--    bootstrap--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
@include('wifi_setup.header')

<div class=" wizard-main">
    {{--	<div class="container">--}}
    <div class="row">
        <div class="col-lg-4 login-sec">
            <div class="login-sec-bg">
                <h2 class="text-center">Make Your Own Login Page</h2>
                <form id="example-advanced-form" action="#" type="POST" enctype="multipart/form-data"
                      style="display: none;">
                    <h3>Branding</h3>
                    <fieldset class="form-input">
                        <h4>Setup Your Branding</h4>
                        <label for="companyName">Your Company Name</label>
                        <input id="companyName" name="companyName" type="text" class="form-control"
                               onkeyup='saveValue(this);'>

                        <label for="logo">Add A Logo *</label>
                        <input class="form-control" id="logoSetup" name="logoSetup" type="file" accept="image/*"
                               onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])"
                               onkeyup='saveValue(this);'>

                        <label for="bgImageSetup">Add a Background Image *</label>
                        <input id="bgImageSetup" name="bgImageSetup" type="file" class="form-control">

                        <div class=" container">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="primaryColourSetup">Primary Colour</label>
                                    <button id="primaryColourSetup" class="form-control" value="rgb(255, 128, 0)"
                                            style="background-color: black">
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <label for="secondaryColourSetup">Secondary Colour</label>
                                    <button id="secondaryColourSetup" class="form-control" value="rgb(255, 128, 0)">
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <label for="textColourSetup">Text Colour</label>
                                    <button id="textColourSetup" class="form-control" value="rgb(255, 128, 0)"
                                            style="background-color: #ABABAB">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <label for="fontPickerSetup">Font Select</label><br>
                        <input id="fontPickerSetup" class="form-control" type="text">

                    </fieldset>

                    <h3>Login</h3>
                    <fieldset class="form-input">
                        <h4>Setup Login</h4>

                        <label for="titleSetup">Change The Title</label>
                        <input id="titleSetup" name="titleSetup" type="text" class="form-control"
                               onkeyup='saveValue(this);'>
                        <label for="descSetup">Change The Text</label>
                        <input id="descSetup" name="desc" type="text" class="form-control" onkeyup='saveValue(this);'>

                        <label for="LoginMethods">Setup Login Methods</label>
                        <div class=" container">
                            <div class="row">
                                <div class="col-sm">
                                    <button id="facebookMethod" class="form-control">
                                        <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button id="twitterMethod" class="form-control">
                                        <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button id="googleMethod" class="form-control">
                                        <i class="fa fa-google fa-2x" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button id="formMethod" class="form-control">
                                        <i class="fab fa-wpforms fa-2x" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <br>
                        <label for="setupForm">Setup Login Methods</label><br>
                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter"
                                style="background-color: black; color: #F9C900">
                            <i class="fab fa-wpforms"></i> Setup Your Form on Login Page
                        </button>

                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        @include('wifi_setup.form')
                                    </div>

                                </div>
                            </div>
                        </div>
                        <br><br>

                        {{--<label for="age">Age (The warning step will show up if age is less than 18) *</label>
                        <input id="age" name="age" type="text" class="form-control number">
                        <p>(*) Mandatory</p>--}}
                    </fieldset>

                    <h3>Redirect</h3>
                    <fieldset class="form-input">
                        <h4>Setup Redirect After Login</h4>
                        <label for="RedirectMethods">Select Redirect Methods</label>
                        <div class=" container">
                            <div class="row">
                                <div class="col-sm">
                                    <button id="textMethod" class="form-control">
                                        <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>

                                    </button>
                                </div>
                                <div class="col-sm">
                                    <button id="urlMethod" class="form-control">
                                        <i class="fa fa-link fa-2x" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="redirectTextPage" style="margin-top: 50px">
                            <label for="titleRedirectSetup">Change The Title</label>
                            <input id="titleRedirectSetup" name="titleRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);'>

                            <label for="textRedirectSetup">Change The Text</label>
                            <input id="textRedirectSetup" name="textRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);'>

                            <label for="linkRedirectSetup">Add A Button Link</label>
                            <input id="linkRedirectSetup" name="linkRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);'>

                            <label for="buttonRedirectSetup">Change Button Text</label>
                            <input id="buttonRedirectSetup" name="buttonRedirectSetup" type="text" class="form-control"
                                   placeholder="http://example.com" onkeyup='saveValue(this);'>
                        </div>

                        <div id="redirectUrlPage" style="margin-top: 50px; display:none;">
                            <label for="urlRedirectSetup">Enter Custom Url </label>
                            <input id="urlRedirectSetup" name="urlRedirectSetup" placeholder="http://example.com"
                                   type="text" class="form-control" onkeyup='saveValue(this);'>

                        </div>

                    </fieldset>

                    <h3>Finish</h3>
                    <fieldset class="form-input">
                        <h4>Submit Login Page</h4>

                        <input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label
                            for="acceptTerms-2">Are u want to submitting your design?</label>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-lg-8 banner-sec">
            <div class="card"
                 style="height: 940px;border-radius: 0; background-image: url({{asset("images/bg_white.jpg")}})"
                 id="bgImage">
                <div class="card-body mx-auto primary-colour"
                     style="width: 480px; display: block; border-radius: 5px;background-color: black; margin-top: 2%; margin-bottom: 2%">
                    <img src={{asset("images/gx_logo_white.png")}} class="centered" id="logo" src="" style="max-width: 250px; max-height: 60px; display: block; margin-left: auto;
                margin-right: auto; margin-top: 5%">
{{--                    @include('wifi_setup.form_rendered')--}}
                                        @include('wifi_setup.redirect_rendered')


                </div>
            </div>
            {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                 </ol>
                 <div class="carousel-inner" role="listbox">
                     <div class="carousel-item active">
                         <img class="d-block img-fluid" src="images/slider-01.jpg" alt="First slide">
                         <div class="carousel-caption d-none d-md-block">
                             <div class="banner-text">
                                 <h2>This is Heaven</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <img class="d-block img-fluid" src="images/slider-02.jpg" alt="First slide">
                         <div class="carousel-caption d-none d-md-block">
                             <div class="banner-text">
                                 <h2>This is Heaven</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                             </div>
                         </div>
                     </div>
                     <div class="carousel-item">
                         <img class="d-block img-fluid" src="images/slider-03.jpg" alt="First slide">
                         <div class="carousel-caption d-none d-md-block">
                             <div class="banner-text">
                                 <h2>This is Heaven</h2>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>--}}
        </div>
    </div>
    @include('wifi_setup.footer')
</div>
{{--</div>--}}

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
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.js"></script>

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

    //toggle content button
    $(document).ready(function () {

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
        $("#textMethod").click(function () {
            $("#renderRedirectPage").toggle();
        });

        //custom redirect
        $('#textMethod').click(function () {
            $('#redirectTextPage').slideToggle('slow');
        });
        $("#urlMethod").click(function () {
            $("#redirectUrlPage").toggle('slow');
        });

        //setup url redirect
        $('#linkRedirectSetup').on('keypress', function () {
            setTimeout($.proxy(function () {
                $('#redirect-url').attr('href', this.value);
            }, this), 10)
        });

    });

    //save value in localstorage
    document.getElementById("companyName").value = getSavedValue("companyName");
    document.getElementById("titleSetup").value = getSavedValue("titleSetup");
    document.getElementById("descSetup").value = getSavedValue("descSetup");
    document.getElementById("titleRedirectSetup").value = getSavedValue("titleRedirectSetup");
    document.getElementById("textRedirectSetup").value = getSavedValue("textRedirectSetup");
    document.getElementById("linkRedirectSetup").value = getSavedValue("linkRedirectSetup");
    document.getElementById("buttonRedirectSetup").value = getSavedValue("buttonRedirectSetup");


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


</script>

</body>
</html>
