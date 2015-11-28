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
        return [
            'horario_segunda_das' => [
                'label' => 'Aberto nas segundas-feiras das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_segunda_ate' => [
                'label' => 'Aberto nas segundas-feiras até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_terca_das' => [
                'label' => 'Aberto nas terças-feiras das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_terca_ate' => [
                'label' => 'Aberto nas terças-feiras até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_quarta_das' => [
                'label' => 'Aberto nas quartas-feiras das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_quarta_ate' => [
                'label' => 'Aberto nas quartas-feiras até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_quinta_das' => [
                'label' => 'Aberto nas quintas-feiras das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_quinta_ate' => [
                'label' => 'Aberto nas quintas-feiras até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_sexta_das' => [
                'label' => 'Aberto nas sextas-feiras das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_sexta_ate' => [
                'label' => 'Aberto nas sextas-feiras até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_sabado_das' => [
                'label' => 'Aberto nos sábados das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_sabado_ate' => [
                'label' => 'Aberto nos sábados até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'horario_domingo_das' => [
                'label' => 'Aberto nos domingos das',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            'horario_domingo_ate' => [
                'label' => 'Aberto nos domingos até às',
                'validations' => [
                    'v::date("H:i:s")'
                ]
            ],
            
            'leiCriacao' => [
                'label' => 'Lei de criação',
            ],
            
            'condicaoFuncionamento' => [
                'label' => 'Condição de funcionamnto',
                'type' => 'select',
                'options' => [
                    'aberta'    => 'Aberta/Em funcionamento',
                    'fechada'   => 'Fechada',
                    'restrito'  => 'Acesso restrito'
                ]
            ],
            
            // Aba público
            'faixaEtariaPredominante' => [
                'label' => 'Faixa etária predominante dos usuários da biblioteca',
                'options' => [
                    '0' => 'Até 14 anos',
                    '15' => 'De 15 até 25 anos',
                    '26' => 'De 26 até 40 anos',
                    '41' => 'De 41 até 60 anos',
                    '61' => 'Acima de 60 anos',
                ]
            ],
            
            'comunidades' => [
                'label' => 'Comunidades ou grupos específicos',
                'type' => 'multiselect',
                'options' => [
                    'Quilombolas'   => 'Quilombolas',
                    'Indígenas'     => 'Indígenas',
                    'Imigrantes'    => 'Imigrantes',
                ]
            ],
            
            'publico_frequenciaMedia' => [
                'label' => 'Freqüência média mensal dos usuários na biblioteca',
                'type' => 'select',
                'options' => [
                    '0'     => 'Até 300 usuários por mês',
                    '301'   => 'De 301 até 500 usuários por mês',
                    '501'   => 'De 501 até 1.000 usuários por mês',
                    '1000'  => 'De 1.000 até 10.000 usuários por mês',
                    '10000' => 'Acima de 10.000 usuários por mês',
                ]
            ],
            
            'acervo_possuiPolitica' => [
                'label' => 'Possui política de formação, desenvolvimento e tratamento de coleções',
                'type' => 'select',
                'options' => [
                    ''    => 'Não Informado',
                    'Sim' => 'Sim',
                    'Não' => 'Não'
                ]
            ],
            
            'acervo_numItens' => [
                'label' => 'Total de itens do acervo',
                'options' => [
                    '0' => 'até 2.000 itens',
                    '2001' => 'De 2.001 até 5.000 itens',
                    '5001' => 'De 5.001 até 10.000 itens',
                    '10001' => 'De 10.000 até 50.000 itens',
                    '50001' => 'De 50.000 até 100.000 itens',
                    '100001' => 'Mais de 100.000 itens',
                ]
            ],
            
            'acervo_formaAquisicao' => [
                'label' => 'Forma de aquisição do acervo',
                'type' => 'multiselect',
                'options' => [
                    'Compra' => 'Compra',
                    'Doação' => 'Doação',
                    'Permuta' => 'Permuta'
                ]
            ],
            
            'acervo_colecoes' => [
                'label' => 'A biblioteca possui em seu acervo coleção de escritores ou de temas regionais',
                'type' => 'select',
                'options' => [
                    ''    => 'Não Informado',
                    'Sim' => 'Sim',
                    'Não' => 'Não'
                ]
            ],
            
            'acervo_tipos' => [
                'label' => 'Forma de aquisição do acervo',
                'type' => 'multiselect',
                'options' => [
                    'Compra'  => 'Compra',
                    'Doação'  => 'Doação',
                    'Permuta' => 'Permuta'
                ]
            ],
            
            'acervo_sistemaClassificacao' => [
                'label' => 'Qual sistemas de classificação é utilizado?',
                'type' => 'select',
                'allowOther' => true,
                'options' => [
                    ''    => 'Nenhum',
                    'cdu' => 'Classificação Decimal Universal (CDU)',
                    'cdd' => 'Classificação Decimal de Dewey (CDD)'
                ]
            ],
            
            'acervo_cadastro' => [
                'label' => 'Cadastro Bibliográfico',
                'type' => 'select',
                'options' => [
                    ''           => 'Não possui',
                    'manual'     => 'Manual - em ficha papel',
                    'eletronico' => 'Eletrônico'
                ]
            ],
            
            'acervo_url' => [
                'label' => 'Endereço de catálogo bibliográfico para acesso online',
                'validations' => [
                    'v::url()' => 'Url inválida'
                ]
            ],
            
            'acervo_sistemaGerenciamento' => [
                'label' => 'Sistema de gerenciamento eletrônico utilizado no acervo',
                'type' => 'select',
                'options' => [
                    'Biblioteca Pessoal' => 'Biblioteca Pessoal',
                    'BookDB' => 'BookDB',
                    'BiblioteQ' => 'BiblioteQ',
                    'MiniBiblio' => 'MiniBiblio',
                    'Tellico' => 'Tellico',
                    'BibLivre' => 'BibLivre',
                    'Emilda' => 'Emilda',
                    'Evergreen' => 'Evergreen',
                    'GNUTeca' => 'GNUTeca',
                    'Koha' => 'Koha',
                    'Library a la carte' => 'Library a la carte',
                    'NewGenLib' => 'NewGenLib',
                    'OpenBiblio' => 'OpenBiblio',
                    'PHL' => 'PHL',
                    'PMB' => 'PMB',
                    'Scriblio' => 'Scriblio',
                    'Biblioteca Fácil' => 'Biblioteca Fácil',
                    'Biblio Express' => 'Biblio Express',
                    'Biblioteca Stylo' => 'Biblioteca Stylo',
                    'Book In Plus' => 'Book In Plus',
                    'Book Label 2012' => 'Book Label 2012',
                    'Books Program' => 'Books Program',
                    'Aleph' => 'Aleph',
                    'Alexandria ' => 'Alexandria ',
                    'Arches Lib' => 'Arches Lib',
                    'BiblioBase' => 'BiblioBase',
                    'Biblioshop' => 'Biblioshop',
                    'Biblium' => 'Biblium',
                    'Caribe' => 'Caribe',
                    'Dixi' => 'Dixi',
                    'GIZ Biblioteca' => 'GIZ Biblioteca',
                    'Informa' => 'Informa',
                    'Pergamum' => 'Pergamum',
                    'Sábio' => 'Sábio',
                    'Siabi' => 'Siabi',
                    'Sophia' => 'Sophia',
                    'Sysbibli' => 'Sysbibli',
                    'Thesaurus' => 'Thesaurus',
                ]
            ],
            
            'acervo_acessoEstantes' => [
                'label' => 'Acesso às estantes',
                'type' => 'select',
                'options' => [
                    'aberto' => 'Aberto',
                    'restrito' => 'Restrito'
                ]
            ]
        ];
    }
    
    protected function _getSpaceMetadata() {
        return [];
    }
    
    
    function register(){
        parent::register();
        $app = App::i();
        $app->hook('app.register', function(&$registry) {
            $group = null;
            $registry['entity_type_groups']['MapasCulturais\Entities\Space'] = array_filter($registry['entity_type_groups']['MapasCulturais\Entities\Space'], function($item) use (&$group){
                if($item->name === 'Bibliotecas'){
                    $group = $item;
                    return $item;
                } else {
                    return null;
                }
            });
            
            $registry['entity_types']['MapasCulturais\Entities\Space'] = array_filter($registry['entity_types']['MapasCulturais\Entities\Space'], function($item) use ($group){
                if($item->id >= $group->min_id && $item->id <= $group->max_id){
                    return $item;
                } else {
                    return null;
                }
            });
        });
    }
}
