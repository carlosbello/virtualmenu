<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Controlador para el gestor.
 *
 * @author Leoanrdo Quintero
 */
class ManagerController extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        if (!isLogged()) {
            redirect('login');
            exit;
        }
        if (!userHasPermition(ROL_MANAGER)) {
            redirect('denied');
            exit;
        }
    }

    /**
     * Página por defecto del controlador.
     */
    public function index() {
        redirect('menu/manage');
        exit();

        $data['title'] = 'Menu Virtual - Inicio Gestor';
        $data['viewToLoad'] = 'manager/home';
        $this->load->view('comunes/mainmanager', $data);
    }

    public function products() {
        $this->load->library('grocery_CRUD');

        $crud = new grocery_CRUD();

        $crud->set_theme($this->config->item('grocery_crud_theme', 'virtualmenu'));
        $crud->set_table(PRODUCTS);
        $crud->columns('id', 'name', 'base_price');
        $crud->display_as('id', 'Código')
                ->display_as('name', 'Nombre')
                ->display_as('base_price', 'Precio Base');
        $crud->set_subject('Producto');
        $crud->fields('name', 'base_price', 'id_provider');
        $crud->change_field_type('id_provider', 'invisible');
        $crud->callback_before_insert(array($this, 'providerCallback'));
        $crud->required_fields('name');
        $data = $crud->render();

        $data->title = 'Menu Virtual - Productos';
        $data->titleMain = 'Productos';
        $data->viewToLoad = 'manager/main';
        $this->load->view('comunes/mainmanager', $data);
    }

    public function providerCallback($post_array) {
        $post_array['id_provider'] = $this->providerId;

        return $post_array;
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
