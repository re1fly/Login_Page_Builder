<div class=" wizard-main">
    {{--	<div class="container">--}}
    <div class="row">
        <div class="col-lg-5 login-sec">
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
                               onchange='changeLogo(this)'
                        >

                        <label for="bgImageSetup">Add a Background Image *</label>
                        <input id="bgImageSetup" name="bgImageSetup" type="file" class="form-control">

                        <div class=" container">
                            <div class="row">
                                <div class="col-sm">
                                    <label for="primaryColourSetup">Primary Colour</label>
                                    <button id="primaryColourSetup" class="form-control primaryColourSetup" value="rgb(255, 128, 0)">
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <label for="secondaryColourSetup">Secondary Colour</label>
                                    <button id="secondaryColourSetup" class="form-control" value="rgb(255, 128, 0)">
                                    </button>
                                </div>
                                <div class="col-sm">
                                    <label for="textColourSetup">Text Colour</label>
                                    <button id="textColourSetup" class="form-control" value="rgb(255, 128, 0)">
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
                        <div class="container">
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
                        <button type="button" class="btn setup-form" data-toggle="modal"
                                data-target="#exampleModalCenter">
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
                        <div id="redirectTextPage">
                            <label for="titleRedirectSetup">Change The Title</label>
                            <input id="titleRedirectSetup" name="titleRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);' required>

                            <label for="textRedirectSetup">Change The Text</label>
                            <input id="textRedirectSetup" name="textRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);'>

                            <label for="linkRedirectSetup">Add A Button Link</label>
                            <input id="linkRedirectSetup" name="linkRedirectSetup" type="text" class="form-control"
                                   placeholder="http://example.com" onkeyup='saveValue(this);'>

                            <label for="buttonRedirectSetup">Change Button Text</label>
                            <input id="buttonRedirectSetup" name="buttonRedirectSetup" type="text" class="form-control"
                                   onkeyup='saveValue(this);'>
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
        <div class="col-lg-7 banner-sec">
            <div class="card" id="bgImage"
                 style="height: 940px;border-radius: 0; background-image: url({{asset("images/bg_white.jpg")}})">
                <div class="card-body mx-auto primary-colour">
                    <img src="{{asset("images/gx_logo_white.png")}}" class="logo-rendered" id="logo">
                    @include('wifi_setup.form_rendered')
                    {{--@include('wifi_setup.redirect_rendered')--}}
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
</div>
{{--</div>--}}
