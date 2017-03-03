<div id="bgImage" class="container-fluid"> <!--DIV used to apply a global background to the footer-->
	<footer class="container">


		<section class="row caemSection"> <!--First section of the footer, containing informations about CAEM, Logo, and Social Networks links-->


			<address class="col-md-5 col-sm-6"> <!--Informations about CAEM, adress, phone number and mail-->

				<div class="caemInfos col-md-12">
					<img class="col-md-2" src="{{ asset('images/position_icon-05.svg')}}" />
					<p class="col-md-10" id="address"><a href="/contact">13 A avenue Ile-de-France 25 000 Besançon</a></p>
				</div>

				<div class="caemInfos col-md-12">
					<img class="col-md-2" src="{{ asset('images/phone_icon-05.svg')}}" />
					<p class="col-md-10" id="phone">03.81.51.21.36</p>
				</div>

				<div class="caemInfos col-md-12">
					<img class="col-md-2" src="{{ asset('images/mail_icon-05.svg')}}" />
					<p class="col-md-10" id="email"><a href="mailto:&#097;&#099;&#099;&#117;&#101;&#105;&#108;&#064;&#099;&#097;&#101;&#109;&#045;&#098;&#101;&#115;&#097;&#110;ç&#111;&#110;&#046;&#102;&#114;">&#097;&#099;&#099;&#117;&#101;&#105;&#108;&#064;&#099;&#097;&#101;&#109;&#045;&#098;&#101;&#115;&#097;&#110;ç&#111;&#110;&#046;&#102;&#114;</a></p>
				</div>

			</address>


			<a href="/"><img class="col-md-2 hidden-sm hidden-xs center-block" src="{{ asset('images/logo_CAEM.svg')}}" alt="logo CAEM"></a> <!--Logo of CAEM-->


			<div class="socialNetwork col-md-5 col-sm-6"> <!--Links to social networks-->

				<p>Suivez-nous sur :</p>

				<div>
					<a href="https://www.facebook.com/caem.besancon"><img src="{{ asset('images/facebook_logo.svg')}}" /></a>
					<a href="https://www.twitter.com/caembesancon"><img src="{{ asset('images/twitter_logo.svg')}}" /></a>
					<a href="https://www.youtube.com/channel/UC0ixrwCaOvNLfnfDv8ShaOA"><img src="{{ asset('images/youtube_logo.svg')}}" /></a>
				</div>

			</div>


		</section>


		<nav class="row"> <!--Footer "navbar" to some sections of the website, "L'association", "Credits" and "Mentions légales"-->

		  <ul class="list-inline">
			<li class="col-md-4 col-sm-4 col-xs-12 text-center"><a href="/association">L'association</a></li>
			<li class="col-md-4 col-sm-4 col-xs-12 text-center"><a href="/credits">Crédits</a></li>
			<li class="col-md-4 col-sm-4 col-xs-12 text-center"><a href="/mentions_legales">Mentions légales</a></li>
		  </ul>

		</nav>


		<section class="row banner"> <!--Footer section to display partnership logotypes-->

			<div class="col-md-3 col-sm-6 col-xs-6">
				<a href="http://www.besancon.fr/"><img class="img-responsive" src="{{ asset('images/besancon_logo.png')}}" alt="Logo ville de Besançon" /></a>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-6">
				<a href="http://www.grandbesancon.fr/"><img class="img-responsive" src="{{ asset('images/grandbesancon_logo.png')}}" alt="Logo grand Besançon" /></a>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-6">
				<a href="https://www.doubs.fr/"><img class="img-responsive" src="{{ asset('images/doubs_logo.png')}}" alt="Logo Doubs" /></a>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-6">
				<a href="https://www.creditmutuel.fr/groupe/fr/index.html"><img class="img-responsive" src="{{ asset('images/creditmutuel_logo.png')}}" alt="Logo Crédit Mutuelle" /></a>
			</div>

		</section>


	</footer>
</div>
