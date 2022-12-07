<?php



class MenuEnum {
    
    const Fatture  = 'fatture/fattureList';
    const Ddt      = 'ddt/ddtList';
    const Articoli = 'articoli/articoliList';
    const Clienti  = 'clienti/clientiList';
    const Azienda  = 'azienda/aziendaDetail';
    const Profilo  = 'profilo/profiloDetail';
    
    static $menuList = array(
        'fatture/fattureList'   => '<i class="fa-solid fa fa-file-invoice"></i>',
        'ddt/ddtList'           => '<i class="fa-solid fa fa-truck"></i>',
        'articoli/articoliList' => '<i class="fa-solid fa fa-tags"></i>',
        'clienti/clientiList'   => '<i class="fa-solid fa-user-tag"></i>',
        'azienda/aziendaDetail' => '<i class="fa-solid fa-building"></i>',
        'profilo/profiloDetail' => '<i class="fa-solid fa-user"></i>'
    );
    
    static $menuTitle = array(
        'fatture/fattureList'   => 'Documenti',
        'ddt/ddtList'           => 'Documenti di trasporto',
        'articoli/articoliList' => 'Articoli',
        'clienti/clientiList'   => 'Clienti',
        'azienda/aziendaDetail' => 'Azienda',
        'profilo/profiloDetail' => 'Profilo'
    );
    
}

?>