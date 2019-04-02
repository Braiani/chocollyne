<div class="container">
    <div class="row">
        {{--<div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="footer-heading mb-4">Navegação</h3>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Sell online</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Shopping cart</a></li>
                        <li><a href="#">Store builder</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Mobile commerce</a></li>
                        <li><a href="#">Dropshipping</a></li>
                        <li><a href="#">Website development</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <ul class="list-unstyled">
                        <li><a href="#">Point of sale</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Software</a></li>
                    </ul>
                </div>
            </div>
        </div>--}}
        <div class="col-md-4 mb-4 mb-lg-0">
            {{--<h3 class="footer-heading mb-4">Promoção</h3>
            <a href="#" class="block-6">
                <img src="{{asset('images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
                <h3 class="font-weight-light  mb-0">Finding Your Perfect Shoes</h3>
                <p>Promo from nuary 15 &mdash; 25, 2019</p>
            </a>--}}
        </div>
        <div class="col-md-4">
            <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">Informações de contato</h3>
                <ul class="list-unstyled">
                    <li class="address">{{ setting('site.endereco', 'Não disponível') }}</li>
                    <li class="phone"><a href="tel://55{{ setting('site.telefone') }}">{{ setting('site.telefone') }}</a></li>
                    <li class="email"><a href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></li>
                </ul>
            </div>

            {{--<div class="block-7">
                <form action="#" method="post">
                    <label for="email_subscribe" class="footer-heading">Inscreva-se</label>
                    <div class="form-group">
                        <input type="text" class="form-control py-4" id="email_subscribe" placeholder="E-mail">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>
                </form>
            </div>--}}
        </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                {{-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
                <script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a
                        href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
        <div class="col-md-12">
            <p>
                Direitos autorais &copy;
                <script>document.write(new Date().getFullYear());</script>
                Todos os direitos reservados | Este site foi editado com
                <i class="icon-heart" aria-hidden="true"></i> por <a href="https://brtechsistemas.com.br"
                                                                     target="_blank" class="text-primary">BR tech
                    Sistemas</a>
            </p>
        </div>
    </div>
</div>