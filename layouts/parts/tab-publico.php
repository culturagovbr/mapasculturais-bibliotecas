<div id="tab-publico" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_faixaEtariaPredominantes): ?>
        <p>
            <span class="label">Faixa etária predominante dos usuários da biblioteca:</span>
            <span class="js-editable" data-edit="bib_faixaEtariaPredominante" data-original-title="Faixa etária predominante" data-emptytext="Selecione">
                <?php echo $entity->bib_faixaEtariaPredominante; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_comunidades): ?>
        <p>
            <span class="label">A biblioteca trabalha com comunidades ou grupos específicos?</span> 
            <editable-multiselect entity-property="bib_comunidades" empty-label="Selecione" allow-other="true" box-title="A biblioteca trabalha com comunidades ou grupos específicos?:"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_publico_frequenciaMedia): ?>
        <p>
            <span class="label">Freqüência média mensal dos usuários na biblioteca:</span>
            <span class="js-editable" data-edit="bib_publico_frequenciaMedia" data-original-title="Freqüência média mensal dos usuários na biblioteca" data-emptytext="Selecione">
                <?php echo $entity->bib_publico_frequenciaMedia; ?>
            </span>
        </p>
        <?php endif; ?>

    </div>
</div>