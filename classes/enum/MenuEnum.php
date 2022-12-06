<?php



class MenuEnum {
    
    const Fatture  = 'fatture/fattureList';
    const Ddt      = 'ddt/ddtList';
    const Articoli = 'articoli/articoliList';
    const Clienti  = 'clienti/clientiList';
    const Azienda  = 'azienda/aziendaDetail';
    const Profilo  = 'profilo/profiloDetail';
    
    static $menuList = array(
        'fatture/fattureList'   => 'Fatture',
        'ddt/ddtList'           => 'DDT',
        'articoli/articoliList' => 'Articoli',
        'clienti/clientiList'   => 'Clienti',
        'azienda/aziendaDetail' => 'Azienda',
        'profilo/profiloDetail' => 'Profilo'
    );
    
    
}

?>