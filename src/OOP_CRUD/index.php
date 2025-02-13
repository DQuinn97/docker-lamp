<?php
require('DB.class.php');
require('CRUD.class.php');

$crud = new CRUD('products');
echo "<pre>";
print_r($crud->getTableData());
print_r($crud->getById(500));
print_r($crud->getAll());
echo "</pre>";
echo $crud->showTable();

// $crud->insert($data);
if (isset($_POST['formSubmit']) && $_POST['formSubmit'] == $crud->table) {
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    echo $crud->insert($_POST);
}
