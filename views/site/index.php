<?php
$this->jsObject['spinner'] = $this->asset('img/spinner_192.gif', false);

$app = \MapasCulturais\App::i();
$em = $app->em;

$class_event = 'MapasCulturais\Entities\Event';
$class_agent = 'MapasCulturais\Entities\Agent';
$class_space = 'MapasCulturais\Entities\Space';
$class_project = 'MapasCulturais\Entities\Project';

$class_file = 'MapasCulturais\Entities\File';

$num_events             = $this->getNumEvents();
$num_verified_events    = $this->getNumVerifiedEvents();
$num_agents             = $this->getNumEntities($class_agent);
$num_verified_agents    = $this->getNumEntities($class_agent, true);
$num_spaces             = $this->getNumEntities($class_space);
$num_verified_spaces    = $this->getNumEntities($class_space, true);
$num_projects           = $this->getNumEntities($class_project);
$num_verified_projects  = $this->getNumEntities($class_project, true);

$event_linguagens = array_values($app->getRegisteredTaxonomy($class_event, 'linguagem')->restrictedTerms);
$agent_areas = array_values($app->getRegisteredTaxonomy($class_agent, 'area')->restrictedTerms);
$space_areas = array_values($app->getRegisteredTaxonomy($class_space, 'area')->restrictedTerms);

sort($event_linguagens);
sort($agent_areas);
sort($space_areas);

$agent_types = $app->getRegisteredEntityTypes($class_agent);
$space_types = $app->getRegisteredEntityTypes($class_space);
$project_types = $app->getRegisteredEntityTypes($class_project);

$agent_img_attributes = $space_img_attributes = $event_img_attributes = $project_img_attributes = 'class="random-feature no-image"';

$agent = $this->getOneVerifiedEntity($class_agent);
if($agent && $img_url = $this->getEntityFeaturedImageUrl($agent)){
    $agent_img_attributes = 'class="random-feature" style="background-image: url(' . $img_url . ');"';
}

$space = $this->getOneVerifiedEntity($class_space);
if($space && $img_url = $this->getEntityFeaturedImageUrl($space)){
    $space_img_attributes = 'class="random-feature" style="background-image: url(' . $img_url . ');"';
}

$event = $this->getOneVerifiedEntity($class_event);
if($event && $img_url = $this->getEntityFeaturedImageUrl($event)){
    $event_img_attributes = 'class="random-feature" style="background-image: url(' . $img_url . ');"';
}

$project = $this->getOneVerifiedEntity($class_project);
if($project && $img_url = $this->getEntityFeaturedImageUrl($project)){
    $project_img_attributes = 'class="random-feature" style="background-image: url(' . $img_url . ');"';
}

$url_search_agents = $this->searchAgentsUrl;
$url_search_spaces = $this->searchSpacesUrl;
$url_search_events = $this->searchEventsUrl;
$url_search_projects = $this->searchProjectsUrl;

?>
<section id="home-watermark">

</section>

<section id="home-intro" class="js-page-menu-item home-entity clearfix">
    <div class="box">
        <h1><?php $this->dict('home: title') ?></h1>
        <p><?php $this->dict('home: welcome') ?></p>
        <p>
        
        <a href="<?php echo $url_search_spaces ?>">Visite o mapa</a> e navegue pelas <b><?php echo $num_spaces ?> Bibliotecas cadastradas</b>.
        
        </p>
    </div>
</section>


