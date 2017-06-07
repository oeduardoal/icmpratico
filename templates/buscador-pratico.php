<section id="procurando-algo">
	<h4>ESTÁ PROCURANDO POR ALGO?</h4>
	<button class="button" id="toggle-search" data-toggle="search"><i class="fa fa-search"></i></button>
</section>

<section id="search" class="row expanded toggle-hide" ng-app="app" data-dropdow>
	<div class="row">

		<!-- Buscador Prático -->
		<form name="form" ng-controller="main" ng-submit="submit()"  id="form_ncm" class="large-4 columns">
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

		<form action="<?php bloginfo('siteurl'); ?>" method="GET" name="form" class="large-4 columns"   ng-controller="cnae" style="margin-top: 15px;">
			<span>Consulte a CNAE-ST</span>
				<section class="input-results">
				<input type="hidden" ng-model="filtro" ng-change="getncms()" ng-value="'cnae'" name="filtro" />
					<input type="text" placeholder="digite a CNAE desejada" ng-model="input" ng-change="getcnaes()" ng-delay="500"  class="input-ncm" name="s" required="">
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
		<form action="<?php bloginfo('siteurl'); ?>/xml" method="GET" class="large-4 columns" style="margin-top: 15px">
			<span>Importar XML</span>
				<input type="text" placeholder="Informe o nome do XML" class="input-ncm" name="arquivo">
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
		</form>
	</div>
</section>