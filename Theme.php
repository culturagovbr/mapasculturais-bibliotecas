<?php
namespace MapaBibliotecas;
use BaseMinc;
use MapasCulturais\App;

class Theme extends BaseMinc\Theme{

    protected static function _getTexts(){
        return array(
            'site: name' => 'Bibliotecas',
            'site: in the region' => 'SNB',
            'site: of the region' => 'SNB',
            'site: owner' => 'SNB',
            'site: by the site owner' => 'pelo Ministério da Cultura',

            'home: abbreviation' => "SNB",
            'home: title' => "Bem-vind@!",
//            'home: colabore' => "Colabore com o Mapas Culturais",
            'home: welcome' => "Bem vindo ao mapa das bibliotecas,<br/><br/>Este mapa é uma plataforma livre, gratuita e colaborativa de mapeamento do <b>Sistema Nacional de Bibliotecas Públicas</b>. É uma das peças do <b>Cadastro Nacional de Bibliotecas</b> e estará voltado para a difusão e promoção das bibliotecas brasileiras, a fim de reunir informações sobre as bibliotecas públicas e comunitárias.",
//            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
//            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural paulistana. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
//            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
//            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
//            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/doc/api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',
//
//            'search: verified results' => 'Resultados Verificados',
//            'search: verified' => "Verificados"
            );
    }
    
    protected function _init() {
        $app = App::i();
        
        /*
         *  Modifica a consulta da API de espaços para só retornar Bibliotecas 
         * 
         * @see protectec/application/conf/space-types.php
         */
        $app->hook('API.<<*>>(space).query', function(&$data, &$select_properties, &$dql_joins, &$dql_where){            
            $dql_where .= ' AND e._type >= 20 AND e._type <= 29';
        });
        
        parent::_init();
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    public function getMetadataPrefix() {
        return 'bib_';
    }
    
    protected function _getAgentMetadata() {
        return [];
    }
    
    protected function _getEventMetadata() {
        return [];
    }
    
    protected function _getProjectMetadata() {
        return [];
    }
    
    protected function _getSpaceMetadata() {
        return [];
    }
}
