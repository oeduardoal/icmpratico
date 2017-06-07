
		<?php $numero_da_ncm = get_post_meta(get_the_ID(), 'numero_da_ncm')[0]; ?>

			<div class="reveal" id="cests_modal" data-reveal  data-animation-in="fade-in" data-animation-out="fade-out">
				 <table class="hover cests_table">
				  <thead>
				    <tr class="head-table">
				      <th>ITEM</th>
				      <th>CEST</th>
				      <th>SEGMENTO</th>
				      <th>DESCRIÇÃO</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach(getCests($numero_da_ncm) as $a): ?>
				  	<tr>
				      <td><?php the_field('item', $a->ID); ?></td>
				      <td><?php the_field('cest', $a->ID); ?></td>
				      <td><?php $category = get_the_category($a->ID);foreach($category as $cat): echo $cat->name; endforeach;?></td>
				      <td><?php the_field('descricao_cest', $a->ID); ?></td>
				    </tr>
				<?php endforeach; ?>
				  </tbody>
				  <section class="large-12 columns">
				  </section>
				</table>
				  	<button class="button alert" data-close="cests_modal"> FECHAR</button>
			</div>
	
		<!-- EANS -->
		<div class="reveal" id="eans_modal" data-reveal  data-animation-in="fade-in" data-animation-out="fade-out">
		 <table>
			  <thead>
			    <tr>
			      <th>Table Header</th>
			      <th>Table Header</th>
			      <th>Table Header</th>
			      <th>Table Header</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td>Content Goes Here</td>
			      <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
			      <td>Content Goes Here</td>
			      <td>Content Goes Here</td>
			    </tr>
			  </tbody>
			</table>
		</div>
	

		<div class="button-group">
		<?php if(getCests($numero_da_ncm)): ?><!-- Buttons -->
			<a class="button button-azul" data-open="cests_modal">VISUALIZAR CESTs</a>
		<?php endif; ?>
			<!-- <a class="button button-azul" data-open="eans_modal">EANs</a> -->
		</div>
