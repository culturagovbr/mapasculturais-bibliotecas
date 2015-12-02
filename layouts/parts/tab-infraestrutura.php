<div id="tab-infraestrutura" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_infra_predio_propriedade): ?>
        <p>
            <span class="label">Propriedade do local onde a biblioteca encontra-se instalada:</span>
            <span class="js-editable" data-edit="bib_infra_predio_propriedade" data-original-title="Propriedade do local onde a biblioteca encontra-se instalada" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_predio_propriedade; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_predio_divideEspaco): ?>
        <p>
            <span class="label">Divide o espaço com outro equipamento público?</span>
            <span class="js-editable" data-edit="bib_infra_predio_divideEspaco" data-original-title="Divide o espaço com outro equipamento público?" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_predio_divideEspaco; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_predio_espacosDiferenciados): ?>
        <p>
            <span class="label">Espaços diferenciados para públicos, acervos e atividades para:</span>
            <editable-multiselect entity-property="bib_infra_predio_espacosDiferenciados" empty-label="Selecione"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_predio_areaConstruida): ?>
        <p>
            <span class="label">Área aproximada da biblioteca (área construída aproximada):</span>
            <span class="js-editable" data-edit="bib_infra_predio_areaConstruida" data-original-title="Área aproximada da biblioteca (área construída aproximada)" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_predio_areaConstruida; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_computadores_numero): ?>
        <p>
            <span class="label">Número de computadores que a biblioteca possui:</span>
            <span class="js-editable" data-edit="bib_infra_computadores_numero" data-original-title="Número de computadores que a biblioteca possui" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_computadores_numero; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_computadores_internet): ?>
        <p>
            <span class="label">Os computadores possuem acesso à internet?</span>
            <span class="js-editable" data-edit="bib_infra_computadores_internet" data-original-title="Os computadores possuem acesso à internet?" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_computadores_internet; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_computadores_acesso): ?>
        <p>
            <span class="label">Acesso aos computadores:</span>
            <span class="js-editable" data-edit="bib_infra_computadores_acesso" data-original-title="Acesso aos computadores" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_computadores_acesso; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_computadores_disponiveis): ?>
        <p>
            <span class="label">Quantos computadores com acesso a internet estão disponíveis para o público?</span>
            <span class="js-editable" data-edit="bib_infra_computadores_disponiveis" data-original-title="bib_infra_computadores_disponiveis" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_computadores_disponiveis; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_wifi): ?>
        <p>
            <span class="label">Oferece serviço de acesso à internet Wi-Fi?</span>
            <span class="js-editable" data-edit="bib_infra_wifi" data-original-title="Oferece serviço de acesso à internet Wi-Fi?" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_wifi; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_telecentro_possui): ?>
        <p>
            <span class="label">A biblioteca possui telecentro?</span>
            <span class="js-editable" data-edit="bib_infra_telecentro_possui" data-original-title="A biblioteca possui telecentro?" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_telecentro_possui; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_infra_telecentro_integrado): ?>
        <p>
            <span class="label">O Telecentro funciona integrado à Biblioteca?</span>
            <span class="js-editable" data-edit="bib_infra_telecentro_integrado" data-original-title="O Telecentro funciona integrado à Biblioteca?" data-emptytext="Selecione">
                <?php echo $entity->bib_infra_telecentro_integrado; ?>
            </span>
        </p>
        <?php endif; ?>

    </div>
</div>