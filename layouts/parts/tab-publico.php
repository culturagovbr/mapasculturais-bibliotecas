<div id="tab-publico" class="aba-content">
    <div class="servico">
        <p>
            <span class="label">Faixa etária predominante dos usuários da biblioteca:</span>
            <span class="js-editable" data-edit="bib_faixaEtariaPredominante" data-original-title="Faixa etária predominante" data-emptytext="Selecione">
                <?php echo $entity->bib_faixaEtariaPredominante; ?>
            </span>
        </p>

        <p>
            <span class="label">A biblioteca trabalha com comunidades ou grupos específicos?:</span>
            <editable-multiselect entity-property="bib_comunidades" empty-label="Selecione"></editable-multiselect>
        </p>

        <p>
            <span class="label">bib_publico_frequenciaMedia:</span>
            <span class="js-editable" data-edit="bib_publico_frequenciaMedia" data-original-title="bib_publico_frequenciaMedia" data-emptytext="Selecione">
                <?php echo $entity->bib_publico_frequenciaMedia; ?>
            </span>
        </p>

    </div>
</div>