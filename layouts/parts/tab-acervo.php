<div id="tab-acervo" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_acervo_possuiPolitica): ?>
        <p>
            <span class="label">Possui uma política de formação, desenvolvimento e tratamento de coleções?</span>
            <span class="js-editable" data-edit="bib_acervo_possuiPolitica" data-original-title="Possui uma política de formação, desenvolvimento e tratamento de coleções?" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_possuiPolitica; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_numItens): ?>
        <p>
            <span class="label">Total de itens do acervo:</span>
            <span class="js-editable" data-edit="bib_acervo_numItens" data-original-title="Total de itens do acervo" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_numItens; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_formaAquisicao): ?>
        <p>
            <span class="label">Forma de aquisição do acervo:</span>
            <editable-multiselect entity-property="bib_acervo_formaAquisicao" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_colecoes): ?>
        <p>
            <span class="label">A biblioteca possui em seu acervo coleção de escritores ou de temas regionais?</span>
            <span class="js-editable" data-edit="bib_acervo_colecoes    " data-original-title="A biblioteca possui em seu acervo coleção de escritores ou de temas regionais?" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_colecoes; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_tipos): ?>
        <p>
            <span class="label">Tipos de documentos e suportes que compõem o acervo:</span>
            <editable-multiselect entity-property="bib_acervo_tipos" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_sistemaClassificacao): ?>
        <p>
            <span class="label">Utiliza algum sistema de classificação?</span>
            <editable-singleselect entity-property="bib_acervo_sistemaClassificacao" empty-label="Selecione"></editable-singleselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_cadastro): ?>
        <p>
            <span class="label">Cadastro Bibliográfico:</span>
            <span class="js-editable" data-edit="bib_acervo_cadastro" data-original-title="Cadastro Bibliográfico" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_cadastro; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_url): ?>
        <p>
            <span class="label">Endereço de catálogo bibliográfico para acesso online:</span>
            <span class="js-editable" data-edit="bib_acervo_url" data-original-title="Endereço de catálogo bibliográfico para acesso online" data-emptytext="Informe">
                <?php echo $entity->bib_acervo_url; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_sistemaGerenciamento): ?>
        <p>
            <span class="label">Sistema de gerenciamento eletrônico utilizado no acervo:</span>
            <span class="js-editable" data-edit="bib_acervo_sistemaGerenciamento" data-original-title="Sistema de gerenciamento eletrônico utilizado no acervo" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_sistemaGerenciamento; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_acervo_acessoEstantes): ?>
        <p>
            <span class="label">Quanto ao acesso às estantes pelo usuário, informe se é:</span>
            <span class="js-editable" data-edit="bib_acervo_acessoEstantes" data-original-title="Acesso às estantes pelo usuário" data-emptytext="Selecione">
                <?php echo $entity->bib_acervo_acessoEstantes; ?>
            </span>
        </p>
        <?php endif; ?>

    </div>
</div>