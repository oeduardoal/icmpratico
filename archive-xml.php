<?php get_header(); ?>
                                
<?php get_template_part('templates/header');?>

<script type="text/javascript">
    TERM = '<?php echo $_GET['term']; ?>';
</script>

<!-- Modal  Login-->
<div class="reveal modal modal-xml" id="excluir-xml" data-reveal data-close-on-click="true"  data-animation-in="fade-in" data-animation-out="fade-out">
    <form action="<?php echo site_url('xml'); ?>">

        <input type="hidden" name="arquivo" id="arquivo-xml" value="">
        <input type="hidden" name="delete" value="true">

        <h4>Confirma exclusão do XML</h4>
        <p>Você realmente deseja excluir o XML?</p>
        
        <button type="button" class="button seconday" data-close>Não</button>
        <button type="submit" class="button alert">Sim</button>

    </form>
<button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<section class="row">
    <section id="content" class="large-12 float-left archive archive-id-<?php the_ID(); ?>">
        <?php get_template_part("templates/breadcrumbs" ); ?>
    </section>
        <header>
            <!-- <h1><?php post_type_archive_title(); ?></h1> -->
        </header>
                <?php global $wp_query; $page_is = (get_query_var('paged')) ? get_query_var('paged') : 1 ; ?>
                <?php $total = $posts->max_num_pages;  ?>


                <?php            
                $is_admin = in_array('administrator', wp_get_current_user()->roles);

                if(! empty($_GET['arquivo']))
                {
                    if( $xml = get_page_by_title($_GET['arquivo'], OBJECT, 'xml') )
                    {
                        if($xml->post_author == get_current_user_id() || $is_admin)
                        {
                            $xmlNfe = get_post_meta($xml->ID, 'nfe', true);

                            if( ! empty($_GET['delete']) )
                            {
                                wp_delete_post($xml->ID, true);
                                unset($xml, $xmlNfe);
                            }

                        }
                    }
                }
                if(!empty($_GET['delete'])){
                   wp_redirect(home_url());
                }

                $xmlsQuery = array(
                    'post_type' => 'xml',
                    'posts_per_page' => -1
                );

                if( ! $is_admin ){
                    $xmlsQuery['author__in'] = get_current_user_id();
                }
                $xmls = new WP_Query($xmlsQuery);

                ?>
                <div class="xml-form large-8 columns">   
                    <h3>Carregar arquivo XML</h3>
                    <p>Selecione um arquivo XML para ser carregado, depois clique em enviar.</p>

                    <form method="post" enctype="multipart/form-data" action="<?php echo get_template_directory_uri(); ?>/vendor/xml-uploader.php" class="">

                        <label for="arquivo" class="button btnoutline">Clique e escolha o arquivo</label>
                        <input type="file" name="arquivo" id="arquivo" required class="show-for-sr">
                        <button type="submit" class="button button-azul">ENVIAR</button>

                    </form>

                    <hr style="margin: 30px 0;">
                    <?php if(! empty($xmlNfe)): ?>
                    <h5>NCMs Comentada do arquivo carregado</h5>
                       <style>
                           .xml-id-<?php echo get_the_ID(); ?>{
                                background-color: rgba(1, 97, 158, 0.1);
                           }
                       </style>
                      <ul class="accordion" data-accordion data-allow-all-closed="true">
                        <?php foreach($xmlNfe as $ncm_id => $produtos): $ncm = getPostNcm($ncm_id); ?>
                            <?php foreach($produtos as $produto): ?>

                                  <li class="accordion-item" data-accordion-item>
                                    <a href="#" class="accordion-title"><strong>NCM <?php echo $ncm_id; ?></strong> - <?php echo $produto['xProd']; ?></a>

                                    <div class="accordion-content" data-tab-content>
                                    <p>
                                        <?php $observacao_id = get_post_meta($ncm->ID, 'observacao')[0] ?>
                                        <?php $observacao = get_post($observacao_id); ?>
                                        <?php echo wp_trim_words($observacao->post_content, 30); ?>
                                    </p>
                                    <a class="button button-amarelo small expanded" href="<?php echo get_the_permalink($ncm->ID); ?>" target="_blank">CONFIRA A TRIBUTAÇÃO COMPLETA </a>
                                    </div>
                                  </li>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                                </ul>
                    <?php endif; ?>
                </div>
                 <div class="large-4 columns xml-form xml-lista">
                    <h3>Arquivos</h3>
                    <?php if($xmls->post_count): ?>
                            <?php while($xmls->have_posts()): $xmls->the_post(); ?>

                        <div class="callout xml-id-<?php echo get_the_ID() ?>">
                                <div class="input-group">
                                <span class="input-group-field"><?php echo substr(get_the_title(),0,25) . ".xml"; ?></span>
                                    <div class="input-group-button">
                                        <a type="submit" class="button" value="Submit" href="<?php echo site_url('xml/?arquivo='. get_the_title()); ?>"><i class="fa fa-check"></i></a>
                                        <button type="button"  data-xml="<?php the_title(); ?>" class="button alert excluir-xml" value="Submit"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                               
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                    <?php else: ?>
                        <h5>Nenhum arquivo encontrado</h5>
                    <?php endif; ?>
                </div>
</section>


<?php get_template_part("templates/parceiros"); ?>
<?php get_footer(); ?>  