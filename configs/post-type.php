<?php

//REGISTER POST-TYPES
add_action('init', function()
{
    $default = array(
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
    );

    //CURSOS
    $args = array(
        'menu_icon' => 'dashicons-book-alt',
        'label' => 'Cursos',
        'labels' => array(
            'name' => 'Cursos',
            'singular_name' => 'Curso',
            'menu_name' => 'Cursos',
            'name_admin_bar' => 'Cursos',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Curso',
            'new_item' => 'Novo Curso',
            'edit_item' => 'Editar Curso',
            'view_item' => 'Ver Cursos',
            'all_items' => 'Ver todos',
            'search_items' => 'Procurar Curso',
            'not_found' => 'Curso não encontrado',
            'not_found_in_trash' => 'Curso não encontrado no lixo'
        ),
        'description' => '',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => -1,
    );

    register_post_type('curso', $args + $default);

    //NCM
    $args = array(
        'menu_icon' => 'dashicons-editor-ul',
        'label' => 'NCM',
        'labels' => array(
            'name' => 'NCMs',
            'singular_name' => 'NCM',
            'menu_name' => 'NCMs',
            'name_admin_bar' => 'NCMs',
            'add_new' => 'Adicionar nova',
            'add_new_item' => 'Adicionar nova NCM',
            'new_item' => 'Nova NCM',
            'edit_item' => 'Editar NCM',
            'view_item' => 'Ver NCMs',
            'all_items' => 'Ver todas',
            'search_items' => 'Procurar NCM',
            'not_found' => 'NCM não encontrado',
            'not_found_in_trash' => 'NCM não encontrado no lixo'
        ),
        'description' => '',
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('category'),
        'menu_position' => -1,
       	'show_in_rest' => true,
    );

    register_post_type('ncm', $args + $default);

    //OBSERVAÇÕES
    $args = array(
        'menu_icon' => 'dashicons-admin-comments',
        'label' => 'Observações',
        'labels' => array(
            'name' => 'Observações',
            'singular_name' => 'Observação',
            'menu_name' => 'Observações',
            'name_admin_bar' => 'Observações',
            'add_new' => 'Adicionar nova',
            'add_new_item' => 'Adicionar nova Observação',
            'new_item' => 'Nova Observação',
            'edit_item' => 'Editar Observação',
            'view_item' => 'Ver Observações',
            'all_items' => 'Ver todas',
            'search_items' => 'Procurar Observação',
            'not_found' => 'Observação não encontrado',
            'not_found_in_trash' => 'Observação não encontrado no lixo'
        ),
        'description' => '',
        'supports' => array('title', 'editor'),
        'menu_position' => -1,
    );

    register_post_type('observacao', $args + $default);

    //ARTIGOS
    $args = array(
        'menu_icon' => 'dashicons-format-aside',
        'label' => 'Artigos',
        'labels' => array(
            'name' => 'Artigos',
            'singular_name' => 'Artigo',
            'menu_name' => 'Artigos',
            'name_admin_bar' => 'Artigos',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Artigo',
            'new_item' => 'Novo Artigo',
            'edit_item' => 'Editar Artigo',
            'view_item' => 'Ver Artigo',
            'all_items' => 'Ver Artigos',
            'search_items' => 'Procurar Artigo',
            'not_found' => 'Artigo não encontrado',
            'not_found_in_trash' => 'Artigo não encontrado no lixo'
        ),
        'description' => '',
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => -1,
    );

    register_post_type('artigo', $args + $default);

    //CNAE
    $args = array(
        'menu_icon' => 'dashicons-editor-ul',
        'label' => 'CNAEs',
        'labels' => array(
            'name' => 'CNAEs',
            'singular_name' => 'CNAE',
            'menu_name' => 'CNAEs',
            'name_admin_bar' => 'CNAEs',
            'add_new' => 'Adicionar nova',
            'add_new_item' => 'Adicionar nova CNAE',
            'new_item' => 'Nova CNAE',
            'edit_item' => 'Editar CNAE',
            'view_item' => 'Ver CNAE',
            'all_items' => 'Ver CNAEs',
            'search_items' => 'Procurar CNAE',
            'not_found' => 'CNAE não encontrado',
            'not_found_in_trash' => 'CNAE não encontrado no lixo'
        ),
        'description' => '',
        'supports' => array('title', 'editor' ),
        'menu_position' => -2,
    );

    register_post_type('cnae', $args + $default);

    //FÓRUM
    $args = array(
        'menu_icon' => 'dashicons-format-chat',
        'label' => 'Fóruns',
        'labels' => array(
            'name' => 'Fóruns',
            'singular_name' => 'Fórun',
            'menu_name' => 'Fóruns',
            'name_admin_bar' => 'Fóruns',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Fórun',
            'new_item' => 'Nova Fórun',
            'edit_item' => 'Editar Fórun',
            'view_item' => 'Ver Fórun',
            'all_items' => 'Ver Fóruns',
            'search_items' => 'Procurar Fórun',
            'not_found' => 'Fórun não encontrado',
            'not_found_in_trash' => 'Fórun não encontrado no lixo'
        ),
        'supports' => array('title', 'editor', 'comments'),
        'menu_position' => -2,
    );

    register_post_type('forum', $args + $default);

    //XMLS
    $args = array(
        'menu_icon' => 'dashicons-editor-code',
        'label' => 'XMLs',
        'labels' => array(
            'name' => 'XMLs',
            'singular_name' => 'XML',
            'menu_name' => 'XMLs',
            'name_admin_bar' => 'XMLs',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo XML',
            'new_item' => 'Novo XML',
            'edit_item' => 'Editar XML',
            'view_item' => 'Ver XML',
            'all_items' => 'Ver XMLs',
            'search_items' => 'Procurar XML',
            'not_found' => 'XML não encontrado',
            'not_found_in_trash' => 'XML não encontrado no lixo'
        ),
        'supports' => array('title', 'editor'),
        'menu_position' => -2,
    );

    register_post_type('xml', $args + $default);

    //PROFESSORES
    $args = array(
        'menu_icon' => 'dashicons-clipboard',
        'label' => 'Professores',
        'labels' => array(
            'name' => 'Professores',
            'singular_name' => 'Professor',
            'menu_name' => 'Professores',
            'name_admin_bar' => 'Professores',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Professor',
            'new_item' => 'Novo Professor',
            'edit_item' => 'Editar Professor',
            'view_item' => 'Ver Professor',
            'all_items' => 'Ver Professores',
            'search_items' => 'Procurar Professor',
            'not_found' => 'Professor não encontrado',
            'not_found_in_trash' => 'Professor não encontrado no lixo'
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => -2,
    );

    register_post_type('professor', $args + $default);

    $args = array(
        'menu_icon' => 'dashicons-businessman',
        'label' => 'Parceiros',
        'labels' => array(
            'name' => 'Parceiros',
            'singular_name' => 'Parceiro',
            'menu_name' => 'Parceiros',
            'name_admin_bar' => 'Parceiros',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Parceiro',
            'new_item' => 'Novo Parceiro',
            'edit_item' => 'Editar Parceiro',
            'view_item' => 'Ver Parceiro',
            'all_items' => 'Ver Parceiros',
            'search_items' => 'Procurar Parceiro',
            'not_found' => 'Parceiro não encontrado',
            'not_found_in_trash' => 'Parceiro não encontrado no lixo'
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => -2,
    );

    register_post_type('parceiro', $args + $default);

    $args = array(
        'menu_icon' => 'dashicons-shield',
        'label' => 'Legislações',
        'labels' => array(
            'name' => 'Legislações',
            'singular_name' => 'Legislação',
            'menu_name' => 'Legislações',
            'name_admin_bar' => 'Legislações',
            'add_new' => 'Adicionar novo',
            'add_new_item' => 'Adicionar novo Legislação',
            'new_item' => 'Novo Legislação',
            'edit_item' => 'Editar Legislação',
            'view_item' => 'Ver Legislação',
            'all_items' => 'Ver Legislações',
            'search_items' => 'Procurar Legislação',
            'not_found' => 'Legislação não encontrado',
            'not_found_in_trash' => 'Legislação não encontrado no lixo'
        ),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => -2,
    );

    register_post_type('legislacao', $args + $default);
});