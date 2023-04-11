<?php
    include 'koneksi.php';
    $sql = $koneksi->query(" SELECT sub_k.*, kategori.nama_kategori FROM sub_k, kategori WHERE sub_k.id_kategori = kategori.id ORDER BY sub_k.id DESC ");
    $menus = array();
    while(($row = mysqli_fetch_assoc($sql)) != null)
    {
        if(!isset($menus[$row['nama_kategori']]))
            $menus[$row['nama_kategori']] = array();
 
        $menus[$row['nama_kategori']][] = $row;
    }
 
    echo "<ul>";
    foreach($menus as $kat => $subs)
    {
        echo '<li>' . $kat . '</li>';
        echo '<ul>';
            foreach($subs as $sub)
            {
                echo '<li>' . $sub['nama_sub'] . '</li>';
            }
        echo '</ul>';
    }
    echo '</ul>';
    ?>