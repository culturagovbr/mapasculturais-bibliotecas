<div id="tab-servicos" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_servicos_emprestimos_realiza): ?>
        <p>
            <span class="label">Realiza empréstimos?</span>
            <span class="js-editable" data-edit="bib_servicos_emprestimos_realiza" data-original-title="Realiza empréstimos?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_emprestimos_realiza; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_emprestimos_mediaMensal): ?>
        <p>
            <span class="label">Qual a freqüência média mensal de empréstimos?</span>
            <span class="js-editable" data-edit="bib_servicos_emprestimos_mediaMensal" data-original-title="Qual a freqüência média mensal de empréstimos?" data-emptytext="Informe">
                <?php echo $entity->bib_servicos_emprestimos_mediaMensal; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_assuntosMaisProcurados): ?>
        <p>
            <span class="label">Assuntos mais procurados:</span>
            <editable-multiselect entity-property="bib_assuntosMaisProcurados" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_atendimento): ?>
        <p>
            <span class="label">Serviço de informação e atendimento:</span>
            <span class="js-editable" data-edit="bib_servicos_atendimento" data-original-title="Serviço de informação e atendimento" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_atendimento; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_acessoInformacaoPublica): ?>
        <p>
            <span class="label">Serviço de orientação e acesso à informação pública?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_acessoInformacaoPublica" data-original-title="Serviço de orientação e acesso à informação pública?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_acessoInformacaoPublica; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_consultaLocal): ?>
        <p>
            <span class="label">Serviço de orientação à consulta local?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_consultaLocal" data-original-title="Serviço de orientação à consulta local?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_consultaLocal; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_pesquisaEscolar): ?>
        <p>
            <span class="label">Serviço de orientação e apoio a pesquisa escolar?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_pesquisaEscolar" data-original-title="Serviço de orientação e apoio a pesquisa escolar?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_pesquisaEscolar; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_usoPedagogicoInternet): ?>
        <p>
            <span class="label">Serviço de orientação ao uso pedagógico da internet?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_usoPedagogicoInternet" data-original-title="Serviço de orientação ao uso pedagógico da internet?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_usoPedagogicoInternet; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_pesquisaAcademica): ?>
        <p>
            <span class="label">Serviço de orientação e apoio a pesquisa acadêmica?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_pesquisaAcademica" data-original-title="Serviço de orientação e apoio a pesquisa acadêmica?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_pesquisaAcademica; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_orientacao_acessoInternet): ?>
        <p>
            <span class="label">Serviço de orientação e acesso à internet?</span>
            <span class="js-editable" data-edit="bib_servicos_orientacao_acessoInternet" data-original-title="Serviço de orientação e acesso à internet?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_orientacao_acessoInternet; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_disseminacaoSeletivaInformacao): ?>
        <p>
            <span class="label">Serviço de disseminação seletiva da informação?</span>
            <span class="js-editable" data-edit="bib_servicos_disseminacaoSeletivaInformacao" data-original-title="Serviço de disseminação seletiva da informação?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_disseminacaoSeletivaInformacao; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_acessoBaseDados): ?>
        <p>
            <span class="label">Acesso à base de dados?</span>
            <span class="js-editable" data-edit="bib_servicos_acessoBaseDados" data-original-title="Acesso à base de dados?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_acessoBaseDados; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_impressao): ?>
        <p>
            <span class="label">Serviço de impressão:</span>
            <span class="js-editable" data-edit="bib_servicos_impressao" data-original-title="Serviço de impressão" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_impressao; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_digitalizacao): ?>
        <p>
            <span class="label">Serviço de digitalização:</span>
            <span class="js-editable" data-edit="bib_servicos_digitalizacao" data-original-title="Serviço de digitalização" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_digitalizacao; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_acaoCultural): ?>
        <p>
            <span class="label">Ações culturais:</span>
            <editable-multiselect entity-property="bib_servicos_acaoCultural" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_atendimento): ?>
        <p>
            <span class="label">A Biblioteca participa de atividades/eventos municipais na área de cultura, educação e/ou outras áreas?</span>
            <span class="js-editable" data-edit="bib_servicos_atendimento" data-original-title="A Biblioteca participa de atividades/eventos municipais na área de cultura, educação e/ou outras áreas?" data-emptytext="Selecione">
                <?php echo $entity->bib_servicos_atendimento; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_servicos_extensao): ?>
        <p>
            <span class="label">Serviço de extensão:</span>
            <editable-multiselect entity-property="bib_servicos_extensao" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

    </div>
</div>