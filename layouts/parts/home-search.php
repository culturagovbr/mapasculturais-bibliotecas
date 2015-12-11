<?php 
$class_space = 'MapasCulturais\Entities\Space';
//$num_spaces = $this->getNumEntities($class_space);

$url_search_spaces = $this->searchSpacesUrl;
?>
<section id="home-intro" class="js-page-menu-item home-entity clearfix">
    <div class="box">
        <h1><?php $this->dict('home: title') ?></h1>
        <p><?php $this->dict('home: welcome') ?></p>
        <p>
        
        <a href="<?php echo $url_search_spaces ?>">Visite o mapa</a> e navegue pelas <b>Bibliotecas cadastradas</b>.
        
        </p>
    </div>
</section>
