<section id="search" class="large-5 float-left" ng-app="app">
	<div class="row">

		<!-- Buscador Prático -->
		<form action="<?php bloginfo('siteurl'); ?>" method="GET" name="form" ng-controller="main">
				<span>Buscador prático</span>
				<section class="input-results">
					<input type="text" placeholder="Digite a NCM ou palavra" ng-model="input" ng-change="getncms()" ng-delay="500"  class="input-ncm" name="s">
					<section class="results" ng-show="input">
						<picture ng-show="!ncms">
							<h4>Procurando ...</h4>
							<img src="<?php echo assetsurl; ?>/assets/img/loader.gif">
						</picture>
						<div class="content" ng-show="ncms">
							<h3>Resultado RÁPIDO da pesquisa</h3><hr>
								<a href="{{ncm.link}}" ng-repeat="ncm in ncms">
									<section class="result">
										<h4 ng-bind-html="ncm.title.rendered | unsafe"></h4>
										<p>Leia mais...</p>
									</section>
								</a>
							
							<button type="submit" class="button button-azulh">Visualizar todos</button>
						</div>
						<div class="content" ng-show="vazio">
							<h4>Nada Encontrado!</h4>
						</div>
						</section>
				</section>
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
			<section class="filtros">
				<input type="radio" ng-model="filtro" ng-change="getncms()" ng-value="'ncm'" name="filtro" />
				<label for="ncm"> NCM Comentada</label>
				<input type="radio" ng-model="filtro" ng-change="getncms()"  ng-value="'posts'" name="filtro" />
				<label for="all">Em todo o site</label>
				<input type="radio" ng-model="filtro" ng-change="getncms()"  ng-value="'artigo'" name="filtro" />
				<label for="artigos">Artigos</label>
	    	</section>
		</form>

		<!-- Consulta CNAE-ST -->
		<form action="#" method="#">
			<span>Consulte a CNAE-ST</span>
				<input type="text" placeholder="Digite a CNAE desejada" class="input-ncm" name="ncm">
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
		</form>

		<!-- Importar XML -->
		<form action="#" method="#">
			<span>Importar XML</span>
				<input type="text" placeholder="Informe o nome do XML" class="input-ncm" name="ncm">
				<span>
					<button type="submit" class="button btn-search">Buscar</button>
				</span>
		</form>
	</div>
	<?php get_template_part("templates/confira-cursos") ?>
</section>