<div id="tab-gestao" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_gestao_regulamento): ?>
        <p>
            <span class="label">Regulamento:</span>
            <span class="js-editable" data-edit="bib_gestao_regulamento" data-original-title="Regulamento" data-emptytext="Selecione">
                <?php echo $entity->bib_gestao_regulamento; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_gestao_dirigente_nome): ?>
        <p>
            <span class="label">Nome do dirigente da biblioteca:</span>
            <span class="js-editable" data-edit="bib_gestao_dirigente_nome" data-original-title="Nome do dirigente da biblioteca" data-emptytext="Informe">
                <?php echo $entity->bib_gestao_dirigente_nome; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_gestao_dirigente_sexo): ?>
        <p>
            <span class="label">Sexo do dirigente da biblioteca:</span>
            <span class="js-editable" data-edit="bib_gestao_dirigente_sexo" data-original-title="Sexo do dirigente da biblioteca" data-emptytext="Selecione">
                <?php echo $entity->bib_gestao_dirigente_sexo; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_gestao_dirigente_faixaEtaria): ?>
        <p>
            <span class="label">Faixa etária do dirigente da biblioteca:</span>
            <span class="js-editable" data-edit="bib_gestao_dirigente_faixaEtaria" data-original-title="Faixa etária do dirigente da biblioteca" data-emptytext="Selecione">
                <?php echo $entity->bib_gestao_dirigente_faixaEtaria; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_gestao_dirigente_email): ?>
        <p>
            <span class="label">E-mail do dirigente da biblioteca:</span>
            <span class="js-editable" data-edit="bib_gestao_dirigente_email" data-original-title="E-mail do dirigente da biblioteca" data-emptytext="Informe">
                <?php echo $entity->bib_gestao_dirigente_email; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_gestao_dirigente_formacao): ?>
        <p>
            <span class="label">Formação do dirigente da biblioteca:</span>
            <editable-singleselect entity-property="bib_gestao_dirigente_formacao" empty-label="Selecione" box-title="Formação do dirigente da biblioteca"></editable-singleselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_funcionarios_contratados_num): ?>
        <p>
            <span class="label">Número total de funcionários contratados da biblioteca:</span>
            <span class="js-editable" data-edit="bib_funcionarios_contratados_num" data-original-title="Número total de funcionários contratados da biblioteca" data-emptytext="Informe">
                <?php echo $entity->bib_funcionarios_contratados_num; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_funcionarios_bibliotecarios_num): ?>
        <p>
            <span class="label">Número total de Bibliotecários graduados:</span>
            <span class="js-editable" data-edit="bib_funcionarios_bibliotecarios_num" data-original-title="Número total de Bibliotecários graduados" data-emptytext="Informe">
                <?php echo $entity->bib_funcionarios_bibliotecarios_num; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_voluntarios_num): ?>
        <p>
            <span class="label">Número de voluntários:</span>
            <span class="js-editable" data-edit="bib_voluntarios_num" data-original-title="Número de voluntários" data-emptytext="Informe">
                <?php echo $entity->bib_voluntarios_num; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_programasGovernamentais): ?>
        <p>
            <span class="label">Programas Governamentais que a biblioteca participou ou foi contemplada:</span>
            <editable-multiselect entity-property="bib_programasGovernamentais" empty-label="Selecione" box-title="Programas Governamentais que a biblioteca participou ou foi contemplada"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_comissao_possui): ?>
        <p>
            <span class="label">Possui comissão ou conselho de biblioteca?</span>
            <span class="js-editable" data-edit="bib_comissao_possui" data-original-title="'Possui comissão ou conselho de biblioteca?" data-emptytext="Selecione">
                <?php echo $entity->bib_comissao_possui; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_associacao_possui): ?>
        <p>
            <span class="label">Possui associação de amigos da biblioteca?</span>
            <span class="js-editable" data-edit="bib_associacao_possui" data-original-title="Possui associação de amigos da biblioteca?" data-emptytext="Selecione">
                <?php echo $entity->bib_associacao_possui; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_associacao_nome): ?>
        <p>
            <span class="label">Nome da associação:</span>
            <span class="js-editable" data-edit="bib_associacao_nome" data-original-title="Nome da associação" data-emptytext="Informe">
                <?php echo $entity->bib_associacao_nome; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_associacao_cnpj): ?>
        <p>
            <span class="label">CNPJ da associação:</span>
            <span class="js-editable" data-edit="bib_associacao_cnpj" data-original-title="CNPJ da associação" data-emptytext="Informe">
                <?php echo $entity->bib_associacao_cnpj; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_associacao_email): ?>
        <p>
            <span class="label">E-mail da associação:</span>
            <span class="js-editable" data-edit="bib_associacao_email" data-original-title="E-mail da associação" data-emptytext="Informe">
                <?php echo $entity->bib_associacao_email; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_parcerias_descricao): ?>
        <p>
            <span class="label">Descrição das parcerias:</span>
            <span class="js-editable" data-edit="bib_parcerias_descricao" data-original-title="Descrição das parcerias" data-emptytext="Informe">
                <?php echo $entity->bib_parcerias_descricao; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_estagio_programa): ?>
        <p>
            <span class="label">Participa de programas de estágio supervisionado junto as Escolas de Biblioteconomia da região?</span>
            <span class="js-editable" data-edit="bib_estagio_programa" data-original-title="Participa de programas de estágio supervisionado junto as Escolas de Biblioteconomia da região?" data-emptytext="Selecione">
                <?php echo $entity->bib_estagio_programa; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_participaPMLL): ?>
        <p>
            <span class="label">Participa ou participou do processo de implantação do Plano Municipal do Livro e da Leitura (PMLL) no seu município?</span>
            <span class="js-editable" data-edit="bib_participaPMLL" data-original-title="Participa ou participou do processo de implantação do Plano Municipal do Livro e da Leitura (PMLL) no seu município?" data-emptytext="Selecione">
                <?php echo $entity->bib_participaPMLL; ?>
            </span>
        </p>
        <?php endif; ?>

    </div>
</div>