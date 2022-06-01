<?php

    include_once('../models/m_ptut_catalogue.php');

    $type = empty($_GET['type']) ? 'souscategories' : $_GET['type'];

    if($type == 'souscategories'){
        $id = 'ID_SOUSCAT';
        $table = 'SOUS_CATEGORIES';
        $foreigntable = 'CAT_SOUSCAT';
        $foreign = 'ID_CAT';
    }else {
        throw new Exception('Unknown type' . $type);
    }
    $query = $db->prepare("SELECT * FROM $table JOIN $foreigntable ON $table.$id = $foreigntable.$id WHERE $foreign = ?");
    $query->execute([$_GET['filtre']]);
    $items = $query->fetchAll();
    header('Content-Type: application/json');
    echo json_encode(array_map(function ($item) {
        return [
            'label' => $item['NOM_SOUSCAT'],
            'value' => $item['ID_SOUSCAT'],
        ];
    }, $items));
?>