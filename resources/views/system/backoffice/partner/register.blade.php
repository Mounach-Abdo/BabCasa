@extends('layouts.backoffice.app') 

@section('css')
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" /> 
@stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text">
            <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="80">
        </div>
        <h3>Créer un compte de partenaire</h3> 
        <div class="row">
            <div class="col-md-12">
                <div id="rootwizard" class="m-t-5">
                   <form  action="{{route('partner.register.submit')}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }} 
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm" role="tablist" data-init-reponsive-tabs="dropdownfx">
                        <li class="nav-item">
                            <a class="pointer-e-n active" data-toggle="tab" href="#tab1" data-target="#tab1" role="tab">
                                <i class="fa fa-check tab-icon"></i>
                                <span>Agrément</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab2" data-target="#tab2" role="tab">
                                <i class="fa fa-building tab-icon"></i>
                                <span>Partenaire</span>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="pointer-e-n" data-toggle="tab" href="#tab6" data-target="#tab6" role="tab">
                                <i class="fa fa-address-book tab-icon"></i>
                                <span>Résumé</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane padding-20 sm-no-padding active slide-left" id="tab1">
                            <div class="row row-same-height">
                                <div class="col-md-12">
                                    <div class="card card-default">
                                        <div class="card-body">
                                            <div class="scrollable">
                                                <div class="demo-card-scrollable">
                                                    <h3>
                                                        <span class="semi-bold">With</span> Scroll
                                                    </h3>
                                                    <p>When it comes to digital design, the lines between functionality, aesthetics,
                                                        and psychology are inseparably blurred. Without the constraints of
                                                        the physical world, there’s no natural form to fall back on, and
                                                        every bit of constraint and affordance must be introduced intentionally.
                                                        Good design makes a product useful. A product is bought to be used.
                                                        It has to satisfy certain criteria, not only functional, but also
                                                        psychological and aesthetic. Good design emphasizes the usefulness
                                                        of a product whilst disregarding anything that could possibly detract
                                                        from it. It’s always obvious when design is an afterthought. The
                                                        hallmarks of the engineering-first approach are everywhere: inscrutable
                                                        interfaces, convoluted workflows, user guides the size of The Iliad.
                                                        This was the dominant approach for the first several decades of personal
                                                        computing, and it’s left its mark in the form of software designed
                                                        with its creators in mind, rather than its users.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="checkbox check-success  ">
                                        <input type="checkbox" value="1" id="agreement" name="agreement">
                                        <label for="agreement">J&apos;accepte</label>
                                        @if ($errors->has('agreement'))
                                        <small class='error' for='agreement'>{{ $errors->first('agreement') }}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab2">
                            <div class="row row-same-height">
                                <div class="col-md-12">
                                    <div class="padding-30 sm-padding-5">
                                        <p>Informations de base</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="company_name">Nom de la compagnie</label>
                                                        <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}" class="form-control">
                                                        @if ($errors->has('company_name'))
                                                        <label class='error' for='company_name'>{{ $errors->first('company_name') }}</label>
                                                        @endif
                                                    </div>
                                                </div> 
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="name">Nom</label>
                                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                                                        @if ($errors->has('name'))
                                                        <label class='error' for='name'>{{ $errors->first('name') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
                                                        @if ($errors->has('email'))
                                                        <label class='error' for='email'>{{ $errors->first('email') }}</label>
                                                        @endif
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="password">Mot de passe</label>
                                                        <input type="password" id="password" name="password" class="form-control">
                                                        @if ($errors->has('password'))
                                                        <label class='error' for='password'>{{ $errors->first('password') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="password_confirmation">Mot de passe confirmation</label>
                                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                        @if ($errors->has('password_confirmation'))
                                                        <label class='error' for='password_confirmation'>{{ $errors->first('password_confirmation') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-8">
                                                    <div class="form-group form-group-default required">
                                                        <label for="about">À propos</label>
                                                        <textarea type="text" id="about" name="about"  class="form-control" rows="15">{{ old('about') }}</textarea>
                                                        @if ($errors->has('about'))
                                                        <label class='error' for='about'>{{ $errors->first('about') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-group-default">
                                                        <img src="{{ asset('img/img_placeholder.png') }}" id="image_preview_partner" alt="" srcset="" width="250">
                                                        <label for="path_partner" class="choose_photo">
                                                            <span>
                                                                <i class="fa fa-image"></i> Choisir une photo</span>
                                                         <label class='error' for='path'>
                                                                @if ($errors->has('path'))
                                                                    {{ $errors->first('path') }}
                                                                @endif
                                                        </label> 
                                                        </label>
                                                        <input type="file" id="path_partner" name="path" class="form-control hide">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix"> 
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label for="trade_registry">Registre du commerce</label>
                                                        <input type="text" id="trade_registry" name="trade_registry" value="{{ old('trade_registry') }}" class="form-control">
                                                        @if ($errors->has('trade_registry'))
                                                        <label class='error' for='trade_registry'>{{ $errors->first('trade_registry') }}</label>
                                                        @endif
                                                    </div>
                                                </div>  
                                            </div>
                                            <div class="row clearfix"> 
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="ice">ICE</label>
                                                        <input type="text" id="ice" name="ice" value="{{ old('ice') }}" class="form-control">
                                                        @if ($errors->has('ice'))
                                                        <label class='error' for='ice'>{{ $errors->first('ice') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default required">
                                                        <label for="taxe_id">Taxe id</label>
                                                        <input type="text" id="taxe_id" name="taxe_id" value="{{ old('taxe_id') }}" class="form-control">
                                                        @if ($errors->has('taxe_id'))
                                                        <label class='error' for='taxe_id'>{{ $errors->first('taxe_id') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  Information address -->
                                        <br>
                                        <p> Adresse </p>
                                        <div class="form-group-attached">
                                            <div class="form-group form-group-default required">
                                                <label for="address">Adresse</label>
                                                <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control" placeholder="">
                                                @if ($errors->has('address'))
                                                        <label class='error' for='address'>{{ $errors->first('address') }}</label>
                                                        @endif
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label for="address2">Deuxième ligne</label>
                                                <input type="text" id="address2" name="address_two" value="{{ old('address_two') }}" class="form-control" placeholder="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                     <div class="form-group form-group-default">
                                                        <label>Country</label>
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="country_id" data-init-plugin="cs-select">
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->id}}" >{{$country->name}}</option>
                                                                @endforeach 
                                                    </select> 
                                                    <label class='error' for='country'>
                                                            @if ($errors->has('country'))
                                                                {{ $errors->first('country') }}
                                                            @endif
                                                    </label> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="city">Ville</label>
                                                        <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control">
                                                        @if ($errors->has('city'))
                                                        <label class='error' for='city'>{{ $errors->first('city') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-9">
                                                    <div class="form-group form-group-default required">
                                                        <label for="full_name">Nom complet</label>
                                                        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" class="form-control" placeholder="">
                                                        @if ($errors->has('full_name'))
                                                        <label class='error' for='full_name'>{{ $errors->first('full_name') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group form-group-default">
                                                        <label for="zip_code">Code postal</label>
                                                        <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" class="form-control"  maxlength="6" >
                                                        @if ($errors->has('zip_code'))
                                                        <label class='error' for='zip_code'>{{ $errors->first('zip_code') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Phone information -->
                                        <br>
                                        <p>Téléphone</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-md-6">
                                                     <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}" >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                    <div class="form-input-group flex-1">
                                                        <label>Phone one</label>
                                                        <input type="text" id="phone" name="numbers[]" value="{{ old('numbers.0') }}" class="form-control">
                                                        @if ($errors->has('numbers.0'))
                                                        <label class='error' for='phone'>{{ $errors->first('numbers.0') }}</label>
                                                        @endif
                                                    </div>
                                            </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}" >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                    <div class="form-input-group flex-1">
                                                        <label>Phone one</label>
                                                        <input type="text" id="phone" name="numbers[]" value="{{ old('numbers.1') }}" class="form-control">
                                                        @if ($errors->has('numbers.1'))
                                                        <label class='error' for='phone'>{{ $errors->first('numbers.1') }}</label>
                                                        @endif
                                                    </div>
                                            </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-12">
                                                   <div class="form-group form-group-default input-group">
                                                    <div class="cs-input-group-addon input-group-addon d-flex">
                                                        <select class="cs-select cs-skin-slide cs-transparent" name="code_country[]" data-init-plugin="cs-select">
                                                                @foreach($countries as $country)
                                                                <option value="{{$country->id}}" >{{$country->code}}</option>
                                                                    @endforeach 
                                                        </select>
                                                    </div>
                                                    <div class="form-input-group flex-1">
                                                        <label>Fax</label>
                                                        <input type="text" id="phone" name="fax_number" value="{{ old('fax_number') }}" class="form-control">
                                                        @if ($errors->has('fax_number'))
                                                        <label class='error' for='phone'>{{ $errors->first('fax_number') }}</label>
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab6">
                            <h3>Partenaire Information</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Nom de la compagnie:</h5>
                                    <p>Nom de la compagnie </p>

                                    <h5 class="p-t-15">Ice:</h5>
                                    <p>Nom de la compagnie</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Registre du commerce:</h5>
                                    <p>Registre du commerce </p>

                                    <h5 class="p-t-15"> Taxe ID: </h5>
                                    <p>125 254 245 257 </p>
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('img/profiles/b2x.jpg') }}" alt="" srcset="" height="200px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Nom:</h5>
                                    <p>Lorem, ipsum dolor</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Email:</h5>
                                    <p>Email@gmail.com</p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>À propos:</h5>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas optio odio, magnam iste
                                        impedit deserunt eaque nostrum libero dicta ullam officia corrupti! Velit quia explicabo
                                        repellendus iusto praesentium neque adipisci?magnam iste impedit deserunt eaque nostrum
                                        libero dicta ullam Velit quia explicabo repellendus iusto praesentium neque adipisci?
                                    </p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Adresse:</h5>
                                    <p>77 Rue de Verdun</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Pays:</h5>
                                    <p>France</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Ville:</h5>
                                    <p>MONTÉLIMAR</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Nom complet:</h5>
                                    <p>Ila A Courcelle</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Code postal:</h5>
                                    <p>26200</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Téléphone N1:</h5>
                                    <p>(+212) 04.33.00.97070 /p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Téléphone N2:</h5>
                                    <p>(+212) 04.33.00.97070</p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Fax:</h5>
                                    <p>04.33.00.97070</p>
                                </div>
                            </div> 
                        </div>
                        <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                            <ul class="pager wizard no-style">
                                <li class="next">
                                    <button class="btn btn-primary btn-cons btn-animated from-left fa fa-building pull-right" type="button" id="btn_next" disabled>
                                        <span>Suivant</span>
                                    </button>
                                </li>
                                <li class="next finish hidden">
                                    <button class="btn btn-primary btn-cons btn-animated from-left fa fa-cog pull-right" type="submit">
                                        <span>Terminer</span>
                                    </button>
                                </li>
                                <li class="previous first hidden">
                                    <button class="btn btn-default btn-cons btn-animated from-left fa fa-cog pull-right" type="button">
                                        <span>Premier</span>
                                    </button>
                                </li>
                                <li class="previous">
                                    <button class="btn btn-default btn-cons pull-right" type="button">
                                        <span>Précédent</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop @section('script')
<script src="{{ asset('plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('plugins/classie/classie.js') }}"></script>
<script src="{{ asset('js/form_wizard.js') }} " type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $("#path_partner").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_partner");
            showImage(_this, image_preview);
        });

        $("#path_partner_account").on("change", function () {
            var _this = this;
            var image_preview = $("#image_preview_partner_account");
            showImage(_this, image_preview);
        });

        function showImage(_this, image_preview) {
            var files = !!_this.files ? _this.files : [];
            if (!files.length || !window.FileReader) return;

            if (/^image/.test(files[0].type)) {
                var ReaderObj = new FileReader();
                ReaderObj.readAsDataURL(files[0]);
                ReaderObj.onloadend = function () {
                    image_preview.attr('src', this.result);
                }
            } else {
                alert("Upload an image");
            }
        }

        
        $('#btn_next').css("cursor", "not-allowed"); 
        $("#agreement").on("change", function () { 
            var check = $(this).prop('checked');
            if(check){ 
                $('#btn_next').prop('disabled', false);
                $('#btn_next').css("cursor", "pointer");
            }else{
                $('#btn_next').prop('disabled', true); 
                $('#btn_next').css("cursor", "not-allowed");
            }
        });
         
    });

</script>
@stop
