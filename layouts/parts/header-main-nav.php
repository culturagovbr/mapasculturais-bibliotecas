<?php if($app->getConfig('auth.provider') === 'Fake' && $app->user->id !== 1): ob_start(); ?>
    <style>
        span.fake-dummy{
            white-space:nowrap; padding: 0.5rem 0 0 0.5rem; cursor:default;
        }
        span.fake-dummy a{
            display:inline !important; font-weight:bold !important; vertical-align: baseline !important;
        }
    </style>
    <span class="fake-dummy">
        Admin:
        <a onclick="jQuery.get('<?php echo $app->createUrl('auth', 'fakeLogin') ?>/?fake_authentication_user_id=1',
            function(){
                console.info('Logado como Admin');
                MapasCulturais.Messages.success('Logado como Admin.');
            })">
            Login
        </a>
        <a onclick="jQuery.get('<?php echo $app->createUrl('auth', 'fakeLogin') ?>/?fake_authentication_user_id=1',
            function(){ location.reload();})">
            Reload
        </a>
    </span>
<?php $fake_options = ob_get_clean(); endif; ?>

<nav id="main-nav" class="clearfix">
    <ul class="menu entities-menu clearfix">
        <li id="entities-menu-event">
            <a href="<?php echo $app->getBaseUrl() ?>">
                <div class="icon icon-home"></div>
                <div class="menu-item-label">Início</div>
            </a>
        </li>
        <li id="entities-menu-space" ng-class="{'active':data.global.filterEntity === 'space'}" ng-click="tabClick('space')">
            <a href="<?php if ($this->controller->action !== 'search') echo $app->createUrl('busca') . '##(global:(enabled:(space:!t),filterEntity:space))'; ?>">
                <div class="icon icon-space"></div>
                <div class="menu-item-label">Bibliotecas</div>
            </a>
        </li>
        
    </ul>
    <!--.menu.entities-menu-->
    <ul class="menu session-menu clearfix">
        
    </ul>
    <!--.menu.session-menu-->
</nav>
