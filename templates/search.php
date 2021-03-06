<section id="search" class="large-5 float-right" ng-app="app">

	<div class="row">

		<!-- Buscador Prático -->
		<form name="form" ng-controller="main" ng-submit="submit()"  id="form_ncm">
				<span>Buscador prático</span>
				<section class="filtros">
					<input type="radio" ng-model="filtro" ng-change="getncms()" ng-value="'ncm'" name="filtro" />
					<label for="ncm"> (NCM/CEST) Comentada</label>
					<input type="radio" ng-model="filtro" ng-change="getncms()"  ng-value="'post'" name="filtro" />
					<label for="all">Em todo o site</label>
		    	</section>
				<section class="input-results">
					<input type="text" placeholder="Digite a NCM ou palavra" ng-model="input" ng-change="getncms()" ng-delay="500"  class="input-ncm" name="s" required="">
					<section class="results" ng-show="input">
						<picture ng-show="!ncms">
							<h4>Procurando ...</h4>
							<img src="<?php echo assetsurl; ?>/assets/img/loader.gif">
						</picture>
						<div class="content" ng-show="ncms">
							<h3>Resultado RÁPIDO da pesquisa: {{input}}</h3><hr>
								<a href="{{ncm.url}}" ng-repeat="ncm in ncms">
									<section class="result">
										<h4 ng-bind-html="ncm.title | unsafe"></h4>
										<p>Leia mais...</p>
									</section>
								</a>
								<a href="#" ng-show="!ncms.length">
									<section class="result" style="margin-bottom: 2rem">
										<h4>NCM NÃO CONSTA EM NOSSA BASE DE DADOS</h4>
									</section>
								</a>
							<button type="submit" class="button button-azulh"  ng-hide="!ncms.length" ng-click="clic">Visualizar todos</button>
						</div>
						
						</section>
				</section>
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
			
		</form>

		<!-- Consulta CNAE-ST -->
		<form action="<?php bloginfo('siteurl'); ?>" method="GET" name="form" ng-controller="cnae">
			<span>Consulte a CNAE-ST</span>
				<section class="input-results">
				<input type="hidden" ng-model="filtro" ng-change="getncms()" ng-value="'cnae'" name="filtro" />
					<input type="text" placeholder="digite a CNAE desejada" ng-model="input" ng-change="getcnaes()" ng-delay="500"  class="input-ncm" name="s" required="" ui-mask="/[.,\/#!$%\^&\*;:{}=\-_`~()]/">
					<section class="results" ng-show="input">
						<picture ng-show="!ncms">
							<h4>Procurando ...</h4>
							<img src="<?php echo assetsurl; ?>/assets/img/loader.gif">
						</picture>
						<div class="content" ng-show="ncms">
							<h3>Resultado RÁPIDO da pesquisa</h3><hr>
								<a href="{{ncm.url}}" ng-repeat="ncm in ncms | limitTo: 10">
									<section class="result">
										<h4 ng-bind-html="ncm.title | unsafe"></h4>
										<p>Leia mais...</p>
									</section>
								</a>
								<a href="#" ng-show="!ncms.length">
									<section class="result" style="margin-bottom: 2rem">
										<h4>CNAE CONSULTADA NÃO CONSTA EM NOSSA BASE DE DADOS COM TRATAMENTO DIFERENCIADO OU SUJEITA AO ICMS-ST.</h4>
									</section>
								</a>
							
							<button type="submit" ng-hide="!ncms.length" class="button button-azulh">Visualizar todos</button>
						</div>
						</section>
				</section>
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
		</form>

		<!-- Importar XML -->
		<form action="<?php bloginfo('siteurl'); ?>/xml" method="GET">
			<span>Importar XML</span>
				<input type="text" placeholder="Informe o nome do XML" class="input-ncm" name="arquivo">
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
		</form>
	</div>
	<?php get_template_part("templates/confira-cursos") ?>
</section>
<section id="confira-cursos-mobile"	>
	<a href="<?php bloginfo('siteurl'); ?>/curso">
		<picture>
			<img src="<?php echo assetsurl ?>/assets/img/cursos-icon.png" alt="">
		</picture>
		<span>NOSSOS CURSOS</span>
	</a>
</section>