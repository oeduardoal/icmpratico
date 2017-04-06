<?php

add_action('show_user_profile', 'AddCamposUsuario');
add_action('edit_user_profile', 'AddCamposUsuario');

function AddCamposUsuario($user) { ?>

    <h3>Informações extras</h3>
	
    <table class="form-table">
        <tr>
            <th><label for="estado">Estado</label></th>
            <td>
                <select name="estado" id="estado">
                    <option value="">Selecione uma opção</option>
                    <?php foreach(estados() as $uf => $nome): ?>
                    <option value="<?php echo $uf; ?>" <?php echo get_user_meta($user->ID, 'estado', true) === $uf ? 'selected' : ''; ?>><?php echo $nome; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="cidade">Cidade</label></th>
            <td>
                <input type="text" name="cidade" id="cidade" value="<?php echo get_user_meta($user->ID, 'cidade', true); ?>" required />
            </td>
        </tr>
    </table>
<?php }


add_action('personal_options_update', 'AddCamposUsuarioSave');
add_action('edit_user_profile_update', 'AddCamposUsuarioSave');

function AddCamposUsuarioSave($user_id)
{
    if(!current_user_can('edit_user', $user_id))
        return false;

    update_metadata('user', $user_id, 'estado', $_POST['estado'] ? $_POST['estado'] : '');
    update_metadata('user', $user_id, 'cidade', $_POST['cidade'] ? $_POST['cidade'] : '');
}

add_filter('manage_users_columns', function($column)
{
    $column['estado'] = 'Estado';
    $column['cidade'] = 'Cidade';
    return $column;
});

add_filter('manage_users_custom_column',
function ($val, $column_name, $user_id )
{
    if($column_name == 'estado')
    {
        $estados = estados();
        $estado = get_user_meta($user_id, 'estado', true);

        $val = !empty($estados[$estado]) ? $estados[$estado] : '-';
    }

    if($column_name == 'cidade')
    {
        $cidade = get_user_meta($user_id, 'cidade', true);
        $val = !empty($cidade)  ? $cidade : '-';
    }

    return $val;
}
, 15, 3 );